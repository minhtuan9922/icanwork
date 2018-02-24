<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruit_model extends CI_Model {

	protected $table= 'recruit';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function infoRecruitALL($email)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->like('account_email',$email);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

	function insert($options = array()) 
	{
		return $this->db->insert($this->table, $options);
	}

	/*function updateRecruit($data, $recruit_id)
	{
		$this->db->where(['recruit_id' => $recruit_id]);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}*/

}

/* End of file recruit_model.php */
/* Location: ./application/models/recruit_model.php */