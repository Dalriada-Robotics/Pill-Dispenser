<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Log_Controller extends CI_Controller {

	function __construct()
		{
			parent::__construct();
		}
	//main function
	function index()
		{
			//lets check to see if a session is present
			if($this->session->userdata('logged_in'))
				{
					//do the following
					
					//pass the page title to the view
					$header_data['title'] = 'Pill Dispenser - Logs';
					//lets pass the code for the logout option
					$header_data['login'] = "<a href='patient_controller/logout' class='' title='Logout'>Logout</a>";
					
					//lets load the model relevant to this model
					$this->load->model('log_model');
					
					//lets load the functions that we want to use from the above model
					$page_data['log_records'] = $this->log_model->log_records();	
					
					//lets pass on a value if the prescriptions are empty
					$page_data['log_empty'] = "No log records";				
					
					//this will load the header template
					$this->load->view('header_view', $header_data);
					
					//this will load the body text
					$this->load->view('log_view', $page_data);
					
					//this will load the footer template
					$this->load->view('footer_view', $page_data);					
				}
			 else
				{
					//If no session, redirect to login page
					redirect('login', 'refresh');
				}		
		}
	//function to clear the logs
	function log_clear()
		{
			//lets load the model relevant to this model
			$this->load->model('log_model');	
			
			//pass the value to the model for the db update
			$this->log_model->log_clear();
			
			//redirect to the default controller
			redirect('log_controller', 'refresh');
		}
}
	?>