
<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author_type extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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


	public function get_author_type_list()
	{
		if($this->check_login())
		{
			return;			
		}
		else
		{
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();			
			$data['author_type']= $this->author_type_model->get_all_authors_types();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_author_types';
			$data['title']='Manage Author Types';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_new_author_type_form()
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
			$data['main_content']='view_create_author_type_form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$data['title']='Create Author Type';
			$this->load->view('template',$data);
		}
	}
	public function create_author_type()
	{
		if($this->check_login())
		{
			return;
		}
		else
		{
			$this->form_validation->set_rules('description','Author Type Description','trim|required|xss_clean');

			if($this->form_validation->run())
			{
				$author_type = array('descriptions' => $this->input->post('description'),
										'details'=>$this->input->post('details') );
				$this->author_type_model->create_author_type($author_type);
				echo "string";
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['author_type']= $this->author_type_model->get_all_authors_types();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_list_author_types';
				$data['title']='Manage Author Types';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}
			else
			{
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['author_type']= $this->author_type_model->get_author_types();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_user_type';
				$data['title']='Create Author Type';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}
		}
	}

	
		


}
?>
 