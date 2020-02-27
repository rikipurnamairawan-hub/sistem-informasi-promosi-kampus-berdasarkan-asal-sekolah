<?php

/**
 * 
 */
class model_kabupaten extends CI_Model
{
	
	function view_kabupaten($kode)
	{

		$data = $this->db->query("SELECT * from tb_kabupaten where id_provinsi = '$kode'");
		return $data->result_array();
		
        // $sql = "SELECT * from user where username = '$status'";
		// return $this->db->query($sql)->result_array();
}

public function view2(){
		$data = $this->db->query("SELECT * from tb_kabupaten");
		return $data->result();
}

public function view3(){
	$data = $this->db->query("SELECT kabupaten, count(tb_mahasiswa.id_kab) as total_kab from tb_kabupaten JOIN tb_mahasiswa ON tb_mahasiswa.id_kab = tb_kabupaten.id_kab  group by tb_mahasiswa.id_kab");
	return $data->result();
}
}
