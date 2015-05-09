<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		//header('Content-type:text/html');
		$this->load->helper('url');
	}
	public function do_upload(){
		$config=array(
			'upload_path'=>'./uploads/',
			'allowed_types'=>'gif|jpg|png',
			'max_size'=>'200',
			'max_width'=>'1024',
			'max_height'=>'786'
		);
		$this->load->library('upload',$config);
		// var_dump($this->upload->do_upload());
		// die;
		if($this->upload->do_upload()){
			$uplist=$this->upload->data();
			$this->session->set_userdata("upload_pic",$uplist);
			$this->load->view('shangchuan');
		}

	}
	
}