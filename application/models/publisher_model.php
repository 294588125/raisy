<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Publisher_model extends CI_Model{
		public function save_all_get_id($data){
			$this->db->insert('t_publisher',$data);
			return $this->db->insert_id();
		}
		public function get_all_by_publisher_id($publisher_id){
			$this->db->select('pub.*');
			$this->db->from('t_publisher pub');
			$this->db->where('pub.publisher_id',$publisher_id);
			return $this->db->get()->row();
		}
		public function update_all_by_publisher_id($data,$publisher_id){
			$this->db->where('t_publisher.publisher_id',$publisher_id);
			$this->db->update('t_publisher',$data);
			return 1;
		}
	}
?>