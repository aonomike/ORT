<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authors extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff_model');	
		$this->load->model('author_model');	
		$this->load->model('author_type_model');
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

	public function list_authors()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$author= $this->author_model->get_author_details();
			$data['author']=$author;	
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_authors';
			$data['title']='View Authors Page';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}

	}
	public function create_new_author_form()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$staff=$this->author_model->get_staff_for_author_creation();		
			$data['staff']=$staff;	
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_author_form';
			$data['title']='Create New Authors';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_new_author()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$this->form_validation->set_rules('staff-id','Staff Name ','trim|required|xss_clean');
			if ($this->form_validation->run()) {
					$data = array('staff_id' =>$this->input->post('staff-id'),
					'date_created' =>date('Y-m-d H:i:s'),
				 	'created_by' =>$this->session->userdata('user_id'),
				 	'last_updated_by' =>$this->session->userdata('user_id'),
				 	'date_last_updated' =>date('Y-m-d H:i:s') );
					$this->author_model->create_author($data);
					$data['author']=$this->author_model->get_author_details();
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_list_authors';
					$data['title']='Manage Authors';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$this->load->view('template',$data);
			}
			else
			{	
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_author_form';
				$data['title']='Create New Authors';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}
		}

	}

	public function get_authors_not_inserted_for_work_item_with_jpost($work_item_id)
	{
		
	}

	public function Create_missing_authors()
	{
		$title=$this->input->post('title');
		$first_name=$this->input->post('first_name');
		$second_name=$this->input->post('second_name');
		$last_name=$this->input->post('last_name');
		$organisation=$this->input->post('organisation');
		$country=$this->input->post('country');
		$designation=$this->input->post('designation');
		$data = array(
						'title' => $title,
						'first_name'=>$first_name,
						'last_name'=>$last_name,
						'second_name'=>$second_name,
						'organisation'=>$organisation,
						'designation_id'=>$designation,
						'country'=>$country,
						'date_created' =>date('Y-m-d H:i:s'),
					 	'created_by' =>$this->session->userdata('user_id'),
					 	'updated_by' =>$this->session->userdata('user_id'),
					 	'date_updated' =>date('Y-m-d H:i:s') 
					);
		$new_staff_id=$this->staff_model->create_staff_and_return_new_id($data);
		$author_data = array('staff_id' =>$new_staff_id);
		$new_author_id=$this->author_model->create_new_author_and_return_new_id($author_data);

		echo json_encode($new_author_id);




									
	}
}



?>