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

	public function get_document_assignment_by_document_id()
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

	public function create_document_assignment_by_document_id_form()
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

	public function list_work_document_assignment_by_document_id()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$work_item_author=$this->Work_item_author_model->get_all_work_item_author_details();	
			$data['work_item_author']=$work_item_author;
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitem_author';
			$data['title']='List Work Items';
			$data['page_heading']='List Work Item Author';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}


		
}
?>	