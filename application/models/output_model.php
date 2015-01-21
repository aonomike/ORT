<?php
class Output_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new output
	public function create_output($data)
	{
		$this->db->insert('output',$data);

	}
	//update output by id
	public function	update_output_by_id($output_id,$data)
	{
		$this->db->where('id', $output_id);
		$this->db->update('output',$data);
	}
	//void output
	public function void_output_by_id($output_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('output_id',$output_id);
		$this->db->update('output',$data);
	}

	public function void_multiple_output_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('output_id',$ids);
		$this->db->update('output',$data);
	}



	//re-instate output
	
	public function recreate_output_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('output_id',$id);
		$this->db->update('output',$data);
	}

	public function recreate_multiple_output_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('output_id',$ids);
		$this->db->update('output',$data);
	}
	//get all outputs

	public function get_all_outputs()
	{
		$this->db->select();
		$query=$this->db->get('output');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get output by id
	public function get_output_by_id($id)
	{
		$this->db->where('output_id',$id);
		$this->db->select();
		$query=$this->db->get('output');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	get_output_all_details

	public function get_all_output_details()
	{
		$sql='SELECT wi.work_item_id, wi.title, wi.submission_deadline, wt.description AS work_item_type, s.description AS stage, s.stage_id, wis.id as work_item_stage_id, status.description as status, wiss.status_start_date, wiss.status_end_date 
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