<?php 
$config = array(
	'register_seeker' => array(
		array(
			'field' 	=> 'email',
			'label' 	=> 'Email',
			'rules' 	=> 'required|valid_email|is_unique[account.email]|trim',
			'errors' 	=> array(
                'required' 		=> '%s Không được bỏ trống!',
                'valid_email'	=> '%s Không đúng định dạng mail',
                'is_unique'		=> '%s đã tồn tại',
            )
		),
		array(
			'field' 	=> 'password',
			'label' 	=> 'Password',
			'rules' 	=> 'required|min_length[8]|trim'
		),
		array(
			'field' 	=> 'confrim_pass',
			'label' 	=> 'Password Confirmation',
			'rules' 	=> 'required|matches[password]|trim'
		),
		array(
			'field' 	=> 'birthday',
			'label' 	=> 'Birthday',
			'rules' 	=> 'required|callback_is_future_date|callback_is_vaild_date'
		),
		array(
			'field' 	=> 'fullname',
			'label' 	=> 'Fullname',
			'rules' 	=> 'required|trim|htmlentities'
		),
		array(
			'field' 	=> 'gender',
			'label' 	=> 'Gender',
			'rules' 	=> 'required|in_list[1,2]'
		),
		array(
			'field' 	=> 'phone',
			'label' 	=> 'Phone',
			'rules' 	=> 'required|regex_match[/[0-9]{10,13}/]|trim',
			'errors'	=> array(
				'regex_match'		=> '%s từ 10 -> 13 số',
			)
		)
	),
	// register recruit
	'register_recruit' => array(
		array(
			'field' 	=> 'email',
			'label' 	=> 'Email',
			'rules' 	=> 'required|valid_email|is_unique[account.email]|trim',
			'errors' 	=> array(
                'required' 		=> '%s Không được bỏ trống!',
                'valid_email'	=> '%s Không đúng định dạng mail',
                'is_unique'		=> '%s đã tồn tại',
            )
		),
		array(
			'field' 	=> 'password',
			'label' 	=> 'Password',
			'rules' 	=> 'required|min_length[8]|trim'
		),
		array(
			'field' 	=> 'confrim_password',
			'label' 	=> 'Password Confirmation',
			'rules' 	=> 'required|matches[password]|trim'
		),
		array(
			'field' 	=> 'name_company',
			'label' 	=> 'Name Company',
			'rules' 	=> 'required|trim|htmlentities'
		),
		array(
			'field' 	=> 'date_constitutive',
			'label' 	=> 'Date constitutive',
			'rules' 	=> 'required|callback_is_future_date|callback_is_vaild_date'
		),
		array(
			'field' 	=> 'address',
			'label' 	=> 'Address',
			'rules' 	=> 'required|trim|htmlentities'
		),
		array(
			'field' 	=> 'phone',
			'label' 	=> 'Phone',
			'rules' 	=> 'required|regex_match[/[0-9]{10,13}/]|trim',
			'errors'	=> array(
				'regex_match'		=> '%s từ 10 -> 13 số',
			)
		),
		array(
			'field' 	=> 'province_city',
			'label' 	=> 'Province/City',
			'rules' 	=> 'required'
		),
		array(
			'field' 	=> 'scale',
			'label' 	=> 'Scale',
			'rules' 	=> 'required'
		),
		array(
			'field' 	=> 'name_contact',
			'label' 	=> 'Name contact',
			'rules' 	=> 'required|trim|htmlentities'
		),
		array(
			'field' 	=> 'email_contact',
			'label' 	=> 'Email contact',
			'rules' 	=> 'required|valid_email|trim|htmlentities',
			'errors' 	=> array(
                'required' 		=> '%s Không được bỏ trống!',
                'valid_email'	=> '%s Không đúng định dạng mail',
            )
		),
		array(
			'field' 	=> 'phone_contact',
			'label' 	=> 'Phone contact',
			'rules' 	=> 'required|regex_match[/[0-9]{10,13}/]|trim',
			'errors'	=> array(
				'regex_match'		=> '%s từ 10 -> 13 số',
			)
		),
	),
	//login
	'login' => array(
		array(
			'field' 	=> 'email',
			'label' 	=> 'Email',
			'rules' 	=> 'required|valid_email|trim',
			'errors' 	=> array(
                'required' 		=> '%s Không được bỏ trống!',
                'valid_email'	=> '%s Không đúng định dạng mail',
            )
		),
		array(
			'field' 	=> 'password',
			'label' 	=> 'Password',
			'rules' 	=> 'required|trim'
		),
	),
	//forget password
	'email_forget' => array(
		array(
			'field' 	=> 'email',
			'label' 	=> 'Email',
			'rules' 	=> 'required|valid_email|trim',
			'errors' 	=> array(
                'required' 		=> '%s Không được bỏ trống!',
                'valid_email'	=> '%s Không đúng định dạng mail',
            )
		),
	),
	'forget_pass' => array(
		array(
			'field' 	=> 'password',
			'label' 	=> 'Password',
			'rules' 	=> 'required|min_length[8]|trim'
		),
		array(
			'field' 	=> 'confrim_pass',
			'label' 	=> 'Password Confirmation',
			'rules' 	=> 'required|matches[password]|trim'
		),
		array(
			'field' 	=> 'code',
			'label' 	=> 'Code',
			'rules' 	=> 'required|trim'
		),
	),
	//update candidate
	'update_candidate' => array(
		array(
			'field' 	=> 'birthday',
			'label' 	=> 'Birthday',
			'rules' 	=> 'required|callback_is_future_date|callback_is_vaild_date'
		),
		array(
			'field' 	=> 'name',
			'label' 	=> 'Name',
			'rules' 	=> 'required|trim|htmlentities'
		),
		array(
			'field' 	=> 'gender',
			'label' 	=> 'Gender',
			'rules' 	=> 'required|in_list[1,2]'
		),
		array(
			'field' 	=> 'marriage',
			'label' 	=> 'Marriage',
			'rules' 	=> 'required|in_list[1,2]'
		),
		array(
			'field' 	=> 'phone',
			'label' 	=> 'Phone',
			'rules' 	=> 'required|regex_match[/[0-9]{10,13}/]',
			'errors'	=> array(
				'regex_match'		=> '%s từ 10 -> 13 số',
			)
		),
		array(
			'field' 	=> 'address',
			'label' 	=> 'Address',
			'rules' 	=> 'required|trim'
		),
	),
	//change password
	'change_password' => array(
		array(
			'field' 	=> 'password_new',
			'label' 	=> 'Password',
			'rules' 	=> 'required|min_length[8]|trim'
		),
		array(
			'field' 	=> 'confrim_pass_new',
			'label' 	=> 'Password Confirmation',
			'rules' 	=> 'required|matches[password_new]|trim'
		),
	),
	//info general
	'info_general' => array(
		array(
			'field' 	=> 'general_title',
			'label' 	=> 'Title',
			'rules' 	=> 'required|max_length[80]|trim|htmlentities'
		),
		array(
			'field' 	=> 'general_edu',
			'label' 	=> 'Education',
			'rules' 	=> 'required|trim|is_natural_no_zero'
		),
		array(
			'field' 	=> 'general_exp',
			'label' 	=> 'experience',
			'rules' 	=> 'required|trim|is_natural_no_zero'
		),
		array(
			'field' 	=> 'general_career[]',
			'label' 	=> 'Career',
			'rules' 	=> 'required|trim|callback_select_career'
		),
		array(
			'field' 	=> 'general_type_work[]',
			'label' 	=> 'Type work',
			'rules' 	=> 'required|trim|callback_select_type_work'
		),
		array(
			'field' 	=> 'general_wage',
			'label' 	=> 'Wage',
			'rules' 	=> 'required|trim|is_natural_no_zero'
		),
		array(
			'field' 	=> 'general_rank',
			'label' 	=> 'Rank',
			'rules' 	=> 'required|trim|is_natural_no_zero'
		),
		array(
			'field' 	=> 'general_place[]',
			'label' 	=> 'Place',
			'rules' 	=> 'required|trim|callback_select_place'
		)
	),
	'education' => array(
		array(
			'field' 	=> 'school',
			'label' 	=> 'School',
			'rules' 	=> 'required|trim|htmlentities'
		),
		array(
			'field' 	=> 'specialized',
			'label' 	=> 'Specialized',
			'rules' 	=> 'required|trim|htmlentities'
		),
		array(
			'field' 	=> 'classify',
			'label' 	=> 'Classify',
			'rules' 	=> 'required|trim|is_natural_no_zero'
		),
		array(
			'field' 	=> 'edu_begin',
			'label' 	=> 'Time begin',
			'rules' 	=> 'required|trim|callback_is_future_date|callback_is_vaild_date'
		),
		array(
			'field' 	=> 'edu_end',
			'label' 	=> 'Time end',
			'rules' 	=> 'required|trim|callback_is_future_date|callback_is_vaild_date|callback_check_date_end'
		),
	),
	'language' => array(
		array(
			'field' 	=> 'select_lang',
			'label' 	=> 'language',
			'rules' 	=> 'required|trim'
		),
		array(
			'field' 	=> 'select_cer',
			'label' 	=> 'Certificate',
			'rules' 	=> 'required|trim'
		),
		array(
			'field' 	=> 'point',
			'label' 	=> 'point',
			'rules' 	=> 'required|trim|is_natural_no_zero'
		),
	),
	'work_exp' => array(
		array(
			'field' 	=> 'name_company',
			'label' 	=> 'Name company',
			'rules' 	=> 'required|trim|htmlentities'
		),
		array(
			'field' 	=> 'office',
			'label' 	=> 'Office',
			'rules' 	=> 'required|trim|htmlentities'
		),
		array(
			'field' 	=> 'num_wage',
			'label' 	=> 'Wage',
			'rules' 	=> 'required|trim|is_natural_no_zero'
		),
		array(
			'field' 	=> 'currency',
			'label' 	=> 'Currency',
			'rules' 	=> 'required|trim|in_list[1,2]'
		),
		array(
			'field' 	=> 'time_start',
			'label' 	=> 'Time begin',
			'rules' 	=> 'required|trim|callback_is_future_date|callback_is_vaild_date'
		),
		array(
			'field' 	=> 'time_end',
			'label' 	=> 'Time end',
			'rules' 	=> 'required|trim|callback_is_future_date|callback_is_vaild_date|callback_check_date_end'
		),
		array(
			'field' 	=> 'des_job',
			'label' 	=> 'Description',
			'rules' 	=> 'required|trim|min_length[50]|htmlentities'
		),
	),
	'file_candidate' => array(
		array(
			'field' 	=> 'file_name',
			'label' 	=> 'File name',
			'rules' 	=> 'required|trim|max_length[50]|htmlentities'
		),
	),
	'post_recruit' => array(
		array(
			'field' 	=> 'vacancies',
			'label' 	=> 'Vacancies',
			'rules' 	=> 'required|trim'
		),
		array(
			'field' 	=> 'number',
			'label' 	=> 'Number',
			'rules' 	=> 'required|is_natural_no_zero'
		),
		array(
			'field' 	=> 'rank',
			'label' 	=> 'Rank',
			'rules' 	=> 'required|is_natural_no_zero'
		),
		array(
			'field' 	=> 'type_work[]',
			'label' 	=> 'Type Work',
			'rules' 	=> 'required|is_natural_no_zero|callback_select_type_work'
		),
		array(
			'field' 	=> 'wage',
			'label' 	=> 'Wage',
			'rules' 	=> 'required|trim|is_natural_no_zero'
		),
		array(
			'field' 	=> 'exp',
			'label' 	=> 'experience',
			'rules' 	=> 'required|trim|is_natural_no_zero'
		),
		array(
			'field' 	=> 'certificate',
			'label' 	=> 'Certificate',
			'rules' 	=> 'required|trim|is_natural'
		),
		array(
			'field' 	=> 'gender',
			'label' 	=> 'Gender',
			'rules' 	=> 'required|trim|in_list[0,1,2]'
		),
		array(
			'field' 	=> 'location[]',
			'label' 	=> 'Location',
			'rules' 	=> 'required|trim|is_natural_no_zero|callback_select_location'
		),
		array(
			'field' 	=> 'career',
			'label' 	=> 'Career',
			'rules' 	=> 'required|trim|is_natural_no_zero'
		),
		array(
			'field' 	=> 'description',
			'label' 	=> 'Location',
			'rules' 	=> 'required|trim|htmlentities|min_length[100]'
		),
		array(
			'field' 	=> 'requirement_job',
			'label' 	=> 'requirement job',
			'rules' 	=> 'required|trim|htmlentities|min_length[50]'
		),
		array(
			'field' 	=> 'deadline',
			'label' 	=> 'deadline',
			'rules' 	=> 'required|trim|callback_is_vaild_date'
		),
		array(
			'field' 	=> 'language',
			'label' 	=> 'language',
			'rules' 	=> 'required|trim|is_natural'
		),
		array(
			'field' 	=> 'name_contact',
			'label' 	=> 'name contact',
			'rules' 	=> 'required|trim|htmlentities'
		),
		array(
			'field' 	=> 'email_contact',
			'label' 	=> 'email contact',
			'rules' 	=> 'required|trim|valid_email'
		),
		array(
			'field' 	=> 'interest',
			'label' 	=> 'interest',
			'rules' 	=> 'trim|min_length[50]|htmlentities'
		),
		array(
			'field' 	=> 'phone_contact',
			'label' 	=> 'phone contact',
			'rules' 	=> 'required|regex_match[/[0-9]{10,13}/]',
			'errors'	=> array(
				'regex_match'		=> '%s từ 10 -> 13 số',
			)
		),
	),
);
?>