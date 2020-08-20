<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forecasting extends CI_Controller
{
    public function check_login()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
    }

    private function _get_commond_data(&$data)
    {
        $this->load->model('Model_user', 'user');
        $data['user']    = $this->user->data_user($this->session->userdata('user_id'));
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_kemiskinan', 'kemiskinan');
        $this->check_login();
    }

    public function index()
    {
        $this->_get_commond_data($data);
        $data['judul']    = "Forecasting";
        $data['active']    = "forecasting";
        $data['pages']  = "forecasting/data";
        $data['list_kemiskinan'] = $this->kemiskinan->data();
        $this->load->view('template', $data);
    }


    public function get_tb_forecast()
    {
        if ($this->input->post('periode') && $this->input->post('tahunakhir')) {
            $periode = $this->input->post('periode');
            $target = $this->input->post('tahunakhir');
            $aktual = $this->kemiskinan->aktual();
            $this->db->empty_table('forecast');
            $i = 0;
            $aktu = array();
            foreach ($aktual as $ak) {
                if ($i >= $periode) {
                    $result = $this->db->query("select * from forecast order by id_kemiskinan desc limit " . $periode)->result_array();
                    $jumlah = 0;
                    foreach ($result as $a) {
                        $jumlah += $a['jumlah'];
                    }
                    $forecast = $jumlah / $periode;
                    $ak['forecast'] = round($forecast);
                    $ak['e'] = round($ak['jumlah'] - $forecast);
                    $ak['e2'] = $ak['e'] * $ak['e'];
                    $ak['ape'] = number_format(abs($ak['e'] / $ak['jumlah']) * 100, 2);
                }
                $this->db->insert('forecast', $ak);
                $i++;
                $aktu = $ak;
            }
            $id_kemiskinan = $i + 1;
            $tahun = $aktu['tahun'];
            $semester = $aktu['semester'];
            if ($tahun != 0 && $tahun <= $target) {
                if ($semester == 1) {
                    $semester++;
                    $cast['id_kemiskinan'] = $id_kemiskinan;
                    $cast['tahun'] = $tahun;
                    $cast['semester'] = $semester;
                    $cast['jumlah'] = $aktu['forecast'];
                    $result = $this->db->query("select * from forecast order by id_kemiskinan desc limit " . $periode)->result_array();
                    $jumlah = 0;
                    foreach ($result as $a) {
                        $jumlah += $a['jumlah'];
                    }
                    $forecast = $jumlah / $periode;
                    $cast['forecast'] = round($forecast);
                    $cast['e'] = round($cast['jumlah'] - $forecast);
                    $cast['e2'] = $cast['e'] * $cast['e'];
                    $cast['ape'] = number_format(abs($cast['e'] / $cast['jumlah']) * 100, 2);
                    $this->db->insert('forecast', $cast);
                    $tahun++;
                    $id_kemiskinan++;
                    $aktu = $cast;
                }
                for ($thn = $tahun; $thn <= $target; $thn++) {
                    for ($semester = 1; $semester <= 2; $semester++) {
                        $cast['id_kemiskinan'] = $id_kemiskinan;
                        $cast['tahun'] = $tahun;
                        $cast['semester'] = $semester;
                        $cast['jumlah'] = $aktu['forecast'];
                        $result = $this->db->query("select * from forecast order by id_kemiskinan desc limit " . $periode)->result_array();
                        $jumlah = 0;
                        foreach ($result as $a) {
                            $jumlah += $a['jumlah'];
                        }
                        $forecast = $jumlah / $periode;
                        $cast['forecast'] = round($forecast);
                        $cast['e'] = round($cast['jumlah'] - $forecast);
                        $cast['e2'] = $cast['e'] * $cast['e'];
                        $cast['ape'] = number_format(abs($cast['e'] / $cast['jumlah']) * 100, 2);
                        $this->db->insert('forecast', $cast);
                        $aktu = $cast;
                        $id_kemiskinan++;
                    }
                    $tahun++;
                }
            }
        }

        $data = $this->kemiskinan->data_forecast();
        echo json_encode($data);
    }

    public function get_hasil()
    {
        $this->db->where('forecast !=', null);
        $data = $this->db->get('forecast');
        $row = $data->num_rows();
        if ($row > 0) {
            $data = $data->result_array();
            $sse = 0;
            $mape = 0;
            foreach ($data as $dat) {
                $sse += $dat['e2'];
                $mape += $dat['ape'];
            }
            $data = array(
                "sse" => $sse,
                "mse" => round($sse / $row, 2),
                "rmse" => round(sqrt($sse / $row), 2),
                "mape" => round($mape / $row, 2)
            );
            if ($this->input->post('periode') && $this->input->post('tahunakhir')) {
                $this->db->empty_table('hasil_forecast');
                $data['periode'] = $this->input->post('periode');
                $data['tahunakhir'] = $this->input->post('tahunakhir');
                $this->db->insert('hasil_forecast', $data);
            }
            $dat = $this->db->get('hasil_forecast')->row_array();
            echo json_encode($dat);
        } else {
            return NULL;
        }
    }
}
