 <!-- BEGIN PAGE HEADER-->
 <?php
 $countries = adminglobalcountrieslistbystatus("1");
 $states = adminglobalstateslistbystatus("1");
 $cities = adminglobalcitylistbystatus("1");
 $degrees = adminglobaldegreeslistbystatus("1");
 $industries = adminglobalindustrytypeslistbystatus("1");
 
 if(isset($_POST['first_name']) && $_POST['first_name']!=''){
  
  $result = adminaddnewemployers($_POST);
  if($result == "true"){
  header('Location: /employers');
  }else{
  echo $result;
  }
  }
  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New Employer
                     </h3>
                    
                     <!-- END PAGE HEADER-->
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">
                     <form role="form" action="" method="post">
                        
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
                  										<label>First Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="First Name" class="form-control" name="first_name">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Last Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Last Name" class="form-control" name="last_name">
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
                  											<input type="text" placeholder="Phone" class="form-control" name="phone">
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
                                    Company Details
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              
                              <div class="portlet-body form">
                  							
                  								<div class="form-body">
                  									
                  									<div class="form-group">
                  										<label>Position In Company</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Emp Position" class="form-control" autocomplete="off" name="emp_position">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group" >
                  										<label>Company Industry</label>
                  										<div class="input-group">
                  										<select name="emp_industry" class="form-control">
                      										<option value="">Select Industry</option>
                      										<?php foreach($industries as $industry){ ?>
                      										<option value="<?php echo $industry['title'];?>"><?php echo $industry['title'];?></option>
                      										<?php } ?>
                  										</select>
                  										
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Company Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Company Name" class="form-control" autocomplete="off" name="emp_company_name">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Country</label>
                  										<div class="input-group">
                  										<select name="country" class="form-control"  onChange="updatestatelist(this.value,'state','city')">
                    										<option value="">Select Country</option>
                    										<?php foreach($countries as $counrty){ ?>
                    										<option value="<?php echo $counrty['title'];?>"><?php echo $counrty['title'];?></option>
                    										<?php } ?>
                  										</select>
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>District</label>
                  										<div class="input-group" id="state">
                  										<select name="state" class="form-control" onChange="updatecitylist(this.value,'city')">
                    										<option value="">Select District</option>
                    										<?php foreach($states as $state){ ?>
                    										<option value="<?php echo $state['title'];?>"><?php echo $state['title'];?></option>
                    										<?php } ?>
                    									
                  										</select>
                  										</div>
                  									</div>
                  									
                  									
                  									<div class="form-group">
                  										<label>City</label>
                  										<div class="input-group" id="city">
                  											<select name="city" class="form-control">
                      										<option value="">Select City</option>
                      										<?php foreach($cities as $city){ ?>
                      										<option value="<?php echo $city['title'];?>"><?php echo $city['title'];?></option>
                      										<?php } ?>
                      								</select>
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
