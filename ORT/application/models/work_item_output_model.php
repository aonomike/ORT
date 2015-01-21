<?php
class Work_item_output_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new work_item_output
	public function create_work_item_output($data)
	{
		$this->db->insert('work_item_output',$data);
	}
	//update work_item_output by id
	public function	update_work_item_output_by_id($work_item_output_id,$data)
	{
		$this->db->where('id', $work_item_output_id);
		$this->db->update('work_item_output',$data);
	}
	//void work_item_output
	public function void_work_item_output_by_id($work_item_output_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$work_item_output_id);
		$this->db->update('work_item_output',$data);
	}

	public function void_multiple_work_item_output_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('work_item_output',$data);
	}



	//re-instate work_item_output
	
	public function recreate_work_item_output_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('work_item_output',$data);
	}

	public function recreate_multiple_work_item_output_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('work_item_output',$data);
	}
	//get all work_item_outputs

	public function get_all_work_item_outputs()
	{
		$this->db->select();
		$query=$this->db->get('work_item_output');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get work_item_output by id
	public function get_work_item_output_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('work_item_output');

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