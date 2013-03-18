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
			$now = new DateTime();
			$now->modify('+' . ($pre_duration) . 'minutes');
			
			//lets add the new time to the array
			$pre_timestamp = $now->format( 'Y-m-d H:i');
			
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
			//run the db query
			$this->db->where($data['key'], $data['id']); 
			$this->db->update($data['table'], $data['values']);


						
		}
	}