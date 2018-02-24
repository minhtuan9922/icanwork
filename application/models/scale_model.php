<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scale_model extends CI_Model {

	protected $table='scale';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listScale($lang)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(['scale_status' => '1','Lang' => $lang]);
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

/* End of file scale_model.php */
/* Location: ./application/models/scale_model.php */