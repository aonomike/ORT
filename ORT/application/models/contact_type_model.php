
<?php
class Contact_type_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_contact_type()
	{
		$this->db->select();
		$this->db->from('contact_type');
		$this->db->order_by('descriptions','asc');
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