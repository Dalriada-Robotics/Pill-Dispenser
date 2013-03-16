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
 if(empty($pat_record))
 	{
		echo 'No results returned';
	}
 else
	{
 		print_r($pat_record->result());
	}
 echo '<br>';
 echo '<br>';
 echo 'Return the join reults';
 echo '<br>';
 echo '<br>';
  if(empty($pat_join))
 	{
		echo 'No results returned';
	}
 else
	{
		print_r($pat_join);

	}