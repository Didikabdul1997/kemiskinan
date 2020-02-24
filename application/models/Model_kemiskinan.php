<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kemiskinan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private $tabel = "kemiskinan";

    public function list_kemiskinan($id = '')
    {
        if ($id != '') {
            $where = " where p.id_kemiskinan=" . $id;
        } else {
            $where = "";
        }
        $query = "select * from kemiskinan
        $where
        ";
        if ($id != '') {
            $data = $this->db->query($query)->row_array();
        } else {
            $data = $this->db->query($query)->result_array();
        }
        return $data;
    }

    public function column($upload = '')
    {
        return array(
            'tahun' => $this->input->post('tahun'),
            'semester' => $this->input->post('semester'),
            'jumlah'     => $this->input->post('jumlah')
        );
    }

    public function data($id = '')
    {
        if ($id != '') {
            $this->db->where('id_kemiskinan', $id);
            $this->db->order_by('id_kemiskinan', 'ASC');
            $data = $this->db->get($this->tabel);
            if ($data->num_rows() > 0) {
                $data = $data->row_array();
                return $data;
            } else {
                return NULL;
            }
        } else {
            $this->db->order_by('tahun', 'ASC');
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
        $this->db->where('id_kemiskinan', $id);
        $data = $this->column($upload);
        return $this->db->update($this->tabel, $data);
    }

    public function delete($id)
    {
        $this->db->where_in('id_kemiskinan', $id);
        $this->db->delete($this->tabel);
    }

    public function set_status($id, $status)
    {
        $query = "UPDATE kemiskinan
        SET status='$status'
        WHERE id_kemiskinan='$id'";
        $this->db->query($query);
    }
}

/* End of file Mod_peminjaman.php */
