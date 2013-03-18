<?php

class Dispenser_Model extends CI_Model
	{
		function __construct()
   			{
       			 parent::__construct();
    		}
		//lets get all the dispenser records from the db
		function disp_records()
			{
				//this get the information for the patient drop down box
				$this->db->select('*');
				$this->db->where('DISstatus', '0');
				$this->db->order_by("DISip", "asc");
				$query = $this->db->get('TBdispenser');
				return $query;
			}
		//add new patient record to the db
		function disp_insert($disp_insert)
		{
			//db query
			$data = $disp_insert;
			$this->db->insert('TBdispenser', $data);
		}
		//lets kick of the dispenser run through in minutes
		function disp_run_demo()
			{
	
				//lets create the table that we need  for doing the run through of prescriptions
				$this->db->select('*');
				$this->db->where('PREstatus', '0');
				$this->db->from('TBprescription');
				$this->db->join('TBdispenser', 'TBprescription.PREdispenserid = TBdispenser.DISid', 'INNER');
				$pre_actives = $this->db->get();
				
				//print_r ($pre_actives->result_array());
				
				//lets get the current data stamp
				$time_hour = date('H');
				$time_minute = date('i');
				$time_round = $time_minute;
				$time_final = "$time_hour:$time_minute";
				$date = date('Y-m-d');
				$datetime = "$date $time_final";
				
				print_r($datetime);

				//lets get to work on the running through the results from the table created
				foreach ($pre_actives->result() as $pre_active)
					{
						if($datetime == $pre_active->PREstartdate)
							{
								//lets load the ssh3 helper
								$this->load->helper('SSH2.php');
								
								//lets get the ip of the dispenser and the authenicationd etails
								$disp_ip = $pre_active->DISip;
								$disp_username = $pre_active->DISusername;
								$disp_password = $pre_active->DISpassword;
								
								//lets create the details for the SSH connection
								$ssh = new NET_SSH2($disp_ip);
								if (!$ssh->login($disp_username, $disp_password)) 
									{
										//exit if you cannot get logged on
										exit('Login Failed');
									}

								//lets work out which motor we are suppose to be connecting to
								if ($pre_active->premotor = '1') 
									{
										//command we want to send to the dispenser
										$ssh->exec('sudo python pimotor1.py');
										echo '<br>';
										echo 'motor 1 success';
										echo '<br>';
									}
								elseif ($pre_active->premotor = '2')
									{
										//command we want to send to the dispenser
										$ssh->exec('killall -v apt-get');
									}
								elseif ($pre_active->premotor = '3')
									{
										//command we want to send to the dispenser
										$ssh->exec('killall -v apt-get');
									}
									echo 'completed';
							}
						else
							{
								//do nothing and move onto the next record
								echo 'failure';
							}
					}
			}
		//lets kick of the dispenser run through
		function disp_run()
			{
	
				//lets create the table that we need  for doing the run through of prescriptions
				$this->db->select('*');
				$this->db->where('PREstatus', '0');
				$this->db->from('TBprescription');
				$this->db->join('TBdispenser', 'TBprescription.PREdispenserid = TBdispenser.DISid', 'INNER');
				$pre_actives = $this->db->get();
				
				//print_r ($pre_actives->result_array());
				
				//lets get the current data stamp
				$time_hour = date('H');
				$time_minute = date('i');
				$time_round = $time_minute;
				$time_final = "$time_hour:$time_minute";
				$date = date('Y-m-d');
				$datetime = "$date $time_final";
				
				print_r($datetime);

				//lets get to work on the running through the results from the table created
				foreach ($pre_actives->result() as $pre_active)
					{
						if($timefinal == $pre_active->PREdosage1 || $timefinal == $pre_active->dosage2 || $timefinal == $pre_active->dosage3)
							{
								//lets load the ssh3 helper
								$this->load->helper('SSH2.php');
								
								//lets get the ip of the dispenser and the authenicationd etails
								$disp_ip = $pre_active->DISip;
								$disp_username = $pre_active->DISusername;
								$disp_password = $pre_active->DISpassword;
								
								//lets create the details for the SSH connection
								$ssh = new NET_SSH2($disp_ip);
								if (!$ssh->login($disp_username, $disp_password)) 
									{
										//exit if you cannot get logged on
										exit('Login Failed');
									}

								//lets work out which motor we are suppose to be connecting to
								if ($pre_active->premotor = '1') 
									{
										//command we want to send to the dispenser
										$ssh->exec('sudo python pimotor1.py');
										echo '<br>';
										echo 'motor 1 success';
										echo '<br>';
									}
								elseif ($pre_active->premotor = '2')
									{
										//command we want to send to the dispenser
										$ssh->exec('killall -v apt-get');
									}
								elseif ($pre_active->premotor = '3')
									{
										//command we want to send to the dispenser
										$ssh->exec('killall -v apt-get');
									}
									echo 'completed';
							}
						else
							{
								//do nothing and move onto the next record
								echo 'failure';
							}
					}
			}
		//create the function that will go and retreive the feedback information from the dispenser
		function disp_feedback() 
		{
			//lets create the table that we need  for doing the run through of prescriptions
			$this->db->select('*');
			$this->db->where('PREstatus', '0');
			$this->db->from('TBprescription');
			$this->db->join('TBdispenser', 'TBprescription.PREdispenserid = TBdispenser.DISid', 'INNER');
			$pre_actives = $this->db->get();

			//lets load the ssh3 helper
			$this->load->helper('SFTP_helper.php');

			//lets get to work on the running through the results from the table created
			foreach ($pre_actives->result() as $pre_active)
			{
						
				//lets get the ip of the dispenser and the authenicationd etails
				$disp_ip = $pre_active->DISip;
				$disp_username = $pre_active->DISusername;
				$disp_password = $pre_active->DISpassword;
									
				//lets create the details for the SSH connection
				$sftp = new NET_SFTP($disp_ip);
				if (!$sftp->login($disp_username, $disp_password)) 
				{
					//exit if you cannot get logged on
					exit('Login Failed');
				}
				
				//open the file in question
				$file = $sftp->get('test.txt');
				
				//read it from local memory
				$handle = fopen('php://memory', 'r+');
				fputs($handle, $file);
				rewind($handle);
				
				//set a value for an array count
				$c = 0;
				//store the data line by line
				while (($data = fgetcsv($handle, 0, " ")) !== FALSE)
				{
					$row[$c] = $data;
        			$c++;
				}
				//insert the data in the db
				foreach ($row as $key => $LINEvalue)
				{
					//add the log detail to the db
					$data['LOGdispid'] = $pre_active->DISid;
					$data['LOGline'] = $LINEvalue[0];
					$this->db->insert('TBlogs', $data);
					
				}
				//delete the text file now that we are finished with it
				$sftp->delete('test.txt');
				
			}

		}
	}