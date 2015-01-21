<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('rbac_model');
		$this->load->model('work_item_type_model');
		$this->load->model('stage_model');
		$this->load->model('work_item_model');
	}

	function upload_form()
	{
		
		//$this->load->view('view_upload_document', array('error' => ' ' ));
		$data['error']='';
		$data['template_header']='template_header';
		$data['template_footer']='template_footer';
		$data['main_content']='view_upload_document';
		$data['title']='Upload Work Item Stage Output';
		$data['stages']=$this->stage_model->get_all_stages();
		$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));	
		$data['work_item_types']=$this->work_item_type_model->get_all_work_item_types();
		$data['work_items']=$this->work_item_model->get_all_work_items();
		$this->load->view('template',$data);
	}

	function do_upload()
	{
		$config['upload_path'] = 'uploads/';
		// var_dump(is_dir('uploads/')).'</br>';
		// var_dump($_SERVER['SCRIPT_FILENAME']);
		$config['allowed_types'] = 'gif|jpg|png|pdf|doc';
		$config['max_size']	= '1000';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';

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

			$this->load->view('view_upload_success', $data);
		}
	}
}
?>