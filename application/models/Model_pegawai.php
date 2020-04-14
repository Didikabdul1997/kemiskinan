<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pegawai extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    private $tabel = "user";

    public function list_pegawai()
    {
        $data = $this->db->get('user')->result_array();
        return $data;
    }


    public function column($upload = '')
    {
        if ($upload != '') {
            return array(
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'jk'     => $this->input->post('jk'),
                'tempat_lahir'    => $this->input->post('tempat_lahir'),
                'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
                'alamat'    => $this->input->post('alamat'),
                'username'    => $this->input->post('username'),
                'password'    => $this->input->post('password'),
                'foto'    => $upload['file']['file_name']
            );
        } else {
            return array(
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'jk'     => $this->input->post('jk'),
                'tempat_lahir'    => $this->input->post('tempat_lahir'),
                'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
                'alamat'    => $this->input->post('alamat'),
                'username'    => $this->input->post('username'),
                'password'    => $this->input->post('password')
            );
        }
    }

    public function data($id = '')
    {
        if ($id != '') {
            $this->db->where('id_user', $id);
            $this->db->order_by('id_user', 'ASC');
            $data = $this->db->get($this->tabel);
            if ($data->num_rows() > 0) {
                $data = $data->row_array();
                return $data;
            } else {
                return NULL;
            }
        } else {
            $this->db->order_by('id_user', 'ASC');
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
        $this->db->where('id_user', $id);
        $data = $this->column($upload);
        return $this->db->update($this->tabel, $data);
    }

    public function delete($id)
    {
        if ($this->_deleteImage($id)) {
            $this->db->where_in('id_user', $id);
            $this->db->delete($this->tabel);
            if ($id == $this->session->userdata('user_id')) {
                redirect("user/logout");
            }
        } else {
            $this->session->set_flashdata('flash-danger', 'Tidak Dihapus !!');
        }
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

/* End of file Mod_pegawai.php */
