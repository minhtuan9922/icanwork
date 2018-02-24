<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

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
		$this->load->model('certificate_model');
		$this->load->model('post_recruit_model');
	}

	public function infoGeneral()
	{
		if ($this->input->post())
		{
			$result = [];
			$this->form_validation->set_error_delimiters('<div name="error" class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
			if ($this->form_validation->run('info_general') == FALSE)
			{
				$result['validation'] = false;
				//show error validator
				foreach ($_POST as $key => $value) 
				{
					if ($key == 'general_career' || $key == 'general_type_work' || $key == 'general_place')
					{
						$result['errors'][$key] = form_error($key.'[]');
					} 
					else 
					{
						$result['errors'][$key] = form_error($key);
					}
            	}
			}
			else 
			{
            	//update
            	$data = [
					'title'				=> $this->my_string->remove_html_php($this->input->post('general_title')),
					'literacy'			=> $this->input->post('general_edu'),
					'experience'		=> $this->input->post('general_exp'),
					'career'			=> implode(",",$this->input->post('general_career')),
					'location'			=> implode(",",$this->input->post('general_place')),
					'type_work'			=> implode(",",$this->input->post('general_type_work')),
					'rank'				=> $this->input->post('general_rank'),
					'wage'				=> $this->input->post('general_wage'),
					'date_update'		=> date("Y-m-d H:i:s",now()),
				];
				$update = $this->candidate_model->update($this->session->userdata('email'),$data);
				if ($update == 1)
				{
					$result['successful'] = true;
					ob_start();
					$this->data['info']	  = $this->candidate_model->infoAll($this->session->userdata('email'));
					$this->data['location'] 	= $this->location_model->listLocation($this->data['lang']);
					$this->data['education'] 	= $this->education_model->listEducation($this->data['lang']);
					$this->data['experience'] 	= $this->experience_model->listExperience($this->data['lang']);
					$this->data['wage'] 		= $this->wage_model->listWage($this->data['lang']);
					$this->data['career'] 		= $this->career_model->listCareer($this->data['lang']);
					$this->data['type_work'] 	= $this->type_work_model->listTypeWork($this->data['lang']);
					$this->data['rank'] 		= $this->rank_model->listRank($this->data['lang']);
					$this->load->view('profile/personal/text_general',$this->data);
					$result['html_general'] 	= ob_get_contents();
					ob_end_clean();
				} else {
					$result['successful'] = false;
				}
			}
			echo json_encode($result);
		}
	}

	public function select_career($arr)
	{
		$n		=count($this->input->post('general_career'));
		if ($n > 3)
		{
			 $this->form_validation->set_message('select_career', " career can not select than 3 ");
			 return false;
		} else {
			return true;
		}
	}

	public function select_type_work($arr)
	{
		$n		=count($this->input->post('general_type_work'));
		if ($n > 2)
		{
			 $this->form_validation->set_message('select_type_work', " type work can not select than 2 ");
			 return false;
		} else {
			return true;
		}
	}

	public function select_place($arr)
	{
		$n		=count($this->input->post('general_place'));
		if ($n > 2)
		{
			 $this->form_validation->set_message('select_place', " Place can not select than 2 ");
			 return false;
		} else {
			return true;
		}
	}

	public function target()
	{
		if ($this->input->post())
		{
			$result = [];
			$checkbox 	= $this->input->post('checkbox');
			$area_target = $this->my_string->conver_htmlentities($this->input->post('area_target'));
			if ($area_target != '')
			{
				if (strlen($area_target) < 50)
				{
					$result['min_length'] = false; 
					return;
				}
			}
			if (count($checkbox) == 0 && $area_target == '')
			{
				$result['validation'] = false; 
				return;
			} 
			else 
			{
				$target = '';
				if ($checkbox == null)
				{
					$target = $area_target;
				}
				else
				{
					if ($area_target != '')
					{
						$target = implode('%^&*',$checkbox)."%^&*".$area_target;
					} else {
						$target = implode('%^&*',$checkbox);
					}
				}
				$data = [
					'target'			=> $target,
					'date_update'		=> date("Y-m-d H:i:s",now()),
				];
				$update = $this->candidate_model->update($this->session->userdata('email'),$data);
				if ($update == 1)
				{
					$result['successful'] = true;
					ob_start();
					$this->data['info']	  		= $this->candidate_model->infoSelect($this->session->userdata('email'),'target');
					$this->data['target'] 		= $this->target_model->listTarget($this->data['lang']);
					$this->load->view('profile/personal/text_target',$this->data);
					$result['html_target'] 	= ob_get_contents();
					ob_end_clean();
				} else {
					$result['successful'] = false;
				}
			}
			echo json_encode($result);
		}
	}
	/**
	 * [education description]
	 * one profile only add max 3 education
	 * @return [json] [description]
	 */
	public function education()
	{
		if ($this->input->post())
		{
			$result = [];
			$this->form_validation->set_error_delimiters('<div name="error" class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
			if ($this->form_validation->run('education') == FALSE)
			{
				$result['validation'] = false;
				//show error validator
				foreach ($_POST as $key => $value) 
				{
					$result['errors'][$key] = form_error($key);
            	}
			}
			else 
			{
				$json_education	= json_decode($this->candidate_model->infoSelect($this->session->userdata('email'),'education_json')['education_json']);
				$bool = false;
				if ($this->input->post('id') == 1)
				{
					//insert
					$n = count($json_education);
					if ($n < 3)
					{
						if ($json_education == null)
						{
							$json_education[] = 	
							[
								'id'				=> rand(1,9999),
								'school'			=> $this->input->post('school'),
								'specialized'		=> $this->input->post('specialized'),
								'classify'			=> $this->input->post('classify'),
								'edu_begin'			=> $this->input->post('edu_begin'),
								'edu_end'			=> $this->input->post('edu_end'),
							];
						}
						else 
						{
							$json_education_next = 
							[
								'id'				=> rand(1,9999),
								'school'			=> $this->input->post('school'),
								'specialized'		=> $this->input->post('specialized'),
								'classify'			=> $this->input->post('classify'),
								'edu_begin'			=> $this->input->post('edu_begin'),
								'edu_end'			=> $this->input->post('edu_end'),
							];
							array_push($json_education,$json_education_next);
						}
						$data = [
							'education_json'		=> json_encode($json_education,JSON_UNESCAPED_UNICODE),
							'date_update'			=> date("Y-m-d H:i:s",now()),
						];
						$update = $this->candidate_model->update($this->session->userdata('email'),$data);
						if ($update == 1)
						{
							$bool = true;
						}
					}
					else
					{
						$result['max_education'] = true;
					}
				}
				else
				{
					//edit
					foreach ($json_education as $k => $val)
					{
						if ($val->id == $this->input->post('id',TRUE))
						{
							$val->id 			= $this->input->post('id');
							$val->school 		= $this->input->post('school');
							$val->specialized 	= $this->input->post('specialized');
							$val->classify 		= $this->input->post('classify');
							$val->edu_begin 	= $this->input->post('edu_begin');
							$val->edu_end 		= $this->input->post('edu_end');
							break;		
						}
					}
					$data = [
						'education_json'		=> json_encode($json_education,JSON_UNESCAPED_UNICODE),
						'date_update'			=> date("Y-m-d H:i:s",now()),
					];
					$update = $this->candidate_model->update($this->session->userdata('email'),$data);
					if ($update == 1)
					{
						$bool = true;
					}	
				}
				if ($bool == true)
				{
					$result['successful']	= true;
					$this->data['info']	= $this->candidate_model->infoSelect($this->session->userdata('email'),'education_json');
					$this->data['classify'] 	= $this->classify_model->listClassify($this->data['lang']);
					ob_start();
					$this->load->view('profile/personal/text_education',$this->data);
					$result['html_education'] 	= ob_get_contents();
					ob_end_clean();
				}
			}
			echo json_encode($result);
		}
	}

	public function deleteEducation()
	{
		if (!empty($this->input->post('id')))
		{
			$result = [];
			$json_education	= json_decode($this->candidate_model->infoSelect($this->session->userdata('email'),'education_json')['education_json']);
			$arr = [];
			foreach ($json_education as $k => $val)
			{
				if ($val->id != $this->input->post('id'))
				{
					array_push($arr,$val);
				}
			}
			$data = [
				'education_json'		=> json_encode($arr,JSON_UNESCAPED_UNICODE),
				'date_update'			=> date("Y-m-d H:i:s",now()),
			];
			$update = $this->candidate_model->update($this->session->userdata('email'),$data);
			if ($update == 1)
			{
				$result['successful'] = true;
			}
			echo json_encode($result);
		} 
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
	function check_date_end($date)
	{
		$d1 = $this->input->post('edu_begin');
		$d2 = $this->input->post('edu_end');
		if ($d1 == null || $d1 == '' )
		{
			$d1 = $this->input->post('time_start');
			$d2 = $this->input->post('time_end');
		}
		if (strtotime($d1) > strtotime($d2))
		{
			$this->form_validation->set_message('check_date_end', 'date end than date strat');
			return false;
		}
		else 
		{
			return true;
		}
	}
	//end callback validation
	//
	public function language()
	{
		if ($this->input->post())
		{
			$result = [];
			$this->form_validation->set_error_delimiters('<div name="error" class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
			if ($this->form_validation->run('language') == FALSE)
			{
				$result['validation'] = false;
				//show error validator
				foreach ($_POST as $key => $value) 
				{
					$result['errors'][$key] = form_error($key);
            	}
			}
			else 
			{
				$bool = false;
				$json_language	= json_decode($this->candidate_model->infoSelect($this->session->userdata('email'),'language_json')['language_json']);
				if ($this->input->post('id') == 1)
				{
					//insert
					$n = count($json_language);
					if ($n < 5)
					{
						if ($json_language == null)
						{
							$json_language[] = 	
							[
								'id'				=> rand(1,9999),
								'language'			=> $this->input->post('select_lang'),
								'certificate'		=> $this->input->post('select_cer'),
								'point'				=> $this->input->post('point'),
							];
						}
						else 
						{
							$json_language_next = 
							[
								'id'				=> rand(1,9999),
								'language'			=> $this->input->post('select_lang'),
								'certificate'		=> $this->input->post('select_cer'),
								'point'				=> $this->input->post('point'),
							];
							array_push($json_language,$json_language_next);
						}
						$data = [
							'language_json'			=> json_encode($json_language,JSON_UNESCAPED_UNICODE),
							'date_update'			=> date("Y-m-d H:i:s",now()),
						];
						$update = $this->candidate_model->update($this->session->userdata('email'),$data);
						if ($update == 1)
						{
							$bool = true;
						}
					}
					else
					{
						$result['max_language'] = true;
					}
				}
				else 
				{
					//edit
					foreach ($json_language as $k => $val)
					{
						if ($val->id == $this->input->post('id',TRUE))
						{
							$val->id 			= $this->input->post('id');
							$val->language 		= $this->input->post('select_lang');
							$val->certificate 	= $this->input->post('select_cer');
							$val->point 		= $this->input->post('point');
							break;		
						}
					}
					$data = [
						'language_json'			=> json_encode($json_language,JSON_UNESCAPED_UNICODE),
						'date_update'			=> date("Y-m-d H:i:s",now()),
					];
					$update = $this->candidate_model->update($this->session->userdata('email'),$data);
					if ($update == 1)
					{
						$bool = true;
					}
				}
				if ($bool == true)
				{
					$result['successful']		= true;
					$this->data['info']			= $this->candidate_model->infoSelect($this->session->userdata('email'),'language_json');
					$this->data['certificate'] 	= $this->certificate_model->listCertificate($this->data['lang']);
					ob_start();
					$this->load->view('profile/personal/text_language',$this->data);
					$result['html_language'] 	= ob_get_contents();
					ob_end_clean();
				}
			}
			echo json_encode($result);
		}
	}

	public function deleteLanguage()
	{
		if (!empty($this->input->post('id')))
		{
			$result = [];
			$json_language	= json_decode($this->candidate_model->infoSelect($this->session->userdata('email'),'language_json')['language_json']);
			$arr = [];
			foreach ($json_language as $k => $val)
			{
				if ($val->id != $this->input->post('id'))
				{
					array_push($arr,$val);
				}
			}
			$data = [
				'language_json'			=> json_encode($arr,JSON_UNESCAPED_UNICODE),
				'date_update'			=> date("Y-m-d H:i:s",now()),
			];
			$update = $this->candidate_model->update($this->session->userdata('email'),$data);
			if ($update == 1)
			{
				$result['successful'] = true;
			}
			echo json_encode($result);
		}
	}

	public function workExperience()
	{
		if ($this->input->post())
		{
			$result = [];
			$this->form_validation->set_error_delimiters('<div name="error" class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
			if ($this->form_validation->run('work_exp') == FALSE)
			{
				$result['validation'] = false;
				//show error validator
				foreach ($_POST as $key => $value) 
				{
					$result['errors'][$key] = form_error($key);
            	}
			}
			else
			{
				$bool = false;
				$json_work_exp	= json_decode($this->candidate_model->infoSelect($this->session->userdata('email'),'work_experience_json')['work_experience_json']);
				if ($this->input->post('id') == 1)
				{
					//insert
					$n = count($json_work_exp);
					if ($n < 3)
					{
						if ($json_work_exp == null)
						{
							$json_work_exp[] = 	
							[
								'id'				=> rand(100,9999),
								'name_company'		=> $this->input->post('name_company'),
								'office'			=> $this->input->post('office'),
								'num_wage'			=> $this->input->post('num_wage'),
								'currency'			=> $this->input->post('currency'),
								'time_start'		=> $this->input->post('time_start'),
								'time_end'			=> $this->input->post('time_end'),
								'description'		=> $this->input->post('des_job'),
							];
						}
						else 
						{
							$json_work_exp_next = 
							[
								'id'				=> rand(100,9999),
								'name_company'		=> $this->input->post('name_company'),
								'office'			=> $this->input->post('office'),
								'num_wage'			=> $this->input->post('num_wage'),
								'currency'			=> $this->input->post('currency'),
								'time_start'		=> $this->input->post('time_start'),
								'time_end'			=> $this->input->post('time_end'),
								'description'		=> $this->input->post('des_job'),
							];
							array_push($json_work_exp,$json_work_exp_next);
						}
						$data = [
							'work_experience_json'		=> json_encode($json_work_exp,JSON_UNESCAPED_UNICODE),
							'date_update'				=> date("Y-m-d H:i:s",now()),
						];
						$update = $this->candidate_model->update($this->session->userdata('email'),$data);
						if ($update == 1)
						{
							$bool = true;
						}
					}
					else
					{
						$result['max_work_exp'] = true;
					}
				}
				else 
				{
					//edit
					foreach ($json_work_exp as $k => $val)
					{
						if ($val->id == $this->input->post('id',TRUE))
						{
							$val->id 				= $this->input->post('id');
							$val->name_company 		= $this->input->post('name_company');
							$val->office 			= $this->input->post('office');
							$val->num_wage 			= $this->input->post('num_wage');
							$val->currency 			= $this->input->post('currency');
							$val->time_start 		= $this->input->post('time_start');
							$val->time_end 			= $this->input->post('time_end');
							$val->description 		= $this->input->post('des_job');
							break;		
						}
					}
					$data = [
						'work_experience_json'			=> json_encode($json_work_exp,JSON_UNESCAPED_UNICODE),
						'date_update'					=> date("Y-m-d H:i:s",now()),
					];
					$update = $this->candidate_model->update($this->session->userdata('email'),$data);
					if ($update == 1)
					{
						$bool = true;
					}
				}
				if ($bool == true)
				{
					$result['successful']		= true;
					$this->data['info']			= $this->candidate_model->infoSelect($this->session->userdata('email'),'work_experience_json');
					ob_start();
					$this->load->view('profile/personal/text_exp_job',$this->data);
					$result['html_work_exp'] 	= ob_get_contents();
					ob_end_clean();
				}
			}
			echo json_encode($result);
		}
	}

	public function deleteWorkExp()
	{
		if (!empty($this->input->post('id')))
		{
			$result = [];
			$json_work_exp	= json_decode($this->candidate_model->infoSelect($this->session->userdata('email'),'work_experience_json')['work_experience_json']);
			$arr = [];
			foreach ($json_work_exp as $k => $val)
			{
				if ($val->id != $this->input->post('id'))
				{
					array_push($arr,$val);
				}
			}
			$data = [
				'work_experience_json'			=> json_encode($arr,JSON_UNESCAPED_UNICODE),
				'date_update'					=> date("Y-m-d H:i:s",now()),
			];
			$update = $this->candidate_model->update($this->session->userdata('email'),$data);
			if ($update == 1)
			{
				$result['successful'] = true;
			}
			echo json_encode($result);
		}
	}

	public function refresh()
	{
		if ($this->input->get())
		{
			$data = [
				'date_update'					=> date("Y-m-d H:i:s",now()),
			];
			$update = $this->candidate_model->update($this->session->userdata('email'),$data);
			if ($update == 1)
			{
				$result['successful'] = true;
				$result['date'] = date("d/m/Y",now());
			}
			echo json_encode($result);
		}
	}

	public function removeProfile()
	{
		if ($this->input->get())
		{
			$result = [];
			$data = [
				'title'						=> '',
				'literacy'					=> '',
				'experience'				=> '',
				'career'					=> '',
				'location'					=> '',
				'type_work'					=> '',
				'rank'						=> '',
				'wage'						=> '',
				'target'					=> '',
				'education_json'			=> '',
				'language_json'				=> '',
				'work_experience_json'		=> '',
				'date_update'				=> '',
				'status_profile'			=> '',
				'status_search'				=> '',
				'confrim_admin'				=> '',
				'date_confrim_admin'		=> '',
				'view'						=> '',
			];
			$update = $this->candidate_model->update($this->session->userdata('email'),$data);
			if ($update == 1)
			{
				$result['successful'] = true;
			}
			echo json_encode($result);
		}
	}

	public function removeFile()
	{
		if ($this->input->get())
		{
			$result = [];
			$path = $this->candidate_model->infoSelect($this->session->userdata('email'),'file_path')['file_path'];
			$data = [
				'file_name'			=> '',
				'file_path'			=> '',
				'date_file_update'	=> '',
				'status_file'		=> '',
			];
			$update = $this->candidate_model->update($this->session->userdata('email'),$data);
			if ($update == 1)
			{
				@unlink($path);
				$result['successful'] = true;
			}
			echo json_encode($result);
		}
	}

	public function changeSearch()
	{
		if ($this->input->get())
		{
			$data = [
				'status_search'			=> $this->input->get('id'),
			];
			$update = $this->candidate_model->update($this->session->userdata('email'),$data);
		}
	}

	public function removeRecruit()
	{
		if ($this->input->post())
		{
			if ($this->post_recruit_model->checkEmailRecruit($this->session->userdata('email'),$this->input->post('id')) == 1)
			{
				if ($this->post_recruit_model->delete($this->input->post('id')))
				{
					echo 'thành công';
				} else {
					echo 'Thất bại';
				}
			}
			else {
				echo 'Không tồn tại';
			}
		}
	}

	public function tick()
	{
		$data['recruit']		= $this->recruit_model->infoRecruitALL($this->session->userdata('email'));
		$data['post_recruit']	= $this->post_recruit_model->listPostRecruitId($data['recruit']['recruit_id']);
		$this->load->view('profile/table/table_recruit',$data);
	}
}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */