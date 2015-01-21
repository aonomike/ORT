<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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
	public function load_home_page(){
		if ($this->check_login())
			{
				return;
			}
			else{
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='home_page';
					$data['title']='OR Tracking System';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$this->load->view('template',$data);
					//$this->load->view('home_page');
			}
	}


}