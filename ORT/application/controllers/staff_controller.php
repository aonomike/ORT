<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff_model');
		$this->load->model('designation_model');
		$this->load->model('station_model');
		$this->load->model('program_model');
		$this->load->model('rbac_model');
		$this->load->model('contact_type_model');
		$this->load->model('work_item_model');
		$this->load->model('designation_model');
		$this->load->model('author_model');
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

	public function get_staffs()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{	
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();		
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_staff';
			$data['staff']= $this->staff_model->get_all_staff_list();
			$data['title']='Manage Staff';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);	

			
		}				
	}

	public function create_new_staff_form()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['station']=$this->station_model->get_stations();
			$data['program']=$this->program_model->get_programs();
			$data['designation']=$this->designation_model->get_designation();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_staff_form';			
			$data['title']='Create Staff';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}

	}

	public function create_new_staff()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$this->form_validation->set_rules('firstname','First Name','trim|required|xss_clean');
			$this->form_validation->set_rules('second-name','SecondName','trim|required|xss_clean');
			$this->form_validation->set_rules('last-name','Last Name','trim|required|xss_clean');
			$this->form_validation->set_rules('payroll-number','Payroll Number','trim|required|xss_clean');
			$this->form_validation->set_rules('designation','Designation','trim|required|xss_clean');
			$this->form_validation->set_rules('station','Station','trim|required|xss_clean');
			$this->form_validation->set_rules('program','Program','required|xss_clean');
			if($this->form_validation->run())
			{
				$data = array('first_name' => $this->input->post('firstname') , 
								'second_name' => $this->input->post('second-name') , 
								'last_name' => $this->input->post('last-name') , 
								'designation_id' => $this->input->post('designation') , 
								'payroll_number' => $this->input->post('payroll-number') , 
								'station_id' => $this->input->post('station') , 
								'date_created' => date('Y-m-d H:i:s') , 
								'created_by' => $this->session->userdata('user_id')  , 
								'date_updated' =>date('Y-m-d H:i:s') , 
								'updated_by' => $this->session->userdata('user_id') , 
								'program' => $this->input->post('program') );

				$this->staff_model->create_staff($data);

				echo "string";
			}
		}
	}


	public function create_staff_contact_form($staff_id)
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['staff_id']=$staff_id;
			$data['contact_type']=$this->contact_type_model->get_contact_type();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_staff_contact_form';			
			$data['title']='Create Staff Contact';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}

	}

	public function create_new_staff_contact()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$this->form_validation->set_rules('contact-type','Contact Type','trim|required|xss_clean');
			$this->form_validation->set_rules('contact-value','Contact Value','trim|required|xss_clean');
			$staff_id=$this->input->post('staff-id');
			if($this->form_validation->run())
			{
				$data = array(
								'contact_type' => $this->input->post('contact-type') , 
								'contact_value' => $this->input->post('contact-value') ,
								'staff_id' => $this->input->post('staff-id')
							);
								

				$this->staff_model->create_new_staff_contact($data);
			
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['author_contacts']= $this->author_model->get_author_contacts_by_staff_id($staff_id);			
				$data['author']= $this->staff_model->get_staff_by_id($staff_id);
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_list_author_contact';
				$data['title']='List Author Contact';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}

			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['staff_id']=$staff_id;
				$data['contact_type']=$this->contact_type_model->get_contact_type();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_staff_contact_form';			
				$data['title']='Create Staff Contact';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}
		}

	}

	public function edit_staff_contact($contact_id)
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['contacts']=$this->staff_model->get_staff_contact_by_contact_id($contact_id);			
			$data['contact_type']=$this->contact_type_model->get_contact_type();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_edit_staff_contact';			
			$data['title']='Edit Staff Contact';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}

	}


	public function update_staff_contact()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$this->form_validation->set_rules('contact-type','Contact Type','trim|required|xss_clean');
			$this->form_validation->set_rules('contact-value','Contact Value','trim|required|xss_clean');
			$contact_id = $this->input->post('contact-id');
			if($this->form_validation->run())
			{
				$data = array(
								'contact_type' => $this->input->post('contact-type') , 
								'contact_value' => $this->input->post('contact-value') ,
							);
								

				$this->staff_model->update_staff_contact($data,$contact_id);
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['author_contacts']= $this->author_model->get_author_contacts_by_contact_id($contact_id);			
				$data['author']= $this->staff_model->get_staff_by_contact_id($contact_id);
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_list_author_contact';
				$data['title']='List Author Contact';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}

			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['staff_id']=$staff_id;
				$data['contacts']=$this->staff_model->get_staff_contact_by_contact_id($contact_id);	
				$data['contact_type']=$this->contact_type_model->get_contact_type();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_edit_staff_contact';			
				$data['title']='Create Staff Contact';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}
		}

	}

	public function delete_staff_contact($contact_id)
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
				$this->staff_model->delete_staff_contact($contact_id);
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['author_contacts']= $this->author_model->get_author_contacts_by_contact_id($contact_id);			
				$data['author']= $this->staff_model->get_staff_by_contact_id($contact_id);
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_list_author_contact';
				$data['title']='List Author Contact';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				//Delete staff contact after getting the staff detail by contact id
				//$this->staff_model->delete_staff_contact($contact_id);
				$this->load->view('template',$data);
		}
	}

	
}
?>	