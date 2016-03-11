 <!-- BEGIN PAGE HEADER-->
 <?php
 $user = admingetemployersbyid($_GET['id']);
 ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Employer Profile
                     </h3>
                    
                     <!-- END PAGE HEADER-->
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">
                        <div class="col-md-6">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i>  
                                    Profile Information
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  									<div class="form-group">
                  										<label><b>Name: </b> </label>
                  										<?php echo @$user['first_name'];?> <?php echo @$user['last_name'];?> 
                  									</div>
                  									
                  									                  									
                  									<div class="form-group">
                  										<label><b>Email Address: </b></label>
                  										<?php echo @$user['email'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Phone: </b></label>
                  										<?php echo @$user['phone'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>User Name: </b></label>
                  										<?php echo @$user['username'];?> 
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Address: </b></label>
                  										<?php echo @$user['address_1'];?> <?php echo @$user['address_2'];?>
                  										</div>
                  									
                  									<div class="form-group">
                  										<label><b>Country: </b></label>
                  										<?php echo @$user['country'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>State: </b></label>
                  										<?php echo @$user['state'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>City: </b></label>
                  										<?php echo @$user['city'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Geo Location: </b></label><br />
                  										<?php if(isset($user['postal_code'])){ 
                  										  echo "Latitude: ".@$user['postal_code']['lat'];
                  										  echo "<br />";
                                        echo "Longitude: ".@$user['postal_code']['lng'];
                                        
                  											 } ?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Position: </b></label>
                  									  <?php echo @$user['emp_position'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Industry: </b></label>
                  										<?php echo @$user['emp_industry'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Company Name: </b></label>
                  										<?php echo @$user['emp_company_name'];?>
                  									</div>
                  									
                  									</div>
                  									
                  									
                  								</div>
                  								
                  						</div>
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        
                        
                        <div class="col-md-6">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i>  
                                    Job's Posted
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							  
                  							  <?php
                                  if(isset($user['jobsarray']) && $user['jobsarray']!='') { foreach($user['jobsarray'] as $job){ ?>
                  								<div class="form-body">
                  									
                  									<div class="form-group">
                  										<p><b><?php echo @$job['title'];?></b></p>
                  										<p><b>Category: </b><?php echo @$job['category_name'];?></p>
                  										<p><?php echo @$job['description'];?></p>
                  										<p><b>Created: </b><?php echo date('Y-m-d',$job['created']);?>  
                                      <b>Active From: </b><?php echo date('Y-m-d',$job['active_from']);?></p>
                                      <p><b>Status: </b>
                                      <?php if(isset($job['status']) && $job['status'] == 1) { ?>
                						            <span class="label label-sm label-success">Active</span>
                							           <?php }else{ ?>
                										    <span class="label label-sm label-warning">Suspended </span>
                							           <?php } ?>
                                      </p>
                  										
                  									</div>
                  								<hr>	
                  								</div>
                  								
                  								<?php }
                                  } ?>
                  								
                  						</div>
                              
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        
                        
                        
                       
                     </div>
