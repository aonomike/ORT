<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_users');
	}
	public function index()
	{
		$this->login();
	}

	public function login(){

		$this->load->view('login');
	}

	public function login_validation(){

		$this->form_validation->set_rules('email','Email','required|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required|md5|trim');

		if ($this->form_validation->run())
		{
			$data= array(
					'email'=>$this->input->post('email'),
					'is_logged_in'=>1
				);
			$this->session->set_userdata($data);
			redirect('index.php/main/members');
		}
		else
		{
			$this->load->view('login');
		}

	}

	public function members(){
		if($this->session->userdata('is_logged_in')==1)
		{
			$this->load->view('members');
		}
		else
		{
			redirect('index.php/main/restricted'); 
		}
		
	}

	public function validate_credentials(){

		$this->load->model('model_users');

		if($this->model_users->can_log_in())
		{			
			return true;
		}
		else
		{
				$this->form_validation->set_message('validate_credentials','Incorrect username');
				return false;
		}
	}

	public function restricted(){
		
			$this->load->view('restricted');
		}

		public function logout(){
		
		$this->session->sess_destroy();
		redirect('index.php/main/login');
	}

	public function signup(){
		
			$this->load->view('signup');
		}

		public function signup_validation(){
		
			$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password','Password','required|trim');
			$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]');

			$this->form_validation->set_message('is_unique','Email address already exists');

			if($this->form_validation->run())
				{
					//generate a random key										
					$key=md5(uniqid());
					$this->load->library('email', array('mailtype'=>'html'));
					$this->load->model('model_users');

					$this->email->from('mikeaono.com','mike');
					$this->email->to($this->input->post('email'));
					$this->email->subject('confirm your account');
					$message="<p> Thank you for signing up</p>";
					$message.="<p><a href='".base_url()."index.php/main/register_user/$key'>click here </a>to confirm your account</p>";
					$this->email->message($message);

					//send an email to the user	
					if ($this->model_users->add_temp_users($key))	
					{
							if($this->email->send())
						{
							echo 'Success';
						}
						else
						{
							echo 'could not send email';
						}
					}
					else
					{
						echo 'problem adding user to database';
					}			
					

					// add them to te temp database

				}
			else
				{$this->load->view('signup');}

		}

		public function register_user($key)
		{
			if ($new_email=$this->model_users->is_key_valid($key))
			{
				if($this->model_users->add_user($key))
				{
					$data= array(
							'email'=>$new_email,
							'is_logged_in'=>1
						);

					$this->session->set_userdata($data);
					redirect('index.php/main/members');
				}
				else
				{
					echo 'add user failed, please try again';
				}
			}
			else
			{
				echo 'invalid key'; 
			}
			
		}



	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */