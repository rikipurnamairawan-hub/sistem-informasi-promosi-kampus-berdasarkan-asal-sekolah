<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_sekolah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (empty($this->session->userdata('username') and ($this->session->userdata('status')=='admin'))) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$data['provinsi'] = $this->model_provinsi->view_provinsi();
		$data['content'] = 'admin/sekolah/input_sekolah_asal';
		$this->load->view('admin/index', $data);
	}

	public function insert_sekolah()
	{

		$data = array(
			'nama_sekolah' => $this->input->post('nama_sekolah'),
			'latitude' => $this->input->post('lat'),
			'longitude' => $this->input->post('long'),
			'alamat_sekolah' => $this->input->post('alamat'),
			'id_provinsi' => $this->input->post('provinsi'),
			'id_kab' => $this->input->post('kabupaten_kota'),
			'id_kecamatan' => $this->input->post('kecamatan')
		);

		$data1 = $this->model_sekolah_asal->insert_sekolah($data, 'tb_sekolah_asal');
		// echo json_encode($data);

		if($data==TRUE){
			echo "sukses";
		}else{
			echo 'error';
		}

		// echo $lat;
	}

	public function view_sekolah()
	{
		$data['sekolah'] = $this->model_sekolah_asal->sekolah_asal();
		$data['content'] = 'admin/sekolah/daftar_sekolah';
		$this->load->view('admin/index', $data);
		// echo json_encode($data['sekolah']);
	}

	public function edit_sekolah($kode)
	{
		$data['provinsi'] = $this->model_provinsi->view_provinsi();
		$data['kecamatan'] = $this->model_kecamatan->view_kec2();
		$data['kabupaten'] = $this->model_kabupaten->view2();
		$data['sekolah'] = $this->model_sekolah_asal->detail_sekolah($kode);
		$data['content'] = 'admin/sekolah/edit_sekolah';
		$this->load->view('admin/index', $data);
		// echo json_encode($data['sekolah']);

	}

	public function simpan_edit(){
		$data = array(
			'nama_sekolah' => $this->input->post('nama_sekolah'),
			'latitude' => $this->input->post('lat'),
			'longitude' => $this->input->post('long'),
			'alamat_sekolah' => $this->input->post('alamat'),
			'id_provinsi' => $this->input->post('provinsi'),
			'id_kab' => $this->input->post('kabupaten_kota'),
			'id_kecamatan' => $this->input->post('kecamatan')
		);

		echo json_encode($data);

	}

}
