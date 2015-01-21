<?php
class Submission_from_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new submission_from
	public function create_submission_from($data)
	{
		$this->db->insert('submission_from',$data);
	}
	//update submission_from by id
	public function	update_submission_from_by_id($submission_from_id,$data)
	{
		$this->db->where('id', $submission_from_id);
		$this->db->update('submission_from',$data);
	}
	//void submission_from
	public function void_submission_from_by_id($submission_from_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$submission_from_id);
		$this->db->update('submission_from',$data);
	}

	public function void_multiple_submission_from_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('submission_from',$data);
	}



	//re-instate submission_from
	
	public function recreate_submission_from_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('submission_from',$data);
	}

	public function recreate_multiple_submission_from_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('submission_from',$data);
	}
	//get all submission_froms

	public function get_all_submission_froms()
	{
		$this->db->select();
		$query=$this->db->get('submission_from');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get submission_from by id
	public function get_submission_from_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('submission_from');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}


}-