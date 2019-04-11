<?php 

class Category_model extends CI_Model
{
	public function __Construct()
	{
		$this->load->database();
	}
	public function get_category(){
		$this->db->order_by('id');
		$query = $this->db->get('categories');
		return $query->num_rows()>0?$query->result()[0]:false;
	}
	public function get_categories(){
		$this->db->order_by('id');
		$query = $this->db->get('categories');
		return $query->result_array();
	}
	public function create_category(){
		$data = array( 
			'name' => $this->input->post('name')
		);
		return $this->db->insert('categories',$data);
	}
	public function delete_category($id){
			$this->db->where('id',$id);
			$this->db->delete('categories');
			return true;
	}
	public function update_category(){
			$data = array(
				'name' => $this->input->post('name')
			);
			$this->db->where('id',$this->input->post('id'));
			return $this->db->update('categories',$data);
	}

}

 ?>