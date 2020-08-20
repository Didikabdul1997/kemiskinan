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
            $this->db->order_by('id_kemiskinan', 'DESC');
            $data = $this->db->get($this->tabel);
            if ($data->num_rows() > 0) {
                $data = $data->row_array();
                return $data;
            } else {
                return NULL;
            }
        } else {
            $this->db->order_by('tahun', 'DESC');
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


    public function aktual()
    {
        $this->db->order_by('tahun', 'ASC');
        $this->db->order_by('semester', 'ASC');
        $data = $this->db->get($this->tabel);
        if ($data->num_rows() > 0) {
            $data = $data->result_array();
            return $data;
        } else {
            return NULL;
        }
    }

    public function data_forecast($id = '')
    {
        $this->db->order_by('tahun', 'DESC');
        $this->db->order_by('semester', 'DESC');
        $data = $this->db->get('forecast');
        if ($data->num_rows() > 0) {
            $data = $data->result_array();
            return $data;
        } else {
            return NULL;
        }
    }

    public function get_all_tahun($tabel, $order = "desc")
    {
        $query = "SELECT * FROM (
            select tahun from $tabel group by tahun order by tahun desc limit 8
        ) sub
        ORDER BY tahun $order";
        $data = $this->db->query($query);
        if ($data->num_rows() > 0) {
            $data = $data->result_array();
            return $data;
        } else {
            return NULL;
        }
    }

    public function get_grafik()
    {
        $data['tahun'] = $this->get_all_tahun('forecast', 'asc');
        for ($i = 0; $i < count($data['tahun']); $i++) {
            $data['maret'][$i]['jumlah'] = $this->get_semester($data['tahun'][$i]['tahun'], '1');
            $data['september'][$i]['jumlah'] = $this->get_semester($data['tahun'][$i]['tahun'], '2');
        }
        return $data;
    }

    public function get_semester($tahun, $semester)
    {
        $this->db->where('tahun', $tahun);
        $this->db->where('semester', $semester);
        $data = $this->db->get('forecast')->row_array();
        return $data['jumlah'];
    }

    public function data_dashboard()
    {
        $query = "SELECT * FROM (
            select * from forecast order by id_kemiskinan desc limit 5
        ) sub
        ORDER BY id_kemiskinan asc";
        $data = $this->db->query($query)->result_array();
        return $data;
    }
}

/* End of file Mod_kemiskinan.php */
