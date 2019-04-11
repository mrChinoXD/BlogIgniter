<?php 
 class Categories extends CI_Controller
 {
 	public function create(){
 		$data['title'] = 'crear categoria';
 		
 		$this->form_validation->set_rules('name','Name','required');
 		
 		if ($this->form_validation->run()===FALSE) {
 			$this->load->view('template/header');
 			$this->load->view('categories/create',$data);
 			$this->load->view('template/footer');
 		}else{
 			$this->category_model->create_category();
 			redirect('index.php/categories/index');	
 		}
 	}
 	public function index(){
 		$data['title'] = 'Lstado de Categorias';
 		$data['categories'] = $this->category_model->get_categories();
 		 $this->load->view('template/header');
 		 $this->load->view('categories/index',$data);
 		 $this->load->view('template/footer');
 	}
 	public function delete($id){
 		$this->category_model->delete_category($id);
 		redirect('index.php/categories/index');
 	}
 	public function edit($id){
 	$data['categories'] = $this->category_model->get_category($id);
 	if (empty($data['categories'])) {
 		show_404();
 	}
 	$data['title'] = 'Editar Categora';
	 $this->load->view('template/header');
	 $this->load->view('categories/edit', $data);
	 $this->load->view('template/footer');
 	}

 	public function update(){
 		$this->category_model->update_category();
 	     redirect('index.php/categories/index');
 	}
 }


 ?>