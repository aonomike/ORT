<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_item_author extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('work_item_model');	
		$this->load->model('staff_model');
		$this->load->model('author_model');
		$this->load->model('author_type_model');
		$this->load->model('work_item_author_model');	
		$this->load->model('work_item_type_model');
		$this->load->model('rbac_model');
		$this->load->model('designation_model');
		$this->load->model('country_model');
		$this->load->model('organisation_model');
		$this->load->model('employee_title_model');
		$this->load->model('work_item_stage_output_model');
		$this->load->model('work_item_type_model');
		$this->load->model('stage_model');
		$this->load->model('work_item_model');
		$this->load->model('work_item_stage_status_model');
		$this->load->model('status_model');	
		$this->load->model('work_item_stage_model');	
		$this->load->model('document_model');
		$this->load->model('action_request_model');	

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

	public function list_work_item_author()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$work_item_author=$this->work_item_author_model->get_all_work_item_author_details();	
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['work_item_author']=$work_item_author;
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitem_author';
			$data['title']='List Work Items';
			$data['page_heading']='List Work Item Author';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function list_work_item_author_by_work_item_id($work_item_id)
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{

			$work_item_author=$this->work_item_author_model->get_all_work_item_author_details_by_work_item_id($work_item_id);	
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
			$data['work_item_author']=$work_item_author;
			$data['work_item_id']=$work_item_id;
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitem_author';
			$data['title']='List Work Item Authors';
			$data['page_heading']='List Work Item Author';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function view_work_item_author_details($work_item_id,$work_item_author_id)
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['work_item_author']=$this->work_item_author_model->get_all_work_item_author_details_by_id($work_item_author_id);
			$data['titles']=$this->employee_title_model->get_titles();
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['organisation']=$this->organisation_model->get_organisations();
			$data['designations']=$this->designation_model->get_designations();
			$data['countries']=$this->country_model->get_countries();
			$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
			$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
			$data['authors']=$this->author_model->get_authors_for_work_item();
			$data['author_types']=$this->author_type_model->get_all_authors_types();
			$data['work_items']=$this->work_item_model->get_all_work_items();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_view_workitem_author';
			$data['title']='Create Work Items Author Form';
			$data['page_heading']='Create Work Item Author';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_work_items_author_form($work_item_id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
			$staff=$this->author_model->get_staff_for_author_creation();		
			$data['staff']=$staff;
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['titles']=$this->employee_title_model->get_titles();
			$data['organisation']=$this->organisation_model->get_organisations();
			$data['designations']=$this->designation_model->get_designations();
			$data['countries']=$this->country_model->get_countries();
			$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
			$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
			$data['authors']=$this->author_model->get_authors_for_work_item();
			$data['author_types']=$this->author_type_model->get_all_authors_types();
			$data['work_items']=$this->work_item_model->get_all_work_items();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_work_item_author_form';
			$data['title']='Create New Authors';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_work_items_author_form_with_author_list($work_item_id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['work_item'] = $this->work_item_model->get_work_item_by_id($work_item_id);
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['authors']=$this->author_model->get_author_details();
			$data['author_types']=$this->author_type_model->get_all_authors_types();
			$data['work_items']=$this->work_item_model->get_all_work_items();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_work_item_author_form_with_list';
			$data['title']='Create Work Items Author Form';
			$data['page_heading']='Create Work Item Author';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_work_item_author_using_jpost(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$author_id=$this->input->post('author_id');
			$author_type_id=$this->input->post('author_type_id');
			$new_work_item_id=$this->input->post('new_work_item_id'); 
			$data = array('author_id' =>$author_id , 
				 	'work_item_id' =>$new_work_item_id ,
				 	'author_type'=>$author_type_id,
				 	'date_created' =>date('Y-m-d H:i:s'),
				 	'created_by' =>$this->session->userdata('user_id'),
				 	'last_updated_by' =>$this->session->userdata('user_id'),
				 	'date_last_updated' =>date('Y-m-d  H:i:s')
				 	 );
			$new_work_item_author_id = $this->work_item_author_model->create_work_item_author_using_jpost_and_return_new_id($data);
			$work_item_authors = $this->work_item_author_model->get_all_work_item_author_details_by_id($new_work_item_id);
			echo json_encode($work_item_authors);
		}
	}

	public function create_work_item_author(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('author','Author','trim|required|xss_clean');
			$this->form_validation->set_rules('author-type','Author Type','trim|required|xss_clean');
			$work_item_id=$this->input->post('work-item-id');
			if($this->form_validation->run())
			{
				
				$this->form_validation->set_rules('author','Author','trim|required|xss_clean');
				$this->form_validation->set_rules('author-type','Author Type','trim|required|xss_clean');
				$this->form_validation->set_rules('designation','Designation','trim|required|xss_clean');
				$this->form_validation->set_rules('organisation','Organisation','trim|required|xss_clean');
				$this->form_validation->set_rules('country','Country','trim|required|xss_clean');
				$work_item_id=$this->input->post('work-item-id');
				if($this->form_validation->run())
				{
					
					$country_id = $this->input->post('country');
					$organisation= $this->input->post('organisation');
					$organisation_id = $this->get_organisation_by_name($organisation);
					$designation= $this->input->post('designation');
					$designation_id = $this->get_designation_by_name($designation);
					
					$data = array(
					 					'author_id' =>$this->input->post('author') , 
								 		'work_item_id' =>$this->input->post('work-item-id') ,
								 		'author_type'=>$this->input->post('author-type'),
								 		'institution_of_affiliation' =>$organisation_id , 
								 		'country' =>$country_id ,
								 		'Designation'=>$designation_id,
								 		'date_created' =>date('Y-m-d H:i:s'),
								 		'created_by' =>$this->session->userdata('user_id'),
								 		'last_updated_by' =>$this->session->userdata('user_id'),
									 	'date_last_updated' =>date('Y-m-d  H:i:s'),
									 	'retire'=>0
					 			 );
						
						$this->work_item_author_model->create_work_item_author($data);
					  	$work_item_author=$this->work_item_author_model->get_all_work_item_author_details_by_work_item_id($work_item_id);	
						$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
						$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
						$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
						$data['work_item_author']=$work_item_author;
						$data['template_header']='template_header';
						$data['template_footer']='template_footer';
						$data['main_content']='view_list_workitem_author';
						$data['title']='List Work Items';
						$data['page_heading']='List Work Item Author';
						$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
						$this->load->view('template',$data);
				}

				else
				{
					$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
					$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
					$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
					$data['authors']=$this->author_model->get_author_details();
					$data['author_type']=$this->author_type_model->get_all_authors_types();
					$data['work_items']=$this->work_item_model->get_work_item_list();
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_create_work_item_author_form';
					$data['title']='Create Work Items Form';
					$data['page_heading']='Create Work Item Author';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$data['author_types']=$this->author_type_model->get_all_authors_types();
					$this->load->view('template',$data);
				}
		}
	}
}

	public function create_work_item_author_two(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('author','Author','trim|required|xss_clean');
			$this->form_validation->set_rules('author-type','Author Type','trim|required|xss_clean');
			$this->form_validation->set_rules('designation','Designation','trim|required|xss_clean');
			$this->form_validation->set_rules('organisation','Organisation','trim|required|xss_clean');
			$this->form_validation->set_rules('country','Country','trim|required|xss_clean');
			$work_item_id=$this->input->post('work-item-id');
			if($this->form_validation->run())
			{
				
				$country_id= $this->input->post('country');
				$organisation= $this->input->post('organisation');
				$organisation_id = $this->get_organisation_by_name($organisation);
				$designation= $this->input->post('designation');
				$designation_id = $this->get_designation_by_name($designation);
				
				$data = array(
				 				'author_id' =>$this->input->post('author') , 
							 		'work_item_id' =>$this->input->post('work-item-id') ,
							 		'author_type'=>$this->input->post('author-type'),
							 		'institution_of_affiliation' =>$organisation_id , 
							 		'country' =>$country_id ,
							 		'Designation'=>$designation_id,
							 		'date_created' =>date('Y-m-d H:i:s'),
							 		'created_by' =>$this->session->userdata('user_id'),
							 		'last_updated_by' =>$this->session->userdata('user_id'),
								 	'date_last_updated' =>date('Y-m-d  H:i:s'),
								 	'retire'=>0
				 			 );
					// echo($work_item_id);
					// print_r($this->work_item_model->get_work_item_by_id($work_item_id));
					$this->work_item_author_model->create_work_item_author($data);
					$data['requests']=$this->action_request_model->get_action_request();
					$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
					$data['error']='';
					$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
					$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
					$data['work_items']=$this->work_item_model->get_all_work_items();
					$data['stages']=$this->stage_model->get_all_stages();
					$data['status']=$this->status_model->get_all_status();
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_create_work_item_stage_output';
					$data['title']='Create Work Items Stage Output Form';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$this->load->view('template',$data);
			}

			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
				$data['authors']=$this->author_model->get_author_details();
				$data['author_type']=$this->author_type_model->get_all_authors_types();
				$data['work_items']=$this->work_item_model->get_work_item_list();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_work_item_author_form';
				$data['title']='Create Work Items Form';
				$data['page_heading']='Create Work Item Author';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$data['author_types']=$this->author_type_model->get_all_authors_types();
				$this->load->view('template',$data);
			}

			
		}
	}


	
	public function get_organisation_by_name($organisation_name)
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$organisation = $this->organisation_model->get_organisation_id_by_name($organisation_name);
			if($organisation==false && $organisation_name!='')
			{
				$data= array(
								'name' =>$organisation_name ,
								'date_created' => date('Y-m-d H:i:s') , 
								'created_by' => $this->session->userdata('user_id')  , 
								'date_last_upadated' =>date('Y-m-d H:i:s') , 
								'last_updated_by' => $this->session->userdata('user_id') 
						 );
				$organisation_id=$this->organisation_model->insert_organisation_and_return_new_id($data);
				return $organisation_id;
			}


			else
			{
				return $organisation->organisation_id;
			}


		}
	}

	public function get_designation_by_name($designation_name)
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$designation_name=$this->input->post('designation');
			$designation = $this->designation_model->get_designation_id_by_name($designation_name);
			if($designation==false && $designation_name!='')
			{
				$data= array(
								'Name' =>$designation_name ,
						 );
				$designation_id=$this->designation_model->insert_designation_and_return_new_id($data);
				return $designation_id;
			}


			else
			{
				return $designation->ID;
			}

		}
	}
	
	public function create_new_work_item_author(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('author','Author','trim|required|xss_clean');
			$this->form_validation->set_rules('author-type','Author Type','trim|required|xss_clean');
			$this->form_validation->set_rules('designation','Designation','trim|required|xss_clean');
			$this->form_validation->set_rules('organisation','Organisation','trim|required|xss_clean');
			$this->form_validation->set_rules('country','Country','trim|required|xss_clean');
			$work_item_id=$this->input->post('work-item-id');

			if($this->form_validation->run())
			{
				$country_id= $this->input->post('country');
				$organisation= $this->input->post('organisation');
				$organisation_id = $this->get_organisation_by_name($organisation);
				$designation= $this->input->post('designation');
				$designation_id = $this->get_designationson_by_name($designation);
				
				$data = array(
				 				'author_id' =>$this->input->post('author') , 
						 		'work_item_id' =>$this->input->post('work-item-id') ,
						 		'author_type'=>$this->input->post('author-type'),
						 		'institution_of_affiliation' =>$organisation_id , 
						 		'country' =>$country_id ,
						 		'Designation'=>$designation_id,
						 		'date_created' =>date('Y-m-d H:i:s'),
						 		'created_by' =>$this->session->userdata('user_id'),
						 		'last_updated_by' =>$this->session->userdata('user_id'),
							 	'date_last_updated' =>date('Y-m-d  H:i:s'),
							 	'retire'=>0
				 			 );
				
				// $work_item_id=$this->input->post('work-item-id');
				    
				$this->work_item_author_model->create_work_item_author($data);
				echo json_encode($organisation_id);
			}

			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
				$data['authors']=$this->author_model->get_author_details();
				$data['author_type']=$this->author_type_model->get_all_authors_types();
				$data['work_items']=$this->work_item_model->get_work_item_list();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_work_item_author_form';
				$data['title']='Create Work Items Form';
				$data['page_heading']='Create Work Item Author';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$data['author_types']=$this->author_type_model->get_all_authors_types();
				$this->load->view('template',$data);
			}

			
		}
	}



	
	public function retire_work_item_author($work_item_id,$work_item_author_id)
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$this->work_item_author_model->retire_work_item_author($work_item_author_id);
			$work_item_author=$this->work_item_author_model->get_all_work_item_author_details_by_work_item_id($work_item_id);	
			$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
			$data['work_item_author']=$work_item_author;
			$data['work_item_id']=$work_item_id;
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitem_author';
			$data['title']='List Work Item Authors';
			$data['page_heading']='List Work Item Author';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function view_work_item_author($work_item_author_id)
	{

	}

	//edit the work item author
	public function edit_work_items_author_form($work_item_author_id)
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['work_item_author_id']=$work_item_author_id;
			$data['work_item_author']=$this->work_item_author_model->get_all_work_item_author_details_by_id($work_item_author_id);
			$data['titles']=$this->employee_title_model->get_titles();
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['organisation']=$this->organisation_model->get_organisations();
			$data['designations']=$this->designation_model->get_designations();
			$data['countries']=$this->country_model->get_countries();
			$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
			$data['authors']=$this->author_model->get_authors_for_work_item();
			$data['author_types']=$this->author_type_model->get_all_authors_types();
			$data['work_items']=$this->work_item_model->get_all_work_items();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_edit_work_item_author';
			$data['title']='Create Work Items Author Form';
			$data['page_heading']='Create Work Item Author';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function update_work_item_author()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{			
			$work_item_author_id=$this->input->post('work-item-author-id');
			$work_item_id=$this->input->post('work-item-id');
			$this->form_validation->set_rules('author','Author','trim|required|xss_clean');
			$this->form_validation->set_rules('author-type','Author Type','trim|required|xss_clean');
			$this->form_validation->set_rules('designation','Designation','trim|required|xss_clean');
			$this->form_validation->set_rules('organisation','Organisation','trim|required|xss_clean');
			$this->form_validation->set_rules('country-select','Country','trim|required|xss_clean');
			
			if($this->form_validation->run())
			{
				
				$country= $this->input->post('country-select');
				$organisation= $this->input->post('organisation');
				$organisation_id = $this->get_organisation_by_name($organisation);
				$designation= $this->input->post('designation');
				$designation_id = $this->get_designation_by_name($designation);
				
				$data = array(
				 					'author_id' =>$this->input->post('author') , 
							 		'author_type'=>$this->input->post('author-type'),
							 		'institution_of_affiliation' =>$organisation_id , 
							 		'country' =>$country ,
							 		'Designation'=>$designation_id,
							 		'last_updated_by' =>$this->session->userdata('user_id'),
								 	'date_last_updated' =>date('Y-m-d  H:i:s')
				 			 );
				
				$this->work_item_author_model->update_work_item_author($data, $work_item_author_id);
			    $data['work_item_author']=$this->work_item_author_model->get_all_work_item_author_details_by_id($work_item_author_id);		
			    $data['titles']=$this->employee_title_model->get_titles();
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
				$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
				$data['authors']=$this->author_model->get_authors_for_work_item();
				$data['author_types']=$this->author_type_model->get_all_authors_types();
				$data['work_items']=$this->work_item_model->get_all_work_items();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_view_workitem_author';
				$data['title']='Create Work Items Author Form';
				$data['page_heading']='Create Work Item Author';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);

			}

			else
			{
				$data['work_item_author_id']=$work_item_author_id;
				$data['work_item_author']=$this->work_item_author_model->get_all_work_item_author_details_by_id($work_item_author_id);
				$data['titles']=$this->employee_title_model->get_titles();
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['organisation']=$this->organisation_model->get_organisations();
				$data['designations']=$this->designation_model->get_designations();
				$data['countries']=$this->country_model->get_countries();
				$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
				$data['authors']=$this->author_model->get_authors_for_work_item();
				$data['author_types']=$this->author_type_model->get_all_authors_types();
				$data['work_items']=$this->work_item_model->get_all_work_items();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_edit_work_item_author';
				$data['title']='Create Work Items Author Form';
				$data['page_heading']='Create Work Item Author';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}			
		}
	}
}
