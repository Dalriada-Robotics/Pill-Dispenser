<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Pill_Controller extends CI_Controller {

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
					$header_data['title'] = 'Pill Dispenser - Pill Records';
					//lets pass the code for the logout option
					$header_data['login'] = "<a href='patient_controller/logout' class='' title='Logout'>Logout</a>";

					//lets load the model relevant to this model
					$this->load->model('pill_model');
					
					//lets load the functions that we want to use from the above model
					$page_data['pill_records'] = $this->pill_model->pill_records();
					
					//this will load the header template
					$this->load->view('header_view', $header_data);
					
					//this will load the body view
					$this->load->view('pill_view', $page_data);
					
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
	function pill_insert()
		{
			//lets load the model relevant to this model
			$this->load->model('pill_model');
			
			//retrieve all data from the form premitt and store in an array
			$pill_insert = $_POST["pill_insert"];
			
			//pass the values tot he model for the db insert
			$this->pill_model->pill_insert($pill_insert);
			
			//redirect tot the default controller showing the new patient that has been added
			redirect('pill_controller', 'refresh');	
		}
}
	?>