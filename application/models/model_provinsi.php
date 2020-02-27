<?php

/**
 * 
 */
class model_provinsi extends CI_Model
{
	
	function view_provinsi()
	{

		$data = $this->db->query("SELECT * from tb_provinsi");
		return $data->result();
		
        // $sql = "SELECT * from user where username = '$status'";
		// return $this->db->query($sql)->result_array();
}
}

?>