<?php
class Status_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new status
	public function create_status($data)
	{
		$this->db->insert('status',$data);

	}
	//update status by id
	public function	update_status_by_id($status_id,$data)
	{
		$this->db->where('status_id', $status_id);
		$this->db->update('status',$data);
	}
	//void status
	public function void_status_by_id($status_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('status_id',$status_id);
		$this->db->update('status',$data);
	}

	public function void_multiple_status_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('status_id',$ids);
		$this->db->update('status',$data);
	}



	//re-instate status
	
	public function recreate_status_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('status_id',$id);
		$this->db->update('status',$data);
	}

	public function recreate_multiple_status_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('status_id',$ids);
		$this->db->update('status',$data);
	}
	//get all statuss

	public function delete_status($id)
	{
		 $data = array('status_id' =>$id );
		 $this->db->where($data);
		 $this->db->delete('status');
	}

	public function get_all_status()
	{
		$this->db->select();
		$query=$this->db->get('status');

		if($query->num_rows>0)
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

	//get status by id
	public function get_status_by_id($id)
	{
		$this->db->where('status_id',$id);
		$this->db->select();
		$query=$this->db->get('status');

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