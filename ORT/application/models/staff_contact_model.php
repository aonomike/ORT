<?php
class Staff_contact_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new staff_contact
	public function create_staff_contact($data)
	{
		$this->db->insert('staff_contact',$data);

	}
	//update staff_contact by id
	public function	update_staff_contact_by_id($contact_id,$data)
	{
		$this->db->where('contact_id', $contact_id);
		$this->db->update('staff_contact',$data);
	}
	//void staff_contact
	public function void_staff_contact_by_id($contact_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('contact_id',$contact_id);
		$this->db->update('staff_contact',$data);
	}

	public function void_multiple_staff_contact_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('contact_id',$ids);
		$this->db->update('staff_contact',$data);
	}



	//re-instate staff_contact
	
	public function recreate_staff_contact_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('staff_contact_id',$id);
		$this->db->update('staff_contact',$data);
	}

	public function recreate_multiple_staff_contact_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('staff_contact_id',$ids);
		$this->db->update('staff_contact',$data);
	}
	//get all staff_contacts

	public function get_all_staff_contacts()
	{
		$this->db->select();
		$query=$this->db->get('staff_contact');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get staff_contact by id
	public function get_staff_contact_by_id($id)
	{
		$this->db->where('contact_id',$id);
		$this->db->select();
		$query=$this->db->get('staff_contact');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	//function to insert new contacts

	public function insert_batch_contacts($data)
	{
		$this->db->insert_batch('staff_contact',$data);
	}


}