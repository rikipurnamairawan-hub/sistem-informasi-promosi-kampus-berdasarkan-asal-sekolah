<?php

/**
 * 
 */
class model_jurusan extends CI_Model
{
	
	function view_jurusan()
	{

		$data = $this->db->query("SELECT * from tb_jurusan");
		return $data->result();
}
}

?>