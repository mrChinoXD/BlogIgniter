<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		if($this->session->has_userdata('user_data'))
		{
		$this->load->view('templateadmin/header');
		$this->load->view('admin/index');
		$this->load->view('templateadmin/footer');
		}
		else{
			redirect('index.php/login');
		}
	}
	public function log_out(){
		$this->session->unset_userdata('user_data');
		redirect('index.php/login');
	}
}?>