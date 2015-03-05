<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stage extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();			
		$this->load->model('Stage_model');
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

	public function list_stages()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$stage=$this->Stage_model->get_all_stages();	
			$data['stages']=$stage;
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_stages';
			$data['title']='List Stages';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_stages_form(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_stages_form';
			$data['title']='Create Stages Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_stage(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('description','Description','trim|required|xss_clean');
			
			
			if($this->form_validation->run())
			{
				 $data = array('description' =>$this->input->post('description'));
				   $this->Stage_model->create_stage($data);
				   $this->list_stages();      	
				   
			}

			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['work_item_types']=$this->Work_item_type_model->get_all_work_item_types();
				$data['authors']=$this->Author_model->get_author_details();
				$data['author_type']=$this->Author_type_model->get_all_authors_types();
				$data['work_items']=$this->work_item_model->get_work_item_list();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_work_item_author_form';
				$data['title']='Create Work Items Form';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}

			
		}
	}

}
