<!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                 <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i>  Job Listing
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
										<a href="/jobs/addnew" class="btn green"> Add New Job  <i class="fa fa-plus"></i></a>
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
                                    Created By
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Active From
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
                			$list = joblist();
                            if($list){
                                foreach($list as $job){
                        ?>
                			<tr>
                				<td>
                					<?php echo @$job['title'];?>
                				</td>
                										  
                				<td>
                					<?php
                                        $user = getjobuser($job['user_id']);
                                        echo strtoupper(@$user['username']);
                                     ?>
                				</td>	
                                <td>
                                      <?php 
                                        $job_cat = getjobcat($job['category_id']);
                                        echo strtoupper(@$job_cat['title']);
                                      ?>
                				</td>	
                                <td>
                                    <?php echo date('d-M-Y h:i:s',@$job['active_from']);?>
                                </td>							  
                				<td>
                					<?php if(isset($job['status']) && $job['status'] == 1) { ?>
                						<a href="/jobs/jobstatus?id=<?php echo $job['_id'];?>"><span class="label label-sm label-success">Approved</span></a>
                							<?php }else{ ?>
                										<a  href="/jobs/jobstatus?id=<?php echo $job['_id'];?>"><span class="label label-sm label-warning">Suspended </span></a>
                							<?php } ?>
                				</td>
                                      
                                <td>
                                <a class="btn default btn-xs purple" href="/jobs/editjob?id=<?php echo $job['_id'];?>">
                                       <i class="fa fa-edit"></i> Edit</a> 
                                       <a class="btn default btn-xs black" href="/jobs/delete?id=<?php echo $job['_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                       <i class="fa fa-trash-o"></i> Delete</a>
                                       <a class="btn default btn-xs blue-stripe"  href="/jobs/viewjob?id=<?php echo $job['_id'];?>">
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
