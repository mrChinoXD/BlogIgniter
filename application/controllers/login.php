<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (isset($_POST['password'])) {
			$this->load->model('usuario_model');
			if ($this->usuario_model->login($_POST['username'],md5($_POST['password']))) {
				redirect('welcomeAdmin');
			}else{
				redirect('index.php/login');
			}
		}



		$this->load->view('login');	
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */