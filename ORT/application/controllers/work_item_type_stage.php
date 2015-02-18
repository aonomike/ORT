<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_item_type_stage extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Work_type_stage_model');
		$this->load->model('Work_item_type_model');
		$this->load->model('stage_model');
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

	public function list_work_type_stage()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{

			$work_item_type_stage=$this->Work_type_stage_model->get_all_work_item_type_stage_details();	
			$data['stages']=$this->stage_model->get_all_stages();
			$data['work_item_type_stage']=$work_item_type_stage;
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitem_type_stage';
			$data['title']='List Work Items';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_work_item_type_stage_form(){
		if ($this->check_login()) {
			return ;
		}
		else
		{

			$data['work_item_types']=$this->Work_item_type_model->get_all_work_item_types();
			$data['stages']=$this->stage_model->get_all_stages();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_work_item_type_stage';
			$data['title']='Create Work Items Type Stage Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_work_item_type_stage(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('work-item-type-for-stage','Work Item Type','trim|required|xss_clean');
			$this->form_validation->set_rules('stage-id','Stage','trim|required|xss_clean');
			
			if($this->form_validation->run())
			{
				 $data = array('work_type' =>$this->input->post('work-item-type-for-stage') ,
				 	'stage'=>$this->input->post('stage-id'),
				 	'date_created' =>date('Y-m-d H:i:s'),
				 	'created_by' =>$this->session->userdata('user_id'),
				 	'last_updated_by' =>$this->session->userdata('user_id'),
				 	'date_last_updated' =>date('Y-m-d  H:i:s')
				 	 );
				   $this->Work_type_stage_model->create_work_item_type_stage($data);
				   $this->list_work_type_stage();
			}

			else
			{
				$data['work_item_types']=$this->Work_item_type_model->get_all_work_item_types();
				$data['stages']=$this->stage_model->get_all_stages();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_work_item_type_stage';
				$data['title']='Create Work Items Type Stage Form';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}

			
		}
	}

	public function edit_work_item_type_stage_form($id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['work_item_type_stage']=$this->Work_type_stage_model->get_work_type_stage_by_id($id);
			$data['work_item_types']=$this->Work_item_type_model->get_all_work_item_types();
			$data['stages']=$this->stage_model->get_all_stages();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_edit_work_item_type_stage';
			$data['title']='Create Work Items Type Stage Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function delete_work_item_type_stage($id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['work_item_type_stage']=$this->Work_type_stage_model->void_work_type_stage_by_id($id);			
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_edit_work_item_type_stage';
			$data['title']='Create Work Items Type Stage Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}


}
