<?php
class Document_submission_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new document_submission
	public function create_document_submission($data)
	{
		$this->db->insert('document_submission',$data);
	}
	//update document_submission by id
	public function	update_document_submission_by_id($document_submission_id,$data)
	{
		$this->db->where('id', $document_submission_id);
		$this->db->update('document_submission',$data);
	}
	//void document_submission
	public function void_document_submission_by_id($document_submission_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$document_submission_id);
		$this->db->update('document_submission',$data);
	}

	public function void_multiple_document_submission_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('document_submission',$data);
	}



	//re-instate document_submission
	
	public function recreate_document_submission_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('document_submission',$data);
	}

	public function recreate_multiple_document_submission_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('document_submission',$data);
	}
	//get all document_submissions

	public function get_all_document_submissions()
	{
		$this->db->select();
		$query=$this->db->get('document_submission');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get document_submission by id
	public function get_document_submission_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('document_submission');

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