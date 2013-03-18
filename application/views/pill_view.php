            <div id="content" />
            	<div id="wrapper-body">
                	<div id="divider">
					<!-- ******************************************************************************************************** -->                         
                    	<div id="body-sub-menu">
                            <div id="body-sub-menu-right">
                                <a href="#" class='submenu_add_pill' title="Add an Pill to the database">Add Pill</a>
                           </div>                           
                        </div>  
                                            
<!-- ******************************************************************************************************** -->                       
                            <div id="body-span">
                                <div id="Prescription">
                                    <h3>Medications</h3>
                                        <p>
                                          <?php if(empty($pill_records)) { echo $pill_empty; } else { foreach ($pill_records->result() as $pill_record) { ?>   
                      	                     <ul class="pill_root" id="<?php echo $pill_record->PILid; ?>">
                                                <li>Pill Name: <span class="inline_pil_edit_pill" id="PILname"><?php echo $pill_record->PILname; ?></span> | </li>
                                                <li>Pill Description: <span class="inline_pil_edit_description" id="PILdescription"><?php echo $pill_record->PILdescription; ?></span> </li>
                                              </ul> 
                                            <?php } } ?>
                                       </p>
                                </div>
                               </div>
<!-- ******************************************************************************************************** -->
<!-- hidden popup for adding patient records -->                                                            
            <div id="pill_add">
                        <h3>New Medication</h3>
                        <p>Enter new Pill details: </p>
                        <form name="pill_add" action="index.php/pill_controller/pill_insert" method="post">
                            <div id="simplemodal-container-left">
                            	<p>
                                    <ul>
                                        <li>Pill Name: </li><nr />
                                        <li>Pill Description: </li>
                                    </ul>
                                </p>
                            </div>
                            <div id="simplemodal-container-right">
                            	<p>
                                    <ul>
                                        <li><input type="text" size="30" maxlength="150" name="pill_insert[PILname]" required="required" /></li>
                                        <li><textarea cols="150" rows="5" name="pill_insert[PILdescription]" required="required" /></textarea></li>
                                    </ul>
                                </p>
                            </div>
						<input type="submit" value="submit" />
                            
                        </form>
             </div>                                                             
                                                               
                                
                                                
                              
                                            	
           	</div>
                    
                    </div>
                 </div>
