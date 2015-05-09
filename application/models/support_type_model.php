<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Support_type_model extends CI_Model{
       public function save_pub_t_support_type($data){
			return $this->db->insert('t_support_type',$data);
		}
	
		public function get_all_by_project_id($project_id){
			$this->db->select('su_type.*');
			$this->db->from('t_support_type su_type');
			$this->db->where("su_type.project_id",$project_id);
			return $this->db->get()->result();
		}
		public function delete_by_support_type_id($support_type_id){
			return $this->db->delete('t_support_type',array('support_type_id'=>$support_type_id));
		}
		public function get_all_by_support_type_id($support_type_id){
			//$this->db->select('su_type.*');
			//$this->db->from('t_support_type su_type');
			//$this->db->where('su_type.support_type_id',$support_type_id);
			//return $this->db->get()->row();
			return $this -> db -> query("select * from t_support_type where support_type_id = $support_type_id") -> row();
		}
		public function update_by_support_type_id($support_type_id,$data){
			$this->db->where('t_support_type.support_type_id',$support_type_id);
			$this->db->update('t_support_type',$data);
			return 1;
		}



	}
?>
