<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('username') and ($this->session->userdata('status')=='admin'))){
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		// $status = $this->session->userdata('username');
		// $data['user_view'] = $this->user_model->user_view($status);
		$data['content'] = 'admin/dasboard';
		$this->load->view('admin/index', $data);
	}
}
