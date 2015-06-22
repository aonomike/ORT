<?php
class Designation_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();		
	}

	public function get_designations()
	{
		$this->db->select();
		$this->db->from('Designation');
		$this->db->order_by('Name','asc');
		$query=$this->db->get();

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

	public function get_designation_id_by_name($designation_name)
	{
		$query = 'SELECT ID FROM designation d WHERE d.Name = ';
		$query.= '"'.$designation_name.'"';
		$query.=' LIMIT 1 ';
		$query_result= $this->db->query($query);
		if($query_result->num_rows()==1)
		{
			return $query_result->row();
		}
		else
		 {
			# code...
			return false;
		}

	}

	public function insert_designation_and_return_new_id($data)
	{
		$this->db->insert('designation',$data);
		$new_id=$this->db->insert_id();
		return $new_id;
	}
}