<?php
class Work_item_type_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new work_type
	public function create_work_item_type($data)
	{
		$this->db->insert('work_type',$data);

	}
	//update work_type by id
	public function	update_work_type_by_id($work_type_id,$data)
	{
		$this->db->where('id', $work_type_id);
		$this->db->update('work_type',$data);
	}
	//void work_type
	public function void_work_type_by_id($work_type_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$work_type_id);
		$this->db->update('work_type',$data);
	}

	public function void_multiple_work_type_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('work_type',$data);
	}



	//re-instate work_type
	
	public function recreate_work_type_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('work_type',$data);
	}

	public function recreate_multiple_work_type_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('work_type',$data);
	}
	//get all work_types

	public function get_all_work_item_types()
	{
		$this->db->select();
		$this->db->distinct();
		$query=$this->db->get('work_type');

		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row ) {
				$work_type_data[]=$row;
			}
			return $work_type_data;
		}
		else
		{
			return false;
		}

	}

	//get work_type by id
	public function get_work_type_by_id($id)
	{
		$this->db->where('work_type_id',$id);
		$this->db->select();
		$query=$this->db->get('work_type');

		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

}