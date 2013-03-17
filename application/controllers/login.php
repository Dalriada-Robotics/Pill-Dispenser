<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 	{
		//lets check to see if a session is present
		if($this->session->userdata('logged_in'))
		{
			 //Go to private area
     		redirect('home_controller', 'refresh');
		}
		else
		{
			//pass the page title to the view
			$header_data['title'] = 'Pill Dispenser';
			$header_data['login'] = "<a href='login' class='' title='Login'>Login</a>";
	   
			$this->load->helper(array('form', 'url'));
			$this->load->view('header_view', $header_data);
			$this->load->view('login_view');
		}
 }

}

?>
