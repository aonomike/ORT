<?php
class Submission_to_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new submission_to
	public function create_submission_to($data)
	{
		$this->db->insert('submission_to',$data);
	}
	//update submission_to by id
	public function	update_submission_to_by_id($submission_to_id,$data)
	{
		$this->db->where('id', $submission_to_id);
		$this->db->update('submission_to',$data);
	}
	//void submission_to
	public function void_submission_to_by_id($submission_to_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$submission_to_id);
		$this->db->update('submission_to',$data);
	}

	public function void_multiple_submission_to_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('submission_to',$data);
	}



	//re-instate submission_to
	
	public function recreate_submission_to_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('submission_to',$data);
	}

	public function recreate_multiple_submission_to_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('submission_to',$data);
	}
	//get all submission_tos

	public function get_all_submission_tos()
	{
		$this->db->select();
		$query=$this->db->get('submission_to');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get submission_to by id
	public function get_submission_to_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('submission_to');

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