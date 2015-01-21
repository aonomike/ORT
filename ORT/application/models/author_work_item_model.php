<?php
class Author_work_item_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//create author type
		public function create_work_item_author($data)
		{
			$this->db->insert('work_item_author',$data);
		}
	// update author type by id
		public function update_work_item_author_by_id($data,$id)
		{
			$this->db->where('id',$id);
			$this->db->update('work_item_author',$data);
		}
	
	//delete author type by id
//delete author
	public function delete_work_item_author_by_id($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('work_item_author');
	}
//delete multiple author types
	public function delete_multiple_author_types_by_id($ids)
	{
		
		$this->db->where_in('author_type_id',$ids);
		$this->db->delete('author_type');
	}
	

	// get author type
public function get_all_authors_types()
	{
		$this->db->select();
		$query=$this->db->get('author_type');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

		//get author type by id
	public function get_author_type_by_id($id)
	{
		$this->db->where('author_type_id',$id);
		$this->db->select();
		$query=$this->db->get('author_type');

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