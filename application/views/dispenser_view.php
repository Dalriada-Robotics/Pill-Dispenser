            <div id="content" />
            	<div id="wrapper-body">
                	<div id="divider">
					<!-- ******************************************************************************************************** -->                         
                    	<div id="body-sub-menu">
                            <div id="body-sub-menu-right">
                                <a href="#" class='submenu_disp_add' title="Add new dispenser">Add Dispenser</a>
                           </div>                           
                        </div>                      
<!-- ******************************************************************************************************** -->                       
						<div id="body-span">
                            	<div id="prescription">
                                    <h3>Dispensers</h3>
                                        <p>
                                           <?php if(empty($disp_records)) { echo $disp_empty; } else { foreach ($disp_records->result() as $disp_record) { ?> 
                                            <ul>
                                                <li>Dispenser Name: <?php echo $disp_record->DISname; ?> |</li>
                                                <li>Dispenser IP: <?php echo $disp_record->DISip; ?> |</li>
                                                <li>Username: <?php echo $disp_record->DISusername; ?> |</li>
                                                <li>Password: <?php echo $disp_record->DISpassword; ?></li>
                                            </ul>
                                            <?php } } ?>
                                       </p>
                                </div>
                        </div> 
<!-- ******************************************************************************************************** -->   
<!-- hidden popup for adding patient records -->                                                            
            <div id="disp_add">
                        <h3>New Dispenser</h3>
                        <p>Enter new dispenser details. </p>
                        <form name="dispenser_add" action="index.php/dispenser_controller/disp_insert" method="post">
                            <div id="simplemodal-container-left">
                            	<p>
                                    <ul>
                                        <li>Dispenser IP: </li><br />
                                        <li>Dispenser Name: </li>
                                        <li>Dispenser Username: </li>
                                        <li>Dispenser Password: </li>
                                        <li>Assign Dispenser: </li>
                                    </ul>
                                </p>
                            </div>
                            <div id="simplemodal-container-right">
                            	<p>
                                    <ul>
                                        <li><input type="text" size="30" maxlength="150" name="disp_insert[DISip]" required="required" /></li>
                                        <li><input type="text" size="30" maxlength="150" name="disp_insert[DISname]" required="required" /></li>
                                        <li><input type="text" size="30" maxlength="150" name="disp_insert[DISusername]" required="required" /></li>
                                        <li><input type="text" size="30" maxlength="150" name="disp_insert[DISpassword]" required="required" /></li>
                                    </ul>
                                </p>
                            </div>
						<input type="submit" value="Submit" />
                            
                        </form>
             </div>                                                                        
                                                             
                                
                                                
                              
                                            	
           	</div>
                    
                    </div>
                 </div>