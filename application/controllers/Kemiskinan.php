<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kemiskinan extends CI_Controller
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
        $data['judul']    = "Kemiskinan";
        $data['active']    = "kemiskinan";
        $data['pages']  = "kemiskinan/data";
        $data['list_kemiskinan'] = $this->kemiskinan->data();
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $this->_get_commond_data($data);
        $data['judul']    = "Tambah kemiskinan";
        $data['active']    = "kemiskinan";
        $data['pages']  = "kemiskinan/tambah";
        $data['list_buku'] = $this->buku->list_buku();
        $data['list_anggota'] = $this->kemiskinan->list_anggota();
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
        redirect("kemiskinan");
    }

    public function kembalikan($id = '')
    {
        $this->kemiskinan->set_status($id, 2);
        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
        redirect("kemiskinan");
    }

    public function pinjam($id = '')
    {
        $this->kemiskinan->set_status($id, 1);
        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
        redirect("kemiskinan");
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
        redirect("kemiskinan");
    }


    public function ubah()
    {
        $this->_get_commond_data($data);
        $id            = $this->uri->segment(3);
        $data['data']    = $this->kemiskinan->list_kemiskinan($id);
        $data['list_buku'] = $this->kemiskinan->list_buku();
        $data['list_anggota'] = $this->kemiskinan->list_anggota();
        $data['judul']    = "Ubah kemiskinan";
        $data['active']    = "kemiskinan";
        $data['pages']  = "kemiskinan/ubah";
        $this->load->view('template', $data);
    }
}
