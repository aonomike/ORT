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
		$this->load->model('author_type_model');
		$this->load->model('rbac_model');
		$this->load->model('stage_model');
		$this->load->model('status_model');
				
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
			$data['authors']=$this->author_model->get_author_details();
			$data['author_types']=$this->author_type_model->get_all_authors_types();	
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
			$this->form_validation->set_rules('reference-number','Reference Number ','trim|required|xss_clean|is_unique[work_item.reference_number]');
			$this->form_validation->set_rules('details','Details ','trim|required|xss_clean');
			
			$this->form_validation->set_rules('submission-deadline','Submission Deadline','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$insert_data = array('description' =>$this->input->post('title') ,
									'work_type' =>$this->input->post('work-item-type'),
									'submission_deadline' =>$this->input->post('submission-deadline'),
									'reference_number' =>$this->input->post('reference-number'),
									'details' =>$this->input->post('details'),
									'date_last_updated' =>date('Y-m-d H:i:s'), 
									'last_updated_by' => $this->session->userdata('user_id')
									 );	
									
				$id=$this->input->post('work-item-id');							
				$this->work_item_model->update_work_item_by_id($insert_data,$id);
				$data['work_item']= $this->work_item_model->get_work_item_by_id($id);
				$data['work_item_author']= $this->author_model->get_author_details_by_work_item_id($id);
				$data['work_item_stage']= $this->work_item_stage_model->get_work_item_stage_by_work_item_id($id);
				$data['id']=$id;
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_view_workitems';
				$data['title']='View Work Item';
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
			$data['work_item_type']=$this->Work_item_type_model->get_all_work_item_types();
			$data['author']=$this->author_model->get_author_details();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_edit_workitems';
			$data['title']='Edit work items';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
			$data['work_item']=$this->work_item_model->get_work_item_by_id($id);
			$this->load->view('template',$data);
		}
			
	}


	public function create_work_items(){
		if($this->check_login())
			{return;}
		else
		{
			$this->form_validation->set_rules('title','Title ','trim|required|xss_clean');
			$this->form_validation->set_rules('reference-number','Reference Number ','trim|required|xss_clean|is_unique[work_item.reference_number]');
			$this->form_validation->set_rules('work-item-type','Work Item Type ','trim|required|xss_clean');
			$this->form_validation->set_rules('submission-deadline','Submission Deadline','trim|required|xss_clean');
			$this->form_validation->set_rules('details','Details ','trim|required|xss_clean');
			if($this->form_validation->run())
			{
				$insert_data= array('description' =>$this->input->post('title') ,
									'work_type' =>$this->input->post('work-item-type'),
									'submission_deadline' =>$this->input->post('submission-deadline'), 
									'reference_number' =>$this->input->post('reference-number'), 
									'creation_date' =>date('Y-m-d H:i:s'), 
									'created_by' => $this->session->userdata('user_id') , 
									'date_last_updated' =>date('Y-m-d H:i:s'), 
									'details'=>$this->input->post('details'),
									'last_updated_by' => $this->session->userdata('user_id')
									 );	
									
											
				$this->work_item_model->create_work_item($insert_data);
				$data['work_item']=$this->work_item_model->search_work_item();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_list_workitems';
				$data['title']='List Work Item';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
				$data['success']= 'Work Item '.$this->input->post('title').' Created Succesfully.';
				$this->load->view('template',$data);
			}
			else
			{
				$this->create_work_items_form();
			}
		}
	}

	public function create_work_item_with_jpost(){
		if($this->check_login())
			{return;}
		else
		{
			
				$insert_data= array('description' =>$this->input->post('work_item_title') ,
									'work_type' =>$this->input->post('work_item_type'),
									'submission_deadline' =>date('Y-m-d H:i:s'), 
									'creation_date' =>date('Y-m-d H:i:s'), 
									'created_by' => $this->session->userdata('user_id') , 
									'date_last_updated' =>date('Y-m-d H:i:s'), 
									'last_updated_by' => $this->session->userdata('user_id')
									 );	
									
											
				$new_work_item_id=$this->work_item_model->create_work_item_and_return_new_id($insert_data);
				$newly_inserted_work_item=$this->work_item_model->get_work_item_by_id($new_work_item_id);
				echo json_encode($newly_inserted_work_item);
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

	public function search_work_item_with_jpost()
	{
		$search_text=$this->input->post('search_text');
		$work_items = $this->work_item_model->search_work_item_with_jpost($search_text);
		echo json_encode($work_items);
	}
	

	public function receive_document($work_item_id)
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$data['work_item'] = $this->work_item_model->get_work_item_by_id($work_item_id);
			$data['authors'] = $this->author_model->get_author_details();
			$data['reasons_for_submission'] = $this->work_item_model->get_all_reasons_for_submission();
			$data['author_types']=$this->author_type_model->get_all_authors_types();
			$data['stages']=$this->stage_model->get_all_stages();
			$data['status']=$this->status_model->get_all_status(); 	
			$data['work_item_type']=$this->Work_item_type_model->get_all_work_item_types();
			$data['author']=$this->author_model->get_author_details();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='receive_document';
			$data['title']='Receive Document';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
			$this->load->view('template',$data);
		}
		
	}

}
