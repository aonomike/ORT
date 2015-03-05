
<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rbac_model');
		$this->load->model('work_item_model');
		$this->load->model('country_model');
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
	public function get_countries(){
		if ($this->check_login())
			{
				return;
			}
			else{
					$countries= $this->country_model->get_countries();
					echo json_encode($countries);
			}
	}

	public function get_country_by_name()
	{
		if ($this->check_login())
		{
			return;
		}
		else
		{
			$country_name=$this->input->post('country');
			$country = $this->country_model->get_country_id_by_name($country_name);
			if($country==false && $country_name!='')
			{
				$data= array(
								'Name' =>$country_name ,
						 );
				$country_id=$this->country_model->insert_country_and_return_new_id($data);
				echo json_encode($country_id);
			}


			else
			{
				echo json_encode($country->id);
			}

		}
	}


}
