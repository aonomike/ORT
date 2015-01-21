<?php
class User_type_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();		
	}

	public function get_user_types()
	{
		$this->db->select();
		$this->db->from('user_type');
		$this->db->order_by('Description','asc');
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

	public function create_user_type($data)
	{
		$this->db->insert('user_type',$data);
	}
}