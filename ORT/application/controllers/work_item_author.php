<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_item_author extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('work_item_model');
		$this->load->model('Work_item_type_model');	
		$this->load->model('staff_model');
		$this->load->model('Author_model');
		$this->load->model('Author_type_model');
		$this->load->model('Work_item_author_model');	
		$this->load->model('rbac_model');
		$this->load->model('designation_model');
		$this->load->model('country_model');
		$this->load->model('organisation_model');
		$this->load->model('employee_title_model');

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
			$work_item_author=$this->Work_item_author_model->get_all_work_item_author_details();	
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

			$work_item_author=$this->Work_item_author_model->get_all_work_item_author_details_by_work_item_id($work_item_id);	
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

	public function create_work_items_author_form($work_item_id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['titles']=$this->employee_title_model->get_titles();
			$data['organisation']=$this->organisation_model->get_organisations();
			$data['designations']=$this->designation_model->get_designations();
			$data['countries']=$this->country_model->get_countries();
			$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
			$data['work_item_types']=$this->Work_item_type_model->get_all_work_item_types();
			$data['authors']=$this->staff_model->get_all_staffs();
			$data['author_types']=$this->Author_type_model->get_all_authors_types();
			$data['work_items']=$this->work_item_model->get_all_work_items();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_work_item_author_form';
			$data['title']='Create Work Items Author Form';
			$data['page_heading']='Create Work Item Author';
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
			$data['authors']=$this->Author_model->get_author_details();
			$data['author_types']=$this->Author_type_model->get_all_authors_types();
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
			$new_work_item_author_id = $this->Work_item_author_model->create_work_item_author_using_jpost_and_return_new_id($data);
			$work_item_authors = $this->Work_item_author_model->get_all_work_item_author_details_by_id($new_work_item_id);
			echo json_encode($work_item_authors);
		}
	}

	public function create_work_item_author(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$this->form_validation->set_rules('work-item-type-filter','Work Item Type','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item','Work Item','trim|required|xss_clean');
			$this->form_validation->set_rules('author','Author','trim|required|xss_clean');
			$this->form_validation->set_rules('author-type','Author Type','trim|required|xss_clean');
			
			if($this->form_validation->run())
			{
				 $data = array('author_id' =>$this->input->post('author') , 
				 	'work_item_id' =>$this->input->post('work-item') ,
				 	'author_type'=>$this->input->post('author-type'),
				 	'date_created' =>date('Y-m-d H:i:s'),
				 	'created_by' =>$this->session->userdata('user_id'),
				 	'last_updated_by' =>$this->session->userdata('user_id'),
				 	'date_last_updated' =>date('Y-m-d  H:i:s')
				 	 );
				   $this->Work_item_author_model->create_work_item_author($data);
				   
				   $work_item_author=$this->Work_item_author_model->get_all_work_item_author_details();	
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
				$data['work_item_types']=$this->Work_item_type_model->get_all_work_item_types();
				$data['authors']=$this->Author_model->get_author_details();
				$data['author_type']=$this->Author_type_model->get_all_authors_types();
				$data['work_items']=$this->work_item_model->get_work_item_list();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_work_item_author_form';
				$data['title']='Create Work Items Form';
				$data['page_heading']='Create Work Item Author';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$data['author_types']=$this->Author_type_model->get_all_authors_types();
				$this->load->view('template',$data);
			}

			
		}
	}

}
