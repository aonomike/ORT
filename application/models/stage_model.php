<?php
class Stage_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new stage
	public function create_stage($data)
	{
		$this->db->insert('stage',$data);

	}
	//update stage by id
	public function	update_stage_by_id($stage_id,$data)
	{
		$this->db->where('stage_id', $stage_id);
		$this->db->update('stage',$data);
	}
	//void stage
	public function void_stage_by_id($stage_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('stage_id',$stage_id);
		$this->db->update('stage',$data);
	}

	public function void_multiple_stage_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('stage_id',$ids);
		$this->db->update('stage',$data);
	}



	//re-instate stage
	
	public function recreate_stage_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('stage_id',$id);
		$this->db->update('stage',$data);
	}

	public function recreate_multiple_stage_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('stage_id',$ids);
		$this->db->update('stage',$data);
	}
	//get all stages

	public function get_all_stages()
	{
		$this->db->select();
		$query=$this->db->get('stage');

		if($query->num_rows>0)
		{
			foreach( $query->result() as $row)
			{
				$rows[]=$row;
			}
			return $rows;
		}
		else
		{
			return false;
		}

	}

	//get stage by id
	public function get_stage_by_id($id)
	{
		$this->db->where('stage_id',$id);
		$this->db->select();
		$query=$this->db->get('stage');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}


}