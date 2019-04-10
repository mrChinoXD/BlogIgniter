<?php 
	class Post_model extends CI_Model
	{
		public function __Construct()
		{
			$this->load->database();
		}
		public function get_posts($slug = FALSE){
			if ($slug === FALSE) {
				$this->db->order_by('post.id','DESC');
				$this->db->join('categories','categories.id = post.category_id');
				$query = $this->db->get('post');
				return $query->result_array();
			}
			$query = $this->db->get_where('post',array('slug' =>$slug));
			return $query->num_rows()>0?$query->result()[0]:false;
		}
		public function create_post($post_image){
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'body'  => $this->input->post('body'),
				'slug'=> $slug,
				'category_id'=> $this->input->post('category_id'),
				'post_image' =>$post_image
			);
			return $this->db->insert('post',$data);
		}
		public function delete_post($id){
			$this->db->where('id',$id);
			$this->db->delete('post');
			return true;
		}
		public function update_post(){
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'body'  => $this->input->post('body'),
				'slug'=> $slug,
				'category_id'=> $this->input->post('category_id')
			);
			$this->db->where('id',$this->input->post('id'));
			return $this->db->update('post',$data);
		}
		public function get_categories(){
			$this->db->order_by('name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}
	}
 ?> 