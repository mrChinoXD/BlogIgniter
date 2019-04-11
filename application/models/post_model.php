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
		public function get_comments($idpost){
		 $this->db->select('*');
         $this->db->from('comments');
         $this->db->where('idpost',$idpost);
         $query=$this->db->get();
         return $query->result_array();
		}

		function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('post');
        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        return $result;
    }


	}
 ?> 