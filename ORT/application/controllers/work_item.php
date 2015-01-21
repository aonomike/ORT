<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_item extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('work_item_model');
		$this->load->model('Work_item_type_model');	
		$this->load->model('author_model');
		$this->load->model('work_item_stage_model');
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
	public function list_work_items(){
		if($this->check_login())
		{
			return;
		}
		else
		{		
			$work_item=$this->work_item_model->get_work_item_list();	
			$data['work_item_type']=$this->Work_item_type_model->get_all_work_item_types();	
			$data['work_item']=$this->work_item_model->get_work_item_list();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitems';
			$data['title']='List Work Items';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
			$this->load->view('template',$data);
		}
		
	}

	public function create_work_items_form(){
		if($this->check_login())
		{
			return;
		}
		else
		{
			$data['work_item_type']=$this->Work_item_type_model->get_all_work_item_types();
			$data['author']=$this->author_model->get_author_details();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_workitems';
			$data['title']='Create Work Items Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
			$this->load->view('template',$data);
		}
	}

	public function delete_work_items(){
		if($this->check_login())
		{
			return;
		}
		else
		{
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_workitems';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
			$this->load->view('template',$data);
		}
	}

	public function update_work_items(){
		if($this->check_login())
		{
			return;
		}
		else
		{
			$this->form_validation->set_rules('work-item-id','Work item id ','trim|required|xss_clean');
			$this->form_validation->set_rules('title','Title ','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item-type','Work Item Type ','trim|required|xss_clean');
			$this->form_validation->set_rules('submission-deadline','Submission Deadline','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$insert_data = array('description' =>$this->input->post('title') ,
									'work_type' =>$this->input->post('work-item-type'),
									'submission_deadline' =>$this->input->post('submission-deadline'), 
									'date_last_updated' =>date('Y-m-d H:i:s'), 
									'last_updated_by' => $this->session->userdata('user_id')
									 );	
									
				$id=$this->input->post('work-item-id');							
				$this->work_item_model->update_work_item_by_id($insert_data,$id);
				$data['work_item']=$this->work_item_model->get_work_item_list();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_list_workitems';
				$data['title']='List Work Item';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
				$this->load->view('template',$data);		
			}
			else
			{
				$data['work_item_type']=$this->Work_item_type_model->get_all_work_item_types();
				$data['author']=$this->author_model->get_author_details();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_edit_workitems';
				$data['title']='Edit work items';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
				$data['work_item']=$this->work_item_model->get_work_item_list_by_id($id);
				$this->load->view('template',$data);
			}
			
		}
		
	}
	public function edit_work_items_form($id){
		if($this->check_login())
		{
			return;
		}
		else
		{	
			
			
		/*if ($this->work_item_model->get_work_item_list_by_id($id))
			{
				$error['error_message']='Work item of id '.$id.' missing. Please Contact Administrator';
				$this->load->view('view_error_page',$error);
			}
			else
			{
				$data['work_item_type']=$this->Work_item_type_model->get_all_work_item_types();
				$data['author']=$this->author_model->get_author_details();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_edit_workitems';
				$data['title']='Edit work items';
				$data['work_item']=$this->work_item_model->get_work_item_list_by_id($id);
				$this->load->view('template',$data);

			}*/
			$data['work_item_type']=$this->Work_item_type_model->get_all_work_item_types();
				$data['author']=$this->author_model->get_author_details();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_edit_workitems';
				$data['title']='Edit work items';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
				$data['work_item']=$this->work_item_model->get_work_item_list_by_id($id);
				$this->load->view('template',$data);
			

		}
			
	}


	public function create_work_items(){
		if($this->check_login())
			{return;}
		else
		{
			$this->form_validation->set_rules('title','Title ','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item-type','Work Item Type ','trim|required|xss_clean');
			$this->form_validation->set_rules('submission-deadline','Submission Deadline','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$insert_data= array('description' =>$this->input->post('title') ,
									'work_type' =>$this->input->post('work-item-type'),
									'submission_deadline' =>$this->input->post('submission-deadline'), 
									'creation_date' =>date('Y-m-d H:i:s'), 
									'created_by' => $this->session->userdata('user_id') , 
									'date_last_updated' =>date('Y-m-d H:i:s'), 
									'last_updated_by' => $this->session->userdata('user_id')
									 );	
									
											
				$this->work_item_model->create_work_item($insert_data);
				$data['work_item']=$this->work_item_model->get_work_item_list();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_list_workitems';
				$data['title']='List Work Item';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
				$this->load->view('template',$data);
			}
			else
			{
				$this->create_work_items_form();
			}
		}
	}

	public function get_work_item_by_work_item_type()
	{
		$work_item_type=$this->input->post('work_item_type');
		$work_item = $this->work_item_model->get_work_item_by_work_item_type($work_item_type);
		echo json_encode($work_item);
	}

	public function get_work_item_by_work_item_id()
	{
		$work_item_id=$this->input->post('values');
		$work_item=$this->work_item_model->get_work_item_by_id($work_item_id);
		echo json_encode($work_item);
	}

	public function view_work_item($id)
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$data['work_item']= $this->work_item_model->get_work_item_by_id($id);
			$data['work_item_author']= $this->author_model->get_author_details_by_work_item_id($id);
			$data['work_item_stage']= $this->work_item_stage_model->get_work_item_stage_by_work_item_id($id);
			//print_r($this->work_item_stage_model->get_work_item_stage_by_work_item_id($id));
			//$data['work_item_status']=$this->work_item_status_model->get_work_item_status_by_id($id);
			//$data['work_item_stage_output']=$this->work_item_stage_output_model->get_work_item_stage_output_by_id($id);
			$data['id']=$id;
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_view_workitems';
			$data['title']='View Work Item';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
			$this->load->view('template',$data);
		 }
	}

}
