<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Project_intro_model extends CI_Model{
		public function save_pub_t_project_intro($data1){
			return $this->db->insert('t_project_intro',$data1);
		}
		public function get_all_by_project_id($project_id){
			$this->db->select('pro_intro.*');
			$this->db->from('t_project_intro pro_intro');
			$this->db->where('pro_intro.project_id',$project_id);
			return $this->db->get()->row();
		}
		public function update_all_by_project_id($project_id,$data){
			$this->db->where('t_project_intro.project_id',$project_id);
			$this->db->update('t_project_intro',$data);
			return 1;
		}
	}
?>