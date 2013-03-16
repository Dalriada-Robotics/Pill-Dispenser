

<?php


	echo 'Test Data results';
	echo '<br>';
	echo '<br>';
	echo 'Patient dropdown results';
	echo '<br>';
	print_r($pat_selects->result());
	
	
	
	//drop down box for patient view
	?>
        <form name="dropdown" action="patient_controller/pat_record_display" method="post">
            <select name="PATid_submit" onchange="this.form.submit()">
                <option selected>--Select Patient Name to View Records--</option>
                <?php foreach ($pat_selects->result() as $pat_select) {?>
                <option value="<?php echo $pat_select->PATid; ?>"><?php echo $pat_select->PATfname; echo " "; echo $pat_select->PATsname; ?></option><?php } ?>
            </select>	
            <noscript><input type="submit" value="Submit"></noscript>
        </form>
        
<?php //************************************** 
 echo '<br>';
 echo '<br>';
 echo 'Return the patient records only';
 echo '<br>';
 echo '<br>';
 if(empty($pat_records))
 	{
		echo 'No results returned';
	}
 else
	{
 		print_r($pat_records->result());
	}
 echo '<br>';
 echo '<br>';
 echo 'Return the join results for subscriptions';
 echo '<br>';
 echo '<br>';
  if(empty($pat_subscriptions))
 	{
		echo 'No results returned';
	}
 else
	{
		print_r($pat_subscriptions->result());

	}
 echo '<br>';
 echo '<br>';
  echo 'Return the join results for the dispensers';
 echo '<br>';
 echo '<br>';
  if(empty($pat_dispensers))
 	{
		echo 'No results returned';
	}
 else
	{
		print_r($pat_dispensers->result());

	}
 echo '<br>';
 echo '<br>';
 echo 'See what value is stored in the session';
 echo '<br>';
 echo '<br>';	
 echo $this->session->userdata('PATid');