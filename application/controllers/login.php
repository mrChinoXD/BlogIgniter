<?php
class Login extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('nombre' ,'Nombre', 'required');
        $this->form_validation->set_rules('password' ,'Password', 'required');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Blog';
             $this->load->view('login',$data);
        }
        else
        {
  		$nombre = $this->input->post('nombre');
        $password = md5($this->input->post('password'));

        if($user=$this->login_model->login($nombre, $password))
        {
         	$this->session->set_userdata('user_data', array(
                 'nombre'=>$user->nombre,
                 'id'=>$user->id,
                 'mail'=>$user->correo,
                 'password'=>$user->password,
                 'is_loged'=> true
                ));
         	redirect('index.php/admin/index');
        }
        else
        {
            $this->form_validation->set_message('verifica','Contraseña incorrecta');
            redirect('index.php/login');
        }
        }
    }
}