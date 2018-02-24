<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Career_model extends CI_Model {

	protected $table='career';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listCareer($lang)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(['career_status' => '1','lang' => $lang]);
		return $this->db->get()->result_array();
	}

	public function listCareerCount($lang)
	{
		$this->db->select('career_id,career_name,career_status,lang,
			(
				SELECT count(candidate_id) 
				FROM candidate as can
				WHERE can.career like CONCAT("%",career_id,"%") AND can.status_profile != 0 AND can.status_search = 1  
			) 
				as count_career',FALSE);
		$this->db->from($this->table);
		$this->db->where(['career_status' => '1','lang' => $lang]);
		return $this->db->get()->result_array();
	}

	public function listCareerCountRecruit($lang)
	{
		$this->db->select('career_id,career_name,career_status,lang,
			(
				SELECT count(post_id) 
				FROM post_recruit as post
				WHERE post.career = career_id AND post.status != 0  
			) 
				as count_career',FALSE);
		$this->db->from($this->table);
		$this->db->where(['career_status' => '1','lang' => $lang]);
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

/* End of file career_model.php */
/* Location: ./application/models/career_model.php */