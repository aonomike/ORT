<?php
class Country_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new country
	public function create_country($data)
	{
		$this->db->insert('country',$data);

	}
	//update country by id
	public function	update_country_by_id($country_id,$data)
	{
		$this->db->where('id', $country_id);
		$this->db->update('country',$data);
	}
	//void country
	public function void_country_by_id($country_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$country_id);
		$this->db->update('country',$data);
	}
	

	public function void_multiple_country_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('country',$data);
	}



	//re-instate country
	
	public function recreate_country_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('country',$data);
	}

	public function recreate_multiple_country_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('country',$data);
	}
	//get all countrys

	public function get_all_countrys()
	{
		$this->db->select();
		$query=$this->db->get('country');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	public function get_countries()
	{
		$this->db->select();
		$this->db->from('country');
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

	//get country by id
	public function get_country_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('country');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}


	public function get_country_id_by_name($country_name)
	{
		$query = 'SELECT TOP 1 id FROM country c WHERE c.Name = ';
		$query.= '"'.$country_name.'"';
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

	public function insert_country_and_return_new_id($data)
	{
		$this->db->insert('organisation',$data);
		$new_id=$this->db->insert_id();
		return $new_id;
	}


}