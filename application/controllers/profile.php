<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
		//not session email them redirect
		if (!$this->session->userdata('email'))
		{
			redirect(base_url('login/1'));
		}
		if ($this->session->userdata('type') == 2)
		{
			redirect(base_url(''));
		}
	}
	public function index()
	{
		$this->data['title']	= "Cá nhân";
		$this->data['content']	= "home";
		$this->data['active']	= 'home';
		$this->load->view('index',$this->data);	
	}

	public function userInfo()
	{
		//breadcrumb
		$this->data['breadcrum'] = [
			[
				'name'	=> 'Thông tin cá nhân',
				//'link'	=> base_url('register/'.$this->data['type']),
			],
		];
		//info personal
		$this->data['info'] = $this->candidate_model->infoPersonal($this->session->userdata('email'));
		$this->data['location'] = $this->location_model->listLocation($this->data['lang']);
		if ($this->input->post())
		{
			//validation
			$this->form_validation->set_error_delimiters('<div class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
			if ($this->form_validation->run('update_candidate') == FALSE)
			{
				echo '<script>alert("Dữ liệu nhập không hợp lệ");</script>';
				$this->data['validation']	= true;
			}
			else 
			{
				//update img
				$path = '';
				$remove = false;
				if (isset($_FILES['img-user']) && !empty($_FILES['img-user']['name']) )
				{
					$config['upload_path']          = './asset/img/user';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['max_size']             = 1024;
					$config['file_name']            = $this->input->post('phone').rand(10000000,99999999);;
					$config['overwrite']            = TRUE;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if ($this->upload->do_upload('img-user'))
					{
						$remove = true;
						$data=$this->upload->data();
						$path='asset/img/user/'.$data['file_name'];
					} else {
						if (strlen($this->upload->display_errors()) == 64)
						{
							$this->data['error'] = 'Vui lòng chọn file gif|jpg|png|jpeg';
						}
						if (strlen($this->upload->display_errors()) == 79)
						{
							$this->data['error'] = 'Dung lượng file không quá 1 M';
						}
						$this->data['validation']	= true;
					}
				}
				if (!isset($this->data['validation']))
				{
					//remove img old if exist
					$img_old	= $this->data['info']['img'];
					if ($remove == true)
					{
						if (!empty($img_old))
						{
							unlink($img_old);
						}
					}
					if ($path == '')
					{
						$path = $img_old;
					}
					$data = [
						'name'			=> $this->input->post('name'),
						'phone'			=> $this->input->post('phone'),
						'gender'		=> $this->input->post('gender'),
						'birthday'		=> $this->input->post('birthday'),
						'marriage'		=> $this->input->post('marriage'),
						'address'		=> $this->input->post('address'),
						'img'			=> $path,
						'date_update'	=> date("Y-m-d H:i:s",now()),
					];
					$this->candidate_model->update($this->session->userdata('email'),$data);
					echo '<script>alert("Cập nhật thành công");</script>';
					redirect(base_url('account'),'refresh');
				}
			}
		}
		//change password
		if ($this->session->flashdata('error'))
		{
			echo '<script>alert("Mật khẩu không chính xác");</script>';
		}
		if ($this->session->flashdata('success'))
		{
			echo '<script>alert("Cập nhật thành công");</script>';
		}
		//view
		$this->data['title']	= "Tài khoản";
		$this->data['content']	= "profile/user_info";
		$this->data['user_active']	= 'account';
		$this->load->view('index',$this->data);
	}

	public function change_pass()
	{
		if ($this->input->post('change_pass'))
		{
			$this->form_validation->set_error_delimiters('<div class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
			if ($this->form_validation->run('change_password') == FALSE)
			{
				if (!empty(form_error('password_new')))
				{
					$this->session->set_flashdata('password_new', form_error('password_new'));
				}
				if (!empty(form_error('confrim_pass_new')))
				{
					$this->session->set_flashdata('confrim_pass_new', form_error('confrim_pass_new'));
				}
				redirect(base_url('account'));
			}
			else 
			{
				$hash = $this->account_model->password($this->session->userdata('email'),$this->session->userdata('type'));
				if ($this->my_string->verifyPasswrod($this->input->post('password'),$hash['password']))
				{
					$this->account_model->changePassword($this->session->userdata('email'),$this->my_string->hashPassword($this->input->post('password_new')));
					$this->session->set_flashdata('success',true);
					redirect(base_url('account'));
				} 
				else {
					$this->session->set_flashdata('error',true);
					redirect(base_url('account'));
				}
			}
		} else {
			redirect(base_url('account'));
		}
	}

	public function suitableJob()
	{
		$this->data['title']	= "Việc làm phù hợp";
		$this->data['content']	= "profile/suitable_job";
		$this->data['user_active']	= 'job';
		$this->load->view('index',$this->data);
	}

	public function managementProfile()
	{
		//breadcrumb
		$this->data['breadcrum'] = [
			[
				'name'	=> 'Quản lý hồ sơ',
			],
		];
		//message update file
		if ($this->session->flashdata('update_file') == true)
		{
			echo '<script>alert("Cập nhật file đính kèm thành công");</script>';
		}
		if ($this->session->flashdata('file_exist') == true)
		{
			echo '<script>alert("Mỗi tài khoản chỉ có 1 file đính kèm");</script>';
		}
		$this->data['info']			= $this->candidate_model->infoAll($this->session->userdata('email'));
		$this->data['rank'] 		= $this->rank_model->listRank($this->data['lang']);
		//view
		$this->data['title']		= "Quản lý hồ sơ";
		$this->data['content']		= "profile/management_profile";
		$this->data['user_active']	= 'profile';
		$this->load->view('index',$this->data);
	}

	public function jobSave()
	{
		$this->data['title']	= "Công việc đã lưu";
		$this->data['content']	= "profile/job_save";
		$this->data['user_active']	= 'save';
		$this->load->view('index',$this->data);
	}

	public function jobApplication()
	{
		$this->data['title']	= "Công việc đã ứng tuyển";
		$this->data['content']	= "profile/job_application";
		$this->data['user_active']	= 'application';
		$this->load->view('index',$this->data);
	}

	public function notification()
	{
		$this->data['title']	= "Cấu hình thông báo";
		$this->data['content']	= "profile/setting_notification";
		$this->data['user_active']	= 'notification';
		$this->load->view('index',$this->data);
	}

	public function personal()
	{
		//breadcrumb
		$this->data['breadcrum'] = [
			[
				'name'	=> 'Quản lý hồ sơ',
				'link'	=> base_url('quan-ly-ho-so'),
			],
			[
				'name'	=> 'Hồ sơ cá nhân',
			],
		];
		//info personal
		$this->data['info']			= $this->candidate_model->infoAll($this->session->userdata('email'));
		$this->data['location'] 	= $this->location_model->listLocation($this->data['lang']);
		$this->data['education'] 	= $this->education_model->listEducation($this->data['lang']);
		$this->data['experience'] 	= $this->experience_model->listExperience($this->data['lang']);
		$this->data['wage'] 		= $this->wage_model->listWage($this->data['lang']);
		$this->data['career'] 		= $this->career_model->listCareer($this->data['lang']);
		$this->data['type_work'] 	= $this->type_work_model->listTypeWork($this->data['lang']);
		$this->data['rank'] 		= $this->rank_model->listRank($this->data['lang']);
		$this->data['target'] 		= $this->target_model->listTarget($this->data['lang']);
		$this->data['classify'] 	= $this->classify_model->listClassify($this->data['lang']);
		$this->data['language'] 	= $this->language_model->listLanguage($this->data['lang']);
		$this->data['certificate'] 	= $this->certificate_model->listCertificate($this->data['lang']);
		//view
		$this->data['show']			= true;
		$this->data['title']		= "Hồ sơ cá nhân";
		$this->data['content']		= "profile/personal";
		$this->data['user_active']	= 'personal';
		$this->load->view('index',$this->data);
	}


	//callback validation
	function is_future_date($date)
	{
		return $this->my_string->isFutureDate($date);
	}

	function is_vaild_date($date)
	{
		return $this->my_string->isVaildDate($date);
	}
	//end callback validation
	public function fileCV()
	{
		$this->data['info']			= $this->candidate_model->infoSelect($this->session->userdata('email'),'file_name');
		if (!empty($this->data['info']['file_name']))
		{
			$this->session->set_flashdata('file_exist',true);
			$this->my_string->redriectBack();
		}
		//update
		if ($this->input->post())
		{
			$this->form_validation->set_error_delimiters('<div class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
			if ($this->form_validation->run('file_candidate') == FALSE)
			{
				echo '<script>alert("Dữ liệu nhập không hợp lệ");</script>';
				$this->data['validation']	= true;
			}
			else 
			{
				$name = $this->my_string->remove_vn_unicode(str_replace(" ","_",$this->input->post('file_name'))).'_'.rand(10000,99999); 
				$config['upload_path']          = './asset/file/cv';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 1024*5; //5M
				$config['file_name']            = $name;
				$config['overwrite']            = TRUE;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('file_cv'))
				{
					//upload
					$data_file=$this->upload->data();
					$path = 'asset/file/cv/'.$name.$data_file['file_ext'];
					$data = [
								'file_name' 				=> $this->input->post('file_name'),
								'file_path'					=> $path,
								'date_file_update'			=> date("Y-m-d H:i:s",now()),
							];
					$update = $this->candidate_model->update($this->session->userdata('email'),$data);
					if ($update == TRUE)
					{
						$this->session->set_flashdata('update_file',true);
						redirect(base_url('quan-ly-ho-so'));
					}
				} else {
					echo $this->upload->display_errors();
					if (strlen($this->upload->display_errors()) == 64)
					{
						$this->data['error'] = 'Vui lòng chọn file pdf';
					}
					if (strlen($this->upload->display_errors()) == 79)
					{
						$this->data['error'] = 'Kích thước không quá 5M';
					}
				}
			}
		}
		//breadcrumb
		$this->data['breadcrum'] = [
			[
				'name'	=> 'Quản lý hồ sơ',
				'link'	=> base_url('quan-ly-ho-so'),
			],
			[
				'name'	=> 'Đính kèm file máy tính',
			],
		];
		//view
		$this->data['title']		= "Đính kèm file";
		$this->data['content']		= "profile/file";
		$this->data['user_active']	= 'personal';
		$this->load->view('index',$this->data);
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */