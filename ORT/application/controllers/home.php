<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rbac_model');
		$this->load->model('work_item_model');
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
			else
			{
					$data['total_work_items']=$this->work_item_model->get_total_work_item_count();
					$data['work_item_counts']=$this->work_item_model->get_work_item_count_by_type();
					$data['work_item']=$this->work_item_model->search_work_item();
					$data['template_header']='template_header';
					$data['template_footer']='template_footer';
					$data['main_content']='view_list_workitems';
					$data['title']='OR Tracking System';
					$data['rights']=$this->rbac_model->get_right_by_role($this->session->userdata('role'));
					$this->load->view('template',$data);
					//$this->load->view('home_page');
			}
	}


}
