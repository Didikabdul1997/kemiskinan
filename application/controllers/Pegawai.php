<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function check_login()
    {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pegawai', 'pegawai');
        $this->check_login();
    }

    private function _get_commond_data(&$data)
    {
        $this->load->model('Model_user', 'user');
        $data['user']    = $this->user->data_user($this->session->userdata('user_id'));
    }

    public function index()
    {
        $this->_get_commond_data($data);
        $data['judul']    = "Pegawai";
        $data['active']    = "pegawai";
        $data['pages']  = "pegawai/data";
        $data['list_pegawai'] = $this->pegawai->list_pegawai();
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $this->_get_commond_data($data);
        $data['judul']    = "Tambah Pegawai";
        $data['active']    = "pegawai";
        $data['pages']  = "pegawai/tambah";
        $this->load->view('template', $data);
    }

    public function simpan()
    {
        // $data = array();
        if ($this->input->post('submit')) {
            if ($_FILES['foto']['name'] != "") {
                $upload = $this->pegawai->upload();
                if ($upload['result'] == "success") {
                    if (!empty($_POST['id_pegawai'])) {
                        $id = $_POST['id_pegawai'];
                        $this->pegawai->update($id, $upload);
                        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                    } else {
                        $id            = "";
                        $this->pegawai->insert($upload);
                        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                    }
                } else {
                    $this->session->set_flashdata('flash-danger', 'File gagal di upload!!');
                }
            } else {
                if (!empty($_POST['id_pegawai'])) {
                    $id = $_POST['id_pegawai'];
                    $this->pegawai->update($id);
                    $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                } else {
                    $id            = "";
                    $this->pegawai->insert();
                    $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                }
            }
        }
        redirect("pegawai");
    }

    public function hapus()
    {
        // var_dump($_POST['id']);
        if (!empty($_POST['id_pegawai'])) {
            $id = $_POST['id_pegawai'];
        } else {
            $id = $this->uri->segment(3);
        }
        if ($id != 'kosong') {
            $this->pegawai->delete($id);
            $this->session->set_flashdata('flash-success', 'Data Berhasil Dihapus !!');
        } else {
            $this->session->set_flashdata('flash-danger', 'Tidak ada data terpilih !!');
        }
        redirect("pegawai");
    }


    public function ubah()
    {
        $this->_get_commond_data($data);
        $id            = $this->uri->segment(3);
        $data['data']    = $this->pegawai->data($id);
        $data['judul']    = "Ubah pegawai";
        $data['active']    = "pegawai";
        $data['pages']  = "pegawai/ubah";
        $this->load->view('template', $data);
    }
}
