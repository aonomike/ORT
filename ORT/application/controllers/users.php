<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->model('staff_model');
		$this->load->model('user_type_model');
		$this->load->model('rbac_model');
	}
	
	public function index()
	{ 
		$this->load_login_page();
	}

	public function check_login(){
		if(!$this->session->userdata('is_logged_in'))
		{
			$data['error']="";
			$this->load->view('login',$data);
			return true;
		}
		else
		{
			return false;
		}
	}

	public function load_login_page()
	{
		$form_data['error']="";
		$this->load->view('login',$form_data);

	}
	//get_users_by_username_and_password

	public function user_login()
	{
		//$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
		$this->form_validation->set_rules('password','Password','required|xss_clean');
		if($this->form_validation->run()==FALSE)
		{
			$form_data['error']="";
			$this->load->view('login',$form_data);
		}

		else
		{

			$is_logged_in=false;
			$username = $this->input->post('username');
			$pass=md5($this->input->post('password'));			 			
			
			$user=$this->users_model->get_user_for_login($username,$pass);
			if($user==false)
			{
				$is_logged_in=false;
				$form_data['error']="invalid username or password";
				$this->load->view('login',$form_data);
			}
			else
			{	
				$is_logged_in=true;
				//print_r($user[0]);
				$logged_user = array('is_logged_in' => $is_logged_in ,
										'username'=>$user[0]->username,
										'staff_name'=>$user[0]->first_name.' '.$user[0]->second_name.' '.$user[0]->last_name,
										'role'=>$user[0]->role_id,
										'user_id'=>$user[0]->user_id
								 );
				$this->session->set_userdata($logged_user);
				
				//$this->session->sess_destroy();
				if(!$this->check_login())
				{
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='home_page';
					$data['title']='OR Tracking System';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));					
					$this->load->view('template',$data);
					
					//$this->session->sess_destroy();
					//echo $this->session->userdata('is_logged_in');


				}
						
			}	
		}
	}

	public function user_signout()
	{
		$data['error']='';
		$this->session->sess_destroy();
		$this->check_login();
		//$this->load->view('login',$data);		
	}

	public function get_users_list()
	{
		if($this->check_login())
		{
			return;			
		}
		else
		{
			$data['users']= $this->users_model->get_users();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_users';
			$data['title']='Manage Users';
			$this->load->view('template',$data);
		}


	}

	public function create_new_users_form()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			
			$data['staff']=$this->staff_model->get_all_staffs();
			$data['user_type']= $this->user_type_model->get_user_types();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_users';
			$data['title']='Create Users';
			$this->load->view('template',$data);
		}
	}
}
?>