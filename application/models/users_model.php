<?php
class Users_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new users
	public function create_users($data)
	{
		$this->db->insert('users',$data);

	}
	//update users by id
	public function	update_users_by_id($users_id,$data)
	{
		$this->db->where('id', $users_id);
		$this->db->update('users',$data);
	}
	//void users
	public function void_users_by_id($users_id)
	{
		$data= array('is_deleted'=>1);
		$this->db->where('id',$users_id);
		$this->db->update('users',$data);
	}
	

	public function void_multiple_users_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('id',$ids);
		$this->db->update('users',$data);
	}



	//re-instate users
	
	public function recreate_users_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('users',$data);
	}

	public function recreate_multiple_users_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('users',$data);
	}
	//get all userss

	public function get_all_userss()
	{
		$this->db->select();
		$query=$this->db->get('users');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get users by id
	public function get_users_by_id($id)
	{
		$this->db->where('id',$id);
		$this->db->select();
		$query=$this->db->get('users');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	public function get_users_by_username_and_password($data)
	{
		$this->db->where($data);
		$query=$this->db->get('users');

		if($query->num_rows()==1)
		{
			$user_data[]=$query->result();
			return $user_data;
		}
		else
		{			
			return false;
		}
	}

	public function get_user_for_login($username,$password)
	{
		$query="SELECT u.user_id, u.staff_id, u.is_deleted, u.username, u.password, u.created_by, u.date_created, u.date_updated, 
				u.last_updated_by, s.first_name, s.second_name,s.last_name, ur.role_id 
				FROM users u 
				JOIN staff s ON u.staff_id = s.staff_id 
				JOIN role_user ur ON ur.user_id = u.user_id ";
		$query.=" WHERE u.username = '".$username."' AND u.password='".$password."' AND u.is_deleted=0" ;

		$query_result=$this->db->query($query);
		if($query_result->num_rows()>0)
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

	public function get_users()
	{
		$query= "SELECT u.user_id, u.staff_id,  u.is_deleted, u.username, u.password, u.created_by,";
		$query.="u.date_created, u.date_updated, u.last_updated_by, s.first_name, s.second_name, s.last_name, ut.description AS user_type_description";
		$query.=" FROM users u JOIN staff s ON u.staff_id = s.staff_id JOIN user_type ut ON u.user_type = ut.user_type_id ";

		$query_result=$this->db->query($query);
		$query_result=$this->db->query($query);
		if($query_result->num_rows()==1)
		{
			return $query_result->result();
			
		}

		else 
		{
			return false;
		}
		

	}
}