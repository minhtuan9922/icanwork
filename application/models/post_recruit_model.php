<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_recruit_model extends CI_Model {

	protected $table= 'post_recruit';
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listPostRecruitId($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(['recruit_id' => $id]);
		if ($this->input->get('id_tick') == 1)
		{
			$this->db->where('date_deadline >=',date('Y-m-d'));
		}
		if ($this->input->get('id_tick') == 2)
		{
			$this->db->where('date_deadline <',date('Y-m-d'));
		}
		if ($this->input->get('id_tick') == 3)
		{
			$this->db->order_by('date_update','ASC');
		}
		if ($this->input->get('id_tick') == 4)
		{
			$this->db->order_by('date_update','DESC');
		}
		if ($this->input->get('id_tick') == 5)
		{
			$this->db->where('status','0');
		}
		if ($this->input->get('id_tick') == 6)
		{
			$this->db->where('status','1');
		}
		return $this->db->get()->result_array();
	}

	public function listPostRecruitNew()
	{
		$this->db->select('post_id,icon,post_recruit.recruit_id,job,number,rank,type_work,wage,experience,career,date_deadline,post_recruit.date_update as date,status,account_email,name_company,logo');
		$this->db->from($this->table);
		$this->db->join('recruit', 'recruit.recruit_id = post_recruit.recruit_id', 'inner');
		$this->db->where(['status !=' => '0', 'date_deadline >' => now()]);
		$this->db->order_by('post_recruit.date_update','DESC');
		return $this->db->get()->result_array();
	}

	public function listPostRecruitHot()
	{
		$this->db->select('post_id,icon,post_recruit.recruit_id,job,number,rank,type_work,wage,experience,career,date_deadline,post_recruit.date_update as date,post_recruit.location,status,account_email,name_company,logo');
		$this->db->from($this->table);
		$this->db->join('recruit', 'recruit.recruit_id = post_recruit.recruit_id', 'inner');
		$this->db->where(['status =' => '2']);
		$this->db->order_by('post_recruit.date_update','DESC');
		return $this->db->get()->result_array();
	}

	public function listPostRecruitFast()
	{
		$this->db->select('post_id,icon,post_recruit.recruit_id,job,number,rank,type_work,wage,experience,career,date_deadline,post_recruit.date_update as date,post_recruit.location,status,account_email,name_company,logo');
		$this->db->from($this->table);
		$this->db->join('recruit', 'recruit.recruit_id = post_recruit.recruit_id', 'inner');
		$this->db->where(['status =' => '3']);
		$this->db->order_by('post_recruit.date_update','DESC');
		return $this->db->get()->result_array();
	}

	public function listAll()
	{
		$this->db->select('post_id,icon,post_recruit.recruit_id,job,number,rank,type_work,wage,experience,career,date_deadline,post_recruit.date_update as date,post_recruit.location,status,account_email,name_company,logo');
		$this->db->from($this->table);
		$this->db->join('recruit', 'recruit.recruit_id = post_recruit.recruit_id', 'inner');
		$this->db->where(['status !=' => '0']);
		$this->db->order_by('post_recruit.date_update','DESC');
		return $this->db->get()->result_array();
	}

	public function infoPostRecruit($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(['post_id' => $id]);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

	public function infoAll($id)
	{
		$this->db->select('*');
		$this->db->from('post_recruit as post');
		$this->db->join('recruit as rec', 'rec.recruit_id = post.recruit_id', 'inner');
		$this->db->where(['post.post_id' => $id]);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}
	public function insert($options = array()) 
	{
		return $this->db->insert($this->table, $options);
	}

	public function checkEmailRecruit($email,$id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('recruit', 'recruit.recruit_id = post_recruit.recruit_id', 'inner');
		$this->db->where(['account_email like' => $email, 'post_id' => $id ]);
		$this->db->limit(1);
		return $this->db->get()->num_rows();
	}

	public function delete($id)
	{
		$this->db->where('post_id', $id);
		return $this->db->delete($this->table);
	}
	function update($id,$data)
	{
		$this->db->where(['post_id' => $id]);
		$this->db->update($this->table,$data);
		return $this->db->affected_rows();
	}

}

/* End of file post_recruit_model.php */
/* Location: ./application/models/post_recruit_model.php */