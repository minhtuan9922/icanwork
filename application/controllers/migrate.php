<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('migration');
	}
	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
			show_error($this->migration->error_string());
		}
	}

	public function lastest()
	{
		$this->migration->latest();
	}
	public function ver($ver)
	{
		$this->migration->version($ver);
	}

}

/* End of file migrate.php */
/* Location: ./application/controllers/migrate.php */