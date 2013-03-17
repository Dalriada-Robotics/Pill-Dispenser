<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Prescription_Controller extends CI_Controller {

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
					$header_data['title'] = 'Pill Dispenser - prescriptions';
					//lets pass the code for the logout option
					$header_data['login'] = "<a href='patient_controller/logout' class='' title='Logout'>Logout</a>";
					
					//lets load the model relevant to this model
					$this->load->model('Prescription_model');
					
					//lets load the functions that we want to use from the above model
					$page_data['pre_records'] = $this->Prescription_model->pre_records();
					
					//lets pass on a value if the prescriptions are empty
					$page_data['pre_empty'] = "No active Prescriptions";
					
					//this will load the header template
					$this->load->view('header_view', $header_data);
					
					//this will load the body view
					$this->load->view('Prescription_view', $page_data);
					
					//this will load the footer template
					$this->load->view('footer_view');					
				}
			 else
				{
					//If no session, redirect to login page
					redirect('login', 'refresh');
				}
		}
	//add new Prescription
	function pre_insert()
		{
			//lets load the model relevant to the insert
			$this->load->model('Prescription_model');
			
			//retrieve all data from the form submitted and store in an array
			$pre_insert = $_POST['pre_insert'];
			
			//store the duration as a value as it will be used for the minutes for the demo run
			$pre_duration = $pre_insert['PREduration'];
			
			//take the timestamp and add it to the $pre_insert array
			$pre_insert['PREstartdate'] = $this->Prescription_model->pre_timestamp($pre_duration);
			
			//pass the values to the model for the db insert
			$this->Prescription_model->pre_insert($pre_insert);
						
			//redirect to the default controller showing the new Prescription
			redirect('patient_controller', 'refresh');		
		}
	function pre_update()
		{
			//lets load the model relevant to the update
			$this->load->model('Prescription_model');
			
			//lets get the name of the table that the data is held
			$data['table'] = $_POST['table'];
			
			//lets ge the key of the record for the db
			$data['key'] = $_POST['key'];

			//lets get the id of the element that we are updating
			$data['id'] = $_POST['record_id'];
			
			//lets get the name of the field that has been edited
			$field = $_POST['elementid'];
			
			//lets get the new value
			//add it to the data array
			$data['newvalue'] = $_POST['newvalue'];
			
			//lets create an array out of the submitted data
			$data['values'] = array( $field => $data['newvalue'] );			
			
			//required to have the new value display on refresh
			print_r($data['newvalue']);
			
			//pass the values to the model for the db insert
			$this->Prescription_model->pre_update($data);
			
			//redirect to the default controller showing the new Prescription
			redirect('patient_controller', 'refresh');		
		}
	//delete Prescription (deactivates)
	function pre_delete()
		{
		
		}
}
	?>