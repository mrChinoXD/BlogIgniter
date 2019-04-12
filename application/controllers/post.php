<?php
class Post extends CI_Controller{
	function __construct() {
        parent::__construct();

        $this->load->library('pagination');
        $this->perPage = 3;
    }

 public function index (){
 	$data['title'] = 'Publicaciones ';
 	$data['posts'] = $this->post_model->get_posts();
        $conditions['returnType'] = 'count';
        $totalRec = $this->post_model->getRows($conditions);
        //pagination config
        $config['base_url']    = base_url().'index.php/post/index/';
        $config['uri_segment'] = 3;
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $this->perPage;
        
        //styling
        $config['num_tag_open'] = '<li class="page-item"><a href="page-link">';
        $config['num_tag_close'] = '</a></li>';
        $config['cur_tag_open'] = '<li class="page-item"><a href="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['next_tag_open'] = '<li class="page-item"><a href="page-link">';
        $config['next_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item"><a href="page-link">';
        $config['prev_tag_close'] = '</a></li>';
        $config['first_tag_open'] = '<li class="page-item"><a href="page-link">';
        $config['first_tag_close'] = '</a></li>';
        $config['last_tag_open'] = '<li class="page-item"><a href="page-link">';
        $config['last_tag_close'] = '</a></li>';
        
        //initialize pagination library
        $this->pagination->initialize($config);
        
        //define offset
        $page = $this->uri->segment(3);
        $offset = !$page?0:$page;
        
        //get rows
        $conditions['returnType'] = '';
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        $data['posts'] = $this->post_model->getRows($conditions);




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
    $id = $data['post']->id;
    $data['comments'] = $this->post_model->get_comments($id);
 	$this->load->view('template/header');
	$this->load->view('posts/view', $data);
    $this->load->view('comments/view');
    $this->load->view('comments/create');
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
 			$config['upload_path']='./assets/img/posts';
 			$config['allowed_types']='gif|png|jpg';
 			$this->load->library('upload',$config);

 			if (!$this->upload->do_upload()) {
 				$errors = array('error' => $this->upload->display_errors());
 				$post_image = 'noimage.png';
 				var_dump($errors);
 			}else{
 				$data = array('upload_data' => $this->upload->data());
 			
 				$post_image = $_FILES['userfile']['name'];
 			}
 			$this->post_model->create_post($post_image);
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