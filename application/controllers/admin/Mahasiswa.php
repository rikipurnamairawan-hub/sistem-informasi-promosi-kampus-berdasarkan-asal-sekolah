<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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
		// $status = $this->session->userdata('username');
		$data['provinsi'] = $this->model_provinsi->view_provinsi();
		$data['jurusan'] = $this->model_jurusan->view_jurusan();
		$data['sekolah'] = $this->model_sekolah_asal->sekolah_asal();
		$data['content'] = 'admin/mahasiswa/input_mahasiswa';

		$this->load->view('admin/index', $data);

		// digunakan return data ajax
		// echo json_encode($data['jurusan']);
	}

	function kabupaten()
	{

		$kode = $this->input->post('kode');
		$data['kabupaten'] = $this->model_kabupaten->view_kabupaten($kode);

		foreach ($data['kabupaten'] as $kab) {
			echo "<option value='$kab[id_kab]'>$kab[kabupaten]</option>";
		}
	}

	function kecamatan()
	{
		$kode = $this->input->post('kode');
		$data['kecamatan'] = $this->model_kecamatan->view_kecamatan($kode);
		foreach ($data['kecamatan'] as $kec) {
			echo "<option value='$kec[id_kecamatan]'>$kec[kecamatan]</option>";
		}
		// echo json_encode($data);
	}

	public function simpan_mahasiswa()
	{

		$data = array(
			'no_bp' => $this->input->post('nobp'),
			'id_jurusan' => $this->input->post('jurusan'),
			'nm_mahasiswa' => $this->input->post('nama_M'),
			'j_kelamin' => $this->input->post('jenis_kelamin'),
			'no_telfon' => $this->input->post('telfon'),
			'agama' => $this->input->post('agama'),
			'alamat_mahasiswa' => $this->input->post('alamat'),
			'tahun_masuk' => $this->input->post('tahunmasuk'),
			'id_sekolah' => $this->input->post('sekolah_asal')
		);

		$data1 = $this->model_mahasiswa->insert_mahasiswa($data, 'tb_mahasiswa');

		if ($data == TRUE) {
			echo 'sukses';
		} else {
			echo 'error';
		}
		// echo json_encode($nopb);


	}

	public function view_mahasiswa()
	{

		$data['data_mahasiswa'] = $this->model_mahasiswa->data_mahasiswa();
		$data['content'] = 'admin/mahasiswa/daftar_mahasiswa';
		$this->load->view('admin/index', $data);
	}

	public function edit_mahasiswa($kode)
	{
		$kode = $kode;
		$data['jurusan'] = $this->model_jurusan->view_jurusan();
		$data['sekolah'] = $this->model_sekolah_asal->sekolah_asal();
		$data['data_edit'] = $this->model_mahasiswa->edit_mahasiswa($kode);
		$data['content'] = 'admin/mahasiswa/edit_mahasiswa';
		$this->load->view('admin/index', $data);
		// $this->load->view('admin/mahasiswa/edit_mahasiswa', $data);
		// echo json_encode($data['data_edit']);
	}

	public function simpan_edit()
	{
		$nobp = $this->input->post('nobp');
		$data = array(
			'no_bp' => $this->input->post('nobp'),
			'nm_mahasiswa' => $this->input->post('nama_M'),
			'j_kelamin' => $this->input->post('jenis_kelamin'),
			'no_telfon' => $this->input->post('telfon'),
			'agama' => $this->input->post('agama'),
			'id_jurusan' => $this->input->post('jurusan'),
			'alamat_mahasiswa' => $this->input->post('alamat'),
			'tahun_masuk' => $this->input->post('tahunmasuk'),
			'id_sekolah' => $this->input->post('sekolah_asal')
		);

		$this->model_mahasiswa->update_mahasiswa($nobp, $data);

		if ($data == TRUE) {
			echo 'sukses';
		} else {
			echo 'error';
		}

	}

	public function detail_mahasiswa($kode)
	{
		$kode = $kode;
		$data['kecamatan'] = $this->model_kecamatan->view_kec2();
		$data['kabupaten'] = $this->model_kabupaten->view2();
		$data['provinsi'] = $this->model_provinsi->view_provinsi();
		$data['jurusan'] = $this->model_jurusan->view_jurusan();
		$data['sekolah'] = $this->model_sekolah_asal->view_sekolah_asal();
		$data['data_edit'] = $this->model_mahasiswa->edit_mahasiswa($kode);
		$data['content'] = 'admin/mahasiswa/view_mahasiswa';
		$this->load->view('admin/index', $data);

		//  echo json_encode($data['data_edit']);

	}
}
