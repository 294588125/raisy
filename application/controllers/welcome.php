<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//header('Content-type:text/html');
		$this->load->model('user_model');
		$this->load->model('project_model');
		$this->load->model('support_type_model');
		$this->load->model('like_model');
		$this->load->model('comment_model');
		$this->load->model('support_model');
	}

	public function index()
	{
		
		// public function show_product(){
		$projects = $this->project_model->get_all_hot_tech();
		foreach($projects as $project){
			$project -> like_sum = $this -> like_model -> get_like_sum($project -> project_id);
			$project -> comment_sum = $this -> comment_model -> get_comment_sum($project -> project_id);
		}
		$sciences = $this->project_model->get_hot_limit5(2);
		foreach($sciences as $science){
			$science -> like_sum = $this -> like_model -> get_like_sum($science -> project_id);
			$science -> comment_sum = $this -> comment_model -> get_comment_sum($science -> project_id);
		}
		$gongyis = $this->project_model->get_hot_limit5(4);
		foreach($gongyis as $gongyi){
			$gongyi -> like_sum = $this -> like_model -> get_like_sum($gongyi -> project_id);
			$gongyi -> comment_sum = $this -> comment_model -> get_comment_sum($gongyi -> project_id);
		}
		$publishs = $this->project_model->get_hot_limit5(6);
		foreach($publishs as $publish){
			$publish -> like_sum = $this -> like_model -> get_like_sum($publish -> project_id);
			$publish -> comment_sum = $this -> comment_model -> get_comment_sum($publish -> project_id);
		}
		$entertainments = $this->project_model->get_hot_limit5(5);
		foreach($entertainments as $entertainment){
			$entertainment -> like_sum = $this -> like_model -> get_like_sum($entertainment -> project_id);
			$entertainment -> comment_sum = $this -> comment_model -> get_comment_sum($entertainment -> project_id);
		}
		$arts = $this->project_model->get_hot_limit5(1);
		foreach($arts as $art){
			$art -> like_sum = $this -> like_model -> get_like_sum($art -> project_id);
			$art -> comment_sum = $this -> comment_model -> get_comment_sum($art -> project_id);
		}
		$farms = $this->project_model->get_hot_limit5(3);
		foreach($farms as $farm){
			$farm -> like_sum = $this -> like_model -> get_like_sum($farm -> project_id);
			$farm -> comment_sum = $this -> comment_model -> get_comment_sum($farm -> project_id);
		}
		
		$num=$this->project_model->get_project_sum();
		$supportnum=$this->support_model->get_support_sum();
		$supportmoney=$this->support_model->get_support_money_sum();
		$success=$this->project_model->get_success();
		// foreach ($success as $succes) {
			// $succes->raised_money=$this->project_model->get_raised_money($succes-> project_id);
		// }
		$data=array(
			'projects'=>$projects,
			'sciences'=>$sciences,
			'gongyis'=>$gongyis,
			'publishs'=>$publishs,
			'entertainments'=>$entertainments,
			'arts'=>$arts,
			'farms'=>$farms,
			'num'=>$num,
			'supportnum'=>$supportnum,
			'supportmoney'=>$supportmoney,
			'success'=>$success
		);
		
		$this->load->view('index',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */