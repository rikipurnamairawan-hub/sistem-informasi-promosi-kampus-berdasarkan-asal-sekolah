<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', 'user_model');
	}

	public function index()
	{
		// $data['content'] = 'admin/dasboard';
		$this->load->view('index');
	}

	public function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$admin1 = $this->input->post('Admin');

		if ($admin1 == 'admin') {
			$admin = 'admin';
		} else {
			$admin = 'user';

		}

		$where = array(
			'username' =>  $username,
			'password' => md5($password),
			'status' => $admin
		);

		$cek = $this->login_model->cek_login("user", $where)->num_rows();
		$user_view = $this->user_model->user_view($username);

		if ($cek > 0 and $admin == 'admin') {
			$data_session = array(
				'username' => $username,
				'status' => $admin,
				'nama_user' => $user_view->nama_user
			);
			$this->session->set_userdata($data_session);
			redirect(base_url("admin/Dashboard"));

		} 
		else if ($cek > 0 and $admin == 'user') {
			$data_session = array(
				'username' => $username,
				'status' => $admin,
				'nama_user' => $user_view->nama_user
			);			
			$this->session->set_userdata($data_session);
			redirect(base_url("user/Dashboard_user"));

		} else {
			echo 'password salah';
		}
	}

	public function keluar()
	{

		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
