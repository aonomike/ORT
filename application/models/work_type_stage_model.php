<?php
class Work_type_stage_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new work_type_stage
	public function create_work_item_type_stage($data)
	{
		$this->db->insert('work_type_stage',$data);

	}
	//update work_type_stage by id
	public function	update_work_type_stage_by_id($work_type_stage_id,$data)
	{
		$this->db->where('id', $work_type_stage_id);
		$this->db->update('work_type_stage',$data);
	}
	//void work_type_stage
	public function void_work_type_stage_by_id($work_type_stage_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$work_type_stage_id);
		$this->db->update('work_type_stage',$data);
	}

	public function void_multiple_work_type_stage_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('work_type_stage',$data);
	}



	//re-instate work_type_stage
	
	public function recreate_work_type_stage_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('work_type_stage',$data);
	}

	public function recreate_multiple_work_type_stage_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('work_type_stage',$data);
	}
	//get all work_type_stages

	public function get_all_work_item_type_stages()
	{
		$this->db->select();
		$query=$this->db->get('work_type_stage');

		if($query->num_rows>0)
		{
			foreach ($query	 as $row) {
				# code...
				$rows[]=$row;
			}
			return $rows;
		}
		else
		{
			return false;
		}

	}
	//get_all_work_item_stage_details
	public function get_all_work_item_type_stage_details()
	{
		$sql='	SELECT wts.id, wts.work_type, wts.stage, wt.description AS work_item_type, s.description AS stage_description
				FROM work_type_stage wts
				JOIN work_type wt ON wt.work_type_id = wts.work_type
				JOIN stage s ON s.stage_id = wts.stage
				ORDER BY WT.work_type_id';
		$query=$this->db->query($sql);

		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) {
				# code...
				$rows[]=$row;
			}
			return $rows;
		}
		else
		{
			return false;
		}

	}

	//get work_type_stage by id
	public function get_work_type_stage_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('work_type_stage');

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