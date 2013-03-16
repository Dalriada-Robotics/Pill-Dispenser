            <div id="content" />
            	<div id="wrapper-body">
                	<div id="divider">
					<!-- ******************************************************************************************************** -->                         
                    	<div id="body-sub-menu">
                        	<div id="body-sub-menu-left">
                                <form name="dropdown" action="patient_controller/pat_record_display" method="post">
                                    <select name="PATid_submit" onchange="this.form.submit()">
                                        <option selected>--Select Patient Name to View Records--</option>
                                        <?php foreach ($pat_selects->result() as $pat_select) {?>
                                        <option value="<?php echo $pat_select->PATid; ?>"><?php echo $pat_select->PATfname; echo " "; echo $pat_select->PATsname; ?></option><?php } ?>
                                    </select>	
                                    <noscript><input type="submit" value="Submit"></noscript>
                                </form>
                            </div>
                            <div id="body-sub-menu-right">
                            	<a href="#" class='submenu_pat_add' title="Add new Patient record">Add Patient</a> |
                                <a href="#" class='submenu_sub_add' title="Add an prescription to a patient">Add Prescription</a> |
                                <a href="patient_controller/pat_delete" class='submenu_sub_del' title="Delete current patient records">Delete Patient</a> 
                           </div>                           
                        </div>                      
<!-- ******************************************************************************************************** -->                       
						<div id="body-span">
                            <div id="body-left">
                                <h3>Patient Records</h3>
                                    <p>
                                    	<?php if(empty($pat_records)) { echo $pat_not_selected_txt; } else { foreach ($pat_records->result() as $pat_record) { ?>
                                            <ul class="PAT_root" id="<?php echo $pat_record->PATid; ?>">
                                                <li>First Name: <span class="inline_pat_edit" id="PATfname"><?php echo $pat_record->PATfname; ?></span></li>
                                                <li>Last Name: <span class="inline_pat_edit" id="PATsname"><?php echo $pat_record->PATsname; ?></span></li>
                                                <li>Address: <span class="inline_pat_edit" id="PATaddress"><?php echo $pat_record->PATaddress; ?></span></li>
                                                <li>County: <span class="inline_pat_edit" id="PATcountry"><?php echo $pat_record->PATcountry; ?></span></li>
                                                <li>Postcode: <span class="inline_pat_edit" id="PATpostcode"><?php echo $pat_record->PATpostcode; ?></span></li>
                                                <li>Telephone: <span class="inline_pat_edit" id="PATtelephone"><?php echo $pat_record->PATtelephone; ?></span></li>
                                                <li>E-mail: <span class="inline_pat_edit" id="PATemail"><?php echo $pat_record->PATemail; ?></span></li>
                                                </ul>
                                            </ul>
                                            <?php } } ?>
                                   </p>
                            </div>
                            <div id="body-right">
                                <h3>Patient's Next of Kin Records</h3>
                                	<p>
                                    	<?php if(empty($pat_records)) { echo $pat_not_selected_txt; } else { foreach ($pat_records->result() as $pat_record) { ?>
                                            <ul>
                                                <li>First Name: <span class="inline_pat_edit" id="PATkinfname"><?php echo $pat_record->PATkinfname; ?></span></li>
                                                <li>Last Name: <span class="inline_pat_edit" id="PATkinsname"><?php echo $pat_record->PATkinsname; ?></span></li>
                                                <li>Telephone: <span class="inline_pat_edit" id="PATkintelephone"><?php echo $pat_record->PATkintelephone; ?></span></li>
                                                <li>E-mail: <span class="inline_pat_edit" id="PATkinemail"><?php echo $pat_record->PATkinemail; ?></span></li>
                                            </ul>
                                        <?php } } ?>
                                    </p>
                            </div>
                        </div>
                       
<!-- ******************************************************************************************************** -->                       
						<div id="body-span">
                            <div id="body-left">
                            	<div id="prescription">
                                    <h3>Patient Prescriptions</h3>
                                         <p>
                                        	<?php 	if(empty($pat_prescriptions)) 
													{ echo $pat_not_selected_txt; } 
													else 
													{ foreach ($pat_prescriptions->result() as $pat_prescription) { ?>
                                            <ul class="PRE_root" id="<?php echo $pat_prescription->PREid; ?>">
                                                <li>Pill Name: <?php echo $pat_prescription->PILname; ?> | </li>
                                                <li>Duration: <span class="<?php echo $sub_duration; ?>" id="PREduration"><?php echo $pat_prescription->PREduration; ?></span> <?php echo $sub_duration_txt; ?> | </li>
                                                <li>Dosage: <span class="inline_sub_edit" id="PREdosage"><?php echo $pat_prescription->PREdosage; ?></span> (Times Per Day) | </li>
                                                <li>Motor: <span class="inline_sub_edit" id="PREmotor"><?php echo $pat_prescription->PREmotor; ?></span> | </li>
                                                <li>Subscribed by: <?php echo $pat_prescription->DOCfname; ?> . <?php echo $pat_prescription->DOCsname; ?></li>
                                            </ul>
                                         <?php } }  ?>
                                      </p>
                                </div>
                             
                            </div>
							<div id="body-right">
                            	<div id="prescription">
                                    <h3>Assigned dispenser</h3>
                                        <p>
                                        	<?php 	if(empty($pat_dispensers)) 
													{ echo $pat_not_selected_txt; }
													else
													{ foreach ($pat_dispensers->result() as $disp_uniques) { ?>
                                            <ul class="disp_root" id="<?php echo $disp_uniques->DISid; ?>">
                                                 <li>dispenser IP: <span class="inline_disp_edit" id="DISip"><?php echo $disp_uniques->DISip ?></span> | </li>
                                                 <li>dispenser Username: <span class="inline_disp_edit" id="DISusername"><?php echo $disp_uniques->DISusername; ?></span> | </li>	
                                                 <li>dispenser Password: <span class="inline_disp_edit" id="DISpassword"><?php echo $disp_uniques->DISpassword; ?></span> </li>
                                            </ul>
                                            <br />
                                            <?php } } ?>
                                        </p>
                                </div>
                            </div>
                        </div> 
                                                
<!-- hidden popup for adding patient records -->                                                            
            <div id="pat_add">
                        <h3>New Patient Record</h3>
                        <p>Enter new Patient's records please. </p>
                        <form name="pat_add" action="index.php/patient_controller/pat_insert" method="post">
                            <div id="simplemodal-container-left">
                            	<p>
                                    <ul>
                                        <li>Patient's First Name: </li>
                                        <li>Patient's Surname: </li>
                                        <li>Patient's Address: </li>
                                        <li>Patient's Country: </li>
                                        <li>Patient's Postcode: </li>
                                        <li>Patient's Telephone: </li> 
                                        <li>Pateint's E-mail: </li>
                                        <li>Next of Kin's First Name: </li>
                                        <li>Next of Kin's Surname: </li>
                                        <li>Next of Kin's Telephone: </li>
                                        <li>Next of Kin's E-mail: </li>
                                        
                                    </ul>
                                </p>
                            </div>
                            <div id="simplemodal-container-right">
                            	<p>
                                    <ul>
                                        <li><input type="text" size="15" maxlength="100" name="pat_insert[PATfname]" required="required" /></li>
                                        <li><input type="text" size="15" maxlength="100" name="pat_insert[PATsname]" required="required" /></li>
                                        <li><input type="text" size="15" maxlength="100" name="pat_insert[PATaddress]" required="required" /></li>
                                        <li><input type="text" size="15" maxlength="100" name="pat_insert[PATcountry]" required="required" /></li>
                                        <li><input type="text" size="15" maxlenght="8" name="pat_insert[PATpostcode]" value="BT" required="required" /></li>
                                        <li><input type="text" size="15" maxlength="11" name="pat_insert[PATtelephone]" required="required" /></li>
                                        <li><input type="text" size="15" maxlength="100" name="pat_insert[PATemail]" required="required" /></li>
                                        <li><input type="text" size="15" maxlength="100" name="pat_insert[PATkinfname]" required="required" /></li>
                                        <li><input type="text" size="15" maxlength="100" name="pat_insert[PATkinsname]" required="required" /></li>
                                        <li><input type="text" size="15" maxlength="100" name="pat_insert[PATkintelephone]" required="required" /></li>
                                        <li><input type="text" size="15" maxlength="100" name="pat_insert[PATkinemail]" required="required" /></li>
                                    </ul>
                                </p>
                            </div>
                            <input type="submit" value="Submit" />
                        </form>
             </div> 
<!-- hidden popup for adding prescriptions records --> 
            <div id="pre_add">
                    <h3>Add a Prescription to current Patient</h3>
                       <?php if(empty($pat_records)) { echo "Please select a Patient name from the dropdown box before editing..."; } else { foreach ($pat_records->result() as $pat_record)  ?>
							<p>Edit the Patient's details below: </p>
									<form name="pre_insert" action="index.php/prescription_controller/pre_insert" method="post">
										<div id="simplemodal-container-left">
											<p>
												<ul>
													<li>Patient's Full Name: </li><br />
													<li>Select Pill Name: </li><br />
													<li>Dosage (times per day): </li><br />
													<li>Duration (days): </li><br />
                                                    <li>Specific Motor <li><br />
                                                    <li>Select Dispenser: <li><br />
												</ul>
											</p>
										</div>
										<div id="simplemodal-container-right">
											<p>
												<ul>
													<li><?php echo $pat_record->PATfname; ?> <?php echo $pat_record->PATsname; ?></li><br />
													<li><select name="pre_insert[PREpillid]">
															<option selected="selected">-- Select Pill --</option>
															<?php foreach ($pat_pills->result() as $pill_list) { ?>
																<option value="<?php echo $pill_list->PILid; ?>"><?php echo $pill_list->PILname; ?></option>
															<?php } ?>
														</select></li>
													 <li><input type="text" size="15" maxlength="3" name="pre_insert[PREdosage]" value="" required="required" /></li>
													 <li><input type="text" size="15" maxlength="3" name="pre_insert[PREduration]" value="" required="required" /></li>
                                                     <li><select name="pre_insert[PREmotor]">
                                                     		<option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                         </select>
                                                     </li><br />
                                                     <select name="pre_insert[PREdispenserid]">
															<option selected="selected">-- Select Dispenser --</option>
															<?php foreach ($pat_disps->result() as $dis_list) { ?>
																<option value="<?php echo $dis_list->DISid; ?>"><?php echo $dis_list->DISname; ?></option>
															<?php } ?>
														</select></li>
												</ul>
											</p>
										</div>
										<br />
										<input type="hidden" name="pre_insert[PREpatientid]" value="<?php if(empty($pat_record->PATid)) {  } else { echo $pat_record->PATid; } ?>" />
										<input type="hidden" name="pre_insert[PREdoctorid]" value="1" />
										<input type="submit" value="Submit" />
								</form>
							</p>
						<?php }  ?>  
             </div>   
           	</div>
                                
                    </div>
                 </div>
