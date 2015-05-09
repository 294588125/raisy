<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model');
		$this->load->model('user_model');
		$this->load->model('support_model');
		$this->load->model('message_model');
	}
	//删除已发布项目
	public function del_unpublish_project(){
		$projects = $this->project_model->get_all_unpublish_project();
		$data=array(
			'projects'=>$projects
		);
		$this->load->view('admin/delete_project',$data);
	}
	public function del_unpublish_pro($id){
		$this->project_model->del_unpublish_project($id);
		redirect('admin/project/del_unpublish_project');
	}
	//删除已通过项目
	public function del_passed_project(){
		$projects=$this->project_model->get_all_passed_project();
		$data=array(
			'projects'=>$projects
		);
		$this->load->view('admin/delete_passed_project',$data);
	}
	public function del_passed_pro($id){
		$this->project_model->del_unpublish_project($id);
		redirect('admin/project/del_passed_project');
	}
	//删除失败项目
	public function del_fail_project(){
		$projects=$this->project_model->get_all_fail_project();
		$data=array(
			'projects'=>$projects
		);
		$this->load->view('admin/delete_fail_project',$data);
	}
	public function del_fail_pro($id){
		$this->project_model->del_unpublish_project($id);
		redirect('admin/project/del_fail_project');
	}
	//删除成功项目
	public function del_success_project(){
		$projects=$this->project_model->get_all_success_project();
		$data=array(
			'projects'=>$projects
		);
		$this->load->view('admin/delete_success_project',$data);
	}
	public function del_success_pro($id){
		$this->project_model->del_unpublish_project($id);
		redirect('admin/project/del_success_project');
	}
	//删除为通过项目
	public function del_unpass_project(){
		$projects=$this->project_model->get_all_unpass_project();
		$data=array(
			'projects'=>$projects
		);
		$this->load->view('admin/delete_unpass_project',$data);
	}
	public function del_unpass_pro($id){
		$this->project_model->del_unpublish_project($id);
		redirect('admin/project/del_unpass_project');
	}
}