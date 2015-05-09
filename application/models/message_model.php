<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Message_model extends CI_Model{
	
	 public function save_msg($data){
	 	$this->db->insert('t_message',$data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	 }
	  public function get_message_by_user_id($user_id){
	  	$this->db->select('message.*,user.*');
		$this->db->from('t_message message');
		$this->db->join('t_user user','user.user_id=message.sender');
		$this->db->where('message.receiver',$user_id);
		return $this->db->get()->result();
	  }
	 public function reply_message($data){
	 	return $this->db->insert('t_message',$data);
	 }
	 public function del_message($message_id){
	 	return $this->db->delete('t_message',array('message_id'=>$message_id));
	 }
	 
}
