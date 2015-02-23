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
			$data['error']='';
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

	public function create_work_item_stage_output_form_pass_work_item_id($work_item_id)
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['requests']=$this->action_request_model->get_action_request();
			$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_id);
			$data['error']='';
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

	public function	list_work_item_stage_output_with_workitem_id($work_item_id)
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{	
			$data['work_item']	= $this->work_item_model->get_work_item_by_id($work_item_id);		
			$data['work_item_stage_outputs']=$this->work_item_stage_output_model->get_all_work_item_stage_output_details_by_work_item_id($work_item_id);
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_list_workitem_stage_output';
			$data['title']='List Work Item Stage Output';
			$data['page_heading']='Work Item Stage Output';
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
			$this->form_validation->set_rules('status','Stage ','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item-type-filter','Work Item Type ','trim|required|xss_clean');
			$this->form_validation->set_rules('work-item','Work Item ','trim|required|xss_clean');
			$this->form_validation->set_rules('request','Action Request ','trim|required|xss_clean');

			if($this->form_validation->run())
			{
				$work_item_type= $this->input->post('work-item-type-filter');
				$upload_description= $this->input->post('description');
				$work_item_posted= $this->input->post('work-item');				
				$work_item_type= $this->input->post('work-item-type-filter');
				$remarks= $this->input->post('comments');
				$version = $this->input->post('version');
				$stage=$this->input->post('stage');
				//echo($work_item_stage);
				
				//create a work item stage and return new id
				$work_item_stage_data= array(
												'work_item_id' => $work_item_posted, 
												'stage'	=>$stage,
												'created_by' =>$this->session->userdata('user_id') ,
							 					'last_update_by' =>$this->session->userdata('user_id') ,
							 					'last_update_date' =>date('Y-m-d H:i:s'),
							 					'date_created' =>date('Y-m-d H:i:s')
											);

				$work_item_stage=$this->work_item_stage_model->create_work_item_stage_and_return_new_id($work_item_stage_data);
				 $upload_path="";
				//get month and year(of the upload date) to be used to create the upload path 
				 $this_year= date('Y');
				 $this_month=date('m');				
				
				$work_item_type_value= $this->work_item_type_model->get_work_type_by_id($work_item_type);
				
				$work_item_type_text = $work_item_type_value->description;
				
				$work_item=$this->work_item_model->get_work_item_by_id($this->input->post('work-item'));
				$work_item_text=$work_item->description;
				//print_r($work_item_text);	
				if (!is_dir('uploads/'.$work_item_type_text))
				{
					mkdir('uploads/'.$work_item_type_text.'/');
					
				}			
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
					// $config['max_size']	= '10000';
					// $config['max_width']  = '1024';
					 //$config['max_height']  = '768';
					 $this->load->library('upload', $config);
					 $this->upload->initialize($config);
					 if ( !$this->upload->do_upload())
						{
							$data['error']=$this->upload->display_errors();
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
				 		else
				 		{
				 			 $data = array('upload_data' => $this->upload->data());
							 $upload_data_array=$this->upload->data();
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
							 						'description' =>$upload_description ,						
							 						'upload_path' =>$upload_path.''.$client_name, 
							 						'created_by' =>$this->session->userdata('user_id') ,
							 						'last_update_by' =>$this->session->userdata('user_id') ,
							 						'date_updated' =>date('Y-m-d H:i:s')
							 						,'voided'=>0
							 						,'version'=>$version);		
							 					
							$new_doc_id = $this->document_model->create_document_and_return_new_id($document_data);
							$work_item_stage_id=$this->work_item_stage_output_model->get_work_item_stage($work_item_posted,$work_item_stage);
							// "string";
							//print_r($work_item_stage_id);
							$work_item_stage_output_data= array( 'work_item_stage' =>$work_item_stage ,
							  						'user_remarks' =>$remarks ,
							  						'document' =>$new_doc_id , 
							  						'date_created' =>date('Y-m-d H:i:s') ,
							  						'created_by' =>$this->session->userdata('user_id') ,
							  						'last_updated_by' =>$this->session->userdata('user_id') ,
							  						'last_update_date' =>date('Y-m-d H:i:s')
							  						,'voided'=>0);

							$this->work_item_stage_output_model->create_work_item_stage_output($work_item_stage_output_data);
							$data['work_item']=$this->work_item_model->get_work_item_by_id($work_item_posted); 	
							$data['success']='Document has been successfuly uploaded';
							$data['work_item_stage_outputs']=$this->work_item_stage_output_model->get_all_work_item_stage_output_details_by_work_item_id($work_item_posted);
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
					$work_item_id=$this->input->post('work-item');
					$data['error']='The directory for the work item type '.$work_item_type.' does not exist. Please consult your Administrator';
					$data['work_item']	= $this->work_item_model->get_work_item_by_id($work_item_id);
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
			else
			{

				$work_item_id=$this->input->post('work-item');
				$data['work_item']	= $this->work_item_model->get_work_item_by_id($work_item_id);
				$data['error']='';
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
	}

	public function download_output($upload_id)
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$download_document= $this->work_item_stage_output_model->get_document_path_to_download($upload_id);
			$upload_path=$download_document->upload_path;
			if (is_file($upload_path))
			{
				$this->load->helper('download');
				$data = file_get_contents($upload_path); // Read the file's contents
				$name = $download_document->file_name;
				force_download($name, $data); 
							
			}

			else
			{
				$data['error_message']=true;
				$data['success']="The file path provided (".$upload_path.") does not exist. Please consult your Administrator";
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

	public function void_work_item_stage_output($id){
		if ($this->check_login()) {
			return ;
		}
		else
		{
			 	$this->work_item_stage_output_model->void_work_item_stage_output_by_id($id);			
				$data['success']="Output successfuly voided";
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

	public function get_stages_by_work_item_stage(){
		$work_item=$this->input->post('values');
		$stages=$this->work_item_stage_model->get_stages_by_work_item_stage($work_item);
		echo(json_encode($stages));
	}

	public function receive_output_form()
	{
		if ($this->check_login()) {
			return ;
		}
		else
		{
			$data['error']='';
			$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
			$data['work_items']=$this->work_item_model->get_all_work_items();
			$data['stages']=$this->stage_model->get_all_stages();
			$data['status']=$this->status_model->get_all_status();
			$data['template_header']='template_header';
			$data['template_footer']='template_footer';
			$data['main_content']='view_receive_document';
			$data['title']='Create Work Items Stage Output Form';
			$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
			$this->load->view('template',$data);
		}	
	}

	public function create_new_document_entry_with_jpost(){
		if($this->check_login())
		{
			return;
		}
		else
		{
			$date_received=$this->input->post('date_received');
			$work_item_id=$this->input->post('work_item');
            $work_item_type= $this->input->post('work_item_type');
            $stage= $this->input->post('stage');

           
            {

            }


		}
	}

}
