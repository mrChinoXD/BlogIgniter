<?php 
class Comments extends CI_Controller
{
	public function create(){
 	$this->form_validation->set_rules('name','name','required');
 	$this->form_validation->set_rules('body','Body','required');
 	if ($this->form_validation->run() === FALSE) {
 		 	$this->load->view('template/header');
			$this->load->view('posts/view/', $data);
			$this->load->view('template/footer');
 		}else{
 			$this->comment_model->create_comment();
 			redirect('index.php/post');
 		}
	}
	public function view($idpost){
		 	$data['comments'] = $this->comment_model->view_commnets($idpost);
 			if (!$data['comments']) {
 				show_404();
 				}
 				$this->load->view('comments/view',$data);
 			}

 }