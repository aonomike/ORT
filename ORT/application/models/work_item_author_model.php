<?php
class Work_item_author_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();		
	}

	public function get_work_item_author()
	{
		$this->db->select();
		$this->db->from('work_item_author');
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

	public function get_all_work_item_author_details_by_work_item_id($work_item_id)
	{
		$query='SELECT wia.id, wia.author_id, wia.work_item_id,  wia.author_type,wia.retire,  s.first_name, s.second_name, s.last_name, wi.description AS work_item
				, at.descriptions as author_type_description
				FROM work_item_author wia
				JOIN author a ON a.author_id=wia.author_id
				JOIN staff s ON s.staff_id = a.staff_id
				JOIN work_item wi ON wi.work_item_id = wia.work_item_id
				JOIN author_type  at on at.author_type_id=wia.author_type
				WHERE wia.work_item_id=';
		$query.=$work_item_id;
		$query.=' AND wia.retire = ';
		$query.=0;
		$query_result=$this->db->query($query);

		if ($query_result->num_rows()>0)
		{
			foreach ($query_result->result() as $row) {
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
	public function get_all_work_item_author_details()
	{
		$query='SELECT wia.id, wia.author_id, wia.work_item_id,  wia.author_type,  s.first_name, s.second_name, s.last_name, wi.description AS work_item
				, at.descriptions as author_type_description
				FROM work_item_author wia
				JOIN author a ON a.author_id = wia.author_id
				JOIN staff s ON a.staff_id = s.staff_id
				JOIN work_item wi ON wi.work_item_id = wia.work_item_id
				JOIN author_type  at on at.author_type_id=wia.author_type';
		$query_result=$this->db->query($query);

		if ($query_result->num_rows()>0)
		{
			foreach ($query_result->result() as $row) {
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

	public function get_all_work_item_author_details_by_id($id)
	{
		$query='SELECT wia.id, wia.author_id, wia.work_item_id,  wia.author_type,  s.first_name, s.second_name, s.last_name, wi.description AS work_item
				, at.descriptions as author_type_description, d.Name AS designation, c.Name AS country , o.name AS organisation, c.id AS country_id, o.organisation_id,d.ID AS designation_id
				FROM work_item_author wia
				JOIN author a ON a.author_id = wia.author_id
				JOIN staff s ON a.staff_id = s.staff_id
				LEFT JOIN designation d ON d.ID = wia.Designation
				LEFT JOIN country c ON c.id = wia.country
				LEFT JOIN organisation o ON o.organisation_id = wia.institution_of_affiliation
				JOIN work_item wi ON wi.work_item_id = wia.work_item_id
				JOIN author_type  at on at.author_type_id=wia.author_type WHERE wia.id=';
		$query.=$id;
		$query_result=$this->db->query($query);

		if ($query_result->num_rows()==1)
		{
			return $query_result->row();
		}
		else 
		{
			return false;
		}
	}

	public function create_work_item_author($data)
	{
		$this->db->insert('work_item_author', $data);
	}

	public function create_work_item_author_using_jpost_and_return_new_id($data)
	{
		$this->db->insert('work_item_author', $data);
		$insert_id= $this->db->insert_id();
		return $insert_id;
	}

	public function retire_work_item_author($work_item_author_id)
	{
		try {
			$data = array('retire' =>1 );
			$this->db->where('id', $work_item_author_id);
			$this->db->update('work_item_author',$data);
		} catch (Exception $e) {
			echo($e.getMessage());
		}
		
	}

	public function update_work_item_author($data, $work_item_author_id)
	{
		try {
				$this->db->where('id', $work_item_author_id);
				$this->db->update('work_item_author', $data);
		} catch (Exception $e) {
			echo($e.getMessage());
		}
		 
	}
}