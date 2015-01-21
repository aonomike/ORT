<?php
class Staff_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new staff
	public function create_staff($data)
	{
		$this->db->insert('staff',$data);

	}
	//update staff by id
	public function	update_staff_by_id($staff_id,$data)
	{
		$this->db->where('id', $staff_id);
		$this->db->update('staff',$data);
	}
	//void staff
	public function void_staff_by_id($staff_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$staff_id);
		$this->db->update('staff',$data);
	}
	

	public function void_multiple_staff_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('staff',$data);
	}



	//re-instate staff
	
	public function recreate_staff_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('staff',$data);
	}

	public function recreate_multiple_staff_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('staff',$data);
	}
	//get all staffs

	public function get_all_staffs()
	{
		$this->db->select();
		$query=$this->db->get('staff');

		if($query->num_rows>0)
		{
			foreach($query->result() as $row)
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

	//get staff by id
	public function get_staff_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$this->db->order_by('first_name','asc');
		$query=$this->db->get('staff');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_all_staff_list()
	{
		$query='SELECT staff_id, first_name, second_name, last_name, designation_id, payroll_number, station_id, date_created, created_by, '; 
		$query.=' date_updated, updated_by, program, STT.Name AS station_name, P.Name AS program_name, D.Name AS designation_name FROM Staff S';
		$query.=' JOIN Station STT ON STT.ID = S.station_id JOIN program P ON P.ID = S.program JOIN designation D ON D.ID = S.designation_id';
		
		$query_result= $this->db->query($query);
		if($query_result->num_rows()>0)
		{
			foreach ($query_result->result() as $row) {
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