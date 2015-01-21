<?php
class Prg_descision_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();		
	}
	//create new prg_descision
	public function create_prg_descision($data)
	{
		$this->db->insert('prg_descision',$data);
	}
	//update prg_descision by id
	public function	update_prg_descision_by_id($id,$data)
	{
		$this->db->where('id', $id);
		$this->db->update('prg_descision',$data);
	}
	//void prg_descision
	public function void_prg_descision_by_id($id,$data)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$id);
		$this->db->update('prg_descision',$data);
	}

	public function void_multiple_prg_descision_by_id($ids, $data)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('prg_descision',$data);
	}

	//delete prg_descision
	public function delete_prg_descision_by_id($id)
	{		
		$this->db->where('id',$id);
		$this->db->delete('prg_descision');
	}

	public function delete_multiple_prg_descision_by_id($ids)
	{
		
		$this->db->where_in('id',$ids);
		$this->db->delete('prg_descision');
	}



	//re-instate prg_descision
	public function recreate_prg_descision_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('prg_descision',$data);
	}

	public function recreate_multiple_prg_descisions_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('prg_descision',$data);
	}

	//get all prg_descisions
	

	public function get_all_prg_descisions()
	{
		
		$this->db->select('prg_descision');
		$query=$this->db->get();
		if ($query->num_rows()>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	//get prg_descision by id

	public function get_prg_descision_by_id($id)
	{ 
		$this->db->where('id',$id);
		$this->db->select('prg_descision');
		$query = $this->db->get();

		if ($query->num_rows()==1)
		{
			return $query->result();
		}

		else
		{
			return false;
		}
	}


}