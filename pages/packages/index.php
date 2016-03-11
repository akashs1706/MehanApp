<!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                 <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i> Packages 
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
										<a href="/packages/addnew" class="btn green"> Add New Package  <i class="fa fa-plus"></i></a>
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
                                    Package Type
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Description
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
                			$packagelist = packagelist();
                            if($packagelist){
                                foreach($packagelist as $package){
                        ?>
                			<tr>
                				<td>
                					<?php echo $package['title'];?>
                				</td>
                				<td>
                                    <?php echo strtoupper($package['user_type']);?>
                                </td>
                                <td>
                                    <?php echo $package['pricing'];?>
                                </td>					  
                				<td>
                					<?php echo $package['description'];?>
                				</td>								  
                				<td>
                					<?php if(isset($package['status']) && $package['status'] == 1) { ?>
                						<a href="/packages/packagestatus?id=<?php echo $package['_id'];?>"><span class="label label-sm label-success">Approved</span></a>
                							<?php }else{ ?>
                										<a  href="/packages/packagestatus?id=<?php echo $package['_id'];?>"><span class="label label-sm label-warning">Suspended </span></a>
                							<?php } ?>
                				</td>
                                      
                                <td>
                                <a class="btn default btn-xs purple" href="/packages/editpackage?id=<?php echo $package['_id'];?>">
                                       <i class="fa fa-edit"></i> Edit</a> 
                                       <a class="btn default btn-xs black" href="/packages/delete?id=<?php echo $package['_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                       <i class="fa fa-trash-o"></i> Delete</a>
                                       <a class="btn default btn-xs blue-stripe"  href="/packages/viewpackage?id=<?php echo $package['_id'];?>">
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
