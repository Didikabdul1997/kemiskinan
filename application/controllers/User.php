<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user', 'user');
        $this->load->model('Model_pegawai', 'pegawai');
    }

    private function _get_commond_data(&$data)
    {
        $data['user']    = $this->user->data_user($this->session->userdata('user_id'));
    }

    public function profil()
    {
        $this->_get_commond_data($data);
        $data['data']    = $this->user->data_user($this->session->userdata('user_id'));
        $data['judul']    = "Profil";
        $data['active']    = "profil";
        $data['pages']  = "user/profil";
        $this->load->view('template', $data);
    }

    public function info()
    {
        $this->_get_commond_data($data);
        $data['data']    = $this->user->data_user($this->session->userdata('user_id'));
        $data['judul']    = "Info Panduan";
        $data['active']    = "info";
        $data['pages']  = "user/info";
        $this->load->view('template', $data);
    }

    public function simpan()
    {
        // $data = array();
        if ($this->input->post('submit')) {
            if ($_FILES['foto']['name'] != "") {
                $upload = $this->pegawai->upload();
                if ($upload['result'] == "success") {
                    if (!empty($_POST['id_user'])) {
                        $id = $_POST['id_user'];
                        $this->pegawai->update($id, $upload);
                        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                    } else {
                        $id            = "";
                        $this->pegawai->insert($upload);
                        $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                    }
                } else {
                    $this->session->set_flashdata('flash-danger', 'File gagal di upload!!');
                }
            } else {
                if (!empty($_POST['id_user'])) {
                    $id = $_POST['id_user'];
                    $this->pegawai->update($id);
                    $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                } else {
                    $id            = "";
                    $this->pegawai->insert();
                    $this->session->set_flashdata('flash-success', 'Data berhasil disimpan !!');
                }
            }
        }
        redirect("user/profil");
    }

    public function login()
    {
        $this->load->view('user/login');
    }

    public function signin()
    {
        // Get username
        $username = $this->input->post('username');
        // Get and encrypt the password
        $password = $this->input->post('password');
        // Login user
        $user_data = $this->user->data_login($username, $password);
        if ($user_data['id_user']) {
            // Create session
            $user_data = array(
                'user_id'     => $user_data['id_user'],
                'username'    => $username,
                'logged_in'    => true,
                'jabatan'     => $user_data['jabatan']
            );

            $this->session->set_userdata($user_data);
            // Set message
            $this->session->set_flashdata('flash-success', 'Anda Sudah Login');
            redirect('home');
        } else {
            // Set message
            $this->session->set_flashdata('flash-danger', 'Login Tidak Valid !!');
            redirect('user/login');
        }
    }
    // Log user out
    public function logout()
    {
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        // Set message
        $this->session->set_flashdata('flash-warning', 'Anda Sudah Logout !!');
        redirect('user/login');
    }



    // end of controller Login.php
}
