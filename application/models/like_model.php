<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like_model extends CI_Model {
	public function get_like_sum($project_id){
		return $this -> db -> query("select count(*) as like_sum  from t_like where project_id = $project_id") -> row();
	}
	
	public function get_like_sum_by_user_id($user_id){
		return $this -> db -> query("
				select *
				from t_like as like_sum
				join t_project
				on like_sum.project_id=t_project.project_id
				where like_sum.user_id=$user_id
				and t_project.is_del=0	
		") -> num_rows();
		
	
	}
	
	public function get_like_sums_by_user_id($user_id){
		return $this -> db -> query("select * from t_like where user_id = $user_id") -> num_rows();
	}
	
}