<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_anggota extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private $tabel = "data_anggota";

    public function list_anggota()
    {
        $data = $this->db->get('data_anggota')->result_array();
        return $data;
    }


    public function column($upload = '')
    {
        if ($upload != '') {
            return array(
                'nama' => $this->input->post('nama'),
                'jk'     => $this->input->post('jk'),
                'tempat_lahir'    => $this->input->post('tempat_lahir'),
                'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
                'alamat'    => $this->input->post('alamat'),
                'kelas'    => $this->input->post('kelas'),
                'foto'    => $upload['file']['file_name']
            );
        } else {
            return array(
                'nama' => $this->input->post('nama'),
                'jk'     => $this->input->post('jk'),
                'tempat_lahir'    => $this->input->post('tempat_lahir'),
                'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
                'alamat'    => $this->input->post('alamat'),
                'kelas'    => $this->input->post('kelas')
            );
        }
    }

    public function data($id = '')
    {
        if ($id != '') {
            $this->db->where('id_anggota', $id);
            $this->db->order_by('id_anggota', 'ASC');
            $data = $this->db->get($this->tabel);
            if ($data->num_rows() > 0) {
                $data = $data->row_array();
                return $data;
            } else {
                return NULL;
            }
        } else {
            $this->db->order_by('id_anggota', 'ASC');
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
        $this->db->where('id_anggota', $id);
        $data = $this->column($upload);
        return $this->db->update($this->tabel, $data);
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        $this->db->where_in('id_anggota', $id);
        $this->db->delete($this->tabel);
    }

    private function _deleteImage($id)
    {
        $data = $this->data($id);
        if ($data['foto'] != "images.jpeg") {
            return array_map('unlink', glob(FCPATH . "assets/uploads/foto/" . $data['foto']));
        }
    }

    // Fungsi untuk melakukan proses upload file
    public function upload()
    {
        $config['upload_path'] = './assets/uploads/foto/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        // $config['overwrite']     = true;
        $config['max_size']    = '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('foto')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
}

/* End of file Mod_anggota.php */
