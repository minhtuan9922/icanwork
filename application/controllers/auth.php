<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->uri->segment(2) == 1)
		{
			$this->data['type']	= 1; // người tìm việc
		} else $this->data['type'] = 2; // employer
		//lang
		$this->data['lang'] = 1;//vietnamese
		//model
		$this->load->model('account_model');
		$this->load->model('candidate_model');
		$this->load->model('location_model');
		$this->load->model('scale_model');
		$this->load->model('recruit_model');
		//helper
		$this->load->helper(array('form','url'));
		$this->load->helper('security');
		$this->load->helper('date');
		//library
		$this->load->library('form_validation');
		$this->load->library('my_string');
		$this->load->library('email');
		$this->load->library('session');
		date_default_timezone_set("asia/ho_chi_minh");
	}
	public function index()
	{
		
	}
	
	public function login()
	{
		//check user login
		if ($this->session->userdata('email'))
		{
			redirect(base_url(''));
		}
		//breadcrumb
		$this->data['breadcrum'] = [
			[
				'name'	=> ($this->data['type'] == 1) ? 'Đăng nhập ứng viên' : 'Đăng nhập nhà tuyển dụng',
				//'link'	=> base_url('register/'.$this->data['type']),
			],
		];
		if ($this->input->post())
		{
			//validation
			$this->form_validation->set_error_delimiters('<div class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
			if ($this->form_validation->run('login') == FALSE)
			{
				echo '<script>alert("Dữ liệu nhập không hợp lệ");</script>';
				$this->data['validation']	= true;
			}
			else 
			{
				//login
				$check = $this->account_model->password($this->input->post('email'),$this->data['type'])['password'];
				if (!empty($check))
				{
					if ($this->my_string->verifyPasswrod($this->input->post('password'),$check))
					{
						$array = array(
							'email' => $this->input->post('email'),
							'type' 	=> $this->data['type'],
						);
						$this->session->set_userdata($array);
						redirect(base_url(''));
					} else {
						echo '<script>alert("Mật khẩu không đúng");</script>';
					}
				} else {
					echo '<script>alert("Tài khoản không tồn tại");</script>';
				}
				
			}
		}
		//active code
		if ($this->session->flashdata('register') == true)
		{
			echo '<script>alert("Kích hoạt thành công");</script>';
		}
		//view
		$this->data['title']	= "Đăng nhập";
		$this->data['content']	= "auth/login";
		$this->load->view('index',$this->data);
	}

	public function logout()
	{
		$array_items = array('email', 'type');
		$this->session->unset_userdata($array_items);
		redirect(base_url(''));
	}

	public function forgetPassword()
	{
		//check user login
		if ($this->session->userdata('email'))
		{
			redirect(base_url(''));
		}
		//validation
		if ($this->input->post())
		{
			//undo send code
			if ($this->input->post('undo'))
			{
				$this->session->unset_userdata('email_forget');
			} 
			else
			{
				$forget = '';
				if (isset($_POST['email']))
				{
					$forget	= 'email_forget';
				}
				else if ($this->session->userdata('email_forget'))
				{
					$forget	= 'forget_pass';
				}
				$this->form_validation->set_error_delimiters('<div class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
				if ($this->form_validation->run($forget) == FALSE)
				{
					echo '<script>alert("Dữ liệu nhập không hợp lệ");</script>';
					$this->data['validation']	= true;
				} 
				else 
				{
					if ($this->session->userdata('email_forget'))
					{
						$result = $this->account_model->updatePassword($this->session->userdata('email_forget'), $this->input->post('code'), $this->my_string->hashPassword($this->input->post('password')));
						if ($result == 1)
						{
							$this->session->unset_userdata('email_forget');
							echo '<script>alert("Thành công");</script>';
						} else {
							echo '<script>alert("Mã nhập không đúng");</script>';
						}
					}
					else 
					{
						if ($this->account_model->checkExistAccount($this->input->post('email')) == 1)
						{
							$active_code = rand(100000,999999);
							$this->account_model->updateActiveCode($this->input->post('email'),$active_code);
							$this->my_string->sendEnailCode($this->input->post('email'),$active_code);
							$this->session->set_userdata('email_forget',$this->input->post('email'));
						} 
						else 
						{
							echo '<script>alert("tài khoản không tồn tại");</script>';
							$this->data['validation']	= true;
						}
					}
				}
			}
		}
		//breadcrumb
		$this->data['breadcrum'] = [
			[
				'name'	=> 'Quên mật khẩu',
				//'link'	=> base_url('register/'.$this->data['type']),
			],
		];
		//view
		$this->data['title']	= "Quên mật khẩu";
		$this->data['content']	= "auth/forget_password";
		$this->load->view('index',$this->data);
	}
	public function register()
	{
		//register job seeker
		if ($this->data['type'] == 1)
		{
			//breadcrumb
			$this->data['breadcrum'] = [
				[
					'name'	=> 'Đăng ký ứng viên',
					//'link'	=> base_url('register/'.$this->data['type']),
				],
			];
			if ($this->input->post())
			{
				//validation
                $this->form_validation->set_error_delimiters('<div class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
                if ($this->form_validation->run('register_seeker') == FALSE)
                {
                	echo '<script>alert("Dữ liệu nhập không hợp lệ");</script>';
                	$this->data['validation']	= true;
                }
                else
                {
                    $active_code = rand(100000,999999);
                    $data = [
                     	'email'			=> $this->input->post('email'),
                     	'password'		=> $this->my_string->hashPassword($this->input->post('password')),
                     	'active_code'	=> $active_code,
                     	'type'			=> $this->data['type'],
                     	'date_create'	=> date("Y-m-d H:i:s",now()),
                     	'status'		=> 0,
                    ];
                    $result = $this->account_model->insert($data);  
                    if ($result == true)
                    {
                    	$data = [
                    		'account_email'		=> $this->input->post('email'),
                    		'name'				=> $this->input->post('fullname'),
                    		'birthday'			=> $this->input->post('birthday'),
                    		'gender'			=> $this->input->post('gender'),
                    		'phone'				=> $this->input->post('phone'),
                    	];
                    	$this->candidate_model->insert($data); 
                    	echo '<script>alert("success");</script>';
                    	$this->my_string->sendEnailActive($this->input->post('email'),$active_code,$this->data['type']);
                    } else {
                    	echo '<script>alert("fail");</script>';
                    }
                }
			}
		}
		//register recruit
		if ($this->data['type'] == 2)
		{
			//breadcrumb
			$this->data['breadcrum'] = [
				[
					'name'	=> 'Đăng ký nhà tuyển dụng',
					//'link'	=> base_url('register/'.$this->data['type']),
				],
			];
			$this->data['location'] = $this->location_model->listLocation($this->data['lang']);
			$this->data['scale'] 	= $this->scale_model->listScale($this->data['lang']);
			if ($this->input->post())
			{
				//validation
                $this->form_validation->set_error_delimiters('<div class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a>','</div>');
                if ($this->form_validation->run('register_recruit') == FALSE)
                {
                	echo '<script>alert("Dữ liệu nhập không hợp lệ");</script>';
                	$this->data['validation']	= true;
                }
                else
                {
                	$this->data['validation']	= false;
                	$active_code = rand(100000,999999);
                	$data = [
                		'email'			=> $this->input->post('email'),
                		'password'		=> $this->input->post('password'),
                		'active_code'	=> $active_code,
                		'type'			=> $this->data['type'],
                		'date_create'	=> date("Y-m-d H:i:s",now()),
                		'status'		=> 0,
                	];
                	$result = $this->account_model->insert($data);
                	if ($result == true)
                    {
                    	//upload logo
                    	$path = '';
                    	if (isset($_FILES['file']) && !empty($_FILES['file']['name']) )
                    	{
                    		$config['upload_path']          = './asset/img/logo_company';
                    		$config['allowed_types']        = 'gif|jpg|png|jpeg';
                    		$config['max_size']             = 1024;
                    		$config['file_name']            = $this->input->post('phone').rand(10000000,99999999);;
                    		$config['overwrite']            = TRUE;
                    		$this->load->library('upload', $config);
                    		$this->upload->initialize($config);
                    		if ($this->upload->do_upload('file'))
                    		{
                    			$data=$this->upload->data();
                    			$path='asset/img/logo_company/'.$data['file_name'];
                    		} else {
                    			if (strlen($this->upload->display_errors()) == 64)
                    			{
                    				$this->data['error'] = 'Vui lòng chọn file gif|jpg|png|jpeg';
                    			}
                    			if (strlen($this->upload->display_errors()) == 79)
                    			{
                    				$this->data['error'] = 'Dung lượng file không quá 1 M';
                    			}
                    		}
                    	}
                    	if ($this->data['validation'] == false)
                    	{
                    		$json_user_contact = [
                    			'email_contact'		=> $this->input->post('email_contact'),
                    			'name_contact'		=> $this->input->post('name_contact'),
                    			'phone_contact'		=> $this->input->post('phone_contact'),
                    		];
                    		//insert recruit
                    		$data = [
                    			'account_email'			=> $this->input->post('email'),
                    			'name_company'			=> $this->input->post('name_company'),
                    			'phone_company'			=> $this->input->post('phone'),
                    			'description'			=> $this->input->post('description'),
                    			'city'					=> $this->input->post('province_city'),
                    			'logo'					=> $path,
                    			'birthday_company'		=> $this->input->post('date_constitutive'),
                    			'address_company'		=> $this->input->post('address'),
                    			'scale'					=> $this->input->post('scale'),
                    			'fax'					=> $this->input->post('fax'),
                    			'website'				=> $this->input->post('website'),
                    			'user_contact_json'		=> json_encode($json_user_contact,JSON_UNESCAPED_UNICODE),
                    			'date_update'			=> date("Y-m-d H:i:s",now()),
                    		];
                    		$this->recruit_model->insert($data);
                    		echo '<script>alert("success");</script>';
                    		$this->my_string->sendEnailActive($this->input->post('email'),$active_code,$this->data['type']);
                    	}
                    } else {
                    	echo '<script>alert("error phát sinh");</script>';
                    }
                }
			}
		}
		//view
		$this->data['title']	= "Đăng ký";
		$this->data['content']	= "auth/register";
		$this->load->view('index',$this->data);
	}

	public function active()
	{
		$email 			= $this->input->get('email',TRUE);
		$active_code 	= $this->input->get('active',TRUE);
		$type			= $this->input->get('type',TRUE);
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
		{
			$result = $this->account_model->activeAcount($email,$active_code);
			if ($result == 1)
			{
				$this->session->set_flashdata('register', true);
				redirect(base_url('login/'.$type));
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
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
	//end callback validation
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */