<?php 
class Comment_model extends CI_Model
{
	public function	create_comment(){
		$data = array( 
			'usuario' => $this->input->post('name'),
			'body' =>$this->input->post('body'),
			'idpost' => $this->input->post('idpost')
		);
		return $this->db->insert('comments',$data);
	}
	public function view_comments($idpost){
		 $this->db->select('*');
         $this->db->from('comments');
         $this->db->where('idpost',$idpost);
         $query=$this->db->get();
         return $query->result_array();
	}
}
 ?>