<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_string
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->helper(array('form','url'));
		$this->ci->load->library('form_validation');
		$this->ci->load->library('email');
	}

	public function isFutureDate($date)
	{
		$current_date	= new DateTime();
		$current_date	= $current_date->format('Y-m-d');
		if (strtotime($date) > strtotime($current_date))
		{
			$this->ci->form_validation->set_message('is_future_date', '%s error is future date');
			return false;
		}
		else 
			return true;
	}
	/**
	 * [isVaildDate description]
	 * date format yyyy/mm/dd
	 * seperator: -
	 * @param  [type]  $date [description]
	 * @return boolean       [description]
	 */
	public function isVaildDate($date)
	{
		$arr = explode('-', $date);
		if (!empty($arr[0]))
		{
			if (checkdate($arr[1], $arr[2], $arr[0]) == false)
			{
				$this->ci->form_validation->set_message('is_vaild_date', '%s is not vaild date');
				return false;
			} else  {
				return true;
			}
		}
	}

	public function sendEnailActive($email_to,$active_code,$type)
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'testmailcodeigniter1911@gmail.com',
			'smtp_pass' => '123456789ab',
			'mailtype'  => 'html', 
			'charset'   => 'utf-8'
		);
		$this->ci->email->initialize($config);
		$this->ci->email->set_newline("\r\n");
		$this->ci->email->from('testmailcodeigniter1911@gmail.com', 'Hoàng');
		$this->ci->email->to($email_to);
		$this->ci->email->subject('Email kích hoạt tài khoản');
		$this->ci->email->message('<h3>Cảm ơn bạn đã đăng ký tài khoản icanmax chúng tôi</h3>
					<p>Link kích hoạt tài khoản</p>
					<a target="_blank" href="'.base_url('kich-hoat?email='.$email_to.'&active='.$active_code.'&type='.$type).'">'.base_url('kich-hoat?email='.$email_to.'&active='.$active_code.'&type='.$type).'</a>');
		$this->ci->email->send();
	}

	public function sendEnailCode($email_to,$active_code)
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'testmailcodeigniter1911@gmail.com',
			'smtp_pass' => '123456789ab',
			'mailtype'  => 'html', 
			'charset'   => 'utf-8'
		);
		$this->ci->email->initialize($config);
		$this->ci->email->set_newline("\r\n");
		$this->ci->email->from('testmailcodeigniter1911@gmail.com', 'Hoàng');
		$this->ci->email->to($email_to);
		$this->ci->email->subject('Mã quên mật khẩu');
		$this->ci->email->message('<h3>Mã của bạn:</h3>
					<p>'.$active_code.'</p>
					');
		$this->ci->email->send();
	}

	public function hashPassword($pass)
	{
		$options = [
			'cost' => 13,
		];
		return password_hash($pass, PASSWORD_DEFAULT, $options);
	}

	public function verifyPasswrod($pass,$hash)
	{
		if (password_verify($pass, $hash)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * [remove_html_php description]
	 * remove all html5 ex: h1, h2, p...
	 * remove all php and remove , .
	 * @param  [string] $str 
	 * @return [string]      
	 */
	public function remove_html_php($str)
	{
		return preg_replace('/([^\pL\.\ ]+)/u',' ', strip_tags(trim($str)));
	}
	
	public function remove_special_characters($str)
	{
		return preg_replace('/([^\pL\pN\#\ ]+)/u',' ', strip_tags(trim($str)));
	}
	public function conver_htmlentities($str)
	{
		return htmlentities(trim($str),ENT_COMPAT,'UTF-8');
	}

	public function remove_vn_unicode($str)
	{
		if(!$str) return false;
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
			'd'=>'đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		);
		foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
		return strtolower($str);
	}

	public function redriectBack()
	{
		return redirect($_SERVER['HTTP_REFERER']);
	}

}

/* End of file my_string.php */
/* Location: ./application/libraries/my_string.php */
