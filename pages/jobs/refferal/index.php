 <!-- BEGIN PAGE HEADER-->
                     <div class="row">
                        <div class="col-md-12">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i> 
                                    Job Refferal Listing  
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
											                       <a href="/jobs/refferal/addnew" class="btn green"> Add New <i class="fa fa-plus"></i></a>
                                          </div>
                                     </div>
									
                                    </div>
                                 </div>
                                 <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                       <tr>
                                          <th>
                                             Job Title
                                          </th>
                                          
                                          <th>
                                             Reffered By
                                          </th>
                                          
                                          <th>
                                             Reffered To
                                          </th>
                                          <th>
                                             Action Perform
                                          </th>
                                         
                                       </tr>
                                    </thead>
                                    <tbody>
                									<?php
                									$list = getallRefferal();
                                  if($list){
                                   foreach($list as $user){
                                   ?>
                										<tr>
                										  <td>
                											<?php echo $user['job'];?>
                										  </td>
                										  
                										  <td>
                											<?php echo $user['reffered_by'];?>
                										  </td>
                										  
                										  <td>
                											<?php echo $user['reffered_to'];?>
                										  </td>
                										  
                										  <td>
                										  <?php if(isset($user['status']) && $user['status'] == 1) { ?>
                										  <span class="label label-sm label-success">Accepeted</span>
                										  <?php }else{ ?>
                										  <span class="label label-sm label-warning">Pending </span>
                										  <?php } ?>
                										  </td>
                                      
                                      <td>
                                      <a class="btn default btn-xs purple" href="/jobs/refferal/edit?id=<?php echo $user['_id'];?>">
                                       <i class="fa fa-edit"></i> Edit</a> 
                                       <a class="btn default btn-xs black" href="/jobs/refferal/delete?id=<?php echo $user['_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                       <i class="fa fa-trash-o"></i> Delete</a>
                                       </td>									 
                									   </tr>
                									    <?php }
                									        }	   ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                     </div>
