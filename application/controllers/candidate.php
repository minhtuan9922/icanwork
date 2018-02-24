<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['lang'] = 1;//vietnamese
		$this->load->helper(array('form','url'));
		$this->load->helper('date');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->library('my_string');
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
	}
	public function index()
	{
		$data['candidate'] 		= $this->candidate_model->listAll();
		//hightlight
		$data['hightlight'] 	= $this->candidate_model->listCandidate(2);
		$data['location'] 		= $this->location_model->listLocation($this->data['lang']);
		$data['education'] 		= $this->education_model->listEducation($this->data['lang']);
		$data['experience'] 	= $this->experience_model->listExperience($this->data['lang']);
		$data['wage'] 			= $this->wage_model->listWage($this->data['lang']);
		$data['career'] 		= $this->career_model->listCareerCount($this->data['lang']);
		//breadcrumb
		$data['breadcrum'] = [
			[
				'name'	=> 'Ứng viên',
			],
		];
		$data['title']		= "Ứng viên";
		$data['content']	= "candidate/candidate";
		$data['active']		= 'candidate';
		$this->load->view('index',$data);
	}

	public function detailCandidate($id,$name)
	{
		$data['info'] = $this->candidate_model->infoCandidate($id);
		//condition
		if ($this->my_string->remove_vn_unicode(str_replace(" ","-",$data['info']['name'])) != $name || empty($data['info']))
		{
			redirect(base_url(''));
		}
		if (empty($data['info']['status_search']) && ($data['info']['account_email'] != $this->session->userdata('email')))
		{
			redirect(base_url(''));
		}
		if (empty($data['info']['status_profile']) && ($data['info']['account_email'] != $this->session->userdata('email')))
		{
			redirect(base_url(''));
		}
		//hightlight
		$data['hightlight'] 	= $this->candidate_model->listCandidate(2);
		$data['silimar']		= $this->candidate_model->candidateSilimar(explode(',',$data['info']['career']),explode(',',$data['info']['location']),$id);
		//data
		$data['location'] 		= $this->location_model->listLocation($this->data['lang']);
		$data['education'] 		= $this->education_model->listEducation($this->data['lang']);
		$data['experience'] 	= $this->experience_model->listExperience($this->data['lang']);
		$data['wage'] 			= $this->wage_model->listWage($this->data['lang']);
		$data['career'] 		= $this->career_model->listCareer($this->data['lang']);
		$data['type_work'] 		= $this->type_work_model->listTypeWork($this->data['lang']);
		$data['rank'] 			= $this->rank_model->listRank($this->data['lang']);
		$data['target'] 		= $this->target_model->listTarget($this->data['lang']);
		$data['classify'] 		= $this->classify_model->listClassify($this->data['lang']);
		$data['language'] 		= $this->language_model->listLanguage($this->data['lang']);
		$data['certificate'] 	= $this->certificate_model->listCertificate($this->data['lang']);
		//breadcrumb
		$data['breadcrum'] = [
			[
				'name'	=> 'Ứng viên',
				'link'	=> base_url('candidate'),
			],
			[
				'name'	=> $data['info']['name'],
			],
		];
		$data['title']		= "Chi tiết ứng viên";
		$data['content']	= "candidate/detail_candidate";
		$data['active']		= '';
		$this->load->view('index',$data);
	}

}

/* End of file candidate.php */
/* Location: ./application/controllers/candidate.php */