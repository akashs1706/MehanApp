<!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                 <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i> Job Categories Listing 
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
										<a href="/jobcategories/addnew" class="btn green"> Add New Category  <i class="fa fa-plus"></i></a>
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
                                    Created
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
                			$listcat = jobcat();
                            if($listcat){
                                foreach($listcat as $job){
                        ?>
                			<tr>
                				<td>
                					<?php echo $job['title'];?>
                				</td>
                										  
                				<td>
                					<?php echo date('d-M-Y h:i:s',$job['created']);?>
                				</td>								  
                				<td>
                					<?php if(isset($job['status']) && $job['status'] == 1) { ?>
                						<a href="/jobcategories/jobcatstatus?id=<?php echo $job['_id'];?>"><span class="label label-sm label-success">Approved</span></a>
                							<?php }else{ ?>
                										<a  href="/jobcategories/jobcatstatus?id=<?php echo $job['_id'];?>"><span class="label label-sm label-warning">Suspended </span></a>
                							<?php } ?>
                				</td>
                                      
                                <td>
                                <a class="btn default btn-xs purple" href="/jobcategories/editjobcat?id=<?php echo $job['_id'];?>">
                                       <i class="fa fa-edit"></i> Edit</a>
                                       <a class="btn default btn-xs black" href="/jobcategories/delete?id=<?php echo $job['_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                       <i class="fa fa-trash-o"></i> Delete</a>
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
