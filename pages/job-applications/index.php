<!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                 <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i> Job Applications 
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
							   
					<span class="addSucessFull" ></span>
								
						<div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">                                            
										<a href="/job-applications/addnew" class="btn green"> Add New Application  <i class="fa fa-plus"></i></a>
                                     </div>
                                </div>
									
                            </div>
                        </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Candidate
                                </th>
                                <th>
                                    Job
                                </th>
                                <th>
                                    Status Details
                                </th>
                                <th>
                                    Status
                                </th>
                                
                                <th>
                                    Action Perform
                                </th>
                                         
                            </tr>
                        </thead>
                   		<tbody>
                		<?php
                			$applications = applicationlist();
                           // print_r($applications);
                            if($applications){
                                foreach($applications as $application){
                        ?>
                			<tr>
                				<td>
                					<?php echo $application['title'];?>
                				</td>
                				<td>
                                    <?php echo $application['user'];?>
                                </td>
                                <td>
                                    <?php echo $application['job'];?>
                                </td>					  
                				<td>
                					<?php echo $application['status_detail'];?>
                				</td>								  
                				<td>
                					<?php if(isset($application['status']) && $application['status'] == 1) { ?>
                						<a href="/job-applications/applicationstatus?id=<?php echo $application['_id'];?>"><span class="label label-sm label-success">Approved</span></a>
                							<?php }else{ ?>
                										<a  href="/job-applications/applicationstatus?id=<?php echo $application['_id'];?>"><span class="label label-sm label-warning">Suspended </span></a>
                							<?php } ?>
                				</td>
                                      
                                <td>
                                       <a class="btn default btn-xs purple" href="/job-applications/editapplication?id=<?php echo $application['_id'];?>">
                                       <i class="fa fa-edit"></i> Edit</a> 
                                       <a class="btn default btn-xs black" href="/job-applications/delete?id=<?php echo $application['_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                       <i class="fa fa-trash-o"></i> Delete</a>
                                       <a class="btn default btn-xs blue-stripe"  href="/job-applications/viewapplication?id=<?php echo $application['_id'];?>">
										                    View 
                                       </a>
                				</td>									 
                			</tr>
                			<?php 
                				}
                			}	   ?>
                        </tbody>
                    </table>
                </div>
            </div>
        	<!-- END EXAMPLE TABLE PORTLET-->
    	</div>
	</div>
<!-- END PAGE CONTENT-->
