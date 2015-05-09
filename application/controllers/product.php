<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		//header('Content-type:text/html');
		$this->load->model('user_model');
		$this->load->model('user_type_model');
		$this->load->model('project_model');
		$this->load->model('project_type_model');
		$this->load->model('project_intro_model');
		$this->load->model('publisher_model');
		$this->load->model('support_type_model');
		$this->load->helper('url');
	}
	//测试飒飒的php
	public function pubProduct(){
		$this->load->view('pubProduct');
	}	
	public function productnewAdd(){
		$this->load->view('productnewAdd');
	}
	public function productreturnAdd($project_id){
		$data=array(
			'project_id'=>$project_id
		);
		$this->load->view('productreturnAdd',$data);
	}
	public function pubStepOne(){
		$pro_name=$this->input->post('pro_name');
		$pro_money=$this->input->post('pro_money');
		$pro_start_time=$this->input->post('pro_start_time');
		$pro_end_time=$this->input->post('pro_end_time');
		$pro_type=$this->input->post('pro_type');
		$pro_province=$this->input->post('pro_province');
		$pro_city=$this->input->post('pro_city');
		//$pro_cover=$this->input->post('pro_cover');
		$upload_pic=$this->session->userdata('upload_pic');
		$pro_cover=$upload_pic['file_name'];
		$pro_video=$this->input->post('pro_video');
		$pro_intro=$this->input->post('pro_intro');
		$pro_clearfix=$this->input->post('pro_clearfix');
		$data=array(
			'pro_type_id'=>$pro_type,
			'name'=>$pro_name,
			'raise_money'=>$pro_money,
			'raised_money'=>0,
			'start_time'=>$pro_start_time,
			'end_time'=>$pro_end_time,
			'province'=>$pro_province,
			'city'=>$pro_city,
			'is_publish'=>0
		);
		$project_id=$this->project_model->save_pub_t_project($data);
		$data1=array(
			'intro'=>$pro_intro,
			'detail'=>$pro_clearfix,
			'pro_cover'=>$pro_cover,
			'pro_video'=>$pro_video,
			'project_id'=>$project_id
		);
		$rs=$this->project_intro_model->save_pub_t_project_intro($data1);
		if($rs){
			echo $project_id;
		}
	}
	public function pubStepOne_alter(){
		$project_id=$this->input->post('pro_id');
		$pro_name=$this->input->post('pro_name');
		$pro_money=$this->input->post('pro_money');
		$pro_start_time=$this->input->post('pro_start_time');
		$pro_end_time=$this->input->post('pro_end_time');
		$pro_type=$this->input->post('pro_type');
		$pro_province=$this->input->post('pro_province');
		$pro_city=$this->input->post('pro_city');
		//$pro_cover=$this->input->post('pro_cover');
		$pro_video=$this->input->post('pro_video');
		$pro_intro=$this->input->post('pro_intro');
		$pro_clearfix=$this->input->post('pro_clearfix');
		$data=array(
			'pro_type_id'=>$pro_type,
			'name'=>$pro_name,
			'raise_money'=>$pro_money,
			'raised_money'=>0,
			'start_time'=>$pro_start_time,
			'end_time'=>$pro_end_time,
			'province'=>$pro_province,
			'city'=>$pro_city,
			'is_publish'=>0
		);
		$rs1=$this->project_model->update_all_by_project_id($project_id,$data);
		$data1=array(
			'intro'=>$pro_intro,
			'detail'=>$pro_clearfix,
			//'pro_cover'=>$pro_cover,
			'pro_video'=>$pro_video
		);
		$rs2=$this->project_intro_model->update_all_by_project_id($project_id,$data1);
		if($rs1==$rs2){
			echo $project_id;
		}
	}
	public function pubStepTwo_save(){
		$return_money=$this->input->post('return_money');
		$return_method=$this->input->post('return_method');
		$project_id=$this->input->post('project_id');
		$data=array(
			'support_money'=>$return_money,
			'support_report'=>$return_method,
			'project_id'=>$project_id
		);
		$rs=$this->support_type_model->save_pub_t_support_type($data);
		if($rs){
			echo $project_id;
			//var_dump($$project_id);
			//die();
		}
	}
	public function pubStepTwo_search($project_id){
		$support_type=$this->support_type_model->get_all_by_project_id($project_id);
		$data2=array(
			'support_type'=>$support_type,
			'project_id'=>$project_id
		);
		$this->load->view('productAfterReturn',$data2);
	}
	public function pubStepTwo_prev($project_id){
		$project=$this->project_model->get_all_by_project_id($project_id);
		$project_intro=$this->project_intro_model->get_all_by_project_id($project_id);
		$data=array(
			'project'=>$project,
			'project_intro'=>$project_intro
		);
	
		$this->load->view('productReturnPrev',$data);
	}
	public function pubSuccess($project_id){
		
		$data=array(
			'is_publish'=>1
		);
		$rs=$this->project_model->save_is_publish_by_publisher_id($data,$project_id);
		if($rs==1){
			$this->load->view('pubSuccess');
		}
	}
	//测试结束
	public function up_picture(){
		$this->load->view('shangchuan');
	}
	public function pre_picture(){
		$this->load->view('pre_pic');
	}
	// public function do_upload(){
		// $config=array(
			// 'upload_path'=>'./uploads/',
			// 'allowed_types'=>'gif|jpg|png',
			// 'max_size'=>'200',
			// 'max_width'=>'1024',
			// 'max_height'=>'786'
		// );
		// $this->load->library('product',$config);
// 		
		// if($this->product->do_upload()){
			// $data=array(
// 			
				// "uplist"=>$this->product->data()
			// );
			// // echo $data;
			// // die;
			// $this->load->view("shangchuan",$data);
		// }
	// }
	
}