<?php
class Designation_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();		
	}

	public function get_designation()
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
}