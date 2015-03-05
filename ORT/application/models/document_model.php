<?php
class Document_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new document
	public function create_document($data)
	{
		$this->db->insert('documents',$data);

	}

	public function create_document_and_return_new_id($data)
	{
		$this->db->insert('uploaded_document',$data);
		$insert_id= $this->db->insert_id();
		return $insert_id;
	}
	//create new document assignment 
	public function create_work_item_stage_output_assignment($data)
	{
		$this->db->insert('work_item_stage_output_assignment',$data);
	}
	//update document by id
	public function	update_document_by_id($document_id,$data)
	{
		$this->db->where('document_id', $document_id);
		$this->db->update('documents',$data);
	}
	//void document
	public function void_document_by_id($document_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('document_id',$document_id);
		$this->db->update('documents',$data);
	}

	public function void_multiple_document_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('document_id',$ids);
		$this->db->update('documents',$data);
	}



	//re-instate document
	
	public function recreate_document_by_document_id($document_id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('document_id',$document_id);
		$this->db->update('documents',$data);
	}

	public function recreate_multiple_document_by_document_id($document_ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('document_id',$document_ids);
		$this->db->update('documents',$data);
	}
	//get all documents

	public function get_all_documents()
	{
		$this->db->select();
		$query=$this->db->get('documents');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get document by id
	public function get_document_by_id($document_id)
	{
		$this->db->where('document_id',$document_id);
		$this->db->select();
		$query=$this->db->get('documents');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}




}