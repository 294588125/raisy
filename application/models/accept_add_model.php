<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Accept_add_model extends CI_Model{
		
		public function save_address($data){
			return $this->db->insert('t_accept_add',$data);
		}		
		// public function get_by_user_id($data){
			// return $this->db->get_where('t_accept_add',$data)->result();
		// }
		public function get_rows_by_user_id($user_id){
			return $this -> db -> query("select count(*) as total from t_accept_add where t_accept_add.user_id=$user_id")->row();
		}
		public function get_address_list($user_id,$startno,$pagesize){
			$this->db->select('accept.*');
			$this->db->from('t_accept_add accept');
			$this->db->where('accept.user_id',$user_id);
			$this->db->limit($pagesize,$startno);
			return $query=$this->db->get()->result();
		}
		public function delete_by_address_id($data){
			return $this->db->delete('t_accept_add',$data);
		}
		public function get_by_address_id($data){
			return $this->db->get_where('t_accept_add',$data)->row();
		}
		public function update_by_address_id($data,$add_id){
			$this->db->where('add_id',$add_id);
			return $this->db->update('t_accept_add',$data);
		}
			
	}
?>