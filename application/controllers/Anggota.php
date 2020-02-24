<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
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
        $this->load->model('Model_anggota', 'anggota');
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
        $data['judul']    = "Anggota";
        $data['active']    = "anggota";
        $data['pages']  = "anggota/data";
        $data['list_anggota'] = $this->anggota->list_anggota();
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $this->_get_commond_data($data);
        $data['judul']    = "Tambah Anggota";
        $data['active']    = "anggota";
        $data['pages']  = "anggota/tambah";
        $this->load->view('template', $data);
    }

    public function simpan()
    {
        // $data = array();
        if ($this->input->post('submit')) {
            if ($_FILES['foto']['name'] != "") {
                $upload = $this->anggota->upload();
                if ($upload['result'] == "success") {
                    if (!empty($_POST['id_anggota'])) {
                        $id = $_POST['id_anggota'];
                        $this->anggota->update($id, $upload);
                        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                    } else {
                        $id            = "";
                        $this->anggota->insert($upload);
                        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                    }
                } else {
                    $this->session->set_flashdata('flash-danger', 'File gagal di upload!!');
                }
            } else {
                if (!empty($_POST['id_anggota'])) {
                    $id = $_POST['id_anggota'];
                    $this->anggota->update($id);
                    $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                } else {
                    $id            = "";
                    $this->anggota->insert();
                    $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                }
            }
        }
        redirect("anggota");
    }

    public function hapus()
    {
        // var_dump($_POST['id']);
        if (!empty($_POST['id_anggota'])) {
            $id = $_POST['id_anggota'];
        } else {
            $id = $this->uri->segment(3);
        }
        if ($id != 'kosong') {
            $this->anggota->delete($id);
            $this->session->set_flashdata('flash-success', 'Data Berhasil Dihapus !!');
        } else {
            $this->session->set_flashdata('flash-danger', 'Tidak ada data terpilih !!');
        }
        redirect("anggota");
    }


    public function ubah()
    {
        $this->_get_commond_data($data);
        $id            = $this->uri->segment(3);
        $data['data']    = $this->anggota->data($id);
        $data['judul']    = "Ubah Anggota";
        $data['active']    = "anggota";
        $data['pages']  = "anggota/ubah";
        $this->load->view('template', $data);
    }
}
