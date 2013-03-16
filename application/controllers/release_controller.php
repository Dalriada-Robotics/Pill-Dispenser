<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Release_Controller extends CI_Controller {

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
					$header_data['title'] = 'Pill Dispenser - Release Notes';
					
					//this will load the header template
					$this->load->view('header_view', $header_data);
					
					//this will load the header template
					$this->load->view('release_view');
					
					//this will load the footer template
					$this->load->view('footer_view');					
				}
			 else
				{
					//If no session, redirect to login page
					redirect('login', 'refresh');
				}		
		}
}
	?>