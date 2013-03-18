            <div id="content" />
            	<div id="wrapper-body">
                	<div id="divider">
<!-- ******************************************************************************************************** -->   
                    	<div id="body-sub-menu">
                            <div id="body-sub-menu-right">
                                <a href="log_controller/log_clear" title="Clear Logs">Clear Logs</a>
                           </div>                           
                        </div>  
                                            
<!-- ******************************************************************************************************** -->                 
						<div id="body-span">
                            	<div id="prescription">
                                    <h3>Logs</h3>
                                        <p>
                                        	<?php if(empty($log_records)) { echo $log_empty; } else { foreach ($log_records as $log_record) { ?> 
                                            <ul>
                                                <li <?php if($log_record['release'] == 'Failure' || $log_record['pickup'] == 'Failure') { echo 'style="color:red;"'; } ?>>Patient Name: <?php echo $log_record['PATname']; ?> | Pill Released: <?php echo $log_record['release'] ?> | Pickup: <?php echo $log_record['pickup']; ?> | Date: <?php echo $log_record['date']; ?> | Time: <?php echo $log_record['time']; ?> </li>
                                            </ul>
                                          <?php } } ?>
                                       </p>
                                </div>                           
                        </div> 
<!-- ******************************************************************************************************** -->

                                
                    </div>
                 </div>
