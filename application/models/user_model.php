<?php

/**
 * 
 */
class user_model extends CI_Model
{
	
	function user_view($username)
	{

		$data = $this->db->query("SELECT * from user where username = '$username'");
		return $data->row();
		
        // $sql = "SELECT * from user where username = '$status'";
		// return $this->db->query($sql)->result_array();
}
}

?>