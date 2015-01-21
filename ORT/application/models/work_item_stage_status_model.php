<?php
class Work_item_stage_status_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new work_item_status
	public function create_work_item_stage_status($data)
	{
		$this->db->insert('work_item_stage_status',$data);

	}
	//update work_item_status by id
	public function	update_work_item_stage_status_by_id($work_item_stage_status_id,$data)
	{
		$this->db->where('id', $work_item_stage_status_id);
		$this->db->update('work_item_stage_status',$data);
	}
	//void work_item_status
	public function void_work_item_stage_status_by_id($work_item_stage_status_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$work_item_stage_status_id);
		$this->db->update('work_item_stage_status',$data);
	}

	public function void_multiple_work_item_stage_status_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('work_item_stage_status',$data);
	}



	//re-instate work_item_status
	
	public function recreate_work_item_stage_status_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('work_item_stage_status',$data);
	}

	public function recreate_multiple_work_item_stage_status_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('work_item_stage_status',$data);
	}
	//get all work_item_statuss

	public function get_all_work_item_stage_statuss()
	{
		$this->db->select();
		$query=$this->db->get('work_item_stage_status');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get work_item_status by id
	public function get_work_item_stage_status_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('work_item_stage_status');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_all_work_item_stage_status_details_by_id($id)
	{
		$sql='	SELECT wis.id, wis.work_item_id ,wis.stage ,wt.work_type_id
 				FROM work_item_stage wis
 				JOIN work_item wi ON wi.work_item_id = wis.work_item_id
 				jOIN work_type wt ON wt.work_type_id=wi.work_type
 				WHERE wis.id='.$id;
		$query=$this->db->query($sql);

		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function get_all_work_item_stage_status_details()
	{
		$sql='SELECT wi.work_item_id, wi.description as work_item_description, wi.submission_deadline, wt.description AS work_item_type, s.description AS stage, s.stage_id, wis.id as work_item_stage_id, status.description as status, wiss.status_start_date, wiss.status_end_date 
				FROM work_item wi				
				JOIN work_item_stage wis ON wis.work_item_id = wi.work_item_id
				JOIN stage s ON wis.stage = s.stage_id
				JOIN work_item_stage_status wiss ON wiss.work_item_stage = wis.id
				JOIN status  ON wiss.status = status.status_id
				LEFT JOIN work_type wt ON wt.work_type_id = wi.work_type';
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


}