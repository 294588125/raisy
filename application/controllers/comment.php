<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('comment_model');
		$this->load->model('like_model');
		$this->load->model('project_model');
		$this->load->model('user_model');
		$this->load->model('support_model');
	}
	

	public function index(){
		$support_type = $this->project_model->get_support();
		$project = $this->project_model->getall();
		$commenter = $this->comment_model->get_commenter();
		$data = array(
		             'commenter'=>$commenter,
					 'project'=>$project,
					 'support_type'=>$support_type
					 );
		$this->load->view('comment',$data);
	}
	//保存话题
	public function send_topic(){
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$data['comments']=$this->comment_model->get_comment_by_user_id($user_id);
		//var_dump($data);
		//die;
		$this->load->view('send_topic',$data);
	}
	public function del_comment(){
		$comment_id=$this->input->get('id');
	 	$result=$this->comment_model->del_comment($comment_id);
		if($result){
			echo 'success';
		}
	}	
	public function send_comment(){
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$data['comments']=$this->comment_model->get_send_comment($user_id);
		//var_dump($data);
		//die;
		$this->load->view('send_comment',$data);
	}	
	public function receive_comment(){
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$data['comments']=$this->comment_model->get_comment_by_receiver($user_id);
		//var_dump($data);
		//die;
		$this->load->view('receive_comment',$data);
	}	
	public function back_answer(){
		$project_id=$this->input->post('project_id');
	 	$login_user = $this->session->userdata('login_user');
	 	$user_id = $login_user->user_id;
	 	$comment_content = $this->input->post('comment_content');
		$data = array(
		     'project_id'=>$project_id,
		     'content'=>$comment_content,
		     'sender'=>$user_id,
		     'reply'=>0
		);
		$result = $this->comment_model->save_content($data);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}
	 }
	//保存评论
	public function save_comment(){
		$login_user = $this->session->userdata('login_user');
		$reply_id = $this->input->post('reply_id');
		$reply = $this->input->post('reply');
		$project_id=$this->input->post('project_id');
		$data = array(
		   'project_id'=>$project_id,
		   'reply'=>$reply_id,
		   'content'=>$reply,
		   'sender'=>$login_user->user_id,
		);
		$result = $this->comment_model->save_content($data);
		if($result){
			echo 'success';
		}else{
			echo "fail";
		}
	}
	public function to_add(){
		$project_id = $this->input->get('project_id');
		// var_dump($project_id);
		// die;
		// $project_id=1;
		$support_type = $this->project_model->get_support($project_id);
		$project = $this->project_model->getall($project_id);
		$sum = $this->support_model->get_support_money($project_id);
		$level1_types = $this->comment_model->get_level1_types($project_id);
		foreach($level1_types as $level1_type){
			$level1_type->level2_types = $this->comment_model->get_level2_types($level1_type->comment_id);
			$level1_type->comment_sum = $this->comment_model->get_comment_sum1($level1_type->comment_id);
		}
		$data = array(
		    'project_id'=>$project_id,
		    'project'=>$project,
		    'support_type'=>$support_type,
		    'level1_types'=>$level1_types,
		    'sum'=>$sum
		);
		$this->load->view('comment',$data);
	}
	
	public function delete_comment(){
		$comment_id = $this->input->post('comment_id');
		$result = $this->comment_model->delete_comment_by_id($comment_id);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}
	}
}





















