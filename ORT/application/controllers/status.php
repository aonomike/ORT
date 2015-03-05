<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();			
		$this->load->model('status_model');	
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

	public function list_status()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$status=$this->status_model->get_all_status();	
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['status']=$status;
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_status';
			$data['title']='List Status';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_status_form(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_status_form';
			$data['title']='Create statuss Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_status(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('details','Description','trim|required|xss_clean');
			$this->form_validation->set_rules('status','Description','trim|required|xss_clean');
			
			if($this->form_validation->run())
			{
				 $data = array('description' =>$this->input->post('status'),
				 				'details'=>$this->input->post('details'),
								'date_created' =>date('Y-m-d H:i:s'),
							 	'created_by' =>$this->session->userdata('user_id'),
							 	'last_updated_by' =>$this->session->userdata('user_id'),
							 	'date_last_updated' =>date('Y-m-d H:i:s') );
				 $this->status_model->create_status($data);
				 $this->list_status();      	
				   
			}

			else
			{
				$this->create_status_form();
			}

			
		}
	}

	public function delete_status($id)
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->status_model->delete_status($id);
			$this->list_status();
		}
	}

}
