<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_item_stage_status extends CI_Controller
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

	public function list_work_item_stage_status()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$work_item_stage_status=$this->work_item_stage_status_model->get_all_work_item_stage_status_details();
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();	
			$data['work_item_stage_status']=$work_item_stage_status;
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitem_stage_status';
			$data['title']='List Work Item Stage Status';
			$data['page_heading']='Work Item Stage Status';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_work_item_stage_status_form(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
			$data['work_items']=$this->work_item_model->get_all_work_items();
			$data['stages']=$this->stage_model->get_all_stages();
			$data['status']=$this->status_model->get_all_status();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_work_item_stage_status';
			$data['title']='Create Work Items Stage Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_work_item_stage_status(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('stage','Stage ','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item','Work Item ','trim|required|xss_clean');
			
			if($this->form_validation->run())
			{
				 $data = array('work_item_id' =>$this->input->post('work-item') ,
				 	'stage'=>$this->input->post('stage'),
				 	'date_created' =>date('Y-m-d H:i:s'),
				 	'created_by' =>$this->session->userdata('user_id'),
				 	'last_update_by' =>$this->session->userdata('user_id'),
				 	'last_update_date' =>date('Y-m-d  H:i:s')
				 	 );
				   $this->work_item_stage_status_model->create_work_item_stage_status($data);
				   $work_item_stage_status=$this->work_item_stage_status_model->get_all_work_item_stage_status_details();	
					$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
					$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
					$data['work_item_stage_status']=$work_item_stage_status;
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_list_workitem_stage_status';
					$data['title']='List Work Item Stage Status';
					$data['page_heading']='Work Item Stage Status';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$this->load->view('template',$data);
			}

			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
				$data['work_items']=$this->work_item_model->get_all_work_items();
				$data['stages']=$this->stage_model->get_all_stages();
				$data['status']=$this->status_model->get_all_status();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_work_item_stage_status';
				$data['title']='Create Work Items Stage Form';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}

			
		}
	}

	public function edit_work_item_stage_form($id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			if ($this->work_item_model->get_work_item_list_by_id($id))
			{
				$error['error_message']='Work item stage of id '.$id.' missing. Please Contact Administrator';
				$this->load->view('view_error_page',$error);
			}
			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['work_item_stage']=$this->work_item_stage_model->get_all_work_item_stage_details_by_id($id);
				$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
				$data['work_items']=$this->work_item_model->get_all_work_items();
				$data['stages']=$this->stage_model->get_all_stages();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_edit_work_item_stage';
				$data['title']='Edit Work Items  Stage Form';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
				
			}
		}
	}

	public function delete_work_item_stage($id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['work_item_stage']=$this->Work_item_stage_model->void_work_type_stage_by_id($id);			
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_edit_work_item_stage';
			$data['title']='Create Work Items Type Stage Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}


}
