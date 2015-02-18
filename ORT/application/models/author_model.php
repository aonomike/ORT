<?php
class Author_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('author_type_model');
		$this->load->model('staff_model');
	}
	//create new author
	public function create_author($data)
	{
		$this->db->insert('author',$data);

	}

	public function create_new_author_and_return_new_id($data)
	{
		$this->db->insert('author',$data);
		$new_id=$this->db->insert_id();
		return $new_id;
	}
	//update author by id
	public function	update_author_by_id($author_id,$data)
	{
		$this->db->where('author_id', $author_id);
		$this->db->update('author',$data);
	}
	//void author
	public function void_author_by_id($id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('author_id',$id);
		$this->db->update('author',$data);
	}

	public function void_multiple_author_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('author_id',$ids);
		$this->db->update('author',$data);
	}

	//delete author
	public function delete_author_by_id($id)
	{
		
		$this->db->where('author_id',$id);
		$this->db->delete('author');
	}

	public function delete_multiple_author_by_id($ids)
	{
		
		$this->db->where_in('author_id',$ids);
		$this->db->delete('author');
	}



	//re-instate author
	public function recreate_author_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('author_id',$id);
		$this->db->update('author',$data);
	}

	public function recreate_multiple_authors_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('author_id',$ids);
		$this->db->update('author',$data);
	}

	//get all authors
	

	public function get_all_authors()
	{
		
		$this->db->select();
		$query=$this->db->get('author');
		if ($query->num_rows()>0)
		{
			foreach ($query->result() as $row) {
				$author[]=$row;
			}
			return $author;
		}
		else
		{
			return false;
		}
	}

	public function get_authors_not_inserted_for_work_item($work_item_id)
	{
		$sql='SELECT author.author_id, s.first_name, s.second_name, s.last_name
		FROM author
		INNER JOIN staff s ON author.staff_id = s.staff_id
		WHERE author.author_id NOT
		IN (

		SELECT a.author_id
		FROM author a
		INNER JOIN work_item_author w ON w.author_id = a.author_id
		WHERE w.work_item_id =';
		$sql.=$work_item_id;
		$sql.=')';

		$query=$this->db->query($sql);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $qvalue) {
				
					$author_detail[]=$qvalue;			
								
			}
			return $author_detail;
		}		
		else
		{
			return false;
		}
		
	}

	public function get_authors_types_except_lead_author($work_item_id)
	{
		
	}


	public function get_author_details()
	{
		$q="SELECT author_id, a.staff_id  ,a.date_created  ,a.created_by, a.date_last_updated ,a.last_updated_by 
				  as author_type_description  ,s.first_name  ,s.last_name  ,s.second_name  FROM author a 
  				  JOIN staff S on s.staff_id=a.staff_id";
		$query=$this->db->query($q);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $qvalue) {
				
					$author_detail[]=$qvalue;			
								
			}
			return $author_detail;
		}		
		else
		{
			return false;
		}
	}

	//get author by id

	public function get_staff_for_author_creation()
	{
		$query='SELECT staff_id ,first_name  ,second_name ,last_name ,designation_id ,payroll_number ,station_id 
				,date_created  ,created_by ,date_updated  ,updated_by ,program
  				FROM staff s
 				where staff_id not in (SELECT staff_id FROM AUTHOR)';
 		$query_result=$this->db->query($query);
 		if($query_result->num_rows()>0)
 		{
 			foreach ($query_result->result() as $row) {
 				# code...
 				$rows[]=$row;
 			}
 			return $rows;
 		}

	}

	public function get_author_by_id($id)
	{ 
		$this->db->where('author_id',$id);
		$this->db->select('author');
		$query = $this->db->get();

		if ($query->num_rows()==1)
		{
			return $query->result();
		}

		else
		{
			return false;
		}
	}

	public function get_author_details_by_work_item_id($id)
	{
		$q="SELECT a.author_id, a.staff_id, a.date_created, a.created_by, a.date_last_updated, a.last_updated_by AS author_type_description, 
			s.first_name, s.last_name, s.second_name, at.descriptions AS author_type
			FROM author a
			JOIN staff S ON s.staff_id = a.staff_id
			JOIN work_item_author wia ON wia.author_id = a.author_id
			JOIN author_type at ON wia.author_type = at.author_type_id
			WHERE wia.work_item_id =".$id;
		$query=$this->db->query($q);
		if($query->num_rows()>0)
		{
			foreach ($query->result() as $qvalue) {
				
					$author_detail[]=$qvalue;			
								
			}
			return $author_detail;
		}		
		else
		{
			return false;
		}
	}


}