<?php
class Post extends CI_Controller{

 public function index (){
 	$data['title'] = 'Publicaciones ';

 	$data['posts'] = $this->post_model->get_posts();
	$this->load->view('template/header');
	$this->load->view('posts/index', $data);
	$this->load->view('template/footer');
 }
 public function view($slug = NULL){
 	$data['post'] = $this->post_model->get_posts($slug);
 	if (!$data['post']) {
 		show_404();
 	}
 	$data['title'] = $data['post']->title;
 	$this->load->view('template/header');
	$this->load->view('posts/view', $data);
	$this->load->view('template/footer');
 }
 public function create(){
 	$data['title'] = 'Crear Publicacion';
 	$data['categories'] = $this->post_model->get_categories();
 	$this->form_validation->set_rules('title','Title','required');
 	$this->form_validation->set_rules('body','Body','required');

 	if ($this->form_validation->run() === FALSE) {
 		 	$this->load->view('template/header');
			$this->load->view('posts/create', $data);
			$this->load->view('template/footer');
 		}else{
 			//upload files
 			$config['upload_path']='./assets/img/posts';
 			$config['allowed_types']='gif|npg|jpg';
 			$config['max_size']=' 2048';
 			$config['max_width']='500';
 			$config['max_heigth']='500';


 			$this->load->library('upload',$config);
 			if ($this->upload->do_upload()) {
 				$errors = array('error' => $this->upload->display_errors());
 				$post_image = 'noimage.jpg';
 			}else{
 				$data = array('upload_data' => $this->upload->data());
 				$post_image = $_FILES['userfile']['name'];
 			}

 			$this->post_model->create_post($post_image);
 			redirect('index.php/post');
 		}
 }
 public function delete($id){	
 	$this->post_model->delete_post($id);
 	redirect('index.php/post');
 }
 public function edit($slug){
 	$data['post'] = $this->post_model->get_posts($slug);
 	$data['categories'] = $this->post_model->get_categories();
 	if (empty($data['post'])) {
 		show_404();
 	}
 	$data['title'] = 'Editar publicaciones';
	 $this->load->view('template/header');
	 $this->load->view('posts/edit', $data);
	 $this->load->view('template/footer');
 }
 public function update(){
 	$this->post_model->update_post();
 	redirect('index.php/post');
 }
}

?>