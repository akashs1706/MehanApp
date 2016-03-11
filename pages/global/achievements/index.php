 <!-- BEGIN PAGE HEADER-->
                     <div class="row">
                        <div class="col-md-12">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i> 
                                    Achievements Listing  
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
											                       <a href="/global/achievements/addnew" class="btn green"> Add New <i class="fa fa-plus"></i></a>
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
                                             Status
                                          </th>
                                          <th>
                                             Action Perform
                                          </th>
                                         
                                       </tr>
                                    </thead>
                                    <tbody>
                									<?php
                									$list = getAllAchievements();
                                  if($list){
                                   foreach($list as $user){
                                   ?>
                										<tr>
                										  
                                      <td>
                											<?php echo $user['title'];?>
                										  </td>
                										  
                										  <td>
                										  <?php if(isset($user['status']) && $user['status'] == 1) { ?>
                										  <a href="/global/achievements/status?id=<?php echo $user['_id'];?>"><span class="label label-sm label-success">Approved</span></a>
                										  <?php }else{ ?>
                										  <a  href="/global/achievements/status?id=<?php echo $user['_id'];?>"><span class="label label-sm label-warning">Suspended </span></a>
                										  <?php } ?>
                										  </td>
                                      
                                      <td>
                                       <a class="btn default btn-xs purple" href="/global/achievements/edit?id=<?php echo $user['_id'];?>">
                    										<i class="fa fa-edit"></i> Edit 
                                       </a>
                                       <a class="btn default btn-xs black" href="/global/achievements/delete?id=<?php echo $user['_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
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
