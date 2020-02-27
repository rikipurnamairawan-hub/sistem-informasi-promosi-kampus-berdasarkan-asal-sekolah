<?php

/**
 * 
 */
class model_kecamatan extends CI_Model
{
	
	function view_kecamatan($kode)
	{

		$data = $this->db->query("SELECT * from tb_kecamatan where id_kab = '$kode'");
		return $data->result_array();
}

public function view_kec2(){
	$data = $this->db->query("SELECT * from tb_kecamatan");
		return $data->result();
}
}
