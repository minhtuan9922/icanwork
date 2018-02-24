<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_model extends CI_Model {

	protected $table= 'candidate';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function infoPersonal($email)
	{
		$this->db->select('candidate_id,account_email,name,img,phone,gender,birthday,marriage,address');
		$this->db->from($this->table);
		$this->db->like('account_email',$email);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

	function infoAll($email)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->like('account_email',$email);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

	function infoSelect($email,$select)
	{
		$this->db->select($select);
		$this->db->from($this->table);
		$this->db->like('account_email',$email);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}
	
	function infoCandidate($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->like('candidate_id',$id);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}
	
	function listCandidate($status)
	{
		$this->db->select('candidate_id,name,wage,img,title,literacy,experience,career,location,date_update');
		$this->db->from($this->table);
		$this->db->join('account', 'email like account_email','inner');
		$this->db->where(['status_profile' => '1', 'account.status' => $status]);
		return $this->db->get()->result_array();
	}

	function listAll()
	{
		$this->db->select('candidate_id,name,wage,img,title,literacy,experience,career,location,date_update');
		$this->db->from($this->table);
		$this->db->join('account', 'email like account_email','inner');
		$this->db->where(['status_profile' => '1']);
		return $this->db->get()->result_array();
	}
	/**
	 * [candidateSilimar description]
	 * silimar location and career
	 * @param  [array] $career   [description]
	 * @param  [array] $location [description]
	 * @param  [int] $id       [description]
	 * @return [array]           [description]
	 */
	public function candidateSilimar($career, $location, $id)
	{
		$count_career = count($career);
		$sql 			= '';
		$param 			= [];
		for ($i=0; $i < 3; $i++)
		{
			if ($i == 0)
			{
				$sql.= "SELECT candidate_id,name,wage,img,title,literacy,experience,career,location,date_update 		FROM candidate 
						WHERE status_profile = 1 AND career like  ? '%'  AND location like  ? '%' AND candidate_id != ?
						";
				array_push($param,!empty($career[$i]) ? $career[$i] : $career[$count_career-1]);
				array_push($param,$location[0]);
				array_push($param,$id);
			} else if($i == 1) {
				$sql.="
						UNION
						SELECT candidate_id,name,wage,img,title,literacy,experience,career,location,date_update FROM candidate 
						WHERE status_profile = 1 AND career like '%' ? '%' AND location like '%' ? '%' AND candidate_id != ?
						";
				array_push($param,!empty($career[$i]) ? $career[$i] : $career[$count_career-1]);
				array_push($param,$location[0]);
				array_push($param,$id);
			} 
			if ($i == 2)
			{
				$sql.="
						UNION
						SELECT candidate_id,name,wage,img,title,literacy,experience,career,location,date_update FROM candidate 
						WHERE status_profile = 1 AND career like '%' ?  AND location like '%' ?  AND candidate_id != ?
						";
				array_push($param,!empty($career[$i]) ? $career[$i] : $career[$count_career-1]);
				array_push($param,$location[0]);
				array_push($param,$id);
				$sql.="ORDER BY date_update DESC LIMIT 10";
			}
		}
		return $this->db->query($sql,$param)->result_array();
	}

	function insert($options = array()) 
	{
		return $this->db->insert($this->table, $options);
	}

	function update($email,$data)
	{
		$this->db->where(['account_email like' => $email]);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}

}

/* End of file candidate_model.php */
/* Location: ./application/models/candidate_model.php */