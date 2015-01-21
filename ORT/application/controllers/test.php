<?php
class Test extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view('view_test');
	}

	public function add()
	{
		//echo $this->input->post('test-id');
		//echo $_POST['test_id'];
		
		echo $this->input->post('test-id');
	}
}
?>