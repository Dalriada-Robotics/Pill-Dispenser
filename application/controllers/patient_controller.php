<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Patient_Controller extends CI_Controller {

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
				//lets read the session data
				$session_data = $this->session->userdata('logged_in');
				$page_data['username'] = $session_data['username'];
				//lets pass the code for the logout option
				$header_data['login'] = "<a href='patient_controller/logout' class='' title='Logout'>Logout</a>";
				
				//lets retreive the patient id from the session
				$PATid = $this->session->userdata('PATid');
				
				//pass the page title to the view
				$header_data['title'] = 'Pill Dispenser - Patient Records';
				
				//lets load the model relevant to this model
				$this->load->model('patient_model');
				
				//lets load the functions that we want to use from the above model
				$page_data['pat_selects'] = $this->patient_model->all_pat_records();
				
				//lets work out what user is logged on
				if ($session_data['username'] == 'demo') 
				{ 
					$page_data['sub_duration'] = "inline_sub_edit_duration_demo";
					$page_data['sub_duration_txt'] = "(Minutes(s))";
				 }
				else
				{ 
					$page_data['sub_duration'] = "inline_sub_edit_duration"; 
					$page_data['sub_duration_txt'] = "(Day(s))";
				}
					
				
				//lets select an individual record
				$page_data['pat_records'] = $this->patient_model->pat_record($PATid);
				
				//lets do the db join for the prescriptions
				$page_data['pat_prescriptions'] = $this->patient_model->pat_prescription($PATid);
				
				//lets do the db join for the dispenser
				$page_data['pat_dispensers'] = $this->patient_model->pat_dispenser($PATid);
				
				//lets retreive all of the pills listed
				$page_data['pat_pills'] = $this->patient_model->pat_pills();
				
				//lets retrieve all of the dispensers
				$page_data['pat_disps'] = $this->patient_model->pat_disps();
				
				$page_data['pat_not_selected_txt'] = 'Please select a Patient from the dropdown box...';
				
				//this will load the header template
				$this->load->view('header_view', $header_data);
				
				//this will load the body content
				$this->load->view('patient_view', $page_data);	
				
				//this will load the footer template
				$this->load->view('footer_view', $page_data);	
			
		   	}
		 else
		   	{
								
			 	//If no session, redirect to login page
			 	redirect('login', 'refresh');
		   	}
	}
	//function to display single patient record
	function pat_record_display()
		{
			//get the PATid from the from that was submitted
			$PATid_submitted = $_POST["PATid_submit"];
			
			//add the variable as a session so it can be passed back to the home page
			$this->session->set_userdata('PATid', $PATid_submitted);
			
			//redirect to the default controller
			redirect('patient_controller', 'refresh');
		}
	//set the current patient record as deactivated (delete)
	function pat_delete()
		{
				
			//get the current PATid from the session
			$PATid = $this->session->userdata('PATid');
			
			//lets load the model relevant to this model
			$this->load->model('patient_model');
			
			//pass the value to the model for the db update
			$this->patient_model->pat_delete($PATid);
			
			//set the session data to 0
			$this->session->set_userdata('PATid', '0');
			
			//redirect to the default controller
			redirect('patient_controller', 'refresh');
		}
	//function to add a new patient to the db and set it as the current patient
	function pat_insert()
	{
			//lets load the model relevant to this model
			$this->load->model('patient_model');
			
			//retrieve all data from the form submitt and store in an array
			$pat_insert = $_POST["pat_insert"];
			
			//pass the values tot he model for the db insert
			$this->patient_model->pat_insert($pat_insert);
			
			//retrieve the last record of the db
			$PATid = $this->patient_model->pat_last();
			
			//set the PATid as the new patient so we are showing it on the refresh
			$this->session->set_userdata('PATid', $PATid);
			
			//redirect tot the default controller showing the new patient that has been added
			redirect('patient_controller', 'refresh');
		
	}
	//function to control the inline edit
	function pat_update()
	{
			//lets load the model relevant to this model
			$this->load->model('patient_model');
			
			//lets get the name of the table that the data is held
			$data['table'] = $_POST['table'];
			
			//lets ge the key of the record for the db
			$data['key'] = $_POST['key'];

			//lets get the id of the element that we are updating
			$data['id'] = $_POST['record_id'];
			
			//lets get the name of the field that has been edited
			$field = $_POST['elementid'];
			
			//lets get the new value
			$data['newvalue'] = $_POST['newvalue'];
			
			//lets create an array out of the submitted data
			$data['values'] = array( $field => $data['newvalue'] );	
			
			//required to have the new value display
			print_r($data['newvalue']);
			
			//pass the data to the model for processing
			$this->patient_model->pat_update($data);	
	
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
