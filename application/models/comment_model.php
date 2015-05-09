<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {
		
	public function get_comment_sum($project_id){
		return $this -> db -> query("select count(*) as comment_sum from t_comment where project_id = $project_id") -> row();
	}
	
	public function get_level1_types($project_id){
		$this->db->select('usr.realname,comment.*');
		$this->db->from("t_comment comment");
		$this->db->join('t_user usr','usr.user_id=comment.sender');
		$this->db->where('comment.reply',0);
		$this->db->where('comment.project_id',$project_id);
		$this->db->order_by('comment.add_time',"desc");
		return $this->db->get()->result();
	    // return $this->db->get_where('t_comment',array('reply'=>0))->result();
	}
	public function get_commenter(){
		$this->db->select('t_comment.*,usr.realname');
		$this->db->from('t_comment');
		$this->db->join('t_user usr','usr.user_id=t_comment.sender');
		$this->db->where('t_comment.reply',0);
		return $this->db->get()->result();
	}
	public function get_level2_types($level1_type_id){
		$this->db->select('usr.realname,comment.*');
		$this->db->from('t_comment comment');
		$this->db->join('t_user usr','usr.user_id=comment.sender');
		$this->db->where('reply',$level1_type_id);
		$this->db->order_by('comment.add_time',"desc");
		//$this->db->count_all_results();
		return $this->db->get()->result();
	    //return $this->db->get_where('t_comment',array('reply'=>$level1_type_id))->result();
	}

	public function get_comment_by_user_id($user_id){
		$this->db->select('comment.*,user.*,project.*');
		$this->db->from('t_comment comment');
		$this->db->join('t_user user','user.user_id=comment.sender');
		$this->db->join('t_project project','project.project_id=comment.project_id');
		$this->db->where('comment.sender',$user_id);
		$this->db->where('comment.reply',0);
		return $this->db->get()->result();
	}
	public function get_send_comment($user_id){
		$this->db->select('comment.*,user.*,project.*');
		$this->db->from('t_comment comment');
		$this->db->join('t_user user','user.user_id=comment.sender');
		$this->db->join('t_project project','project.project_id=comment.project_id');
		$this->db->where('comment.sender',$user_id);
		$this->db->where('comment.reply !=',0);
		return $this->db->get()->result();
	}
	 public function del_comment($comment_id){
	 	return $this->db->delete('t_comment',array('comment_id'=>$comment_id));
	 }
	 public function get_comment_by_receiver($user_id){
		$this->db->select('comment.*,user.*,project.*');
		$this->db->from('t_comment comment');
		$this->db->join('t_user user','user.user_id=comment.sender');
		$this->db->join('t_project project','project.project_id=comment.project_id');
		$this->db->where('comment.receiver',$user_id);
		$this->db->where('comment.reply !=',0);
		return $this->db->get()->result();
	}

	public function save_content($save){
		$this->db->insert('t_comment',$save);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function delete_comment_by_id($comment_id){
		$this->db->delete('t_comment',array('comment_id'=>$comment_id));
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
	}
	public function get_comment_sum1($level1_type_id){
		$result = $this->db->query("select count(*) as comment_sum from t_comment where t_comment.reply= $level1_type_id")->row();
		return $result;
	}

}