<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_item_stage_output extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();		
		$this->load->model('work_item_stage_output_model');
		$this->load->model('work_item_type_model');
		$this->load->model('stage_model');
		$this->load->model('work_item_model');
		$this->load->model('work_item_stage_status_model');
		$this->load->model('status_model');	
		$this->load->model('work_item_stage_model');	
		$this->load->model('rbac_model');	
		$this->load->model('document_model');	
		
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

	public function list_work_item_stage_output()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{			
			$data['work_item_stage_outputs']=$this->work_item_stage_output_model->get_all_work_item_stage_output_details();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitem_stage_output';
			$data['title']='List Work Item Stage Output';
			$data['page_heading']='Work Item Stage Output';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));			
			$this->load->view('template',$data);
		}
	}

	public function create_work_item_stage_output_form(){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
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
	}

	public function create_work_item_stage_output(){
		if ($this->check_login()) {
			return ;
		}
		else
		{			
			$this->form_validation->set_rules('stage','Stage ','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item-type-filter','Work Item Type ','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item','Work Item ','trim|required|xss_clean');
			$this->form_validation->set_rules('description','Stage ','trim|required|xss_clean');

			if($this->form_validation->run())
			{
				$work_item_type= $this->input->post('work-item-type-filter');
				$upload_description= $this->input->post('description');
				$work_item= $this->input->post('work_item');
				$work_item_type= $this->input->post('work-item-type-filter');
				$comments= $this->input->post('comments');
				

				$upload_path="";
				//get month and year(of the upload date) to be used to create the upload path 
				$this_year= date('Y');
				$this_month=date('m');				
				
				$work_item_type_value= $this->work_item_type_model->get_work_type_by_id($work_item_type);
				$work_item_type_text = $work_item_type_value->description;
				$work_item=$this->work_item_model->get_work_item_by_id($this->input->post('work-item'));
				$work_item_text=$work_item->description;				
				if (is_dir('uploads/'.$work_item_type_text))
				{
					if (!is_dir('uploads/'.$work_item_type_text.'/'.$this_year)) {
						mkdir('uploads/'.$work_item_type_text.'/'.$this_year);
					}
					if (!is_dir('uploads/'.$work_item_type_text.'/'.$this_year.'/'.$this_month)) {
						mkdir('uploads/'.$work_item_type_text.'/'.$this_year.'/'.$this_month);
					}
					if (!is_dir('uploads/'.$work_item_type_text.'/'.$this_year.'/'.$this_month.'/'.$work_item_text)) {
						mkdir('uploads/'.$work_item_type_text.'/'.$this_year.'/'.$this_month.'/'.$work_item_text);
					}
					$upload_path='uploads/'.$work_item_type_text.'/'.$this_year.'/'.$this_month.'/'.$work_item_text.'/';
					$config['upload_path']='uploads/'.$work_item_type_text.'/'.$this_year.'/'.$this_month.'/'.$work_item_text.'/';
					// var_dump(is_dir('uploads/')).'</br>';
					// var_dump($_SERVER['SCRIPT_FILENAME']);
					$config['allowed_types'] = 'gif|jpg|png|pdf|doc';
					$config['max_size']	= '10000';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					 if ( !$this->upload->do_upload())
						{
							$error = array('error' => $this->upload->display_errors());
							
							$this->load->view('view_upload_document', $error);
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$upload_data_array=$this->upload->data();
							//print_r($upload_data_array);
							 $file_name = $upload_data_array['file_name'];
							 $file_type = $upload_data_array['file_type'];
							 $file_path = $upload_data_array['file_path'];
							 $full_path = $upload_data_array['full_path'];
							 $raw_name  = $upload_data_array['raw_name'];
							 $orig_name = $upload_data_array['orig_name'];
							 $client_name = $upload_data_array['client_name'];
							 $file_ext = $upload_data_array['file_ext'];
							 $image_width = $upload_data_array['image_width'];
							 $image_height = $upload_data_array['image_height'];
							 $image_type = $upload_data_array['image_type'];
							
							 $document_data= array( 'date_created' =>date('Y-m-d H:i:s') ,
							 						'file_type' =>$file_type ,
							 						'file_name' =>$file_name ,
							 						'file_path' =>$file_path ,
							 						'full_path' =>$full_path,
							 						'raw_name' =>$raw_name ,
							 						'orig_name' =>$orig_name ,
							 						'client_name' =>$client_name ,	
							 						'description' =>$client_name ,						
							 						'upload_path' =>$upload_path.''.$file_name, 
							 						'created_by' =>$this->session->userdata('user_id') ,
							 						'last_update_by' =>$this->session->userdata('user_id') ,
							 						'date_updated' =>date('Y-m-d H:i:s')
							 						,'voided'=>0
							 						,'version'=>$version);
							 $new_doc_id=$this->document_model->create_document_and_return_new_id($document_data);

							 $work_item_stage_output_data= array( 'work_item_stage' =>$work_item_stage ,
							 						'Comments' =>$comments ,
							 						'document' =>$new_doc_id , 
							 						'date_created' =>date('Y-m-d H:i:s') ,
							 						'created_by' =>$this->session->userdata('user_id') ,
							 						'last_update_by' =>$this->session->userdata('user_id') ,
							 						'last_update_date' =>date('Y-m-d H:i:s')
							 						,'voided'=>0);

							 $this->work_item_stage_output_model->create_work_item_stage_output($work_item_stage_output_data);

							//$this->load->view('view_upload_success', $data);
							$data['success']='Document has been successfuly uploaded';
							$data['work_item_stage_outputs']=$this->work_item_stage_output_model->get_all_work_item_stage_output_details();
							$data['template_header']='template_header';
							$data['template_footer']='template_footer';
							$data['main_content']='view_list_workitem_stage_output';
							$data['title']='List Work Item Stage Output';
							$data['page_heading']='Work Item Stage Output';
							$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));			
							$this->load->view('template',$data);
						}

				}
				else
				{
					echo "false";
				}
			}
			else
			{
				echo "string";
			}
	
		
		// 	// 	 /*$data = array('work_item_id' =>$this->input->post('work-item') ,
		// 	// 	 	'stage'=>$this->input->post('stage'),
		// 	// 	 	'date_created' =>date('Y-m-d H:i:s'),
		// 	// 	 	'created_by' =>$this->session->userdata('user_id'),
		// 	// 	 	'last_update_by' =>$this->session->userdata('user_id'),
		// 	// 	 	'last_update_date' =>date('Y-m-d  H:i:s')
		// 	// 	 	 );
		// 	// 	   $this->work_item_stage_model->create_work_item_stage($data);
		// 	// 	   $this->list_work_item_stage();*/
		// 	// }

		// 	// else
		// 	// {
		// 	// 	//$this->create_work_item_stage_form();
		// 	// 	echo "file failed";
		// 	// }

			
		}
	}

	public function download_output($file_name)
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{

		}
	}

	public function edit_work_item_stage_form($id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			if ($this->work_item_model->get_work_item_list_by_id($id))
			{
				$error['error_message']='Work item stage of id '.$id.' missing. Please Contact Administrator';
				$this->load->view('view_error_page',$error);
			}
			else
			{
				
				$data['work_item_stage']=$this->work_item_stage_model->get_all_work_item_stage_details_by_id($id);
				$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
				$data['work_items']=$this->work_item_model->get_all_work_items();
				$data['stages']=$this->stage_model->get_all_stages();
				$data['template_header']='template_header';
				$data['template_footer']='template_footer';
				$data['main_content']='view_edit_work_item_stage';
				$data['title']='Edit Work Items  Stage Form';
				$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
				$this->load->view('template',$data);
				
			}
		}
	}

	public function delete_work_item_stage($id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['work_item_stage']=$this->Work_item_stage_model->void_work_type_stage_by_id($id);			
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_edit_work_item_stage';
			$data['title']='Create Work Items Type Stage Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}
	}

	public function get_stages_by_work_item_stage(){
		$work_item=$this->input->post('values');
		$stages=$this->work_item_stage_model->get_stages_by_work_item_stage($work_item);
		echo(json_encode($stages));
	}



}
