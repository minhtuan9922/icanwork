<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_model extends CI_Model {

	protected $table='certificate';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listCertificate($lang)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('language', 'lang_id = cer_language', 'inner');
		$this->db->where(['cer_status' => '1','lang' => $lang, 'lang_status' => '1']);
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

/* End of file certificate_model.php */
/* Location: ./application/models/certificate_model.php */