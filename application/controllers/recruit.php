<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['lang'] = 1;//vietnamese
		//model
		$this->load->model('candidate_model');
		$this->load->model('location_model');
		$this->load->model('scale_model');
		$this->load->model('recruit_model');
		$this->load->model('account_model');
		$this->load->model('experience_model');
		$this->load->model('education_model');
		$this->load->model('career_model');
		$this->load->model('type_work_model');
		$this->load->model('wage_model');
		$this->load->model('rank_model');
		$this->load->model('target_model');
		$this->load->model('classify_model');
		$this->load->model('language_model');
		$this->load->model('certificate_model');
		$this->load->model('post_recruit_model');
	}
	public function index()
	{
		$data['career'] 		= $this->career_model->listCareerCountRecruit($this->data['lang']);
		$data['wage'] 			= $this->wage_model->listWage($this->data['lang']);
		$data['location'] 		= $this->location_model->listLocation($this->data['lang']);
		$data['experience'] 	= $this->experience_model->listExperience($this->data['lang']);
		$data['post_hot']  		= $this->post_recruit_model->listPostRecruitHot();
		$data['post_fast']  	= $this->post_recruit_model->listPostRecruitFast();
		//panigation
		$data['post_all']		= $this->post_recruit_model->listAll();
		//breadcrumb
		$data['breadcrum'] = [
			[
				'name'	=> 'Tuyển dụng',
			],
		];
		$data['title']		= "Tuyển dụng";
		$data['content']	= "recruit/recruit";
		$data['active']		= 'recruit';
		$this->load->view('index',$data);
	}

	public function detailRecruit($id,$job)
	{
		$data['info_all'] 		= $this->post_recruit_model->infoAll($id);
		//var_dump($data['info_all']);
		//breadcrumb
		$data['breadcrum'] = [
			[
				'name'	=> 'Tuyển dụng',
				'link'	=> base_url('tuyen-dung'),
			],
			[
				'name'	=> 'Nhân viên lập trình PHP',
			],
		];
		$data['title']		= "Tuyển dụng";
		$data['content']	= "recruit/detail_recruit";
		$data['active']		= 'recruit';
		$this->load->view('index',$data);
	}

}

/* End of file recruit.php */
/* Location: ./application/controllers/recruit.php */