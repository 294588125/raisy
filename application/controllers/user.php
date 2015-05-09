<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		//header('Content-type:text/html');
		$this->load->model('user_model');
		$this->load->helper("url");
		$this->load->helper('captcha');
	}
	public function check_login(){
		$username=$this -> input -> post('username');
		$pwd=$this -> input -> post('pwd');		
		$data=array(
			'account'=>$username,
			'password'=>$pwd
		);
		//必要的验证
		
		//访问数据库
		//$this->load->model('user_model');
		$row=$this->user_model->get_by_name_pwd($data);
		//跳转
		if($row){
			$this->session->set_userdata("login_user",$row);
			$login_user=$this->session->userdata('login_user');
			echo "success";
		}else{
			echo "fail";
		}
	}
	public function check_reg_name(){
		$username=$this -> input -> post('regname');
		$result=$this->user_model->get_by_account($username);
		if($result){
			echo 'fail';
		}
		else{
			echo 'success';
		}
	}
	public function do_reg(){
		$username=$this -> input -> post('regname');
		$pwd=$this -> input -> post('pwd');
		$data=array(
			'account'=>$username,
			'password'=>$pwd
		);
		$result=$this->user_model->save($data);
		$row=$this->user_model->get_by_name_pwd($data);
		$this->session->set_userdata("login_user",$row);
		$login_user=$this->session->userdata('login_user');
		if($result){
			echo 'success';
		}
		else{
			echo 'fail';
		}
		
	}
    public function ajax_yanzhengma(){
		$vals=array(
			'word'=>rand(1000, 10000),
			'img_path'=>'./captcha/',
			'img_url'=>'./captcha/',
			'img_width'=>'100',
			'img_height'=>'30',
			'expiration'=>7200
		);
		$data=array(
			'yanzheng'=>create_captcha($vals)
		);
		echo json_encode($data['yanzheng']);
	}
	public function logout(){
		$this->session->unset_userdata('login_user');
		redirect('welcome/index');
	}
	public function save_personal_information(){
		$login_user = $this->session->userdata('login_user');
		$mobile = $this->input->get('mobile');
		$province = $this->input->get('province');
		$city = $this->input->get('city');
		$detail = $this->input->get('detail');
		$youbian = $this->input->get('youbian');
		$addressee = $this->input->get('addressee');
		$data = array(
		  'user_id'=>$login_user->user_id,
		  'accept_tel'=>$mobile,
		  'province'=>$province,
		  'city'=>$city,
		  'address_detail'=>$detail,
		  'postalcode'=>$youbian,
		  'addressee'=>$addressee
		);
		
		$result = $this->user_model->add_information($data);
		if($result){
			echo json_encode($data);
		}else{
			echo "fail";
		}
	}
	
	public function get_information(){
		$user_id = $this->session->userdata('login_user');
		
	}
	
	
	//进入个人设置页面
	public function setting() {
		// $this->session->unset_userdata('login_user');
		$this -> load -> view('setting');
	}

	//个人设置
	public function ajax_do_setting() {
		$login_user = $this -> session -> userdata('login_user');
		$user_id = $login_user -> user_id;
		$user_name = $this -> input -> post('user_name');
		$sex = $this -> input -> post('sex');
		$province = $this -> input -> post('province');
		$city = $this -> input -> post('city');
		$intro = $this -> input -> post('intro');
		$data = array(
		'realname' => $user_name, 
		'sex' => $sex,
		'province' => $province,
		'city' => $city,
		'mark' => $intro
		);
		$query = $this -> user_model -> save_information($data, $user_id);
		if ($query) {
			$login_user = $this -> user_model -> get_by_id($user_id);
			$login_user = $this -> session -> set_userdata('login_user', $login_user);
			echo 'success';
		} else {
			echo "fail";
		}
	}
    public function view_avatar(){
		$this -> load -> view('avatar');
	}
	public function upload_avatar(){
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048';
		$config['file_name'] = date("YmdHis").'_'.rand(10000, 99999);
		$this -> load ->  library('upload', $config);
		if (!$this -> upload -> do_upload()){
			echo "头像更新失败";
		} else {
			$upload_data=$this->upload->data();
			$data = array(
				'img'=>$upload_data['file_name']
			);
			$res=$this ->user_model -> save_avatar($data,$user_id);
			if($res){
				$users = $this -> user_model -> get_by_id($user_id);
				$this -> session -> set_userdata('login_user',$users);
				redirect('user/view_avatar');
				
				
			}
		}		
		
	}
	public function view_change_pwd(){
		$this->load->view('setting_pwd');
	}
	public function change_pwd(){
		$login_user=$this->session->userdata('login_user');
		$user_id=$login_user->user_id;
		$new_pwd=$this->input->post('new_pwd');
		$data=array(
			'password'=>$new_pwd
		);
		$res=$this->user_model->update_pwd($data,$user_id);
		if($res){
			$login_user=$this->user_model->get_by_id($user_id);
			$login_user=$this->session->set_userdata('login_user',$login_user);
			echo 'success';		
		}else{
			echo 'fail';
		}
	}
}

   