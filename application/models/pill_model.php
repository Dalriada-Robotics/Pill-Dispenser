<?php

class Pill_Model extends CI_Model
	{
		function __construct()
   			{
       			 parent::__construct();
    		}
		//lets get all the pill records
		function pill_records()
		{
				//this get the information for the patient drop down box
				$this->db->select('*');
				$this->db->where('PILstatus', '0');
				$this->db->order_by("PILname", "asc");
				$query = $this->db->get('TBpill');
				return $query;	
		}
		//add new patient record to the db
		function pill_insert($pill_insert)
		{
			//db query
			$data = $pill_insert;
			$this->db->insert('TBpill', $data);
		}

	}