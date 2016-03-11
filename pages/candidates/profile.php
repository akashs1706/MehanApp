 <!-- BEGIN PAGE HEADER-->
 <?php
 $user = admingetcandidatesbyid($_GET['id']);
 $courserarray = getAllCoursesArray();
 ?>
  
  
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Candidate Profile
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
                  								    <img src="/<?php echo @$user['profile_photo']; ?>" style="max-width:200px">
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Email Address: </b></label>
                  										<?php echo @$user['email'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Mobile: </b></label>
                  										<?php echo @$user['phone'];?>
                  									</div>
                  									
                  									
                  									<div class="form-group">
                  										<label><b>User Name: </b></label>
                  										<?php echo @$user['username'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>First Name: </b></label>
                  										<?php echo @$user['first_name'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Last Name: </b></label>
                  										<?php echo @$user['last_name'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Date of Birth: </b></label>
                  										<?php echo @$user['dob'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label style="width:100%;float:left;" ><b>Place of Birth: </b></label>
                  										<?php echo @$user['birth_country']?>,
                  										<?php echo @$user['birth_state']?>,
                  										<?php echo @$user['birth_city']?>
                  										
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Gender: </b></label>
                  											<?php echo @$user['gender']?>
                  									
                  									</div>
                  									
                                    <div class="form-group">
                  										<label><b>Nationality: </b></label>
                  											<?php echo @$user['country']?>
                  										
                  							   	</div>
                  								
                  									
                  									
                  									<div class="form-group">
                  										<label style="width:100%;float:left;" ><b>Where do you live now?: </b></label>
                  										<?php echo @$user['livenow_country']?>,
                  										<?php echo @$user['livenow_state']?>,
                  										<?php echo @$user['livenow_city']?>
                  									</div>
                  								
                  									
                  									<div class="form-group">
                  										<label><b>Location: </b></label><br />
                  										
                  											<?php if(isset($user['postal_code'])){ 
                  										  echo "Latitude: ".@$user['postal_code']['lat'];
                  										  echo "<br />";
                                        echo "Longitude: ".@$user['postal_code']['lng'];
                                        
                  											 } ?>
                  									</div>
                  								
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
                  								
                  								<?php if(isset($user['applications'])) { $i=0; foreach($user['applications'] as $applications ) {  $i++; ?>
                        					  <div class="form-group">
                  										<label><b>	<a href="/job-applications/viewapplication?id=<?php echo $applications['_id'];?>"><?php echo $applications['title'];?></a></b></label><br />
                  										<?php echo "<b>Status: </b>".$applications['status_detail'];?>
                  										<hr>
                  									</div>
                  								<?php } } ?>		
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
                                    Job Refferal's
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  								
                  								<?php $i=0; if(isset($user['refferals']) && $user['refferals']!='') { foreach($user['refferals'] as $refferal ) {  $i++; ?>
                        					  <div class="form-group">
                  										<label><b>Job Title: </b><?php echo $refferal['job'];?></label><br />
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
                                    Educational Details
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  									<div class="form-group">
                  										<label><b>Educational Level: </b></label>
                  										<?php echo @$user['educational_level'];?>
                  										
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Major: </b></label>
                  										<?php echo @$user['major'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>University/Institutes: </b></label>
                  										<?php echo @$user['university_institutes'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Graduation Date: </b></label>
                  										<?php echo @$user['graduation_date'];?>
                  									</div>
                  									
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
                                    Emplyment Details
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  									<div class="form-group">
                  										<label><b>Right Now I am: </b></label>
                  										<?php echo @$user['right_now_i_am'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Job Title: </b></label>
                  										<?php echo @$user['cand_job_title'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Company Name: </b></label>
                  										<?php echo @$user['cand_company_name'];?>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Industry Type: </b></label>
                  										<?php echo @$user['cand_industry_type'];?>
                  									
                  									</div>
                  									
                  									<div class="form-group">
                  										<label><b>Since: </b></label>
                  										<?php echo @$user['working_since'];?>
                  									</div>
                  									
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
                                    Achievments Details
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body" >
                  									
                        								<?php if(isset($user['achievments'])) { $i=0; foreach($user['achievments'] as $achievment ) {  $i++; ?>
                        								<?php if($achievment!='') { echo  $i.'. '.$achievment; } ?><br />
                        								<?php } } ?>
                  								   
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
                                    Training Courses
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  								<?php foreach($courserarray as $course) { ?>
                  									<div class="form-group">
                  										<label><b><?php echo $course['category'];?>: </b></label>
                  										<br />
                  									
                  										 <?php foreach($course['courses'] as $subco) { ?>
                  										 <?php if (isset($user['cand_courses']) && in_array($subco['_id'], @$user['cand_courses'])){ echo $subco['title'].','; } ?>  
                                      <?php } ?>
                  										
                  										</div>
                  								
                  								<?php } ?>
                  								
                  									
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
                                    Additional Packages
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  								<?php if(isset($user['packages'])) { $i=0; foreach($user['packages'] as $packages) { $i++; ?>
                  								<?php echo $i.'. '.$packages['title'];?><br />
                  								<?php } } ?>
                  										</div>
                  								
                  						</div>
                              
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        
                       
                     </div>
