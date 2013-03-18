<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" href="<?php echo base_url("/public/css/main.css") ?>" rel="stylesheet" media="screen" />
<!-- Page styles -->
<link type='text/css' href="<?php //echo base_url("../public/css/demo.css") ?>" rel='stylesheet' media='screen' />
<!-- Contact Form CSS files -->
<link type='text/css' href="<?php echo base_url("/public/css/basic.css") ?>" rel='stylesheet' media='screen' />
<!-- IE6 "fix" for the close png image -->
<!--[if lt IE 7]>
<link type='text/css' href='css/basic_ie.css' rel='stylesheet' media='screen' />
<![endif]-->
<!-- Load jQuery, SimpleModal and Basic JS files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type='text/javascript' src='<?php echo base_url("/public/js/jquery.js") ?>'></script>
<script type='text/javascript' src='<?php echo base_url("/public/js/jquery.simplemodal.js") ?>'></script>
<script type='text/javascript' src='<?php echo base_url("/public/js/basic.js") ?>'></script>
<script type='text/javascript' src='<?php echo base_url("/public/js/jquery.jeditable.js") ?>'></script>
<script type='text/javascript' src='<?php echo base_url("/public/js/jquery.jeditable.function.js") ?>'></script>
<script>//javascript
$("#body_follow").height($("#body_progress").height());
</script>
<title><?php echo $title; ?></title>
</head>

<body id="body-main">
        <div id="container">
          <div id="quick" />
	        <!--<a href="#" class='quicklinks_add' title="Add an prescription to a patient">Add Prescription</a> |
    	    <a href="index.php/dispenser/job_update" class="quicklinks_update" title="Add an pill to the system">Add Pill</a> |
        	<a href="#" class="quicklinks_password" title="Add a new patient to the system">Add Patient</a> -->
            <?php echo $login ?>
          </div>
          <div id="menu" />
          	<a href="http://localhost/dispenser/home_controller" class="logo"></a>
            <ul>
                <!--<li><a href="release_controller" title="View Release Notes">Release Notes</a></li>-->
                <li><a href="log_controller" title="View dispenser records">Logs</a></li>
                <li><a href="dispenser_controller" title="View dispenser records">Dispensers</a></li>                
                <li><a href="pill_controller" title="View Pill Details">Medication</a></li>
                <li><a href="prescription_controller" title="View Prescriptions">Prescriptions</a></li>
                <li><a href="patient_controller" title="View Patient Details">Patients</a></li>
                <li><a href="home_controller" title="Go to Home Page">Home</a></li>
            </ul>
          </div>