<?php
class Irb_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new irb
	public function create_irb($data)
	{
		$this->db->insert('irb',$data);

	}
	//update irb by id
	public function	update_irb_by_id($irb_id,$data)
	{
		$this->db->where('irb_id', $irb_id);
		$this->db->update('irb',$data);
	}
	//void irb
	public function void_irb_by_id($irb_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('irb_id',$irb_id);
		$this->db->update('irb',$data);
	}

	public function void_multiple_irb_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('irb_id',$ids);
		$this->db->update('irb',$data);
	}



	//re-instate irb
	
	public function recreate_irb_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('irb_id',$id);
		$this->db->update('irb',$data);
	}

	public function recreate_multiple_irb_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('irb_id',$ids);
		$this->db->update('irb',$data);
	}
	//get all irbs

	public function get_all_irbs()
	{
		$this->db->select();
		$query=$this->db->get('irb');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get irb by id
	public function get_irb_by_id($id)
	{
		$this->db->where('irb_id',$id);
		$this->db->select();
		$query=$this->db->get('irb');

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