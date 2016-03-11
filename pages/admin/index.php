 <!-- BEGIN PAGE HEADER-->
                     <div class="row">
                        <div class="col-md-12">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i> 
                                    Admin user Listing  
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
											                       <a href="/admin/addnew" class="btn green"> Add New <i class="fa fa-plus"></i></a>
                                          </div>
                                     </div>
									
                                    </div>
                                 </div>
                                 <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                       <tr>
                                          <th>
                                             Name
                                          </th>
                                          <th>
                                             Email
                                          </th>
                                          <th>
                                             Username
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
                									$list = adminuserslist();
                                  if($list){
                                   foreach($list as $user){
                                   ?>
                										<tr>
                										  <td>
                											<?php echo $user['first_name'];?>
                										  </td>
                										  
                										  <td>
                											<?php echo $user['email'];?>
                										  </td>	
                                      <td>
                                      <?php echo $user['username'];?>
                										  </td>								  
                										  <td>
                										  <?php if(isset($user['status']) && $user['status'] == 1) { ?>
                										  <a href="/admin/userstatus?id=<?php echo $user['_id'];?>"><span class="label label-sm label-success">Approved</span></a>
                										  <?php }else{ ?>
                										  <a  href="/admin/userstatus?id=<?php echo $user['_id'];?>"><span class="label label-sm label-warning">Suspended </span></a>
                										  <?php } ?>
                										  </td>
                                      
                                      <td>
                                       <a class="btn default btn-xs purple" href="/admin/edituser?id=<?php echo $user['_id'];?>">
                    										<i class="fa fa-edit"></i> Edit 
                                       </a>
                                       <a class="btn default btn-xs black" href="/admin/delete?id=<?php echo $user['_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
										                      <i class="fa fa-trash-o"></i> Delete 
                                       </a>
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
