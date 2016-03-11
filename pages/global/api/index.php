 <!-- BEGIN PAGE HEADER-->
                     <div class="row">
                        <div class="col-md-12">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i> 
                                    API Keys  
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
											                       <a href="/global/api/addnew" class="btn green"> Add New <i class="fa fa-plus"></i></a>
                                          </div>
                                     </div>
									
                                    </div>
                                 </div>
                                 <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                       <tr>
                                          <th>
                                             API Key
                                          </th>
                                          
                                          <th>
                                             API SECRET Key
                                          </th>
                                          
                                          <!-- <th>
                                             Status
                                          </th> -->
                                          <th>
                                             Action Perform
                                          </th>
                                         
                                       </tr>
                                    </thead>
                                    <tbody>
                									<?php
                									$list = getAllAPI();
                                  if($list){
                                   foreach($list as $api){
                                   ?>
                										<tr>
                										  <td>
                											<?php echo $api['api_key'];?>
                										  </td>
                										  
                										  <td>
                											<?php echo $api['api_secret'];?>
                										  </td>
                										  
                										 <!--  <td>
                										  <?php if(isset($api['status']) && $api['status'] == 1) { ?>
                										  <a href="/global/salary-range/userstatus?id=<?php echo $api['_id'];?>"><span class="label label-sm label-success">Approved</span></a>
                										  <?php }else{ ?>
                										  <a  href="/global/salary-range/userstatus?id=<?php echo $api['_id'];?>"><span class="label label-sm label-warning">Suspended </span></a>
                										  <?php } ?>
                										  </td> -->
                                      
                                      <td>
                                      <a class="btn default btn-xs purple" href="/global/api/edit?id=<?php echo $api['_id'];?>">
                                       <i class="fa fa-edit"></i> Edit</a>
                                       <a class="btn default btn-xs black" href="/global/api/delete?id=<?php echo $api['_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
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
