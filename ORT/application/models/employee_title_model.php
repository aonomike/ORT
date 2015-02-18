
<?php
class Employee_title_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();		
	}

	public function get_titles()
	{
		$this->db->select();
		$this->db->from('staff_title');
		$this->db->order_by('description','asc');
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