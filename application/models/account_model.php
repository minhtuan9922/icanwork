<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

	protected $table= 'account';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function insert($options = array()) 
	{
		return $this->db->insert($this->table, $options);
	}

	function activeAcount($email,$active_code)
	{
		$this->db->where(['email like' => $email, 'active_code' => $active_code]);
		$this->db->update($this->table,['status' => 1]);
		return $this->db->affected_rows();
	}

	function password($email,$type)
	{
		$this->db->select('password');
		$this->db->from($this->table);
		$this->db->where(['email like' => $email, 'status' => '1', 'type' => $type]);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

	function checkExistAccount($email)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(['email like' => $email]);
		$this->db->limit(1);
		return $this->db->get()->num_rows();
	}

	function updateActiveCode($email,$active_code)
	{
		$this->db->where(['email like' => $email]);
		$this->db->update($this->table,['active_code' => $active_code]);
		return $this->db->affected_rows();
	}

	function updatePassword($email,$active_code,$pass)
	{
		$this->db->where(['email like' => $email, 'active_code like' => $active_code]);
		$this->db->update($this->table,['password' => $pass]);
		return $this->db->affected_rows();
	}

	function changePassword($email,$pass)
	{
		$this->db->where(['email like' => $email]);
		$this->db->update($this->table,['password' => $pass]);
		return $this->db->affected_rows();
	}


}

/* End of file account_model.php */
/* Location: ./application/models/account_model.php */