<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->model('project_model');
		$this->load->model('support_model');
		$this->load->model('like_model');
	}
	
	public function index($project_id)
	{
		// $project_id = $this->input->get('project_id');
		$project = $this->project_model->get_project_by_id($project_id);
		//$project = $this->project_model->getall();
		$project_intro = $this->project_model->get_intro($project_id);
		$support_type = $this->project_model->get_support($project_id);
		$sum1 = $this->support_model->get_support_money($project_id)->sum;
		$sum = $this->support_model->get_support_money($project_id);
		$save=array(
		   'raised_money'=>$sum1,
		   'project_id'=>$project_id
		);
		$this->project_model->get_sum($save,$project_id);
		$data=array(
		      'project_id'=>$project_id,
		      'project'=>$project,
			  'project_intro'=>$project_intro,
			  'support_type'=>$support_type,
			  'sum'=>$sum
			  );
			  // var_dump($project->project_id);
		$this->load->view('detail_information',$data);
	}
	//个人中心项目管理     ~~~  开始   ~~~
	public function view_project_support(){//支持的项目
		$login_user = $this ->session -> userdata('login_user');
		$user_id=$login_user -> user_id;
		$like_sum = $this -> like_model -> get_like_sum_by_user_id($user_id);
		$support_sum=$this -> support_model -> get_support_sum_by_user_id($user_id);
		$launch_sum=$this -> project_model ->get_launch_sum_by_user_id($user_id);
		$total=$support_sum->support_sum;
		$config['base_url'] = site_url("project/view_project_support");
		$config['total_rows'] = $total;
		$config['per_page'] = 4; 
		$pagesize=$config['per_page'];
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$this->pagination->initialize($config); 
		$startno=$this->uri->segment(3)==""? 0 : $this->uri->segment(3);
		$projects = $this -> support_model -> get_all_support_project_by_user_id($user_id,$startno,$pagesize);
		$data=array(
			'support_sum'=>$support_sum,
			'launch_sum'=>$launch_sum,
			'like_sum'=>$like_sum,
			'projects'=>$projects
		);
		$this->load->view('project_support',$data);
	}
	
	public function view_all_project_launch(){//显示所有发起项目
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$like_sum = $this -> like_model -> get_like_sum_by_user_id($user_id);
		$support_sum=$this -> support_model -> get_support_sum_by_user_id($user_id);
		$launch_sum=$this -> project_model ->get_launch_sum_by_user_id($user_id);
		$config['base_url'] = site_url("project/view_all_project_launch");
		$config['total_rows'] = $launch_sum->launch_sum;
		$config['per_page'] = 4; 
		$pagesize=$config['per_page'];
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$this->pagination->initialize($config); 
		$startno=$this->uri->segment(3)==""? 0 : $this->uri->segment(3);
		$projects=$this->project_model->get_all_launch_project_by_publicsher_id($user_id,$startno,$pagesize);
		$data=array(
			'support_sum'=>$support_sum,
			'launch_sum'=>$launch_sum,
			'like_sum'=>$like_sum,
			'projects'=>$projects
		);
		$this->load->view('project_launch',$data);
	}
	
	public function view_project_launching($startno = 0){//众筹中
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$like_sum = $this -> like_model -> get_like_sum_by_user_id($user_id);
		$support_sum=$this -> support_model -> get_support_sum_by_user_id($user_id);
		$launch_sum=$this -> project_model ->get_launch_sum_by_user_id($user_id);
		$now_date = date('Y-m-d');
		$total=$this->project_model->get_launching_project_rows_by_publicsher_id($user_id,$now_date);
		$config['base_url'] = site_url("project/view_project_launching");
		$config['total_rows'] = $total;
		$config['per_page'] = 4; 
		$pagesize=$config['per_page'];
		$config['uri_segment'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$this->pagination->initialize($config); 
		// $startno=$this->uri->segment(3)==""? 0 : $this->uri->segment(3);
		$projects=$this->project_model->get_launching_project_by_publicsher_id($user_id,$now_date,$startno,$pagesize);
		// var_dump($projects);die;
		$data=array(
			'support_sum'=>$support_sum,
			'launch_sum'=>$launch_sum,
			'like_sum'=>$like_sum,
			'projects'=>$projects
		);
		$this->load->view('project_launching',$data);
	}
	public function view_project_success($startno = 0){//成功
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$like_sum = $this -> like_model -> get_like_sum_by_user_id($user_id);
		$support_sum=$this -> support_model -> get_support_sum_by_user_id($user_id);
		$launch_sum=$this -> project_model ->get_launch_sum_by_user_id($user_id);
		$now_date=date('Y-m-d');
		$total=$this->project_model->get_launch_success_project_rows_by_publicsher_id($user_id,$now_date);
		// var_dump($total);die;
		$config['base_url'] = site_url("project/view_project_success");
		$config['total_rows'] = $total;
		$config['per_page'] = 4; 
		$pagesize=$config['per_page'];
		$config['uri_segment'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$this->pagination->initialize($config); 
		$projects=$this->project_model->get_launch_success_project_by_publicsher_id($user_id,$now_date,$startno,$pagesize);
			$data=array(
				'support_sum'=>$support_sum,
				'launch_sum'=>$launch_sum,
				'like_sum'=>$like_sum,
				'projects'=>$projects
			);
		$this->load->view('project_launch_success',$data);
	}
	public function view_project_fail(){//失败
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$like_sum = $this -> like_model -> get_like_sum_by_user_id($user_id);
		$support_sum=$this -> support_model -> get_support_sum_by_user_id($user_id);
		$launch_sum=$this -> project_model ->get_launch_sum_by_user_id($user_id);
		$now_date=date('Y-m-d');
		$total=$this->project_model->get_launch_fail_project_rows_by_publicsher_id($user_id,$now_date);
		$config['base_url'] = site_url("project/view_project_fail");
		$config['total_rows'] = $total;
		$config['per_page'] = 4; 
		$pagesize=$config['per_page'];
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$this->pagination->initialize($config); 
		$startno=$this->uri->segment(3)==""? 0 : $this->uri->segment(3);
		$projects=$this->project_model->get_launch_fail_project_by_publicsher_id($user_id,$now_date,$startno,$pagesize);
		$data=array(
			'support_sum'=>$support_sum,
			'launch_sum'=>$launch_sum,
			'like_sum'=>$like_sum,
			'projects'=>$projects
		);
		$this->load->view('project_launch_fail',$data);
	}
	public function view_project_like($startno = 0){//显示所有喜欢项目
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$like_sum = $this -> like_model -> get_like_sum_by_user_id($user_id);
		$support_sum=$this -> support_model -> get_support_sum_by_user_id($user_id);
		$launch_sum=$this -> project_model ->get_launch_sum_by_user_id($user_id);
		$total=$like_sum;
		$config['base_url'] = site_url("project/view_project_like");
		$config['total_rows'] = $total;
		$config['per_page'] = 4;
		$config['uri_segment'] = 3;
		$pagesize=$config['per_page'];
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$this->pagination->initialize($config); 
		// $startno=$this->uri->segment(3)==""? 0 : $this->uri->segment(3);
		$projects=$this->project_model->get_all_like_project_by_user_id($user_id,$pagesize,$startno);
		$data=array(
			'support_sum'=>$support_sum,
			'launch_sum'=>$launch_sum,
			'like_sum'=>$like_sum,
			'projects'=>$projects
		);
		$this->load->view('project_like',$data);
	}
	public function cancel_like_project(){
		$project_id=$this->input->get('project_id');
		$result=$this->project_model->delete_like_project($project_id);
		if($result){ 
			echo 'success';
		}else{
			echo 'fail';
		}
	}
	//个人中心项目管理     ~~~  结束  ~~~
}