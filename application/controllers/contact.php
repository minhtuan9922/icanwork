<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->data['title']	= "Liên hệ";
		$this->data['content']	= "contact/contact";
		$this->data['active']	= "contact";
		$this->load->view('index',$this->data);
	}

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */