<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_user extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('username') and ($this->session->userdata('status')=='user'))) {
			redirect(base_url('login'));
		}
	}

	public function index(){
		
		$data['sekolah'] = $this->model_sekolah_asal->view_sekolah_asal();
		$data['content'] = 'user/dasboard_user';
		$this->load->view('user/index', $data);
		// echo json_encode($data['sekolah']);

	}
	
}
