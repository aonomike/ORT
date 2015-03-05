<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class outputs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('work_item_stage_model');
		$this->load->model('work_item_type_model');
		$this->load->model('stage_model');
		$this->load->model('work_item_model');
		$this->load->model('work_item_stage_status_model');
		$this->load->model('status_model');	
		$this->load->model('output_model');
		
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

	public function list_outputs()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$output= $this->output_model->get_output_all_details();
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['output']=$output;	
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_outputs';
			$data['title']='View outputs Page';
			$this->load->view('template',$data);
		}

	}
	public function create_new_output_form()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$staff=$this->output_model->get_staff_for_output_creation();		
			$data['staff']=$staff;	
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_output_form';
			$data['title']='Create New outputs';
			$this->load->view('template',$data);
		}
	}

	public function create_new_output()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$this->form_validation->set_rules('staff-id','Staff Name ','trim|required|xss_clean');
			if ($this->form_validation->run()) {
					$data = array('staff_id' =>$this->input->post('staff-id'),
					'date_created' =>date('Y-m-d H:i:s'),
				 	'created_by' =>$this->session->userdata('user_id'),
				 	'last_updated_by' =>$this->session->userdata('user_id'),
				 	'date_last_updated' =>date('Y-m-d H:i:s') );
					$this->output_model->create_output($data);
					$data['output']=$this->output_model->get_output_details();
					$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
					$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_list_outputs';
					$data['title']='Manage outputs';
					$this->load->view('template',$data);
			}
			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();	
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_output_form';
				$data['title']='Create New outputs';
				$this->load->view('template',$data);
			}
		}

	}
}



?>