/*
  *             
  */
  
 $(function() {
  
  /* deals with the funcitons for editing a patients record */
  $(".inline_pat_edit").editable("http://localhost/dispenser/patient_controller/pat_update", { 
		id			: 'elementid',
		name		: 'newvalue',	 
	  	width 		: 200,
	  	style  		: 'inherit',
	  	tooltip   	: 'Click to edit...',
	  	submitdata 	: function (id, value) 	{
		  				return {
								table		: 'TBpatient',
								record_id	: $('ul.PAT_root').attr('id'),
								key			: 'PATid'
								};			}
								
  });
  
  /* deals with the functions for editing a pateints prescription */
  $(".inline_sub_edit").editable("http://localhost/dispenser/patient_controller/pat_update", { 
	  id 			: 'elementid',
	  name 			: 'newvalue',
	  width 		: 25,
	  style  		: "inherit",
	  tooltip   	: 'Click to edit...',
	  submitdata 	: function (id, value) 	{
		  				return {
								table		: 'TBprescription',
								record_id	: $('ul.PRE_root').attr('id'),
								key			: 'PREid'
								};			}
  });
  /* deals with the functions for editing duration */
  $(".inline_sub_edit_duration").editable("http://localhost/dispenser/prescription_controller/pre_update", { 
	  	id 			: 'elementid',
	  	name		: 'newvalue',
		width		: 25,
	  	style  		: "inherit",
	 	tooltip   	: 'Click to edit...',
	  	submitdata 	: function (id, value) 	{
		  				return {
								table		: 'TBprescription',
								record_id	: $('ul.PRE_root').attr('id'),
								key			: 'PREid'
								};			},
	  	submit : 'OK'
  });
  /* deals with the functions for editing duration */
  $(".inline_sub_edit_duration_demo").editable("http://localhost/dispenser/prescription_controller/pre_update", { 
	  	id 			: 'elementid',
	  	name		: 'newvalue',
		width		: 25,
	  	style  		: "inherit",
	 	tooltip   	: 'Click to edit...',
	  	submitdata 	: function (id, value) 	{
		  				return {
								table		: 'TBprescription',
								record_id	: $('ul.PRE_root').attr('id'),
								key			: 'PREid'
								};			},
	  	submit : 'OK'
  });
  /* deals with the functions for editing the dispensor assigned to a user */
  $(".inline_disp_edit").editable("http://localhost/dispenser/patient_controller/pat_update", { 
	 	id 			: 'elementid',
	  	name 		: 'newvalue',
	  	width 		: 100,
	  	style  		: "inherit",
	  	tooltip   	: 'Click to edit...',
	  	submitdata 	: function (id, value) 	{
		  				return {
								table		: 'TBdispenser',
								record_id	: $('ul.disp_root').attr('id'),
								key			: 'DISid'
								};			}
  });
  /* deals with the function for editing the Pill Name within Medication */
  $(".inline_pil_edit_pill").editable("http://localhost/dispenser/pill_controller/pill_update", { 
	 	id 			: 'elementid',
	  	name 		: 'newvalue',
	  	width 		: 100,
	  	style  		: "inherit",
	  	tooltip   	: 'Click to edit...',
	  	submitdata 	: function (id, value) 	{
		  				return {
								table		: 'TBpill',
								record_id	: $('ul.pill_root').attr('id'),
								key			: 'PILid'
								};			}
  });
   /* deals with the function for editing the Pill descriptions within Medication */
  $(".inline_pil_edit_description").editable("http://localhost/dispenser/pill_controller/pill_update", { 
	 	id 			: 'elementid',
	  	name 		: 'newvalue',
	  	type		: 'textarea',
	  	style  		: "inherit",
	  	tooltip   	: 'Click to edit...',
	  	submitdata 	: function (id, value) 	{
		  				return {
								table		: 'TBpill',
								record_id	: $('ul.pill_root').attr('id'),
								key			: 'PILid'
								};			},
		submit		: 'Ok',
		cssclass	: 'tetarea_inline'
  });
  //desals with the inline edit for the different dosages
  $(".inline_sub_edit_dosage").editable("http://localhost/dispenser/prescription_controller/pre_update", { 
	  id 			: 'elementid',
	  name 			: 'newvalue',
	  style  		: "inherit",
	  type   		: 'select',
	  data   		: " {'None':'None','07:00':'7 AM','08:00':'8 AM','09:00':'9 AM','10:00':'10 AM','11:00':'11 AM','12:00':'12 PM','13:00':'1 PM','14:00':'2 PM','15:00':'3 PM','16:00':'4 PM','17:00':'5 PM','18:00':'6 PM','19:00':'7 PM','20:00':'8 PM','21:00':'9 PM','22:00':'10 PM','23:00':'11 PM'}",
	  tooltip   	: 'Click to edit...',
	  submitdata 	: function (id, value) 	{
		  				return {
								table		: 'TBprescription',
								record_id	: $('ul.PRE_root').attr('id'),
								key			: 'PREid'
								};			},	
	  submit		: 'Ok'
  });
});