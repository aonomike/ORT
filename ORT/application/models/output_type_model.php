<?php
class Output_type_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//create output type
		public function create_output_type($data)
		{
			$this->db->insert('output_type',$data);
		}
	// update output type by id
		public function update_output_type_by_id($data,$id)
		{
			$this->db->where('output_type_id',$id);
			$this->db->update('output_type',$data);
		}
	
	//delete output type by id
	//delete output
	public function delete_output_type_by_id($id)
	{
		
		$this->db->where('output_type_id',$id);
		$this->db->delete('output_type');
	}
//delete multiple output types
	public function delete_multiple_output_types_by_id($ids)
	{
		
		$this->db->where_in('output_type_id',$ids);
		$this->db->delete('output_type');
	}
	

	// get output type
public function get_all_outputs_types()
	{
		$this->db->select();
		$query=$this->db->get('output_type');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

		//get output type by id
	public function get_output_type_by_id($id)
	{
		$this->db->where('output_type_id',$id);
		$this->db->select();
		$query=$this->db->get('output_type');

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