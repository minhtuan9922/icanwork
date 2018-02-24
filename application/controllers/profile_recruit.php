<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_recruit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
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
		$this->load->model('post_recruit_model');
		//not session email them redirect
		if (!$this->session->userdata('email'))
		{
			redirect(base_url('login/2'));
		}
		if ($this->session->userdata('type') == 1) //candidate redirect
		{
			redirect(base_url(''));
		}
	}

	public function infoRecruit()
	{
		$this->data['title']	= "Thông tin nhà tuyển dụng";
		$this->data['content']	= "profile/info_recruit";
		$this->data['user_active']	= '';
		$this->load->view('index',$this->data);
	}

	public function managementRecruit()
	{
		//echo $this->config->item('number_recruit'); 
		//data
		$data['recruit']			 = $this->recruit_model->infoRecruitALL($this->session->userdata('email'));
		$data['post_recruit']		 = $this->post_recruit_model->listPostRecruitId($data['recruit']['recruit_id']);
		//breadcrumb
		$data['breadcrum'] = [
			[
				'name'	=> 'Quản lý tuyển dụng',
			],
		];
		$data['title']	= "Quản lý tuyển dụng";
		$data['content']	= "profile/management_recruit";
		$data['user_active']	= 'management_recruit';
		$this->load->view('index',$data);
	}

	public function profileSave()
	{
		$this->data['title']	= "Hồ sơ đã lưu";
		$this->data['content']	= "profile/profile_save";
		$this->data['user_active']	= '';
		$this->load->view('index',$this->data);
	}

	public function profileApplication()
	{
		$this->data['title']		= "Hồ sơ ứng tuyển";
		$this->data['content']		= "profile/profile_application";
		$this->data['user_active']	= '';
		$this->load->view('index',$this->data);
	}

	public function postNewRecruit()
	{
		//data
		$data['location'] 		= $this->location_model->listLocation($this->data['lang']);
		$data['education'] 		= $this->education_model->listEducation($this->data['lang']);
		$data['experience'] 	= $this->experience_model->listExperience($this->data['lang']);
		$data['wage'] 			= $this->wage_model->listWage($this->data['lang']);
		$data['career'] 		= $this->career_model->listCareer($this->data['lang']);
		$data['type_work'] 		= $this->type_work_model->listTypeWork($this->data['lang']);
		$data['rank'] 			= $this->rank_model->listRank($this->data['lang']);
		$data['language'] 		= $this->language_model->listLanguage($this->data['lang']);
		$data['recruit']		= $this->recruit_model->infoRecruitALL($this->session->userdata('email'));
		//post recruit
		if ($this->input->post())
		{
			$this->form_validation->set_error_delimiters('<div name="error" class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
			if ($this->form_validation->run('post_recruit') == FALSE)
			{
				$data['validation'] = true;
				echo '<script>alert("Dữ liệu nhập không hợp lệ")</script>';
			}
			else 
			{
				$user_contact = [
					'email_contact'		=> $this->input->post('email_contact'),
					'name_contact'		=> $this->input->post('name_contact'),
					'phone_contact'		=> $this->input->post('phone_contact'),
				];
				$fields = [
					'recruit_id'				=> $data['recruit']['recruit_id'],
					'job'						=> $this->input->post('vacancies'),
					'number'					=> $this->input->post('number'),
					'rank'						=> $this->input->post('rank'),
					'type_work'					=> implode(",",$this->input->post('type_work')),
					'wage'						=> $this->input->post('wage'),
					'percent'					=> $this->input->post('percent'),
					'experience'				=> $this->input->post('exp'),
					'literacy'					=> $this->input->post('certificate'),
					'gender'					=> $this->input->post('gender'),
					'location'					=> implode(",",$this->input->post('location')),
					'career'					=> $this->input->post('career'),
					'description'				=> $this->input->post('description'),
					'interest'					=> $this->input->post('interest'),
					'requirement_job'			=> $this->input->post('requirement_job'),
					'date_deadline'				=> $this->input->post('deadline'),
					'language_profile'			=> $this->input->post('language'),
					'user_contact_post_json'	=> json_encode($user_contact,JSON_UNESCAPED_UNICODE),
					'date_update'				=> date("Y-m-d H:i:s",now()),
					'status'					=> '0'
				];
				$insert = $this->post_recruit_model->insert($fields);
				if ($insert == true)
				{
					echo '<script>alert("success")</script>';
				} else {
					echo '<script>alert("fail")</script>';
				}
			}
		}
		//breadcrumb
		$data['breadcrum'] 		= [
			[
				'name'	=> 'Quản lý tuyển dụng',
				'link'	=> base_url('quan-ly-tuyen-dung'),
			],
			[
				'name'	=> 'Đăng tuyển dụng',
			],
		];
		$data['title']			= "Đăng tuyển dụng";
		$data['content']		= "profile/post_recruit";
		$data['user_active']	= '';
		$this->load->view('index',$data);
	}

	public function postEditRecruit($id)
	{
		$data['location'] 		= $this->location_model->listLocation($this->data['lang']);
		$data['education'] 		= $this->education_model->listEducation($this->data['lang']);
		$data['experience'] 	= $this->experience_model->listExperience($this->data['lang']);
		$data['wage'] 			= $this->wage_model->listWage($this->data['lang']);
		$data['career'] 		= $this->career_model->listCareer($this->data['lang']);
		$data['type_work'] 		= $this->type_work_model->listTypeWork($this->data['lang']);
		$data['rank'] 			= $this->rank_model->listRank($this->data['lang']);
		$data['language'] 		= $this->language_model->listLanguage($this->data['lang']);
		$data['post_recruit']	= $this->post_recruit_model->infoPostRecruit($id);
		if ($this->input->post())
		{
			$this->form_validation->set_error_delimiters('<div name="error" class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
			if ($this->form_validation->run('post_recruit') == FALSE)
			{
				$data['validation'] = true;
				echo '<script>alert("Dữ liệu nhập không hợp lệ")</script>';
			}
			else
			{
				$user_contact = [
					'email_contact'		=> $this->input->post('email_contact'),
					'name_contact'		=> $this->input->post('name_contact'),
					'phone_contact'		=> $this->input->post('phone_contact'),
				];
				$fields = [
					'job'						=> $this->input->post('vacancies'),
					'number'					=> $this->input->post('number'),
					'rank'						=> $this->input->post('rank'),
					'type_work'					=> implode(",",$this->input->post('type_work')),
					'wage'						=> $this->input->post('wage'),
					'percent'					=> $this->input->post('percent'),
					'experience'				=> $this->input->post('exp'),
					'literacy'					=> $this->input->post('certificate'),
					'gender'					=> $this->input->post('gender'),
					'location'					=> implode(",",$this->input->post('location')),
					'career'					=> $this->input->post('career'),
					'description'				=> $this->input->post('description'),
					'interest'					=> $this->input->post('interest'),
					'requirement_job'			=> $this->input->post('requirement_job'),
					'date_deadline'				=> $this->input->post('deadline'),
					'language_profile'			=> $this->input->post('language'),
					'user_contact_post_json'	=> json_encode($user_contact,JSON_UNESCAPED_UNICODE),
					'date_update'				=> date("Y-m-d H:i:s",now()),
					'status'					=> $data['post_recruit']['status'],
				];
				$update = $this->post_recruit_model->update($id,$fields);
				if ($update == true)
				{
					$this->session->set_flashdata('success',true);
					redirect(current_url());
				} 
			}
		}
		if ($this->session->flashdata('success') == true)
		{
			echo '<script>alert("Cập nhật thành công")</script>';
		}
		//breadcrum
		$data['breadcrum'] 		= [
			[
				'name'	=> 'Quản lý tuyển dụng',
				'link'	=> base_url('quan-ly-tuyen-dung'),
			],
			[
				'name'	=> 'Sửa tuyển dụng',
			],
			[
				'name'	=> $data['post_recruit']['job'],
			],
		];
		//view
		$data['title']			= "Sửa tuyển dụng";
		$data['content']		= "profile/post_edit_recruit";
		$data['user_active']	= '';
		$this->load->view('index',$data);
	}

	function is_vaild_date($date)
	{
		return $this->my_string->isVaildDate($date);
	}
	/*function greater_equar_date($date)
	{

	}*/
	function select_type_work($arr)
	{
		$n		=count($this->input->post('type_work'));
		if ($n > 2)
		{
			 $this->form_validation->set_message('select_type_work', " type work can not select than 2 ");
			 return false;
		} else {
			return true;
		}
	}

	function select_location($arr)
	{
		$n		=count($this->input->post('location'));
		if ($n > 2)
		{
			 $this->form_validation->set_message('select_location', " Place can not select than 2 ");
			 return false;
		} else {
			return true;
		}
	}

}

/* End of file profile_recruit.php */
/* Location: ./application/controllers/profile_recruit.php */