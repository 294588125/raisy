<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Like extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('comment_model');
		$this->load->model('like_model');
	}
	
	public function add_like(){
		$project_id=$this->input->post('id');
		
		$result=$this->db->insert('t_like',array('project_id'=>$project_id));
		if($result){
			echo "success";
		}
	}

	
	
	
	
	
	
}