<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('support_model');
		$this->load->model('project_model');
		$this->load->model('user_model');
		$this->load->model('message_model');
		$this->load->model('user_type_model');
		$this->load->model('project_type_model');
		$this->load->model('project_intro_model');
		$this->load->model('publisher_model');
		$this->load->model('support_type_model');
	}
	

	public function index()
	{
		$project_id = $this->input->get('project_id');
		// var_dump($project_id);
		// die;
		$startno = $this->input->get('per_page');
		if(empty($startno)){
			$startno=0;
		}
		$config['base_url'] = site_url('support/index?');
		$config['total_rows'] = 8;
		$config['per_page'] = 4;
		$config['first_link'] ='首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$config['base_url'].="project_id=".$project_id;
	    $config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);
		//$startno=$this->uri->segment(4)==""? 0 : $this->uri->segment(4);
		$supports = $this->support_model->get_support_list($project_id,$startno,$config['per_page']);
		// var_dump($supports);
		// die;
		$support_type = $this->project_model->get_support($project_id);
		$project = $this->project_model->getall($project_id);
		// $support = $this->support_model->get_support();
		$sum = $this->support_model->get_support_money($project_id);
		$data = array(
		   'project_id'=>$project_id,
		   'project'=>$project,
		   'supports'=>$supports,
		   'support_type'=>$support_type,
		   'sum'=>$sum
		);
		$this->load->view('support',$data);
		//var_dump($data);
		 //die;
	}
	public function payfor($project_id,$support_money){
		$login_user=$this->session->userdata('login_user');
		$project = $this->project_model->get_project_by_id($project_id);
		$data=array(
		  'project'=>$project,
		  'project_id'=>$project_id,
		  'support_money'=>$support_money,
		  'login_user'=>$login_user
		);
		$this->load->view('zhifu',$data);
	}
	public function get_supporter(){
		$config['base_url'] = site_url("support/get_supporter");
		$config['total_rows'] = 9;
		$config['per_page'] = 4;
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$this->pagination->initialize($config);
		$startno=$this->uri->segment(3)==""? 0 : $this->uri->segment(3);
		$supports = $this->support_model->get_support_list($project_id,$startno,$config['per_page']);
		$data=array(
		   'supports'=>$supports
		);
		$this->load->view('support',$data);
	}

   public function save_money(){
   	$login_user=$this->session->userdata('login_user');
   	$project_id = $this->input->post('project_id');
   	$project = $this->project_model->get_project_by_id($project_id);
	$message=$this->input->post('message_fqr');
		$save = array(
		   'receiver'=>$project->publisher_id,
		   'sender'=>$login_user->user_id,
		   'content'=>$message
		);
	$this->message_model->save_msg($save);
	
   	$money = $this->input->post('sup_money');
   	$login_user=$this->session->userdata('login_user');
		$data=array(
		  'project_id'=>$project_id,
		  'support_money'=>$money,
		  'user_id'=>$login_user->user_id
		);
	$result = $this->support_model->save_support($data);
	if($result){
		echo "success";
	}else{
		echo "fail";
	}
   }
   public function deleteSupportType(){
		
		$support_type_id=$this->input->post('support_type_id');
		$rs=$this->support_type_model->delete_by_support_type_id($support_type_id);
		if($rs){
			echo 'success';
		}else{
			echo 'fail';
		}
	}
	public function updateSupportTypeSearch(){
		$support_type_id=$this->input->post('support_type_id');
		$rs=$this->support_type_model->get_all_by_support_type_id($support_type_id);
		echo json_encode($rs);
		
	}
	public function updateSupportTypeUpdate(){
		$support_type_id=$this->input->post('support_type_id');
		$support_money=$this->input->post('support_money');
		$support_report=$this->input->post('support_report');
		$project_id=$this->input->post('project_id');
		//var_dump($support_report);
		//die();
		$data=array(
			'support_money'=>$support_money,
			'support_report'=>$support_report
		);
		$rs=$this->support_type_model->update_by_support_type_id($support_type_id,$data);
		if($rs){
			echo $project_id;
		}
	}
}


















