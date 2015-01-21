<?php
class Work_item_stage_output_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new work_item_stage_output
	public function create_work_item_stage_output($data)
	{
		$this->db->insert('work_item_stage_output',$data);

	}
	//update work_item_stage_output by id
	public function	update_work_item_stage_output_by_id($work_item_stage_output_id,$data)
	{
		$this->db->where('id', $work_item_stage_output_id);
		$this->db->update('work_item_stage_output',$data);
	}
	//void work_item_stage_output
	public function void_work_item_stage_output_by_id($work_item_stage_output_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$work_item_stage_output_id);
		$this->db->update('work_item_stage_output',$data);
	}
	

	public function void_multiple_work_item_stage_output_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('work_item_stage_output',$data);
	}



	//re-instate work_item_stage_output
	
	public function recreate_work_item_stage_output_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('work_item_stage_output',$data);
	}

	public function recreate_multiple_work_item_stage_output_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('work_item_stage_output',$data);
	}
	//get all work_item_stage_outputs

	public function get_all_work_item_stage_outputs()
	{
		$this->db->select();
		$query=$this->db->get('work_item_stage_output');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get work_item_stage_output by id
	public function get_work_item_stage_output_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('work_item_stage_output');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_all_work_item_stage_output_details()
	{
		$sql='	SELECT wi.work_item_id, wi.description as title, wi.submission_deadline, wt.description AS work_item_type, s.description AS stage, s.stage_id, wis.id as work_item_stage_output_id
				FROM work_item wi
				JOIN work_item_stage wis ON wis.work_item_id = wi.work_item_id			
				JOIN work_item_stage_output wiso ON wiso.work_item_stage = wis.id
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

	public function get_all_work_item_stage_output_details_by_id($id)
	{
		$sql='	SELECT wis.id, wis.work_item_id ,wis.stage ,wt.work_type_id
 				FROM work_item_stage_output wis
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
}