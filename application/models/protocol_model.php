<?php
class Protocol_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new protocol
	public function create_protocol($data)
	{
		$this->db->insert('protocol',$data);

	}
	//update protocol by id
	public function	update_protocol_by_id($protocol_id,$data)
	{
		$this->db->where('protocol_id', $protocol_id);
		$this->db->update('protocol',$data);
	}
	//void protocol
	public function void_protocol_by_id($protocol_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('protocol_id',$protocol_id);
		$this->db->update('protocol',$data);
	}

	public function void_multiple_protocol_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('protocol_id',$ids);
		$this->db->update('protocol',$data);
	}



	//re-instate protocol
	
	public function recreate_protocol_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('protocol_id',$id);
		$this->db->update('protocol',$data);
	}

	public function recreate_multiple_protocol_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('protocol_id',$ids);
		$this->db->update('protocol',$data);
	}
	//get all protocols

	public function get_all_protocols()
	{
		$this->db->select();
		$query=$this->db->get('protocol');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get protocol by id
	public function get_protocol_by_id($id)
	{
		$this->db->where('protocol_id',$id);
		$this->db->select();
		$query=$this->db->get('protocol');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}


}-