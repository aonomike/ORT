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
		$this->load->model('staff_contact_model');
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
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
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
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();	
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
					$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
					$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
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
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_author_form';
				$data['title']='Create New Authors';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}
		}

	}

	public function get_author_list()
	{
		$work_item_id=$this->input->post('work_item_id');
		$authors_list=$this->author_model->get_authors_not_inserted_for_work_item($work_item_id);
		echo json_encode($authors_list);
	}

	public function Create_missing_authors()
	{
		$title=$this->input->post('title');
		$first_name=$this->input->post('first_name');
		$second_name=$this->input->post('second_name');
		$telephone=$this->input->post('telephone');
		$email=$this->input->post('email');
		
		$data = array(
						'title' => $title,
						'first_name'=>$first_name,
						'second_name'=>$second_name,
						'date_created' =>date('Y-m-d H:i:s'),
					 	'created_by' =>$this->session->userdata('user_id'),
					 	'updated_by' =>$this->session->userdata('user_id'),
					 	'date_updated' =>date('Y-m-d H:i:s') 
					);
		$new_staff_id=$this->staff_model->create_staff_and_return_new_id($data);

		$contact_data =  array( 
							   array(
							      'staff_id' => $new_staff_id ,
							      'contact_value' => $email ,
							      'contact_type' => 2,
							      'date_created' =>date('Y-m-d H:i:s'),
								  'added_by' =>$this->session->userdata('user_id'),
								  'updated_by' =>$this->session->userdata('user_id'),
								  'date_updated' =>date('Y-m-d H:i:s') 
							   ),
							   array(
							      'staff_id' => $new_staff_id ,
							      'contact_value' => $telephone ,
							      'contact_type' => 1,
							      'date_created' =>date('Y-m-d H:i:s'),
								  'added_by' =>$this->session->userdata('user_id'),
								  'updated_by' =>$this->session->userdata('user_id'),
								  'date_updated' =>date('Y-m-d H:i:s')
							   )
							);
		$this->staff_contact_model->insert_batch_contacts($contact_data);

		$author_data = array(
								'staff_id' =>$new_staff_id,
								'date_created' =>date('Y-m-d H:i:s'),
							 	'created_by' =>$this->session->userdata('user_id'),
							 	'last_updated_by' =>$this->session->userdata('user_id'),
							 	'date_last_updated' =>date('Y-m-d H:i:s') 
							 	);
		$new_author_id=$this->author_model->create_new_author_and_return_new_id($author_data);

		echo json_encode($new_author_id);




									
	}


	public function add_author_contact_form($author_id)
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['work_item_author']=$this->work_item_author_model->get_work_item_author_by_author_id($author_id);
			$data['author_type']= $this->author_type_model->get_author_types();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_author_contact_form';
			$data['title']='Create Author Contact';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}
}



?>