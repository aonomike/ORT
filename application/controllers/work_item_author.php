<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_item_author extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('work_item_model');
		$this->load->model('Work_item_type_model');	
		$this->load->model('Author_model');
		$this->load->model('Author_type_model');
		$this->load->model('Work_item_author_model');	
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

	public function create_work_items_author_form(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['work_item_types']=$this->Work_item_type_model->get_all_work_item_types();
			$data['authors']=$this->Author_model->get_author_details();
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
