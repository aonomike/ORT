<?php
class Station_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();		
	}

	public function get_stations()
	{
		$this->db->select();
		$this->db->from('Station');
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