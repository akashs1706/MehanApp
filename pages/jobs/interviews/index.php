 <!-- BEGIN PAGE HEADER-->
                     <div class="row">
                        <div class="col-md-12">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i> 
                                    Interviews Listing  
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
											                       <a href="/jobs/interviews/addnew" class="btn green"> Add New <i class="fa fa-plus"></i></a>
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
                                             Application Title
                                          </th>
                                          
                                          <th>
                                             Candidate
                                          </th>

                                          <th>
                                             Status Detail
                                          </th>
                                          
                                          <th>
                                             Date and Time
                                          </th>
                                          
                                          <th>
                                             Action Perform
                                          </th>
                                         
                                       </tr>
                                    </thead>
                                    <tbody>
                									<?php
                									$interviews = interviewlist();
                                  /*echo"<pre>"; 
                                  print_r($interviews);*/
                                  if($interviews){
                                   foreach($interviews as $interview){
                                   ?>
                										<tr>
                										  <td>
                											<?php echo @$interview['candidate'];?>
                										  </td>
                										  
                										  <td>
                											<?php echo @$interview['title'];?>
                										  </td>
                										  
                										  <td>
                											<?php echo @$interview['employer'];?>
                										  </td>

                                      <td>
                                      <?php echo @$interview['interview_status'];?>
                                      </td>
                										  
                										  <td>
                										  <?php echo @$interview['date'].'-'.@$interview['time'];?>
                										  </td>
                                      
                                      <td>
                                      <a class="btn default btn-xs purple" href="/jobs/interviews/edit?id=<?php echo $interview['_id'];?>">
                                       <i class="fa fa-edit"></i> Edit</a> 
                                       <a class="btn default btn-xs black" href="/jobs/interviews/delete?id=<?php echo $interview['_id'];?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                       <i class="fa fa-trash-o"></i> Delete</a>
                                       <a class="btn default btn-xs black" href="/jobs/interviews/view?id=<?php echo $interview['_id'];?>">
                                       <i class="fa fa-trash-o"></i> View</a>
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
