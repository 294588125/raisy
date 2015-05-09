<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_model extends CI_Model{
		
	public function get_all_project1(){
		$this->db->select('project.*,intro.*,type.*');
		$this->db->from('t_project project');
		$this->db->join('t_project_intro intro','project.project_id=intro.project_id');
		$this->db->join('t_project_type type','type.pro_type_id=project.pro_type_id');
		return $this->db->get()->result();
	}
	public function get_all_project($start, $pagesize){
		$this->db->select('project.*,intro.*,type.*');
		$this->db->from('t_project project');
		$this->db->join('t_project_intro intro','project.project_id=intro.project_id');
		$this->db->join('t_project_type type','type.pro_type_id=project.pro_type_id');
		$this -> db -> limit($pagesize, $start);
		return $this->db->get()->result();
	}
	public function get_all_project_order_by_start_time(){
		$this->db->select('project.*,intro.*,type.*');
		$this->db->from('t_project project');
		$this->db->join('t_project_intro intro','project.project_id=intro.project_id');
		$this->db->join('t_project_type type','type.pro_type_id=project.pro_type_id');
		$this->db->order_by('project.start_time','desc');
		return $this->db->get()->result();
	}
	public function get_all_project_order_by_raise_money(){
		$this->db->select('project.*,intro.*,type.*');
		$this->db->from('t_project project');
		$this->db->join('t_project_intro intro','project.project_id=intro.project_id');
		$this->db->join('t_project_type type','type.pro_type_id=project.pro_type_id');
		$this->db->order_by('project.raise_money','desc');
		return $this->db->get()->result();
		}
	public function get_all_project_order_by_raised_money(){
		$this->db->select('project.*,intro.*,type.*');
		$this->db->from('t_project project');
		$this->db->join('t_project_intro intro','project.project_id=intro.project_id');
		$this->db->join('t_project_type type','type.pro_type_id=project.pro_type_id');
		$this->db->order_by('project.raised_money','desc');
		return $this->db->get()->result();
		}
	public function get_type($type_id){
		$this->db->select('project.*,type.*');
		$this->db->from('t_project project');
		$this->db->join('t_project_type type','type.pro_type_id=project.pro_type_id');
		$this->db->where('type.pro_type_id',$type_id);
		return $this->db->get()->result();
	}
	public function get_hot_tech($pro_type_id){
		return $this->db->query("
			select project.*,count(support_type.project_id) as support_sum, intro.*
			FROM t_project project
			join t_project_intro intro
			on intro.project_id = project.project_id
			join t_support_type support_type
			on support_type.project_id = project.project_id
			where project.pro_type_id = $pro_type_id
			GROUP BY support_type.project_id
			ORDER BY support_sum desc
			LIMIT 5"
		)->result();
	}
	public function get_all_hot_tech(){
		return $this->db->query("
			select project.*,count(support_type.project_id) as support_sum, intro.*
			FROM t_project project
			join t_project_intro intro
			on intro.project_id = project.project_id
			join t_support_type support_type
			on support_type.project_id = project.project_id
			where project.is_success =0 and is_pass=1
			GROUP BY support_type.project_id
			ORDER BY support_sum desc
			LIMIT 5"
		)->result();
	}
	public function get_every_type_project($pro_type_id){
		return $this->db->query("
			select project.*,type.*, intro.*
			FROM t_project project
			join t_project_intro intro
			on intro.project_id = project.project_id
			join t_project_type type
			on type.pro_type_id = project.pro_type_id
			where project.pro_type_id = $pro_type_id
			GROUP BY project.project_id
			ORDER BY project.start_time desc
			LIMIT 15"
		)->result();
	}
	public function search_project($name){//根据关键字查项目
		return $this->db->query("select * from t_project project where name like '%$name%'")->result();
	}
	public function get_hot_limit5($pro_type_id){
		return $this->db->query("
			select project.*,type.*, intro.*
			FROM t_project project
			join t_project_intro intro
			on intro.project_id = project.project_id
			join t_project_type type
			on type.pro_type_id = project.pro_type_id
			where project.pro_type_id = $pro_type_id and project.is_success =0 and is_pass=1
			GROUP BY project.project_id
			ORDER BY project.start_time desc
			LIMIT 5"
		)->result();
	}
	public function get_project_by_id($id){
		$this->db->select('intro.*,project.*');
		$this->db->from('t_project project');
		$this->db->join('t_project_intro intro','intro.project_id=project.project_id');
		$this->db->where('project.project_id',$id);
		return $this->db->get()->row();
	}
	public function get_raising_project(){//众筹中
		return $this->db->query("
		select project.*,intro.*
		from   t_project project
		join   t_project_intro intro
		on     project.project_id=intro.project_id
		where  project.raised_money<raise_money
		limit 15
		")->result();
	}
	public function get_raising_project_sum(){//众筹中
		return $this->db->query("
		select count(*) as raising_sum
		from   t_project project
		where  project.raised_money<raise_money
		")->row();
	}
	public function get_all_project_sum(){//众筹中的总数
		return $this->db->query("
		select count(*) as all_sum
		from   t_project project
		where  project.project_id
		")->row();
	}
	public function get_successed_project_sum(){//已成功的总数
		return $this->db->query("
		select count(*) as successed_sum
		from   t_project project
		where  project.is_success=1
		")->row();
	}
	public function get_successed_project(){//众筹中
		return $this->db->query("
		select project.*,intro.*
		from   t_project project
		join   t_project_intro intro
		on     project.project_id=intro.project_id
		where  project.is_success=1
		limit 15
		")->result();
	}
		public function get_launch_sum_by_user_id($user_id){
		return $this -> db ->query("select count(*) as launch_sum from t_project
									join t_publisher
									on t_project.publisher_id = t_publisher.publisher_id
									where t_publisher.user_id = $user_id;
		")->row();
	}
	public function getall($project_id){
		$query = $this->db->query("select t_project.* from t_project where project_id=$project_id");
		return $query->row();
	}
	public function get_intro($project_id){
		$query = $this->db->query("select t_project_intro.* from t_project_intro where project_id=$project_id");
		return $query->row();
	}
	public function get_support($project_id){
		$query = $this->db->query("select t_support_type.* from t_support_type where project_id=$project_id");
		return $query->result();
	}
	public function get_sum($data,$project_id){
		// $this->db->set();
		$this->db->where('t_project.project_id',$project_id);
		$this->db->update('t_project',$data);
	}
	public function getTotal(){
		$query=$this->db->query("select * from t_project");
		return $query->num_rows();
	}
		
	public function getBookList($startno,$pagesize){
			//$query=$this->db->query("select * from book limit ".$startno.",".$pagesize);
		$query=$this->db->get("t_project",$startno,$pagesize);
		return $query->result();
			
	}

	public function get_project_sum(){
		return $this->db->query('select *
		from t_project')->result();
	}
	
	public function get_success(){
		return $this->db->query("
			select project.*,intro.*,publish.pub_name
			FROM t_project project
			join t_project_intro intro
			on intro.project_id = project.project_id
			join t_publisher publish
			on publish.publisher_id = project.publisher_id
			where project.is_success =1 and is_pass=1
			GROUP BY project.project_id
			ORDER BY project.end_time desc
			LIMIT 4"
		)->result();
	}
    //飒飒的 提交发布项目表单----开始----
	public function save_pub_t_project($data){
		$this->db->insert('t_project',$data);
		return $this->db->insert_id();
	}
	public function get_all_by_project_id($project_id){
		$this->db->select('pro.*');
		$this->db->from('t_project pro');
		$this->db->where('pro.project_id',$project_id);
		return $this->db->get()->row();
	}
	public function update_all_by_project_id($project_id,$data){
		$this->db->where('t_project.project_id',$project_id);
		$this->db->update('t_project',$data);
		return 1;
	}
	public function save_publisher_id_by_project_id($project_id,$publisher_id){
		$this->db->where('t_project.project_id',$project_id);
		$data=array('publisher_id'=>$publisher_id);
		$this->db->update('t_project',$data);
		return 1;
	}
	public function get_publisher_id_by_project_id($project_id){
		$this->db->select('t_project.publisher_id');
		$this->db->from('t_project');
		$this->db->where('t_project.project_id',$project_id);
		return $this->db->get()->row();
	}
	public function save_is_publish_by_publisher_id($data,$project_id){
			$this->db->where('t_project.project_id',$project_id);
			$this->db->update('t_project',$data);
			return 1;
	}
	
//飒飒的 提交发布项目表单----结束----
//个人中心项目管理     ~~~  开始   ~~~
	public function get_all_launch_project_by_publicsher_id($user_id,$startno,$pagesize){//所有发起项目
		$this->db->order_by('start_time','desc');
		$this->db->select('t_project.*,t_project_intro.pro_cover');
		$this->db->from('t_project');
		$this->db->join('t_publisher','t_project.publisher_id=t_publisher.publisher_id');
		$this->db->join('t_project_intro','t_project.project_id=t_project_intro.project_id');
		$this->db->where('t_project.is_del',0);
		$this->db->where('t_publisher.user_id',$user_id);
		$this->db->limit($pagesize,$startno);
		return $this->db->get()->result();
	}
	public function get_launching_project_rows_by_publicsher_id($user_id,$now_date){//众筹中行数
		return $this->db->query(
				"select project.* ,intro.pro_cover
				from t_project project 
				join t_publisher publisher
				on publisher.publisher_id = project.publisher_id
				join  t_project_intro intro
				on intro.project_id = project.project_id			
				where publisher.user_id = $user_id
				and is_publish=1
				and is_pass=1
				and is_del=0
				and end_time > '$now_date'
				and raised_money <  raise_money
				
				")->num_rows();
	}
	public function get_launching_project_by_publicsher_id($user_id,$now_date,$startno,$pagesize){//众筹中
		return $this->db->query(
				"select project.* ,intro.pro_cover
				from t_project project 
				join t_publisher publisher
				on publisher.publisher_id = project.publisher_id
				join  t_project_intro intro
				on intro.project_id = project.project_id	
				where publisher.user_id = $user_id
				and is_publish=1
				and is_pass=1
				and is_del=0
				and end_time > '$now_date'
				and raised_money <  raise_money
				limit $startno,$pagesize
				")->result();
	}
	
	public function get_launch_success_project_rows_by_publicsher_id($user_id,$now_date){//已成功行数
		return $this->db->query(
				"select project.* ,intro.pro_cover
				from t_project project 
				join t_publisher publisher
				on publisher.publisher_id = project.publisher_id 
				join  t_project_intro intro
				on intro.project_id = project.project_id				
				where publisher.user_id = $user_id
				and is_publish=1
				and is_pass=1
				and is_del=0
				and end_time >= '$now_date'
				and raised_money >=  raise_money")->num_rows();
	}
	public function get_launch_success_project_by_publicsher_id($user_id,$now_date,$startno,$pagesize){//已成功
		return $this->db->query(
				"select project.* ,intro.pro_cover
				from t_project project 
				join t_publisher publisher
				on publisher.publisher_id = project.publisher_id 
				join  t_project_intro intro
				on intro.project_id = project.project_id				
				where publisher.user_id = $user_id
				and is_publish=1
				and is_pass=1
				and is_del=0
				and end_time >= '$now_date'
				and raised_money >=  raise_money
				limit $startno,$pagesize
				")->result();
	}
	public function get_launch_fail_project_rows_by_publicsher_id($user_id,$now_date){//已失败行数
		return $this->db->query(
				"select project.* ,intro.pro_cover
				from t_project project 
				join t_publisher publisher
				on publisher.publisher_id = project.publisher_id 
				join  t_project_intro intro
				on intro.project_id = project.project_id				
				where publisher.user_id = $user_id
				and is_publish=1
				and is_pass=1
				and is_del=0
				and end_time < '$now_date'
				and raised_money < raise_money")->num_rows();
	}
	
	public function get_launch_fail_project_by_publicsher_id($user_id,$now_date,$startno,$pagesize){//已失败
		return $this->db->query(
				"select project.* ,intro.pro_cover
				from t_project project 
				join t_publisher publisher
				on publisher.publisher_id = project.publisher_id 
				join  t_project_intro intro
				on intro.project_id = project.project_id				
				where publisher.user_id = $user_id
				and is_publish=1
				and is_pass=1
				and is_del=0
				and end_time < '$now_date'
				and raised_money < raise_money
				limit $startno,$pagesize
				")->result();
	}
	public function get_all_like_project_by_user_id($user_id,$pagesize,$startno){//喜欢的项目
		$this->db->select('t_like.*,t_project.name,t_project.is_del,t_project_intro.pro_cover');
		$this->db->from('t_like');
		$this->db->join('t_project','t_like.project_id=t_project.project_id');
		$this->db->join('t_publisher','t_publisher.publisher_id=t_project.publisher_id');
		$this->db->join('t_project_intro','t_project.project_id=t_project_intro.project_id');
		$this->db->where('t_project.is_del',0);
		$this->db->where('t_like.user_id',$user_id);
		$this->db->order_by('like_time','desc');
		$this->db->limit($pagesize,$startno);
		return $this->db->get()->result();
	}
	public function delete_like_project($project_id){
		$this->db->where('project_id',$project_id);
		return $this->db->delete('t_like');
	}
//个人中心项目管理  ~~~   结束      ~~~
	public function get_uncheck_project(){
		return $this->db->query("select count(*) as sum from t_project where is_pass=0")->row();
	}
	
	
	public function get_project_by_name($search_text,$startno,$pagesize){
		return $this->db->query("select t_project.*,count(*) as sum,t_project_type.pro_type_name,t_user.*,t_user_type.type_name
		                         from t_project
		                         join t_project_type
		                         on t_project_type.pro_type_id=t_project.pro_type_id
		                         join t_user
		                         on t_user.user_id=t_project.publisher_id
		                         join t_user_type
		                         on t_user_type.user_type_id=t_user.user_id
		                         where t_project.name like '%".$search_text."%'
		                         and t_project.is_pass=0
		                         limit $startno,$pagesize
		                         ")->result();
	}
	
	public function get_search_num($search_text){
		return $this->db->query("select count(*) as sum from t_project where t_project.name like '%".$search_text."%'
		                        and t_project.is_pass=0")->row();
	}
	
	public function uncheck_project($startno,$pagesize){
		$this->db->select('project.name,project.project_id,project.start_time,project.raise_money,project_type.pro_type_name,usr.realname,usr_type.type_name,usr.province,usr.city,');
		$this->db->from('t_project project');
		$this->db->join('t_project_type project_type','project_type.pro_type_id=project.pro_type_id');
		$this->db->join('t_user usr','usr.user_id=project.publisher_id');
		$this->db->join('t_user_type usr_type','usr_type.user_type_id=usr.user_id');
		$this->db->where('project.is_pass',0);
		$this->db->limit($pagesize,$startno);
		return $this->db->get()->result();
	}
	public function get_publisher_by_project_id($id){
		$this->db->select('usr.realname');
		$this->db->from('t_project project');
		$this->db->join('t_user usr','usr.user_id=project.publisher_id');
		$this->db->where('project.project_id',$id);
		return $this->db->get()->row();
	}
	public function agree_project_by_id($project_id){
		$this->db->where('project_id',$project_id);
		$this->db->update('t_project',array('is_pass'=>1));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
    public function disagree_project_by_id($project_id){
		$this->db->where('project_id',$project_id);
		$this->db->update('t_project',array('is_pass'=>2));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	//后台删除项目开始
	public function get_all_unpublish_project(){
		$this->db->select('t_project.*,t_project_type.*,t_publisher.pub_name');
		$this->db->from('t_project');
		$this->db->join('t_project_type','t_project.pro_type_id=t_project_type.pro_type_id');
		$this->db->join('t_publisher','t_project.publisher_id=t_publisher.publisher_id');
		$this->db->where('is_publish',0);
		$this->db->where('is_del',0);
		return $this->db->get()->result();
	}
	public function del_unpublish_project($id){
		$this->db->where('t_project.project_id',$id);
		$this->db->update('t_project',array('is_del'=>1));
		
	}
	public function get_all_passed_project(){
		$this->db->select('t_project.*,t_project_type.*,t_publisher.pub_name');
		$this->db->from('t_project');
		$this->db->join('t_project_type','t_project.pro_type_id=t_project_type.pro_type_id');
		$this->db->join('t_publisher','t_project.publisher_id=t_publisher.publisher_id');
		$this->db->where('is_pass',1);
		$this->db->where('is_del',0);
		return $this->db->get()->result();
	}
	public function get_all_fail_project(){
		$this->db->select('t_project.*,t_project_type.*,t_publisher.pub_name');
		$this->db->from('t_project');
		$this->db->join('t_project_type','t_project.pro_type_id=t_project_type.pro_type_id');
		$this->db->join('t_publisher','t_project.publisher_id=t_publisher.publisher_id');
		$this->db->where('is_success',2);
		$this->db->where('is_del',0);
		return $this->db->get()->result();
	}
	public function get_all_success_project(){
		$this->db->select('t_project.*,t_project_type.*,t_publisher.pub_name');
		$this->db->from('t_project');
		$this->db->join('t_project_type','t_project.pro_type_id=t_project_type.pro_type_id');
		$this->db->join('t_publisher','t_project.publisher_id=t_publisher.publisher_id');
		$this->db->where('is_success',1);
		$this->db->where('is_del',0);
		return $this->db->get()->result();
	}
	public function get_all_unpass_project(){
		$this->db->select('t_project.*,t_project_type.*,t_publisher.pub_name');
		$this->db->from('t_project');
		$this->db->join('t_project_type','t_project.pro_type_id=t_project_type.pro_type_id');
		$this->db->join('t_publisher','t_project.publisher_id=t_publisher.publisher_id');
		$this->db->where('is_pass',0);
		$this->db->where('is_del',0);
		return $this->db->get()->result();
	}
	
	
	
	
	
	
	
	
	
}
