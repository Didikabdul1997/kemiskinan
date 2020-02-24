<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_home extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private $tabel = "data_buku";

    public function jml_peminjaman()
    {
        $query = "select count(id_peminjaman) as jumlah from data_peminjaman";
        $data = $this->db->query($query);
        return $data->row_array();
    }

    public function jml_anggota()
    {
        $query = "select count(id_anggota) as jumlah from data_anggota";
        $data = $this->db->query($query);
        return $data->row_array();
    }

    public function jml_pegawai()
    {
        $query = "select count(id_user) as jumlah from user";
        $data = $this->db->query($query);
        return $data->row_array();
    }

    public function jml_buku()
    {
        $query = "select count(id_buku) as jumlah from data_buku";
        $data = $this->db->query($query);
        return $data->row_array();
    }

    public function list_kemiskinan()
    {
        $query = "select * from kemiskinan group by tahun";
        $data = $this->db->query($query);
        return $data->result_array();
    }

    public function list_kemiskinan_maret()
    {
        $query = "select * from kemiskinan where semester='1' group by tahun";
        $data = $this->db->query($query);
        return $data->result_array();
    }

    public function list_kemiskinan_september()
    {
        $query = "select * from kemiskinan where semester='2' group by tahun";
        $data = $this->db->query($query);
        return $data->result_array();
    }
}

/* End of file Mod_buku.php */
