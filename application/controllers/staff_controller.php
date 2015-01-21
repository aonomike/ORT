<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff_model');
		$this->load->model('designation_model');
		$this->load->model('station_model');
		$this->load->model('program_model');
		$this->load->model('rbac_model');		
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

	public function get_staffs()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{			
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_staff';
			$data['staff']= $this->staff_model->get_all_staff_list();
			$data['title']='Manage Staff';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);	

			
		}				
	}

	public function create_new_staff_form()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$data['station']=$this->station_model->get_stations();
			$data['program']=$this->program_model->get_programs();
			$data['designation']=$this->designation_model->get_designation();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_staff_form';			
			$data['title']='Create Staff';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}

	}

	public function create_new_staff()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$this->form_validation->set_rules('firstname','First Name','trim|required|xss_clean');
			$this->form_validation->set_rules('second-name','SecondName','trim|required|xss_clean');
			$this->form_validation->set_rules('last-name','Last Name','trim|required|xss_clean');
			$this->form_validation->set_rules('payroll-number','Payroll Number','trim|required|xss_clean');
			$this->form_validation->set_rules('designation','Designation','trim|required|xss_clean');
			$this->form_validation->set_rules('station','Station','trim|required|xss_clean');
			$this->form_validation->set_rules('program','Program','required|xss_clean');
			if($this->form_validation->run())
			{
				$data = array('first_name' => $this->input->post('firstname') , 
								'second_name' => $this->input->post('second-name') , 
								'last_name' => $this->input->post('last-name') , 
								'designation_id' => $this->input->post('designation') , 
								'payroll_number' => $this->input->post('payroll-number') , 
								'station_id' => $this->input->post('station') , 
								'date_created' => date('Y-m-d H:i:s') , 
								'created_by' => $this->session->userdata('user_id')  , 
								'date_updated' =>date('Y-m-d H:i:s') , 
								'updated_by' => $this->session->userdata('user_id') , 
								'program' => $this->input->post('program') );

				$this->staff_model->create_staff($data);

				echo "string";
			}
		}
	}

	
}
?>	