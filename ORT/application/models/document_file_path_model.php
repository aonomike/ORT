<?php
class Document_file_path_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new document_file_path
	public function create_document_file_path($data)
	{
		$this->db->insert('document_file_path',$data);
	}
	//update document_file_path by id
	public function	update_document_file_path_by_id($document_file_path_id,$data)
	{
		$this->db->where('document_path_id', $document_file_path_document_path_id);
		$this->db->update('document_file_path',$data);
	}
	//void document_file_path
	public function void_document_file_path_by_id($id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('document_path_id',$id);
		$this->db->update('document_file_path',$data);
	}

	public function void_multiple_document_file_path_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('document_path_id',$ids);
		$this->db->update('document_file_path',$data);
	}



	//re-instate document_file_path
	
	public function recreate_document_file_path_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('document_path_id',$id);
		$this->db->update('document_file_path',$data);
	}

	public function recreate_multiple_document_file_path_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('document_path_id',$ids);
		$this->db->update('document_file_path',$data);
	}
	//get all document_file_paths

	public function get_all_document_file_paths()
	{
		$this->db->select();
		$query=$this->db->get('document_file_path');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get document_file_path by id
	public function get_document_file_path_by_id($id)
	{
		$this->db->where('document_path_id',$id);
		$this->db->select();
		$query=$this->db->get('document_file_path');

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