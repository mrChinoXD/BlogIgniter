<?php 
function is_logged_in(){
	$CI =& get_instance();
	$user = $CI->session->userdata('userdata');
	if (!isset($user)) { return false; }else {return true;}  	
	}
 ?>