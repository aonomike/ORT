<?php
class Model_users extends CI_Model
{
	public function __construct()
	{
		parent::__construct();		
		
	}

	public function can_log_in()
	{
		$this->db->where('email',$this->input->post('email'));
		$this->db->where('password',md5($this->input->post('password')));
		$query=$this->db->get('users');
		if($query->num_rows()==1)
		{
			return true;
		}
		else {return false;}

	}

	public function add_temp_users($key)
	{
		$data=array(
			'email'=>$this->input->post('email'),
			'password'=>md5($this->input->post('password')),
			'key'=>$key
			);
		$query= $this->db->insert('temp_users',$data);
		if($query){
			echo 'added';
			return true;
		}
		else
		{
			return false;
		}
	}

	public function is_key_valid($key)
	{
		$this->db->where('key',$key);
		$query=$this->db->get('temp_users');

		if($query->num_rows()===1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function  add_user($key)
	{
		$this->db->where('key',$key);
		$temp_users=$this->db->get('temp_users');

		if ($temp_users)
		{
			$row=$temp_users->row();

			$data= array(
					'email'=>$row->email,
					'password'=>$row->Password
				);
			$did_add_user = $this->db->insert('users',$data);
		}

		if($did_add_user)
		{
			$this->db->where('key',$key);
			$this->db->delete('temp_users');
			return $data['email'];
		}
		else
		{
			return false;
		}
	}


}