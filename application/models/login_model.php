<?php 
class Login_Model extends CI_Model{

	public function __Construct(){
		$this->load->database();
	}
	public function login($name,$password){
		$query = $this->bd->get_where('admin',array('name' => $name));
		if ($query->num_rows() == 1) {
			$row = $query->row();
			if (password_verify($password, $row->password)){
			 	$data= array('user_data' =>array(
			 		'name' => $row->name, 
			 		'id' => $row->id,
			 		'email'=> $row->email,
			 		'password'=>$row->password)
			 );
			 	$this->session->unset_userdata('user_data');
			 	return true;
			 } 
		}
		$this->session->unset_userdata('user_data');
		return false;
	}
}
 ?>