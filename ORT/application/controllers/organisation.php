
<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organisation extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rbac_model');
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
	public function get_oraganitions(){
		if ($this->check_login())
			{
				return;
			}
			else{
					$oraganitions= $this->organisation_model->get_organisations();
					echo json_encode($oraganitions);
			}
	}

	public function get_organisation_by_name()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$organisation_name=$this->input->post('organisation');
			$organisation = $this->organisation_model->get_organisation_id_by_name($organisation_name);
			if($organisation==false && $organisation_name!='')
			{
				$data= array(
								'name' =>$organisation_name ,
								'date_created' => date('Y-m-d H:i:s') , 
								'created_by' => $this->session->userdata('user_id')  , 
								'date_last_upadated' =>date('Y-m-d H:i:s') , 
								'last_updated_by' => $this->session->userdata('user_id') 
						 );
				$organisation_id=$this->organisation_model->insert_organisation_and_return_new_id($data);
				echo json_encode($organisation_id);
			}


			else
			{
				echo json_encode($organisation->organisation_id);
			}


		}
	}


}
