<?php
class Prg_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new prg
	public function create_prg($data)
	{
		$this->db->insert('prg',$data);

	}
	//update prg by id
	public function	update_prg_by_id($prg_id,$data)
	{
		$this->db->where('prg_id', $prg_id);
		$this->db->update('prg',$data);
	}
	//void prg
	public function void_prg_by_id($prg_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('prg_id',$prg_id);
		$this->db->update('prg',$data);
	}

	public function void_multiple_prg_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('prg_id',$ids);
		$this->db->update('prg',$data);
	}



	//re-instate prg
	
	public function recreate_prg_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('prg_id',$id);
		$this->db->update('prg',$data);
	}

	public function recreate_multiple_prg_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('prg_id',$ids);
		$this->db->update('prg',$data);
	}
	//get all prgs

	public function get_all_prgs()
	{
		$this->db->select();
		$query=$this->db->get('prg');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get prg by id
	public function get_prg_by_id($id)
	{
		$this->db->where('prg_id',$id);
		$this->db->select();
		$query=$this->db->get('prg');

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