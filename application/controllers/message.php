<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Message extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('support_model');
		$this->load->model('message_model');
	}
	public function send_msg(){
		$login_user=$this->session->userdata('login_user');
		$receiver = $this->input->post('receiver');
		$content_msg = $this->input->post('content_msg');
		$data=array(
		    'sender'=>$login_user->user_id,
		    'receiver'=>$receiver,
		    'content'=>$content_msg
		);
		$result = $this->message_model->save_msg($data);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}
	}
	
	public function send_msg_by_manager(){
	    $receiver = $this->input->post('receiver');	
		$content_msg = $this->input->post('content_msg');
		$data=array(
		    'sender'=>9,
		    'receiver'=>$receiver,
		    'content'=>$content_msg
		);
		$result = $this->message_model->save_msg($data);
		if($result){
			echo "success";
		}else{
			echo "fail";
		}
	}
	public function message_center(){
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$data['messages']=$this->message_model->get_message_by_user_id($user_id);
		//var_dump($data);
		//die;
		$this->load->view('message_center',$data);
		
	}
	public function reply_message($receiver){
		$login_user=$this->session->userdata('login_user');
		$sender=$login_user->user_id;
		$content=$this->input->post('answer-detail');
		$data=array(
			'content'=>$content,
			'sender'=>$sender,
			'receiver'=>$receiver
		);
		//var_dump($data);
		//die;
		$this->message_model->reply_message($data);
		$this->message_center();
	}
	public function del_message(){
		$message_id=$this->input->get('id');
		$result=$this->message_model->del_message($message_id);
		if($result){
			echo 'success';
		}	
	}	
		
		
		
		
		
		
		
		
		
		
		
		
}