<?php
class Login_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_users(){
    	$this->db->order_by('id');
		$query = $this->db->get('admin');
		return $query->result_array();
    }
    public function login($nombre, $password)
    {
        $query = $this->db->get_where('admin', array('nombre' => $nombre, 'password'=> $password));

        return $query->num_rows()>0?$query->result() [0] : FALSE;
    }
}