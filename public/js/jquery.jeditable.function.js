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
});