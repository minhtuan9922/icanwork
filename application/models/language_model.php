<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends CI_Model {

	protected $table='language';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listLanguage($lang)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(['lang_status' => '1','lang' => $lang]);
		return $this->db->get()->result_array();
	}

	function insert($options = array()) 
	{
		$this->db->insert($this->table, $options);
		$insert_id = $this->db->insert_id();
  		return  $insert_id;
	}

	function truncate()
	{
		$this->db->truncate($this->table);
	}

}

/* End of file language_model.php */
/* Location: ./application/models/language_model.php */