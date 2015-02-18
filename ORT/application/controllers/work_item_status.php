<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_item_status extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('work_item_status_model');
		$this->load->model('work_item_type_model');
		$this->load->model('stage_model');
		$this->load->model('work_item_model');
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

	public function list_work_item_status()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$work_item_status=$this->work_item_status_model->get_all_work_item_status_details();
			$data['work_item_status']=$work_item_status;
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_work_item_status';
			$data['title']='List Work Item Status';
			$data['page_heading']='Work Item Status';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_work_item_status_form(){
		if ($this->check_login()) {
			return ;
		}
		else
		{

			$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
			$data['work_items']=$this->work_item_model->get_all_work_items();
			$data['status']=$this->status_model->get_all_status();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_work_item_status';
			$data['title']='Create Work Items Status Form';
			$data['page_heading']='Create Work Item Status';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_work_item_status(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('status','Status ','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item','Work Item ','trim|required|xss_clean');
			
			if($this->form_validation->run())
			{
				 $data = array('work_item_id' =>$this->input->post('work-item') ,
				 	'status'=>$this->input->post('status'),
				 	'date_created' =>date('Y-m-d H:i:s'),
				 	'created_by' =>$this->session->userdata('user_id'),
				 	'last_updated_by' =>$this->session->userdata('user_id'),
				 	'date_last_updated' =>date('Y-m-d  H:i:s')
				 	 );
				   $this->work_item_status_model->create_work_item_status($data);

				  	$data['success']= 'Work Item '.$this->input->post('title').' Created Succesfully.';
				  	$work_item_status=$this->work_item_status_model->get_all_work_item_status_details();
					$data['work_item_status']=$work_item_status;
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_list_work_item_status';
					$data['title']='List Work Item Status';
					$data['page_heading']='Work Item Status';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$this->load->view('template',$data);
			}

			else
			{
				$this->create_work_item_status_form();
			}

			
		}
	}

	public function edit_work_item_status($id){
		if ($this->check_login()) {
			return ;
		}
		else
		{		
			$data['work_item_status']=$this->work_item_status_model->get_work_item_status_by_id($id);
			$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
			$data['work_items']=$this->work_item_model->get_all_work_items();
			$data['status']=$this->status_model->get_all_status();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_edit_work_item_status';
			$data['title']='Edit Work Item Status Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function delete_work_item_status($id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->work_item_status_model->delete_work_item_status_by_id($id);			
			$work_item_status=$this->work_item_status_model->get_all_work_item_status_details();
			$data['work_item_status']=$work_item_status;
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_work_item_status';
			$data['title']='List Work Item Status';
			$data['page_heading']='Work Item Status';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function get_work_item_status_by_work_item_id()
	{
		$id=$this->input->post('values');
		$work_item_status=$this->work_item_status_model->get_work_item_status_by_work_item_id($id);
		echo json_encode($work_item_status);
	}

	public function update_work_item_status()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('status','Status ','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item','Work Item ','trim|required|xss_clean');
			
			if($this->form_validation->run())
			{
				$id=$this->input->post('work-item-status');
				 $data = array('work_item_id' =>$this->input->post('work-item') ,
				 	'status'=>$this->input->post('status'),				 	
				 	'last_updated_by' =>$this->session->userdata('user_id'),
				 	'date_last_updated' =>date('Y-m-d  H:i:s')
				 	 );
				   $this->work_item_status_model->update_work_item_status_by_id($id,$data);
				   $work_item_status=$this->work_item_status_model->get_all_work_item_status_details();
				$data['work_item_status']=$work_item_status;
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_list_work_item_status';
				$data['title']='List Work Item Status';
				$data['page_heading']='Work Item Status';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}

			else
			{
				$id=$this->input->post('work-item-status');
				$data['work_item_status']=$this->work_item_status_model->get_work_item_status_by_id($id);
				$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
				$data['work_items']=$this->work_item_model->get_all_work_items();
				$data['status']=$this->status_model->get_all_status();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_edit_work_item_status';
				$data['title']='Edit Work Item Status Form';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
				
			}

			
		}
		
	}


}
