<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Browse extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('project_model');
		$this->load->model('comment_model');
		$this->load->model('like_model');
	}
	public function search(){//查找项目
		$search_name=$this->input->post('search');
		$projects=$this->project_model->search_project($search_name);
		foreach ($projects as $project) {
			$id=$project->project_id;
			$project -> intro = $this->project_model->get_project_by_id($id);
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'search_name'=>$search_name
		);
		$this->load->view('search',$data);
	}
	public function raising(){   //众筹中的项目
		$projects=$this->project_model->get_raising_project();
		$sum=$this->project_model->get_raising_project_sum();
		foreach ($projects as $project) {
			$id=$project->project_id;
			$project -> intro = $this->project_model->get_project_by_id($id);
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'sum'=>$sum
		);
		$this->load->view('raising',$data);
	}
	public function successed(){   //众筹中的项目
		$projects=$this->project_model->get_successed_project();
		$sum=$this->project_model->get_successed_project_sum();
		foreach ($projects as $project) {
			$id=$project->project_id;
			$project -> intro = $this->project_model->get_project_by_id($id);
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'sum'=>$sum
		);
		$this->load->view('successed',$data);
	}
	public function index(){//所有项目
		$total=$this->project_model->getTotal();
		$config['base_url'] = site_url("browse/index");
		$config['total_rows'] = $total;
		$config['per_page'] = 3; 
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['first_link'] = '首页';
		$config['last_link'] = '末页';
		// $config['num_links'] = 10;
		// $config['first_tag_open'] = '<div>';
		// $config['first_tag_close'] = '</div>';
		$this->pagination->initialize($config); 
		$startno=$this->uri->segment(3)==""? 0 : $this->uri->segment(3);
		$projects=$this->project_model->get_all_project($startno,$config['per_page']);
		$sum=$this->project_model->get_all_project_sum();
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'sum'=>$sum,
			);
		$this->load->view('all',$data);
	}
	public function order_by_start_time(){
		$projects=$this->project_model->get_all_project_order_by_start_time();
		$sum=$this->project_model->get_all_project_sum();
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'sum'=>$sum
		);
		$this->load->view('order_by_start_time',$data);
	}
	public function order_by_raise_money(){
		$projects=$this->project_model->get_all_project_order_by_raise_money();
		$sum=$this->project_model->get_all_project_sum();
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'sum'=>$sum
		);
		$this->load->view('order_by_raise_money',$data);
	}
	public function order_by_raised_money(){
		$projects=$this->project_model->get_all_project_order_by_raised_money();
		$sum=$this->project_model->get_all_project_sum();
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'sum'=>$sum
		);
		$this->load->view('order_by_raised_money',$data);
	}
	public function tech(){//科技类项目
		//$project_type=$this->project_model->get_type($index);
		//$type_name=$project_type[0]->pro_type_name;
		$projects=$this->project_model->get_hot_limit5(2);
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$tech_projects=$this->project_model->get_every_type_project(2);
		foreach($tech_projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'tech_projects'=>$tech_projects
		);
		//var_dump($type_name);
		//die;
		// switch($type_name){
			// case'科技': $this->load->view('tech',$data);
			// case'公益': $this->load->view('benefit',$data);
			// case'出版': $this->load->view('publish',$data);
			// case'娱乐': $this->load->view('entertainment',$data);
			// case'农业': $this->load->view('farm',$data);
			// case'艺术': $this->load->view('art',$data);
			// case'商铺': $this->load->view('store',$data);
			// case'其他': $this->load->view('others',$data);
		// }
		$this->load->view('tech',$data);
	}
	public function publish(){//出版类项目
		$projects=$this->project_model->get_hot_limit5('4');
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$tech_projects=$this->project_model->get_every_type_project('4');
		foreach($tech_projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'tech_projects'=>$tech_projects
		);
		//var_dump($data['projects']);
		//die;
		$this->load->view('publish',$data);
	}
	public function entertainment(){//娱乐类项目
		$projects=$this->project_model->get_hot_limit5('5');
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$tech_projects=$this->project_model->get_every_type_project('5');
		foreach($tech_projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'tech_projects'=>$tech_projects
		);
		//var_dump($data['projects']);
		//die;
		$this->load->view('entertainment',$data);
	}
	public function benefit(){//公益类项目
		$projects=$this->project_model->get_hot_limit5('3');
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$tech_projects=$this->project_model->get_every_type_project('3');
		foreach($tech_projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'tech_projects'=>$tech_projects
		);
		//var_dump($data['projects']);
		//die;
		$this->load->view('benefit',$data);
	}
	public function art(){//艺术类项目
		$projects=$this->project_model->get_hot_limit5('1');
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$tech_projects=$this->project_model->get_every_type_project('1');
		foreach($tech_projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'tech_projects'=>$tech_projects
		);
		//var_dump($data['projects']);
		//die;
		$this->load->view('art',$data);
	}
	public function farm(){//农业类项目
		$projects=$this->project_model->get_hot_limit5('6');
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$tech_projects=$this->project_model->get_every_type_project('6');
		foreach($tech_projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'tech_projects'=>$tech_projects
		);
		$this->load->view('farm',$data);
	}
	public function store(){//商铺类项目
		$projects=$this->project_model->get_hot_limit5('7');
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$tech_projects=$this->project_model->get_every_type_project('7');
		foreach($tech_projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'tech_projects'=>$tech_projects
		);
		$this->load->view('store',$data);
	}
	public function others(){//其他类项目
		$projects=$this->project_model->get_hot_limit5('8');
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$tech_projects=$this->project_model->get_every_type_project('8');
		foreach($tech_projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'tech_projects'=>$tech_projects
		);
		//var_dump($data['projects']);
		//die();
		$this->load->view('others',$data);
	}
	public function local(){//其他类项目
		$projects=$this->project_model->get_hot_limit5('9');
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$tech_projects=$this->project_model->get_every_type_project('9');
		foreach($tech_projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'tech_projects'=>$tech_projects
		);
		//var_dump($data['projects']);
		//die();
		$this->load->view('local',$data);
	}
	public function produce(){//其他类项目
		$projects=$this->project_model->get_hot_limit5('10');
		foreach($projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$tech_projects=$this->project_model->get_every_type_project('10');
		foreach($tech_projects as $project){
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project->project_id);
			$project -> like_sum = $this -> like_model -> get_like_sum($project->project_id);
		}
		$data = array(
			'projects' => $projects,
			'tech_projects'=>$tech_projects
		);
		//var_dump($data['projects']);
		//die();
		$this->load->view('produce',$data);
	}
	public function paging(){
			$total=$this->project_model->getTotal();
			$config['base_url'] = site_url("browse/paging");
			$config['total_rows'] = $total;
			$config['per_page'] = 10; 
			$config['next_link'] = '下一页';
			$config['prev_link'] = '上一页';
			$config['num_links'] = 10;
			$config['first_tag_open'] = '<div>';
			$config['first_tag_close'] = '</div>';
			$this->pagination->initialize($config); 
			$startno=$this->uri->segment(3)==""? 0 : $this->uri->segment(3);
			$data['booklist']=$this->mbook->getBookList($startno,$config['per_page']);
			$this->load->view("all",$data);
		}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
