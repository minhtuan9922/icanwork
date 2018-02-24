<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experience_model extends CI_Model {

	protected $table='experience';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listExperience($lang)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(['exp_status' => '1','lang' => $lang]);
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

/* End of file experience_model.php */
/* Location: ./application/models/experience_model.php */