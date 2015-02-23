<?php
class Work_item_stage_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new work_item_stage
	public function create_work_item_stage($data)
	{
		$this->db->insert('work_item_stage',$data);

	}

	public function create_work_item_stage_and_return_new_id($data)
	{
		$this->db->insert('work_item_stage',$data);
		$new_id=$this->db->insert_id();
		return $new_id;
	}
	//update work_item_stage by id
	public function	update_work_item_stage_by_id($work_item_stage_id,$data)
	{
		$this->db->where('id', $work_item_stage_id);
		$this->db->update('work_item_stage',$data);
	}
	//void work_item_stage
	public function void_work_item_stage_by_id($work_item_stage_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$work_item_stage_id);
		$this->db->update('work_item_stage',$data);
	}
	

	public function void_multiple_work_item_stage_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('work_item_stage',$data);
	}



	//re-instate work_item_stage
	
	public function recreate_work_item_stage_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('work_item_stage',$data);
	}

	public function recreate_multiple_work_item_stage_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('work_item_stage',$data);
	}
	//get all work_item_stages

	public function get_all_work_item_stages()
	{
		$this->db->select();
		$query=$this->db->get('work_item_stage');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get work_item_stage by id
	public function get_work_item_stage_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('work_item_stage');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_all_work_item_stage_details()
	{

		$sql='	SELECT wi.work_item_id, wi.description as title, wi.submission_deadline, wt.description AS work_item_type, s.description AS stage, s.stage_id, wis.id as work_item_stage_id
				FROM work_item wi				
				JOIN work_item_stage wis ON wis.work_item_id = wi.work_item_id
				JOIN stage s ON wis.stage = s.stage_id
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

	public function get_all_work_item_stage_by_work_item_id($work_item_id)
	{
		$sql='	SELECT wi.work_item_id, wi.description as title, wi.submission_deadline, s.description AS stage, s.stage_id, wis.id as work_item_stage_id
				FROM work_item wi				
				JOIN work_item_stage wis ON wis.work_item_id = wi.work_item_id
				JOIN stage s ON wis.stage = s.stage_id
				WHERE wi.work_item_id=';
		$sql.=$work_item_id;
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

	public function get_all_work_item_stage_details_by_id($id)
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

	public function get_work_item_stage_by_work_item_id($work_item_id)
	{
		$sql='	SELECT wis.id, wis.work_item_id, wis.stage, wis.date_created, wis.created_by, wis.last_update_date, wis.last_update_date, s.description AS stage, status.description AS stage_status
				FROM work_item_stage wis
				JOIN stage s ON s.stage_id = wis.stage
				LEFT JOIN work_item_stage_status wiss ON wiss.work_item_stage = wis.id
				LEFT JOIN STATUS ON status.status_id = wiss.status WHERE wis.work_item_id='.$work_item_id.' ORDER BY date_created desc';
		
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

	public function get_stages_by_work_item_stage($work_item_id)
	{
		$sql='SELECT DISTINCT stage_id, description FROM stage WHERE stage_id IN (
					SELECT stage
					FROM work_item_stage
					WHERE work_item_id ='.$work_item_id.')';
		$query=$this->db->query($sql);
		if ($query->num_rows()>0) {
			# code...
			foreach ($query->result() as $row) {
				# code...
				$rows[]=$row;
			}
			return $rows;
		}
		else{
			return false;
		}

	}
}