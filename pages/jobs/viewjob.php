 <?php
 $job = jobgetjobbyid($_GET['id']);
 ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                      Job Details
                     </h3>
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">
                  
                                  <div class="col-md-6">
                                    <div class="portlet box blue">
                                      <div class="portlet-title">
                                        <div class="caption">
                                          <i class="fa fa-edit"></i><b>Job Details :</b>  
                                        </div>
                                        <div class="tools">
                                          <a href="javascript:;" class="collapse">
                                          </a>
                                        </div>
                                      </div>

                                      <div class="portlet-body form">
                                        <div class="form-body">

                                          <div class="form-group">
                                            <p>
                                              <b>Employer :</b>
                                              <?php echo @$job['user']['first_name']; ?> <?php echo @$job['user']['last_name']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Category :</b>
                                              <?php  echo @$job['category']['title']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Job Title :</b>
                                              <?php echo @$job['title']; ?>
                                            </p>
                                          </div>
                                          
                                          <div class="form-group">
                                            <p>
                                            <b>Job Tasks :</b>
                                            <?php

                                             if(is_array($job['job_tasks'])){
                                              foreach (@$job['job_tasks'] as $key => $value) {
                                                 $count= $key+1;
                                               echo "<p><b>".$count.". </b> ".$value."</p>";
                                                }
                                              }else{
                                                echo @$job['job_tasks'];
                                              } 
                                              ?>
                                            
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Working Hours Per Day :</b>
                                              <?php echo @$job['working_hour'];?>
                                            </p>
                                          </div>


                                          <div class="form-group">
                                            <p>
                                            <b>Weekends :</b>
                                            <?php echo @$job['weekends']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Contract Period :</b>
                                              <?php echo @$job['contract_period']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>City :</b>
                                              <?php echo @$job['city']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>District :</b>
                                              <?php echo @$job['state']; ?>
                                            </p>
                                          </div>

                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="portlet box blue">
                                      <div class="portlet-title">
                                        <div class="caption">
                                          <i class="fa fa-edit"></i><b>Job Pay Details :</b>  
                                        </div>
                                        <div class="tools">
                                          <a href="javascript:;" class="collapse">
                                          </a>
                                        </div>
                                      </div>

                                      <div class="portlet-body form">
                                        <div class="form-body">

                                          <div class="form-group">
                                            <p> 
                                              <b>Basic Salary :</b>
                                              <?php echo @$job['salary']['min'].'-'.@$job['salary']['max']; ?></p>
                                          </div>

                                          <h3>Compensations</h3>

                                          <div class="form-group">
                                            <p>
                                            <b>Accomodation Rate :</b>
                                            <?php echo @$job['accomodation_rate']; ?>
                                            </p>
                                          </div>                                             
                                          
                                          <div class="form-group">
                                            <p>
                                            <b>Car Rate :</b>
                                            <?php echo @$job['car_rate']; ?>
                                            </p>
                                          </div>

                                          <h3>Benefits</h3>                                         
                                          
                                          <div class="form-group">
                                            <p>
                                            <b>Overtime Hour :</b>
                                            <?php echo @$job['overtime_hour']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Health Insurance :</b>
                                            <?php echo @$job['health_insurance']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Yearly Bonus :</b>
                                            <?php echo @$job['yearly_bonus']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Commission Freq :</b>
                                            <?php echo @$job['commission_freq']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Commission Cap :</b>
                                            <?php echo @$job['commission_cap']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Commission Conditions :</b>
                                            <?php echo @$job['commission_conditions']; ?>
                                            </p>
                                          </div>

                                          

                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="portlet box blue">
                                      <div class="portlet-title">
                                        <div class="caption">
                                          <i class="fa fa-edit"></i><b>Required Employee</b>  
                                        </div>
                                        <div class="tools">
                                          <a href="javascript:;" class="collapse">
                                          </a>
                                        </div>
                                      </div>

                                      <div class="portlet-body form">
                                        <div class="form-body">
                                          <div class="form-group">
                                              <p>
                                              <b>Nationality :</b>
                                              <?php echo @$job['nationality']; ?>
                                              </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Iqama Transfer :</b>
                                            <?php echo @$job['iqama_transfer']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Age Range :</b>
                                            <?php echo @$job['age_range']; ?></p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Experience Required :</b>
                                           <?php echo @$job['exp_req']; ?></p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Experience Years :</b>
                                            <?php echo @$job['exp_years']; ?></p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Experience Field :</b>
                                            <?php echo @$job['exp_field']; ?></p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                            <b>Experience Industry :</b>
                                            <?php echo @$job['exp_industry']; ?></p>
                                          </div>

                                          <div class="form-group">
                                           <p> 
                                           <b>Gender :</b>
                                            <?php echo @$job['gender'];?>
                                            </p>
                                            
                                          </div>

                                          <div class="form-group">
                                            <p><b>Car Required :</b>
                                            <?php echo @$job['car_req']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Employees Required : </b>
                                              <?php echo @$job['employees_req']; ?>
                                            </p>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                     </div>
                     
                     
                     <div class="col-md-6">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i>  
                                    Job Refferal's
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  								
                  								<?php $i=0; if(isset($job['refferals']) && $job['refferals']!=''){ foreach($job['refferals'] as $refferal ) {  $i++; ?>
                        					  <div class="form-group">
                  										<label><b>Reffered By: </b><?php echo $refferal['reffered_by'];?></label><br />
                  								 	  <label><b>Reffered To: </b><?php echo $refferal['reffered_to'];?></label><br />
                  								 	  <?php if(isset($refferal['status']) && $refferal['status'] == 1) { ?>
                										  <span class="label label-sm label-success">Accepeted</span>
                										  <?php }else{ ?>
                										  <span class="label label-sm label-warning">Pending </span>
                										  <?php } ?>
                										  <hr>
                  									</div>
                  								<?php }
                                  } ?>		
                  								</div>
                  								
                  						</div>
                              
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        
                        <div class="col-md-6">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i>  
                                    Job Application's
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  								
                  								<?php $i=0; if(isset($job['applications'])&& $job['applications']!='') { foreach($job['applications'] as $application ) {  $i++; ?>
                        					  <div class="form-group">
                  										<label><b>Application: </b><?php echo $application['title'];?></label><br />
                  								 	  <hr>
                  									</div>
                  								<?php }
                                  } ?>		
                  								</div>
                  								
                  						</div>
                              
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
