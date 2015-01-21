<?php
class Concept_sheet_prg_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new concept_sheet_prg
	public function create_concept_sheet_prg($data)
	{
		$this->db->insert('concept_sheet_prg',$data);

	}
	//update concept_sheet_prg by id
	public function	update_concept_sheet_prg_by_id($concept_sheet_prg_id,$data)
	{
		$this->db->where('id', $concept_sheet_prg_id);
		$this->db->update('concept_sheet_prg',$data);
	}
	//void concept_sheet_prg
	public function void_concept_sheet_prg_by_id($concept_sheet_prg_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$concept_sheet_prg_id);
		$this->db->update('concept_sheet_prg',$data);
	}

	public function void_multiple_concept_sheet_prg_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('concept_sheet_prg',$data);
	}



	//re-instate concept_sheet_prg
	
	public function recreate_concept_sheet_prg_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('concept_sheet_prg',$data);
	}

	public function recreate_multiple_concept_sheet_prg_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('concept_sheet_prg',$data);
	}
	//get all concept_sheet_prgs

	public function get_all_concept_sheet_prgs()
	{
		$this->db->select();
		$query=$this->db->get('concept_sheet_prg');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get concept_sheet_prg by id
	public function get_concept_sheet_prg_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('concept_sheet_prg');

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