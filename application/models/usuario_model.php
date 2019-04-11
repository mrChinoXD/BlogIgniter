<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	public function __Construct()
	{
		parent::__construct();
		
	}
	public function login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query =$this->db->get('admin');
		if ($query->num_rows()>0) {
			return true;
		}else{
			return false;
		}
	}

}
