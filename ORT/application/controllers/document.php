<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('document_model');
		$this->load->model('stage_model');
		$this->load->model('work_item_stage_output_model');
		$this->load->model('work_item_model');
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
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();		
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_staff';
			$data['staff']= $this->staff_model->get_all_staff_list();
			$data['title']='Manage Staff';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);	

			
		}				
	}

	public function create_work_item_stage_output_assigment_form_pass_work_item_id($wiso_id)
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['stages']=$this->stage_model->get_all_stages();
			$data['work_item_stage_output']=$this->work_item_stage_output_model->get_all_work_item_stage_output_details_by_work_item_stage_output_id($wiso_id);
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_work_item_stage_output_assignment_form';			
			$data['title']='Create Staff';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}

	}


	public function list_work_item_stage_output_assignment_by_work_item_stage_output_id($work_item_stage_output_id)
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$work_item_stage_output=$this->work_item_stage_output_model->get_all_work_item_stage_output_details_by_work_item_stage_output_id($work_item_stage_output_id);
			$data['work_item_stage_output']=$work_item_stage_output;
			$data['work_item_stage_output_assignments']=$this->work_item_stage_output_model->get_all_work_item_stage_output_assigment_details_by_work_item_stage_output_id($work_item_stage_output_id);
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitem_stage_output_assignment';
			$data['title']='List Work Item Stage Output Assignments';
			$data['page_heading']='List Work Item Author';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_new_document_assignment(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('stage_assigned_to','Assigned To','trim|required|xss_clean');
			$this->form_validation->set_rules('date-assigned','Date Assigned','trim|required|xss_clean');
			$this->form_validation->set_rules('date-expected-back','Date Expected Back','trim|required|xss_clean');

			$work_item_stage_output_id=$this->input->post('wiso');
			if($this->form_validation->run())
			{
				$date_assigned= date('Y-m-d', strtotime($this->input->post('date-assigned')));
				$date_expected_back= date('Y-m-d', strtotime($this->input->post('date-expected-back')));
				$data = array('work_item_stage_output_id' =>$work_item_stage_output_id , 
				 	'assigned_to' =>$this->input->post('stage_assigned_to') ,
				 	'date_assigned'=>$date_assigned,
				 	'date_expected_back'=>$date_expected_back,
				 	'date_created' =>date('Y-m-d H:i:s'),
				 	'created_by' =>$this->session->userdata('user_id'),
				 	'last_updated_by' =>$this->session->userdata('user_id'),
				 	'date_last_updated' =>date('Y-m-d  H:i:s')
				 	 );

				   $this->document_model->create_work_item_stage_output_assignment($data);
				    $data['total_work_items']=$this->work_item_model->get_total_work_item_count();
					$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
					$data['work_item_stage_output']=$this->work_item_stage_output_model->get_all_work_item_stage_output_details_by_work_item_stage_output_id($work_item_stage_output_id);
					$data['work_item_stage_output_assignments']=$this->work_item_stage_output_model->get_all_work_item_stage_output_assigment_details_by_work_item_stage_output_id($work_item_stage_output_id);
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_list_workitem_stage_output_assignment';
					$data['title']='List Work Items Stage Output Assignments';
					$data['page_heading']='List Work Item Author';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$this->load->view('template',$data);
			}

			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['stages']=$this->stage_model->get_all_stages();
				$data['work_item_stage_output']=$this->work_item_stage_output_model->get_all_work_item_stage_output_details_by_work_item_stage_output_id($work_item_stage_output_id);
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_work_item_stage_output_assignment_form';			
				$data['title']='Create Staff';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}

			
		}
		
	}
}
?>	