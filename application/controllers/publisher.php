<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publisher extends CI_Controller {
	
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
	}
	public function pubStepThreeShow($project_id){
		$pub=$this->project_model->get_publisher_id_by_project_id($project_id);
		if($pub->publisher_id==0){
			$data=array(
				'project_id'=>$project_id
			);
			$this->load->view('productPublisher',$data);
		}else if($pub->publisher_id!=0){
			$publisher=$this->publisher_model->get_all_by_publisher_id($pub->publisher_id);
			$data=array(
				'project_id'=>$project_id,
				'publisher'=>$publisher
			);
			$this->load->view('productPublisherAgain',$data);
		}
	}
	public function pubStepThreeSave(){
		$login_user=$this->session->userdata("login_user");
		$user_id=$login_user->user_id;
		$project_id=$this->input->post('project_id');
		$pub_name=$this->input->post('pub_name');
		$pub_tel=$this->input->post('pub_tel');
		$pub_province=$this->input->post('pub_province');
		$pub_city=$this->input->post('pub_city');
		$bank_name=$this->input->post('bank_name');
		$bank_add=$this->input->post('bank_add');
		$bank_person_name=$this->input->post('bank_person_name');
		$bank_account=$this->input->post('bank_account');
		$data=array(
			'pub_name'=>$pub_name,
			'pub_tel'=>$pub_tel,
			'pub_province'=>$pub_province,
			'pub_city'=>$pub_city,
			'bank_name'=>$bank_name,
			'bank_add'=>$bank_add,
			'bank_person_name'=>$bank_person_name,
			'bank_account'=>$bank_account,
			'user_id'=>$user_id
		);
		$publisher_id=$this->publisher_model->save_all_get_id($data);
		var_dump($publisher_id);
		$rs=$this->project_model->save_publisher_id_by_project_id($project_id,$publisher_id);
		if($rs==1){
			echo $rs;
		}
	}
	public function pubStepThreeUpdate(){
		$publisher_id=$this->input->post('publisher_id');
		$pub_name=$this->input->post('pub_name');
		$pub_tel=$this->input->post('pub_tel');
		$pub_province=$this->input->post('pub_province');
		$pub_city=$this->input->post('pub_city');
		$bank_name=$this->input->post('bank_name');
		$bank_add=$this->input->post('bank_add');
		$bank_person_name=$this->input->post('bank_person_name');
		$bank_account=$this->input->post('bank_account');
		$data=array(
			'pub_name'=>$pub_name,
			'pub_tel'=>$pub_tel,
			'pub_province'=>$pub_province,
			'pub_city'=>$pub_city,
			'bank_name'=>$bank_name,
			'bank_add'=>$bank_add,
			'bank_person_name'=>$bank_person_name,
			'bank_account'=>$bank_account
		);
		$rs=$this->publisher_model->update_all_by_publisher_id($data,$publisher_id);
		echo $rs;
	}
}