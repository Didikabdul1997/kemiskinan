<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	private function _get_commond_data(&$data)
	{
		$this->load->model('Model_user', 'user');
		$data['user']    = $this->user->data_user($this->session->userdata('user_id'));
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_home', 'home');
		$this->check_login();
	}

	public function index()
	{
		$this->_get_commond_data($data);
		$this->load->model('Model_kemiskinan', 'kemiskinan');
		$data['grafik'] = $this->kemiskinan->get_grafik();
		$data['dashboard'] = $this->kemiskinan->data_dashboard();
		$data['judul']	= "Dashboard";
		$data['active']	= "dashboard";
		$data['pages']	= "home";
		$this->load->view('template', $data);
	}

	public function check_login()
	{
		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
	}
}
