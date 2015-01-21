<?php
class Submission_type_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new submission_type
	public function create_submission_type($data)
	{
		$this->db->insert('submission_type',$data);
	}
	//update submission_type by id
	public function	update_submission_type_by_id($submission_type_id,$data)
	{
		$this->db->where('id', $submission_type_id);
		$this->db->update('submission_type',$data);
	}
	//void submission_type
	public function void_submission_type_by_id($submission_type_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$submission_type_id);
		$this->db->update('submission_type',$data);
	}

	public function void_multiple_submission_type_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('submission_type',$data);
	}



	//re-instate submission_type
	
	public function recreate_submission_type_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('submission_type',$data);
	}

	public function recreate_multiple_submission_type_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('submission_type',$data);
	}
	//get all submission_types

	public function get_all_submission_types()
	{
		$this->db->select();
		$query=$this->db->get('submission_type');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get submission_type by id
	public function get_submission_type_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('submission_type');

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