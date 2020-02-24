<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function data_login($username, $password)
    {
        $query = "select * from user where username='$username' and password='$password'";
        $data = $this->db->query($query)->row_array();
        return $data;
    }

    public function data_user($id)
    {
        $query = "select * from user where id_user='$id'";
        $data = $this->db->query($query)->row_array();
        return $data;
    }
}

/* End of file Mod_anggota.php */
