<?php

class Log_Model extends CI_Model
	{
		function __construct()
   			{
       			 parent::__construct();
    		}
		//lets get all the Prescription records
		function log_records()
		{
				//lets get the record information from the Prescription db
				$this->db->select('*');
				$this->db->where('LOGstatus = 0');
				$this->db->from('TBlogs');
				$this->db->join('TBprescription', 'TBprescription.PREdispenserid = TBlogs.LOGdispid', 'INNER');
				$this->db->join('TBpatient', 'TBprescription.PREpatientid = TBpatient.PATid', 'INNER');
				$query = $this->db->get();
						
				//work out how many rows are return if 0 return no array
				if ($query->num_rows() == '0')
					{
						//do nothing
					}
				else
					{	
						//set value for array count
						$data = array();									
						foreach($query->result_array() as $LOGline)
						{
							//store the old logline
							$old_logline = $LOGline['LOGline'];
							//lets check the value of release
							$release = substr($old_logline, -16, 1);
							if($release == '0')
								{
									$released = 'Success';
								}
							else
								{
									$released = 'Failure';
								}
							//lets cjeclt tje value of pickups
							$pickup = substr($old_logline, -15, 1);
							if($pickup == '0')
								{
									$picked = 'Success';
								}
							else
								{
									$picked = 'Failure';
								}
							//lets put the date in a format that we can understand
							$date = substr($old_logline, -12, 8);
							$date_convert = strtotime($date);
							$date_format = date('d-m-Y', $date_convert);
							//lets fix the time
							$time = substr($old_logline, -4, 4);
							$time_format = wordwrap($time,2,':',true);
							//lets create the patient name
							$PATfname = $LOGline['PATfname'];
							$PATsname = $LOGline['PATsname'];
							$PATname = "$PATfname $PATsname"; 
							
							//lets put all the data in an array and return it
							$data[] = array(
											//lets return the results
											"release" => $released,
											"pickup" => $picked,
											"motor" => substr($old_logline, -14, 2),
											//lets get the date
											"date" => $date_format,
											//lets get teh time
											"time" => $time_format,
											//stpre [atoemts surname
											"PATname" => $PATname
											);
						}
						return $data;
					}	

		}
		//function to software delete the log records
	function log_clear()
			{
				$data = array (
								"LOGstatus" => "1"
								);
				//let soft delete the records
				$this->db->where('LOGstatus = 0');
				$this->db->update('TBlogs', $data);
			}
		}