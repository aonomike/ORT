
<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Designation extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rbac_model');
		$this->load->model('work_item_model');
		$this->load->model('designation_model');
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
	public function get_designations(){
		if ($this->check_login())
			{
				return;
			}
			else{
					$designations= $this->designation_model->get_designations();
					echo json_encode($designations);
			}
	}

	public function get_designation_by_name()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$designation_name=$this->input->post('designation');
			$designation = $this->designation_model->get_designation_id_by_name($designation_name);
			if($designation==false && $designation_name!='')
			{
				$data= array(
								'Name' =>$designation_name ,
						 );
				$designation_id=$this->designation_model->insert_designation_and_return_new_id($data);
				echo json_encode($designation_id);
			}


			else
			{
				echo json_encode($designation->ID);
			}

		}
	}

}
