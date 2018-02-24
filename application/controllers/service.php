<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->data['title']	= "Dịch vụ";
		$this->data['content']	= "service/service";
		$this->data['active']	= "service";
		$this->load->view('index',$this->data);
	}

}

/* End of file service.php */
/* Location: ./application/controllers/service.php */