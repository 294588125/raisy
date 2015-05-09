<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Support_model extends CI_Model{
	public function get_support(){
		$this->db->select('t_user.realname,t_support_type.*');
		$this->db->from('t_user');
		$this->db->join("t_support_type",'t_user.user_id=t_support_type.user_id');
		return $this->db->get()->result();
	}
	public function get_support_money($project_id){
		$sum = $this->db->query("select sum(support_money) as sum from t_support_type where project_id=$project_id")->row();
        return $sum;                          
	}
	public function get_support_list($project_id,$startno,$pagesize){
		$this->db->select('support.*,usr.realname');
		$this->db->from('t_support_type support');
		$this->db->join('t_user usr','usr.user_id=support.user_id');
		$this->db->where('support.project_id',$project_id);
		// $this->db->order_by('add_time','desc');
		$this->db->limit($pagesize,$startno);
		return $query = $this->db->get()->result();
	}
	public function get_support_sum(){
		return $this->db->query("select * from t_support_type group by user_id")->result();
		
	}
	public function get_support_money_sum(){
		return $this->db->query("select sum(support_money) as sum from t_support_type")->row();
	}
	public function save_support($data){
		$this->db->insert('t_support_type',$data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
	//个人中心支持项目开始
	public function get_support_sum_by_user_id($user_id){//personal center支持项目数
		return $this ->db ->query("select count(*) as support_sum from t_support_type where user_id = $user_id ")->row();
	}
	public function get_all_support_project_by_user_id($user_id,$startno,$pagesize){//personal center支持项目
		// $this -> db ->select('support.*,project.*');
		// $this -> db ->from('t_support_type support');
		// $this -> db ->join('t_project project','support.project_id=project.project_id');
		// $this -> db ->where('support.user_id',$user_id);
		// return $this -> db -> get() -> result();
		return $this -> db ->query("select support.*,project.*,publisher.*,address.*,usr.*,intro.pro_cover
						from  t_support_type support
						join t_project project
						on support.project_id=project.project_id
						join t_publisher publisher
						on project.publisher_id=publisher.publisher_id
						join  t_project_intro intro
						on intro.project_id = project.project_id
						join t_accept_add address
						on publisher.user_id=address.user_id
						join t_user usr
						on address.user_id=usr.user_id
						where support.user_id=$user_id
						and address.add_id = support.add_id
						and project.is_del=0
						limit $startno,$pagesize
						")-> result();
	}
	//个人中心支持项目结束
	
	public function get_every_support($project_id){
		$this->db->select('t_user.realname,t_support_type.*');
		$this->db->from('t_user');
		$this->db->join("t_support_type",'t_user.user_id=t_support_type.user_id');
		$this->db->where('t_support_type.project_id',$project_id);
		return $this->db->get()->result();
	}
}
