<?php

class Prescription_Model extends CI_Model
	{
		function __construct()
   			{
       			 parent::__construct();
    		}
		//lets get all the Prescription records
		function pre_records()
		{
				//lets get the record information from the Prescription db
				$this->db->select('*');
				$this->db->from('TBprescription');
				$this->db->where('PREstatus = 0');
				$this->db->join('TBdoctor', 'TBdoctor.DOCid = TBprescription.PREdoctorid', 'INNER');
				$this->db->join('TBpill', 'TBpill.PILid = TBprescription.PREpillid', 'INNER');
				$this->db->join('TBpatient', 'TBprescription.PREpatientid = TBpatient.PATid', 'INNER');
				$query = $this->db->get();
						
				//work out how many rows are return if 0 return no array
				if ($query->num_rows() == '0')
					{
						//do nothing
					}
				else
					{
					return $query;
					}		
		}
			
		//create a function for making timestamp
		function pre_timestamp($pre_duration)
		{
			//lets get the current time
			$time_hour = date('H');
			$time_minute = date('i');
			$time_minutes = $time_minute+$pre_duration;
			$time_round = $time_minutes;
			
			
			//lets round the time rounded
			if (mb_strlen($time_round) == '1' )
				{
					$round_time_fixed = sprintf("%02s" ,$time_round);
				}
			else
				{
					$round_time_fixed = $time_round;
				}
			
			//time in 24 hour formwat
			$time_24 = "$time_hour:$round_time_fixed";
			
			//get the current date
			//join the date with the 24 hour time
			$date = date('Y-m-d');
			$run_time = "$date $time_24";
			
			//lets add the new time to the array
			$pre_timestamp = $run_time;
			
			return $pre_timestamp;
		}
		//add new Prescription to the db
		function pre_insert($pre_insert)
		{
			//db query
			$data = $pre_insert;
			$this->db->insert('TBPrescription', $data);
		}
		//update record function
		function pre_update($data)
		{
			
			//we need to check if the array contains the edit for duration
			if(array_key_exists('PREduration', $data['values']))
				{
					
					$pre_duration = $data['newvalue'];
					
					//take the timestamp and add it to the $pre_insert array
					$data['values']['PREstartdate'] = $this->pre_timestamp($pre_duration);
					
					//update the db with the details
					$this->db->where($data['key'], $data['id']); 
					$this->db->update($data['table'], $data['values']);
					
				}
						
		}
	}