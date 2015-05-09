<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class User_model extends CI_Model{
		public function get_by_name_pwd($data){
				$query=$this->db->get_where('t_user',$data);
				return $query->row();
			}
		public function get_by_account($id){
				$this->db->select('t_user.*');
				$this->db->from('t_user');
				$this->db->where('account',$id);
				return $this->db->get()->result();
			}
			public function save($data){
				$this->db->insert('t_user',$data);
				if($this->db->affected_rows() > 0){
					return TRUE;
				}
				return FALSE;
			} 
		//保存个人设置信息
		public function save_information($data,$user_id){
			$this -> db -> where('user_id',$user_id);
			return $this -> db -> update('t_user',$data);			 
		}
		public function get_by_id($user_id){
			return $this ->db -> get_where('t_user',array('user_id'=>$user_id)) -> row();
		}
		public function save_avatar($data,$user_id){
			$this -> db -> where('user_id',$user_id);			
			return $this ->db ->update('t_user',$data);
		}	
		public function update_pwd($data,$user_id){
			$this->db->where('user_id',$user_id);
			return $this->db->update('t_user',$data);
		}
			public function get_name_by_id($sender_id){
				$this->db->select('usr.realname');
				$this->db->from('t_user usr');
				$this->db->where('usr.user_id',$sender_id);
				return $this->db->get()->row();
			}
			public function add_information($data){
				$this->db->insert('t_accept_add',$data);
				if($this->db->affected_rows()>0){
					return true;
				}else{
					return false;
				}
			}
			
	}
?>