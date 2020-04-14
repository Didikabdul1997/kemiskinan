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

    public function simpan()
    {
        if (!empty($_POST['id_kemiskinan'])) {
            $id = $_POST['id_kemiskinan'];
            $this->kemiskinan->update($id);
            $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
        } else {
            $id            = "";
            $this->kemiskinan->insert();
            $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
        }
        redirect("aktual");
    }

    public function hapus()
    {
        // var_dump($_POST['id']);
        if (!empty($_POST['id_kemiskinan'])) {
            $id = $_POST['id_kemiskinan'];
        } else {
            $id = $this->uri->segment(3);
        }
        if ($id != 'kosong') {
            $this->kemiskinan->delete($id);
            $this->session->set_flashdata('flash-success', 'Data Berhasil Dihapus !!');
        } else {
            $this->session->set_flashdata('flash-danger', 'Tidak ada data terpilih !!');
        }
        redirect("aktual");
    }
}
