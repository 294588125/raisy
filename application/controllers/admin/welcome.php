<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model');
		$this->load->model('user_model');
		$this->load->model('support_model');
		$this->load->model('message_model');
	}
	public function waiting_check_project(){
		$startno = $this->input->get('per_page');
		if(empty($startno)){
			$startno=0;
		}
		$total=$this->project_model->get_uncheck_project()->sum;
		$config['base_url'] = site_url("admin/welcome/waiting_check_project?");
		$config['total_rows'] = $total;
		$config['per_page'] = 4;
		$config['first_link'] ='首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		// $config['base_url']="";
	    $config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);
		//$startno=$this->uri->segment(3)==""? 0 : $this->uri->segment(3);
		
		$uncheck_projects = $this->project_model->uncheck_project($startno,$config['per_page']);
		$data = array(
		     'uncheck_projects'=>$uncheck_projects
		);
		$this->load->view('admin/forms',$data);
	}
	public function search_project(){
		$startno = $this->input->get('per_page');
		if(empty($startno)){
			$startno=0;
		}
		$search_text = $this->input->post('Text');
		$total = $this->project_model->get_search_num($search_text)->sum;
		
		$config['base_url'] = site_url("admin/welcome/search_project?");
		$config['total_rows'] = $total;
		$config['per_page'] = 4;
		$config['first_link'] ='首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
	    $config['page_query_string'] = TRUE;
		$this->pagination->initialize($config);
		
		$search_project = $this->project_model->get_project_by_name($search_text,$startno,$config['per_page']);
		$data = array(
		     'uncheck_projects'=>$search_project
		);
		$this->load->view('admin/forms',$data);
	}
	public function check_detail($project_id){
		$project = $this->project_model->get_project_by_id($project_id);
		$project_intro = $this->project_model->get_intro($project_id);
		$publisher = $this->project_model->get_publisher_by_project_id($project_id);
		$support_types = $this->support_model->get_every_support($project_id);
		$data = array(
		   'project_id'=>$project_id,
		   'project'=>$project,
		   'project_intro'=>$project_intro,
		   'publisher'=>$publisher,
		   'support_types'=>$support_types
		);
		$this->load->view('admin/check_detail',$data);
	}

    public function agreed_project(){
    	$project_id = $this->input->post('project_id');
		$result = $this->project_model->agree_project_by_id($project_id);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}
    }
	
	public function disagreed_project(){
    	$project_id = $this->input->post('project_id');
		$result = $this->project_model->disagree_project_by_id($project_id);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}
    }
	
}