<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model {

	protected $table='config';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function getAll()
	{
		return $this->db->get($this->table);
	}
	
	function insert($options = array()) 
	{
		$this->db->insert($this->table, $options);
	}

	function truncate()
	{
		$this->db->truncate($this->table);
	}

}

/* End of file config_model.php */
/* Location: ./application/models/config_model.php */