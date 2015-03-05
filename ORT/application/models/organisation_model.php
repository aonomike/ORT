<?php
class Organisation_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_organisations()
	{
		$this->db->select();
		$this->db->from('organisation');
		$this->db->order_by('name','asc');
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

	public function get_organisation_id_by_name($organisation_name)
	{
		$query = 'SELECT organisation_id FROM organisation o WHERE o.name = ';
		$query.= '"'.$organisation_name.'"';
		$query.=' LIMIT 0 , 1 ';
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

	public function insert_organisation_and_return_new_id($data)
	{
		$this->db->insert('organisation',$data);
		$new_id=$this->db->insert_id();
		return $new_id;
	}
	


}