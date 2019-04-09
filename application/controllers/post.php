<?php
class Post extends CI_Controller{

 public function index (){
 	$data['title'] = 'Letest Posts';

 	$data['posts'] = $this->post_model->get_posts();
 	print_r($data[$post]);

	$this->load->view('template/header');
	$this->load->view('posts/index', $data);
	$this->load->view('template/footer');
 }
}

?>