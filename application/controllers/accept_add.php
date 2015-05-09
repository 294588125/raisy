<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accept_add extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('accept_add_model');
		$this->load->library('pagination');
		
	}
	public function manage_address(){
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$total = $this -> accept_add_model ->get_rows_by_user_id($user_id) -> total;
		$config['base_url'] = site_url("accept_add/manage_address");
		$config['total_rows'] = $total;
		$config['per_page'] = 5; 
		$pagesize=$config['per_page'];
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		$config['prev_link']='上一页';
		$config['next_link']='下一页';
		$this->pagination->initialize($config); 
		// $startno=$this->uri->segment(3)==""?0:$this->uri->segment(3);
		$startno=$this->uri->segment(3)==""? 0 : $this->uri->segment(3);
		$addresses=$this->accept_add_model->get_address_list($user_id,$startno,$pagesize);
		// var_dump($addresses);die;
		// $data=array(
			// 'user_id'=>$user_id
		// );
		// $addresses=$this->accept_add_model->get_by_user_id($data);
		$data=array(
			'addresses'=>$addresses
		);
		$this->load->view('manage_address',$data);
	}
	public function ajax_manage_address(){
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$addressee=$this->input->post('addressee');
		$addressee_tel=$this->input->post('addressee_tel');
		$address_province=$this->input->post('address_province');
		$address_city=$this->input->post('address_city');
		$address_detail=$this->input->post('address_detail');
		$postalcode=$this->input->post('postalcode');
		$data=array(
			'user_id'=>$user_id,
			'addressee'=>$addressee,
			'accept_tel'=>$addressee_tel,
			'province'=>$address_province,
			'city'=>$address_city,
			'postalcode'=>$postalcode,
			'address_detail'=>$address_detail			
		);
		$result=$this->accept_add_model->save_address($data);
		if($result){
			echo 'success';
		}else{
			echo 'fail';
		}		
	}
	public function ajax_del(){
		$add_id=$this->input->get('add_id');
		$data=array(
			'add_id'=>$add_id
		);		
		$res=$this->accept_add_model->delete_by_address_id($data);
		if($res){
			echo 'success';
		}else{
			echo 'fail';
		}
	}
	public function ajax_edit_address(){
		$add_id=$this->input->post('add_id');
		$data=array(
			'add_id'=>$add_id
		);
		$res=$this->accept_add_model->get_by_address_id($data);
		echo json_encode($res);
		
		
	}
	public function ajax_save_address_again(){
		$add_id=$this->input->post('add_id');
		$addressee=$this->input->post('addressee');
		$addressee_tel=$this->input->post('addressee_tel');
		$address_province=$this->input->post('address_province');
		$address_city=$this->input->post('address_city');
		$address_detail=$this->input->post('address_detail');
		$postalcode=$this->input->post('postalcode');
		$data=array(
			'addressee'=>$addressee,
			'accept_tel'=>$addressee_tel,
			'province'=>$address_province,
			'city'=>$address_city,
			'postalcode'=>$postalcode,
			'address_detail'=>$address_detail			
		);
		$res=$this->accept_add_model->update_by_address_id($data,$add_id);
		if($res){
			echo 'success';
		}else{
			echo 'fail';
		}
	}
	



























}	