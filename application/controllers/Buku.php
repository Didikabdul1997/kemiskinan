<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
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
        $this->load->model('Model_buku', 'buku');
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
        $data['judul']    = "Buku";
        $data['active']    = "buku";
        $data['pages']  = "buku/data";
        $data['list_buku'] = $this->buku->list_buku();
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $this->_get_commond_data($data);
        $data['judul']    = "Tambah Buku";
        $data['active']    = "buku";
        $data['pages']  = "buku/tambah";
        $this->load->view('template', $data);
    }

    public function simpan()
    {
        // $data = array();
        if ($this->input->post('submit')) {
            if ($_FILES['foto']['name'] != "") {
                $upload = $this->buku->upload();
                if ($upload['result'] == "success") {
                    if (!empty($_POST['id_buku'])) {
                        $id = $_POST['id_buku'];
                        $this->buku->update($id, $upload);
                        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                    } else {
                        $id            = "";
                        $this->buku->insert($upload);
                        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                    }
                } else {
                    $this->session->set_flashdata('flash-danger', 'File gagal di upload!!');
                }
            } else {
                if (!empty($_POST['id_buku'])) {
                    $id = $_POST['id_buku'];
                    $this->buku->update($id);
                    $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                } else {
                    $id            = "";
                    $this->buku->insert();
                    $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                }
            }
        }
        redirect("buku");
    }

    public function hapus()
    {
        // var_dump($_POST['id']);
        if (!empty($_POST['id_buku'])) {
            $id = $_POST['id_buku'];
        } else {
            $id = $this->uri->segment(3);
        }
        if ($id != 'kosong') {
            $this->buku->delete($id);
            $this->session->set_flashdata('flash-success', 'Data Berhasil Dihapus !!');
        } else {
            $this->session->set_flashdata('flash-danger', 'Tidak ada data terpilih !!');
        }
        redirect("buku");
    }


    public function ubah()
    {
        $this->_get_commond_data($data);
        $id            = $this->uri->segment(3);
        $data['data']    = $this->buku->data($id);
        $data['judul']    = "Ubah Buku";
        $data['active']    = "buku";
        $data['pages']  = "buku/ubah";
        $this->load->view('template', $data);
    }
}
