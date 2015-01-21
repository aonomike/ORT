
<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_type_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_type_model');
		$this->load->model('staff_model');
		
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


	public function get_user_type_list()
	{
		if($this->check_login())
		{
			return;			
		}
		else
		{
			$data['user_type']= $this->user_type_model->get_user_types();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_user_types';
			$data['title']='Manage User Types';
			$this->load->view('template',$data);
		}
	}

	public function create_new_user_type_form()
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
			$data['main_content']='view_create_user_type';
			$data['title']='Create User Type';
			$this->load->view('template',$data);
		}
	}
	public function create_user_type()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$this->form_validation->set_rules('description','User Type Description','trim|required|xss_clean');

			if($this->form_validation->run())
			{
				$user_type = array('Description' => $this->input->post('description') );
				$this->user_type_model->create_user_type($user_type);
				echo "string";
				$data['staff']=$this->staff_model->get_all_staffs();
				$data['user_type']= $this->user_type_model->get_user_types();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_list_user_types';
				$data['title']='Create User Type';
				$this->load->view('template',$data);
			}
			else
			{
				$data['staff']=$this->staff_model->get_all_staffs();
				$data['user_type']= $this->user_type_model->get_user_types();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_user_type';
				$data['title']='Create User Type';
				$this->load->view('template',$data);
			}
		}
	}


}
?>
 