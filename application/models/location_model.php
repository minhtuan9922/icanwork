<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_model extends CI_Model {

	protected $table='location';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listLocation($lang)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(['loca_status' => '1','Lang' => $lang]);
		return $this->db->get()->result_array();
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

/* End of file location_model.php */
/* Location: ./application/models/location_model.php */