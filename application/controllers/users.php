<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$data['title'] = 'publicaciones';
 		$data['users'] = $this->login_model->get_users();

		$this->load->view('templateadmin/header');
		$this->load->view('admin/users/index',$data);
		$this->load->view('templateadmin/footer');
	}
}