 <!-- BEGIN PAGE HEADER-->
 <?php
 $countries = adminglobalcountrieslistbystatus("1");
 $states = adminglobalstateslistbystatus("1");
 $cities = adminglobalcitylistbystatus("1");
 $degrees = adminglobaldegreeslistbystatus("1");
 $industries = adminglobalindustrytypeslistbystatus("1");
 $courserarray = getAllCoursesArray();
 $candpackagesarray = getAllPackagesArray();
 $candachievementsarray = getAllAchievementsByStatus(1);
 if(isset($_POST['first_name']) && $_POST['first_name']!=''){
  
  $result = adminaddnewcandidates($_POST);
  if($result == "true"){
  header('Location: /candidates');
  }else{
  echo $result;
  }
  }
  
  ?>
  
  
  
  
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New Candidates
                     </h3>
                    <!-- END PAGE HEADER-->
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">
                     <form role="form" action="" method="post" enctype="multipart/form-data">
                        
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
                  										<label>Profile Photo</label>
                  										<div class="input-group">
                  										  <input type="file" placeholder="Profile Photo" name="profile_photo">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Email Address</label>
                  										<div class="input-group">
                  											<input type="email" placeholder="Email Address" class="form-control" name="email">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Mobile</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Phone" class="form-control" name="phone" value="<?php echo @$user['phone'];?>">
                  										</div>
                  									</div>
                                    
                                    <div class="form-group">
                  										<label>User Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Username" class="form-control" name="username">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Password</label>
                  										<div class="input-group">
                  											<input type="password" placeholder="Username" class="form-control" autocomplete="off" name="password">
                  										</div>
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
                                    Personal Information
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  									<div class="form-group">
                  										<label>First Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="First Name" class="form-control" name="first_name" value="<?php echo @$user['first_name'];?>">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Last Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?php echo @$user['last_name'];?>">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Date of Birth</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Date of Birth" class="form-control form-control-inline input-medium date-picker" size="16" name="dob">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label style="width:100%;float:left;" >Place of Birth</label>
                  										<div class="input-group" style="width:30%;float:left;">
                  											<select name="birth_country" class="form-control"  onChange="updatestatelist(this.value,'birth_state','birth_city')">
                    										<option value="">Select Country</option>
                    										<?php foreach($countries as $counrty){ ?>
                    										<option value="<?php echo $counrty['title'];?>"><?php echo $counrty['title'];?></option>
                    										<?php } ?>
                  										</select>
                  										
                  										</div>
                  										
                  										
                  										<div class="input-group" style="width:30%;float:left;margin:0 5%" id="birth_state">
                  										<select name="birth_state" class="form-control" onChange="updatecitylist(this.value,'birth_city')">
                    										<option value="">Select District</option>
                    										<?php foreach($states as $state){ ?>
                    										<option value="<?php echo $state['title'];?>"><?php echo $state['title'];?></option>
                    										<?php } ?>
                    									</select>
                  										</div>
                  										
                  										<div class="input-group" style="width:30%;float:left;" id="birth_city">
                  											<select name="birth_city" class="form-control">
                      										<option value="">Select City</option>
                      										<?php foreach($cities as $city){ ?>
                      										<option value="<?php echo $city['title'];?>"><?php echo $city['title'];?></option>
                      										<?php } ?>
                      									</select>
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Gender</label>
                  										<div class="radio-list">
                  										<label class="radio-inline">
                											<input type="radio" name="gender" id="optionsRadios4" value="male" checked> Male 
                                      </label>
                											<label class="radio-inline">
                											<input type="radio" name="gender" id="optionsRadios5" value="female"> Female 
                                      </label>
                											</div>
                  									</div>
                                    
                                    <div class="form-group">
                  										<label>Nationality</label>
                  										<div class="input-group">
                  										<select name="country" class="form-control">
                    										<option value="">Select Country</option>
                    										<?php foreach($countries as $counrty){ ?>
                    										<option value="<?php echo $counrty['title'];?>"><?php echo $counrty['title'];?></option>
                    										<?php } ?>
                  										</select>
                  										</div>
                  									</div>
                  									
                  									
                  									<div class="form-group">
                  										<label style="width:100%;float:left;" >Where do you live now?</label>
                  										<div class="input-group" style="width:30%;float:left;">
                  											<select name="livenow_country" class="form-control"  onChange="updatestatelist(this.value,'livenow_state','livenow_city')">
                    										<option value="">Select Country</option>
                    										<?php foreach($countries as $counrty){ ?>
                    										<option value="<?php echo $counrty['title'];?>"><?php echo $counrty['title'];?></option>
                    										<?php } ?>
                  										</select>
                  										
                  										</div>
                  										
                  										
                  										<div class="input-group" style="width:30%;float:left;margin:0 5%" id="livenow_state">
                  										<select name="livenow_state" class="form-control" onChange="updatecitylist(this.value,'livenow_city')">
                    										<option value="">Select District</option>
                    										<?php foreach($states as $state){ ?>
                    										<option value="<?php echo $state['title'];?>"><?php echo $state['title'];?></option>
                    										<?php } ?>
                    									</select>
                  										</div>
                  										
                  										<div class="input-group" style="width:30%;float:left;" id="livenow_city">
                  											<select name="livenow_city" class="form-control">
                      										<option value="">Select City</option>
                      										<?php foreach($cities as $city){ ?>
                      										<option value="<?php echo $city['title'];?>"><?php echo $city['title'];?></option>
                      										<?php } ?>
                      									</select>
                  										</div>
                  									</div>
                  									
                  									
                  									<div class="form-group">
                  										<label></label>
                  										<div class="input-group">
                  										
                  										</div>
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
                  										<label>Educational Level</label>
                  										<div class="input-group">
                  										<select name="educational_level" class="form-control">
                      										<option value="">Select Degree</option>
                      										<?php foreach($degrees as $degre){ ?>
                      										<option value="<?php echo $degre['title'];?>"><?php echo $degre['title'];?></option>
                      										<?php } ?>
                  										</select>
                  										
                  										</div>
                  									</div>
                  									
                  								 <div class="form-group">
                  										<label>Major</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Major" class="form-control" name="major">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>University/Institutes</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="University/Institutes" class="form-control" name="university_institutes" >
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Graduation Date</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Graduation Date" class="form-control form-control-inline input-medium date-picker" size="16" name="graduation_date"  >
                  										</div>
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
                                    Employment Details
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  									<div class="form-group">
                  										<label>Right Now I am</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Right Now I am" class="form-control" name="right_now_i_am">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Job Title</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Job Title" class="form-control" name="cand_job_title">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Company Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Company Name" class="form-control" name="cand_company_name"  >
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Industry Type</label>
                  										<div class="input-group">
                  										<select name="cand_industry_type" class="form-control">
                      										<option value="">Select Industry</option>
                      										<?php foreach($industries as $industry){ ?>
                      										<option value="<?php echo $industry['title'];?>"><?php echo $industry['title'];?></option>
                      										<?php } ?>
                  										</select>
                  										
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Since</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Since" class="form-control form-control-inline input-medium date-picker" size="16" name="working_since"  >
                  										</div>
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
                  							
                  								<div class="form-body">
                  								<div  id="flexiblesection">
                  									<div class="form-group" id="1">
                  										<label>Achievment 1</label>
                  										<div class="input-group">
                  										   <input style="width:80%" class="form-control" name="achievments[]" value="" data-list="<?php echo $candachievementsarray;?>" />
                  										</div>
                  									</div>
                  								</div>
                  									<div class="input-group addmore">
                                        <button type="button" class="btn blue" onClick="addnewRow()">Add Achievment</button> 
                                    </div>
                  									<script>
                  									function addnewRow(){
                  									
                  									var ccount = $('#flexiblesection > .form-group').length;
                  									var newccount = ccount+1;
                  									var newhtml ='<div class="form-group" id="form_group_'+newccount+'"><label>Achievment '+newccount+'</label><div class="input-group"><input style="width:80%" class="form-control" name="achievments[]"  data-list="<?php echo $candachievementsarray;?>" /><button onClick="removeRow('+newccount+')" type="button" class="btn default" >Remove</button></div></div>';
                                    $('#flexiblesection').append(newhtml);
                                    }
                                    
                                    function removeRow(rowid){
                                    
                  									var ccount = $('#form_group_'+rowid).remove();
                  								  }
                  									</script>
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
                  										<label><?php echo $course['category'];?></label>
                  										<div class="checkbox-list">
                  										 <?php foreach($course['courses'] as $subco) { ?>
                  										 <label class="checkbox-inline">
                											 <input type="checkbox" name="cand_courses[]" id="optionsRadios4" value="<?php echo $subco['_id'];?>" > <?php echo $subco['title'];?> 
                                       </label>
                                      
                  										 <?php } ?>
                  										
                  										</div>
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
                  								
                  									<div class="form-group">
                  										<div class="checkbox-list">
                  										 <?php foreach($candpackagesarray as $package) { ?>
                  										 <label class="checkbox-inline">
                											 <input type="checkbox" name="cand_package[]" id="optionsRadios4" value="<?php echo $package['_id'];?>" > <?php echo $package['title'];?> 
                                       </label>
                                      <?php } ?>	
                  										
                  										
                  										</div>
                  									</div>
                  								
                  									
                  								</div>
                  								
                  						</div>
                              
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        
                        <div class="col-md-12">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet-body form">
                           <div class="form-actions">
                  									<button class="btn blue" type="submit">Submit</button>
                  									<button class="btn default" type="button" onClick="window.history.back(-1)">Cancel</button>
                  								</div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        </div>
                        </form>
                     </div>