<?php 
class Blog extends CI_Controller{
	public function index(){
		echo 'Hello word';
		$this->load->view('blogview');
	}
	public function comments(){
		echo 'hola mundo desde comentarios';

	}
}