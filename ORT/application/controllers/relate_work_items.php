
<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relate_work_items extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rbac_model');
		$this->load->model('work_item_model');
		$this->load->model('work_item_type_model');
		$this->load->model('relate_work_items_model');
		$this->load->model('country_model');
		$this->load->model('author_model');
		$this->load->model('employee_title_model');
		$this->load->model('work_item_stage_model');
		$this->load->model('author_type_model');
		$this->load->model('rbac_model');
		$this->load->model('stage_model');
		$this->load->model('status_model');
		$this->load->model('staff_model');
		$this->load->model('Author_type_model');
		$this->load->model('Work_item_author_model');	
		$this->load->model('designation_model');
		$this->load->model('organisation_model');
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

	
	public function list_related_work_items($work_item_id){
		if ($this->check_login())
			{
				return;
			}
			else{
					echo "string";
					// //print_r($this->work_item_model->get_work_item_by_id($work_item_id));
					// $data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
					// $data['total_work_items']=$this->work_item_model->get_total_work_item_count();
					// $data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
					// $data['work_item_id']=$work_item_id;
					// $data['relations']= $this->relate_work_items_model->get_related_work_item_by_work_item_id($work_item_id);
					// $data['template_header']='template_header';
					// $data['template_footer']='template_footer';
					// $data['main_content']='view_list_related_work_item';
					// $data['title']='List Author Contact';
					// $data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					// $this->load->view('template',$data);
				}
	}

	public function create_work_item_relation_form($work_item_id)
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{			
			$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
			$data['relations']= $this->relate_work_items_model->get_related_work_item_by_work_item_id($work_item_id);
			$data['relation_types']= $this->relate_work_items_model->get_work_item_relation_types();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_create_related_work_item_relations';
			$data['title']='Create Related Work Item Relation';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);

		}
	}

	public function create_related_work_items()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$this->form_validation->set_rules('work-item-type-filter','Work item type','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item','Work item','trim|required|xss_clean');
			$this->form_validation->set_rules('relation-type','Relation Type','trim|required|xss_clean');
			$work_item_id = $this->input->post('current-work-item');
			if($this->form_validation->run())
			{
				 $data = array('related_to' =>$this->input->post('work-item'),
				 				'work_item_id'=>$this->input->post('current-work-item'),
				 				'relation_type'=>$this->input->post('relation-type')
				 				);
				$this->relate_work_items_model->create_related_work_items($data);
				$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
				$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
				$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
				$data['work_item_id']=$work_item_id;
				$data['relations']= $this->relate_work_items_model->get_related_work_item_by_work_item_id($work_item_id);
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_list_related_work_item';
				$data['title']='List Author Contact';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			      	
				   
			}

			else
			{
				$this->create_status_form();
			}

		}
	}

	public function create_work_item_relations_with_jpost(){
		$current_work_item=$this->input->post('current_work_item'); 
		$related_work_item=$this->input->post('related_work_item');
		$relation_type=$this->input->post('relation_type');

		 $data = array('related_to' =>$related_work_item,
				 				'work_item_id'=>$current_work_item,
				 				'relation_type'=>$relation_type
				 				);
		$this->relate_work_items_model->create_related_work_items($data);
		echo json_encode(1);
	}

	public function edit_related_work_items($relation_id)
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			//$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
			$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
			$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
			$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
			//$data['relations']= $this->relate_work_items_model->get_related_work_item_by_work_item_id($work_item_id);
			$data['relation_types']= $this->relate_work_items_model->get_work_item_relation_types();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_edit_related_work_item_relations';
			$data['title']='Create Related Work Item Relation';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function create_related_work_items_wizard()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$relation = $this->input->post('relation-radio');
				$work_item_id = $this->input->post('current-work-item');
			if ($relation ==1)
			{
				$this->form_validation->set_rules('work-item-type-filter','Work item type','trim|required|xss_clean');
				$this->form_validation->set_rules('work-item','Work item','trim|required|xss_clean');
				$this->form_validation->set_rules('relation-type','Relation Type','trim|required|xss_clean');
			
				if($this->form_validation->run())
				{
					 $data = array('related_to' =>$this->input->post('work-item'),
					 				'work_item_id'=>$this->input->post('current-work-item'),
					 				'relation_type'=>$this->input->post('relation-type')
					 				);
					$this->relate_work_items_model->create_related_work_items($data);
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
					$data['author_types']=$this->Author_type_model->get_all_authors_types();
					$data['work_items']=$this->work_item_model->get_all_work_items();
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_create_author_form_two';
					$data['title']='Create New Authors';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$this->load->view('template',$data);
				      	
					   
				}

				else
				{
					$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
					$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
					$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
					$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
					$data['relations']= $this->relate_work_items_model->get_related_work_item_by_work_item_id($work_item_id);
					$data['relation_types']= $this->relate_work_items_model->get_work_item_relation_types();
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_create_related_work_item_relations';
					$data['title']='Create Related Work Item Relation';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$this->load->view('template',$data);
				}

			}
			else
			{	

				$data['work_item']=$this->work_item_model->get_work_item_by_id($this->input->post('current-work-item'));
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
				$data['author_types']=$this->Author_type_model->get_all_authors_types();
				$data['work_items']=$this->work_item_model->get_all_work_items();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_create_author_form_two';
				$data['title']='Create New Authors';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
			}
			

		}
	}


}
