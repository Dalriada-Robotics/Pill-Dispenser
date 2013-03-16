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
				
				//lets get to work on the running through the results from the table created
				foreach ($pre_actives->result() as $pre_active)
					{
						if($datetime == $pre_active->PREstartdate)
							{
								//lets load the ssh3 helper
								$this->load->helper('SSH2_helper.php');
								
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
							}
						else
							{
								//do nothing and move onto the next record
							}
					}
			}
	}