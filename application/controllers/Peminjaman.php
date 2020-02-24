<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
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
        $this->load->model('Model_peminjaman', 'peminjaman');
        $this->load->model('Model_buku', 'buku');
        $this->check_login();
    }

    public function index()
    {
        $this->_get_commond_data($data);
        $data['judul']    = "Peminjaman";
        $data['active']    = "peminjaman";
        $data['pages']  = "peminjaman/data";
        $data['list_buku'] = $this->peminjaman->list_buku();
        $data['list_anggota'] = $this->peminjaman->list_anggota();
        $data['list_peminjaman'] = $this->peminjaman->list_peminjaman();
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $this->_get_commond_data($data);
        $data['judul']    = "Tambah peminjaman";
        $data['active']    = "peminjaman";
        $data['pages']  = "peminjaman/tambah";
        $data['list_buku'] = $this->buku->list_buku();
        $data['list_anggota'] = $this->peminjaman->list_anggota();
        $this->load->view('template', $data);
    }

    public function simpan()
    {
        if (!empty($_POST['id_peminjaman'])) {
            $id = $_POST['id_peminjaman'];
            $this->peminjaman->update($id);
            $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
        } else {
            $id            = "";
            $this->peminjaman->insert();
            $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
        }
        redirect("peminjaman");
    }

    public function kembalikan($id = '')
    {
        $this->peminjaman->set_status($id, 2);
        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
        redirect("peminjaman");
    }

    public function pinjam($id = '')
    {
        $this->peminjaman->set_status($id, 1);
        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
        redirect("peminjaman");
    }

    public function hapus()
    {
        // var_dump($_POST['id']);
        if (!empty($_POST['id_peminjaman'])) {
            $id = $_POST['id_peminjaman'];
        } else {
            $id = $this->uri->segment(3);
        }
        if ($id != 'kosong') {
            $this->peminjaman->delete($id);
            $this->session->set_flashdata('flash-success', 'Data Berhasil Dihapus !!');
        } else {
            $this->session->set_flashdata('flash-danger', 'Tidak ada data terpilih !!');
        }
        redirect("peminjaman");
    }


    public function ubah()
    {
        $this->_get_commond_data($data);
        $id            = $this->uri->segment(3);
        $data['data']    = $this->peminjaman->list_peminjaman($id);
        $data['list_buku'] = $this->peminjaman->list_buku();
        $data['list_anggota'] = $this->peminjaman->list_anggota();
        $data['judul']    = "Ubah peminjaman";
        $data['active']    = "peminjaman";
        $data['pages']  = "peminjaman/ubah";
        $this->load->view('template', $data);
    }
}
