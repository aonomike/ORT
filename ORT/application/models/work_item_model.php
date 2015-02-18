<?php
class Work_item_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new work_item
	public function create_work_item($data)
	{		
		$this->db->insert('work_item',$data);

	}

	//create new work_item and return new Id
	public function create_work_item_and_return_new_id($data)
	{		
		$this->db->insert('work_item',$data);
		$insert_id= $this->db->insert_id();
		return $insert_id;

	}
	//update work_item by id
	public function	update_work_item_by_id($data,$work_item_id)
	{
		$this->db->where('work_item_id', $work_item_id);
		$this->db->update('work_item',$data);
	}
	//void work_item
	public function void_work_item_by_id($work_item_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$work_item_id);
		$this->db->update('work_item',$data);
	}

	public function void_multiple_work_item_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('work_item',$data);
	}



	//re-instate work_item
	
	public function recreate_work_item_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('work_item',$data);
	}

	public function recreate_multiple_work_item_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('work_item_id',$ids);
		$this->db->update('work_item',$data);
	}
	//get all work_items

	public function get_all_work_items()
	{
		$this->db->select();
		$query=$this->db->get('work_item');

		if($query->num_rows>0)
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

	//get work_item by id
	public function get_work_item_by_id($id)
	{	
		$sql='SELECT w.work_item_id, w.reference_number, w.details, w.description, w.work_type, w.submission_deadline, w.creation_date,
				 w.date_last_updated, w.created_by, w.date_last_updated, w.last_updated_by,u.username created_by_name,us.username last_updated_by_name, WIT.description AS Work_item_type
				FROM work_item w JOIN work_type wit ON wit.work_type_id = w.work_type
				JOIN users u ON u.user_id=w.created_by
				JOIN users us ON us.user_id=w.last_updated_by
				WHERE w.work_item_id =';
		$sql.=$id;
		$query=$this->db->query($sql);		
			
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}


	public function get_work_item_list()
	{
		$query='SELECT w.work_item_id, w.description, w.work_type, w.submission_deadline, w.creation_date, w.date_last_updated, 
				w.created_by, w.date_last_updated, w.last_updated_by,WIT.description AS Work_item_type, 
				s.first_name, s.second_name, s.last_name, at.descriptions AS author_type
				FROM work_item w
				JOIN work_type wit ON wit.work_type_id = w.work_type
				LEFT JOIN work_item_author wia ON wia.work_item_id = w.work_item_id
				LEFT JOIN author a ON a.author_id = wia.author_id
				LEFT JOIN author_type at ON wia.author_type = at.author_type_id
				LEFT JOIN staff s ON s.staff_id = a.staff_id';

		$query_result= $this->db->query($query);

		if($query_result->num_rows()>0)
		{
			foreach ($query_result->result() as $row) {
				# code...
				$rows[]=$row;
				//return $row;
			}
			return $rows;
		}
		else
		{
			return false;
		}

	}

	public function get_work_item_list_by_id($id)
	{
		$query='SELECT w.work_item_id, w.description, w.work_type, w.submission_deadline, w.creation_date, w.date_last_updated, 
				w.created_by, w.date_last_updated, w.last_updated_by, WIT.description AS Work_item_type, 
				s.first_name, s.second_name, s.last_name, at.descriptions AS author_type
				FROM work_item w
				JOIN work_type wit ON wit.work_type_id = w.work_type
				LEFT JOIN work_item_author wia ON wia.work_item_id = w.work_item_id
				LEFT JOIN author a ON a.author_id = wia.author_id
				LEFT JOIN author_type at ON wia.author_type = at.author_type_id
				LEFT JOIN staff s ON s.staff_id = a.staff_id
				WHERE w.work_item_id='.$id;


		$query_result= $this->db->query($query);
		
		if($query_result->num_rows()==1)
		{
			return $query_result->row();
		}
		else
		{
			return false;
		}

	}

	public function get_work_item_by_work_item_type($work_item_type)
	{
		$this->db->where('work_type',$work_item_type);
		$this->db->select();
		$query_result=$this->db->get('work_item');

		if($query_result->num_rows()>0)
		{
			foreach ($query_result->result() as $row) {
				# code...
				$rows[]=$row;
				//return $row;
			}
			return $rows;
		}
		else
		{
			return false;
		}
	}

	public function search_work_item_with_jpost($search_text)
	{
		$query='SELECT w.work_item_id, w.description, w.reference_number, w.work_type, w.submission_deadline, w.creation_date, w.date_last_updated, w.created_by, w.date_last_updated, w.last_updated_by, WIT.description AS Work_item_type
				FROM work_item w
				JOIN work_type wit ON wit.work_type_id = w.work_type
				WHERE w.description LIKE "';
		$query.=$search_text;
		$query.='%"';


		$query_result= $this->db->query($query);
		
		if($query_result->num_rows()>0)
		{
			foreach ($query_result->result() as $row) {
				# code...
				$rows[]=$row;
				//return $row;
			}
			return $rows;
		}
		else
		{
			return false;
		}

	}

	public function search_work_item()
	{
		$query='SELECT w.work_item_id, w.description, w.reference_number, w.work_type, w.submission_deadline, w.creation_date, w.date_last_updated, w.created_by, w.date_last_updated, w.last_updated_by, WIT.description AS Work_item_type
				FROM work_item w
				JOIN work_type wit ON wit.work_type_id = w.work_type';
		


		$query_result= $this->db->query($query);
		
		if($query_result->num_rows()>0)
		{
			foreach ($query_result->result() as $row) {
				# code...
				$rows[]=$row;
				//return $row;
			}
			return $rows;
		}
		else
		{
			return false;
		}

	}

	public function get_all_reasons_for_submission()
	{
		$this->db->select();
		$query=$this->db->get('reason_for_submission');

		if($query->num_rows>0)
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