<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('username') and ($this->session->userdata('status')=='user'))) {
			redirect(base_url('login'));
		}
	}

	public function index(){
		
		$data['kabupaten'] = $this->model_sekolah_asal->view_jumlah();
		// $data['kabupaten'] = $this->model_kabupaten->view3();
		$data['sekolah'] = $this->model_mahasiswa->jumlah_sekolah();
        $data['kelamin_laki'] = $this->model_mahasiswa->kelamin_laki();
        $data['kelamin_pr'] = $this->model_mahasiswa->kelamin_pr();
        $data['data_angakatan'] = $this->model_mahasiswa->jumlah_angkatan();
		$data['content'] = 'user/grafik';
		$this->load->view('user/index', $data);
		// echo json_encode($data['kabupaten']);

	}

	public function view_data_mahasiswa(){
		$data['content'] = 'user/view_mahasiswa';
		$this->load->view('user/index', $data);
	}

	public function view_map_sekolah($kode){

		$kode = $kode;
		$data['data_mahasiswa'] = $this->model_mahasiswa->detail_mahasiswa_map($kode);
		$data['sekolah'] = $this->model_sekolah_asal->detail_sekolah($kode);
		$data['content'] = 'user/view_sekolah_map';
		$this->load->view('user/index', $data);
		// echo json_encode($data['sekolah']);

	}
	
}
