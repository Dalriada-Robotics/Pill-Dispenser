            <div id="content" />
            	<div id="wrapper-body">
                	<div id="divider">
					<!-- ******************************************************************************************************** -->                         
                    	<div id="body-sub-menu">
                            <div id="body-sub-menu-right">
                                <a href="#" class='submenu_add_pill' title="Add an Prescription">Add Prescription</a> |
                           </div>                           
                        </div>  
                                            
<!-- ******************************************************************************************************** -->                       
						<div id="body-span">
                            	<div id="prescription">
                                    <h3>Prescriptions</h3>
                                        <p>
                                        	<?php if(empty($pre_records)) { echo $pre_empty; } else { foreach ($pre_records->result() as $pre_record) { ?> 
                                            <ul>
                                                <li>Patient name: <?php echo $pre_record->PATfname; ?> <?php echo $pre_record->PATsname; ?> |
                                                <li>Pill Name: <?php echo $pre_record->PILname; ?> | </li>
                                                <li>Duration: <?php echo $pre_record->PREduration; ?> (Days) | </li>
                                                <li>Dosage: <?php echo $pre_record->PREdosage; ?> (Times Per Day) | </li>
                                                <li>Subscribed by: <?php echo $pre_record->DOCfname; ?> . <?php echo $pre_record->DOCsname; ?></li>
                                                <li><a href="prescription_controller/pre_delete?PREid=<?php echo $pre_record->PREid; ?>"><b>Delete</b></a></li>
                                            </ul>
                                          <?php } } ?>
                                       </p>
                                </div>                           
                        </div> 
<!-- ******************************************************************************************************** -->
<!-- hidden popup for adding prescriptions records --> 
            <div id="pre_add">
                    <h3>Add a Prescription to current Patient</h3>
                       <?php if(empty($pat_records)) { echo "Please select a Patient name from the dropdown box before editing..."; } else { foreach ($pat_records->result() as $pat_record)  ?>
							<p>Add Prescription to Patient below: </p>
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