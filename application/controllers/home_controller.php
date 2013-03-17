<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home_Controller extends CI_Controller {

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
					//pass the page title to the view
					$header_data['title'] = 'Pill Dispenser';
					//lets pass the code for the logout option
					$header_data['login'] = "<a href='patient_controller/logout' class='' title='Logout'>Logout</a>";
					
					//lets load the model relevant to this model
					$this->load->model('home_model');
					
					//this will load the header template
					$this->load->view('header_view', $header_data);
					
					//this will load the body view
					$this->load->view('home_view');
					
					//this will load the footer template
					$this->load->view('footer_view');			
			
		   	}
		 else
		   	{
								
			 	//If no session, redirect to login page
			 	redirect('login', 'refresh');
		   	}
	}
 	//logout function
	function logout()
		 {
			   //clear session data
			   $this->session->unset_userdata('logged_in');
			   session_destroy();
			   //redirect to login
			   redirect('login', 'refresh');
		 }

}

?>
