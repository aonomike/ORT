<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_item_type extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('work_item_type_model');
		$this->load->model('rbac_model');
		$this->load->model('work_item_model');

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
	public function list_work_item_type(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['work_item_types']= $this->work_item_type_model->get_all_work_item_types();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitems_type';
			$data['title']='list work item types';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_work_item_type_form(){	
	if ($this->check_login()) {
			return ;
		}
		else
		{	
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['error']='';
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_work_item_type_form';
			$data['title']='New Work Item Types Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);

		}
	}

	public function create_work_item_type(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('description','Description ','trim|required|xss_clean|is_unique[work_type.description]');
			
			if($this->form_validation->run())
			{
				$input_data= array('description' => $this->input->post('description') );
				$description=$this->input->post('description');
				
				if (!is_dir('uploads/'.$description))
				{
					if (mkdir('uploads/'.$this->input->post('description'),0777,true))
					{
						$this->work_item_type_model->create_work_item_type($input_data);	

						//echo "string";	
						$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
						$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
					
						$data['work_item_types']= $this->work_item_type_model->get_all_work_item_types();
						$data['template_header']='template_header';
						$data['template_footer']='template_footer';
						$data['main_content']='view_list_workitems_type';
						$data['title']='List Work Item Types';
						$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
						$this->load->view('template',$data);
					}
					else
					{
						$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
						$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
						$data['errors'] = 'Unable to create Directory '.$this->input->post('description').'. Please Contact Your Administrator';
						$data['template_header']='template_header';
						$data['template_footer']='template_footer';
						$data['main_content']='view_create_work_item_type_form';
						$data['title']='New Work Item Types Form';
						$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
						$this->load->view('template',$data);
					}		
				}
				else
				{
					$this->work_item_type_model->create_work_item_type($input_data);
					$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
					$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
					$data['work_item_types']= $this->work_item_type_model->get_all_work_item_types();
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_list_workitems_type';
					$data['title']='List Work Item Types';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$this->load->view('template',$data);
				}	
			}
			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['error']='';
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_work_item_type_form';
				$data['title']='New Work Item Types Form';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}
		}	
	}
	


	public function edit_work_item_type(){
		if ($this->check_login()) {
				return ;
			}
			else
			{
				//$input_data= array('description' => $this->input->post('description') );
				//$this->work_item_type_model->create_work_item_type($input_data);	
				//echo "string";	
				$data['work_item_types']= $this->work_item_type_model->get_all_work_types();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_edit_workitems_type';
				$data['title']='New Work Item Types Form';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}	
	}

	public function update_work_item_type_by_id(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['work_item_types']= $this->work_item_type_model->get_all_work_types();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_edit_workitems_type';
			$data['title']='New Work Item Types Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);	
		}
	}

	public function get_label_for_work_item_type_crucial_dates()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$work_item_type= $this->input->post('work_type');
			$crucial_dates_caption= $this->work_item_type_model->get_label_for_work_item_type_crucial_dates($work_item_type);
			echo json_encode($crucial_dates_caption);

		}
	}
	
}