<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Dispenser_Controller extends CI_Controller {

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
					$header_data['title'] = 'Pill Dispenser - Dispensers';
					//lets pass the code for the logout option
					$header_data['login'] = "<a href='patient_controller/logout' class='' title='Logout'>Logout</a>";
					
					//lets load the model relevant to this model
					$this->load->model('dispenser_model');
					
					//lets load the functions that we want to use from the above model
					$page_data['disp_records'] = $this->dispenser_model->disp_records();					
					
					//this will load the header template
					$this->load->view('header_view', $header_data);
					
					//this will load the body text
					$this->load->view('dispenser_view', $page_data);
					
					//this will load the footer template
					$this->load->view('footer_view');					
				}
			 else
				{
					//If no session, redirect to login page
					redirect('login', 'refresh');
				}		
		}
	//function for inserting new records
	function disp_insert()
		{
			//lets load the model relevant to this model
			$this->load->model('dispenser_model');
			
			//retrieve all data from the form premitt and store in an array
			$disp_insert = $_POST["disp_insert"];
			
			//pass the values tot he model for the db insert
			$this->dispenser_model->disp_insert($disp_insert);
			
			//redirect tot the default controller showing the new patient that has been added
			redirect('dispenser_controller', 'refresh');	
		}
	//controller for the dispenser connect and run script
	function disp_run()
		{
			//lets load the model relevant to the update
			$this->load->model('dispenser_model');

			//pass the values to the model for the db insert
			$this->dispenser_model->disp_run();
		}
	//controller for the dispenser connect and run script when as a demo
	function disp_run_demo()
		{
			//lets load the model relevant to the update
			$this->load->model('dispenser_model');

			//pass the values to the model for the db insert
			$this->dispenser_model->disp_run_demo();
		}
	//controller for the dispenser connect and run script
	function disp_feedback()
		{
			//lets load the model relevant to the update
			$this->load->model('dispenser_model');

			//pass the values to the model for the db insert
			$this->dispenser_model->disp_feedback();
		}
}
	?>