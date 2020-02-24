<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_peminjaman extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private $tabel = "data_peminjaman";

    public function list_peminjaman($id = '')
    {
        if ($id != '') {
            $where = " where p.id_peminjaman=" . $id;
        } else {
            $where = "";
        }
        $query = "select
        p.id_peminjaman as id_peminjaman,
        b.foto as foto,
        a.nama as peminjam,
        a.id_anggota as id_anggota,
        b.nama as buku,
        b.id_buku as id_buku,
        p.tanggal_pinjam as tanggal_pinjam,
        p.tanggal_kembali as tanggal_kembali,
        p.status as status
        
        from data_peminjaman p
        inner join data_buku b on p.buku=b.id_buku
        inner join data_anggota a on p.peminjam=a.id_anggota
        $where
        ";
        if ($id != '') {
            $data = $this->db->query($query)->row_array();
        } else {
            $data = $this->db->query($query)->result_array();
        }
        return $data;
    }

    public function list_buku()
    {
        $data = $this->db->get('data_buku')->result_array();
        return $data;
    }

    public function list_anggota()
    {
        $data = $this->db->get('data_anggota')->result_array();
        return $data;
    }

    public function column($upload = '')
    {
        return array(
            'peminjam' => $this->input->post('peminjam'),
            'buku' => $this->input->post('buku'),
            'tanggal_pinjam'     => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali'    => $this->input->post('tanggal_kembali'),
            'status'    => $this->input->post('status')
        );
    }

    public function data($id = '')
    {
        if ($id != '') {
            $this->db->where('id_peminjaman', $id);
            $this->db->order_by('id_peminjaman', 'ASC');
            $data = $this->db->get($this->tabel);
            if ($data->num_rows() > 0) {
                $data = $data->row_array();
                return $data;
            } else {
                return NULL;
            }
        } else {
            $this->db->order_by('id_peminjaman', 'ASC');
            $data = $this->db->get($this->tabel);
            if ($data->num_rows() > 0) {
                $data = $data->result_array();
                return $data;
            } else {
                return NULL;
            }
        }
    }

    public function insert($upload = '')
    {
        $data = $this->column($upload);
        return $this->db->insert($this->tabel, $data);
    }

    public function update($id, $upload = '')
    {
        $this->db->where('id_peminjaman', $id);
        $data = $this->column($upload);
        return $this->db->update($this->tabel, $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id_peminjaman', $id);
        $this->db->delete($this->tabel);
    }

    public function set_status($id, $status)
    {
        $query = "UPDATE data_peminjaman
        SET status='$status'
        WHERE id_peminjaman='$id'";
        $this->db->query($query);
    }
}

/* End of file Mod_peminjaman.php */
