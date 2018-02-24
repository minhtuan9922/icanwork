<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classify_model extends CI_Model {

	protected $table='classify';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listClassify($lang)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(['class_status' => '1','lang' => $lang]);
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

/* End of file classify_model.php */
/* Location: ./application/models/classify_model.php */