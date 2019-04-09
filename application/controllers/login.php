<?php 
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
	}
	public function index(){
		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('password','Password','required|callback_verifica');
		if($this->if ($this->form_validation->run() == false) {
			$data['title'] = 'Blog';
			$data['title2'] = 'Registro';
			$this->load->view('template/header',$data);
			$this->load->view('login');
			$this->load->view('template/footer');
 		} else {
			redirect('Blog-Admin/index');
		}
	}
	public function verificar(){
	$name =	$this->input->post('name');
	$password = $this->input->post('password');
	if ($this->login_model->Login($name,$password)) {
			redirect('Blog-Admin/index');
		}else{
			$this->form_validation->set_message('verifica','cintraseña incorecta');
			redirect('login')
		}

	}
}


 ?>