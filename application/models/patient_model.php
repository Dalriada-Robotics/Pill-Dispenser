<?php

class Patient_Model extends CI_Model
	{
		function __construct()
   			{
       			 parent::__construct();
    		}
		//returns all patients from the db
		function all_pat_records()
			{
				//this get the information for the patient drop down box
				$this->db->select('PATid, PATfname, PATsname');
				$this->db->where('PATstatus', '0');
				$this->db->order_by("PATsname", "asc");
				$query = $this->db->get('TBpatient');
				return $query;
			}
		//returns a specific patient record from the db
		function pat_record($PATid)
			{
				if($PATid == '0')
					{
						//do nothing
					}
				else
					{
						//this get a specific user from the db
						$this->db->select('*');
						$this->db->where("PATid = '" . $PATid . "'");
						$this->db->limit(1);
						$query = $this->db->get('TBpatient');
						return $query;
					}
			}
		//creates the db join for prescriptions
		function pat_prescription($PATid)
			{
				if($PATid == '0')
					{
						//do nothing
					}
				else
					{
						//lets get the record information from the prescription db
						$this->db->where("PREpatientid = '" . $PATid . "'");
						$this->db->where("PREstatus = 0");
						$this->db->from('TBprescription');
						$this->db->join('TBdoctor', 'TBdoctor.DOCid = TBprescription.PREdoctorid', 'INNER');
						$this->db->join('TBpill', 'TBpill.PILid = TBprescription.PREpillid', 'INNER');
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
			}
		//creates the db join for dispensers
		function pat_dispenser($PATid)
			{
				if($PATid == '0')
					{
						//do nothing
					}
				else
					{
						//lets get the dispenser from the dispenser db
						$this->db->where('PREpatientid', $PATid);
						$this->db->from('TBprescription');
						$this->db->join('TBdispenser', 'TBdispenser.DISid = TBprescription.PREdispenserid', 'INNER');
						$this->db->group_by('PREdispenserid');
						$query = $this->db->get();
						
						//work out how many rows are returned if 0 return no array
						if ($query->num_rows() == '0')
							{
								//do nothing
							}
						else
							{
								return $query;
							}
					}
			}
		//set the record to deactivate ***this is a soft delete only
		function pat_delete($PATid)
			{
				$data = array('PATstatus' => '1');
				$this->db->where('PATid', $PATid);
				$this->db->update('TBpatient', $data);

			}
		//add new patient record to the db
		function pat_insert($pat_insert)
		{
			//db query
			$data = $pat_insert;
			$this->db->insert('TBpatient', $data);
		}
		//function to update patient records
		function pat_update($data)
		{	
			//run the db query
			$this->db->where($data['key'], $data['id']); 
			$this->db->update($data['table'], $data['values']);

		}
		//select the last record in the db
		function pat_last()
		{
			//select the last value and return
			$this->db->select('PATid');
			$this->db->limit(1);
			$this->db->from('TBpatient');
			$this->db->order_by('PATid', 'DESC');
			$query = $this->db->get();
			
			//loop through the result and return the PATid
			foreach ($query->result() as $result)
			{
				$PATid = $result->PATid;
			}
			return $PATid;
		}
		//lets go get all the pills from the db
		function pat_pills()
		{
			//this get a specific user from the db
			$this->db->select('*');
			$query = $this->db->get('TBpill');
			return $query;		
		}
		//lets go get all the dispensers from the db
		function pat_disps()
		{
			//this get a specific user from the db
			$this->db->select('*');
			$query = $this->db->get('TBdispenser');
			return $query;		
		}
			

			
	}
?>