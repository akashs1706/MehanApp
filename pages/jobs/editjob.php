<?php
 $job = jobgetjobbyid($_GET['id']);
  $users = jobuserslist();
  $jobcat = jobcat();
  $users = employeruserslist();
/*$district = admingloballiststates();
$city = admingloballistcities();*/

$countries = adminglobalcountrieslistbystatus("1");
 $states = adminglobalstateslistbystatus("1");
 $cities = adminglobalcitylistbystatus("1");
 $weekends=explode(',',$job['weekends']);
$jobpackages = getjobpackages(1);
$salaryrange = getsalaryrange(1);

 if(isset($_POST['edit_job'])){
  
  $result = jobupdatejobbyid($_POST);
  if($result == "true"){
  header('Location: /jobs');
  }else{
  echo $result;
  }
  }
  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Edit Job
                     </h3>
                     
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">
                       
                                <form role="form" action="" method="post">
                                  <div class="col-md-6">
                                    <div class="portlet box blue">
                                      <div class="portlet-title">
                                        <div class="caption">
                                          <i class="fa fa-edit"></i><label>Job Details</label>>  
                                        </div>
                                        <div class="tools">
                                          <a href="javascript:;" class="collapse">
                                          </a>
                                        </div>
                                      </div>

                                      <div class="portlet-body form">
                                        <div class="form-body">

                                          <div class="form-group">
                                            <label>Select User</label>
                                            <div class="input-group">
                                              <select class="form-control" name="user_id">
                                                <?php
                                                foreach ($users as $value) { 
                                                   $name = $value['first_name'].' '.$value['last_name'].'('.$value['email'].')';

                                                  ?>
                                                  <option value="<?php echo $value['_id']; ?>" <?php if($value['_id']==$job['user_id']){echo "selected"; } ?>><?php echo $name; ?></option>
                                                  <?php }
                                                ?>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Select Category</label>
                                            <div class="input-group">
                                              <select class="form-control" name="category_id">
                                                <?php
                                                foreach ($jobcat as $value) { ?>
                                                  <option value="<?php echo $value['_id']; ?>" <?php if($value['_id']==$job['category_id']){echo "selected"; } ?>><?php echo $value['title']; ?></option>
                                                  <?php }
                                                ?>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Job Title</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['title']; ?>" placeholder="Job Title" class="form-control" name="title">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Job Tasks</label>
                                            <div class="input-group">
                                                <div class="input-group">
                                                <?php
                                                  if(is_array($job['job_tasks']))
                                                  {
                                                    foreach ($job['job_tasks'] as $value) {
                                                      echo '<input type="text" class="form-control" name="job_tasks[]" placeholder="Task" style="margin-top:1em" value="'.$value.'">';
                                                    } 
                                                  }else{

                                                    echo '<input type="text" class="form-control" name="job_tasks[]" placeholder="Task" style="margin-top:1em" value="'.$job['job_tasks'].'">';
                                                  }

                                                  ?>
                                                  
                                                </div>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label>Working Hours Per Day</label>
                                            <div class="input-group">
                                              <select class="form-control" name="working_hour">
                                                <option value="1" <?php if($job['working_hour']=="1"){echo "selected"; } ?>>1</option>
                                                <option value="2" <?php if($job['working_hour']=="2"){echo "selected"; } ?>>2</option>
                                                <option value="3" <?php if($job['working_hour']=="3"){echo "selected"; } ?>>3</option>
                                                <option value="4" <?php if($job['working_hour']=="4"){echo "selected"; } ?>>4</option>
                                                <option value="5" <?php if($job['working_hour']=="5"){echo "selected"; } ?>>5</option>
                                                <option value="6" <?php if($job['working_hour']=="6"){echo "selected"; } ?>>6</option>
                                                <option value="7" <?php if($job['working_hour']=="7"){echo "selected"; } ?>>7</option>
                                                <option value="8" <?php if($job['working_hour']=="8"){echo "selected"; } ?>>8</option>
                                                <option value="9" <?php if($job['working_hour']=="9"){echo "selected"; } ?>>9</option>
                                                <option value="10" <?php if($job['working_hour']=="10"){echo "selected"; } ?>>10</option>
                                                <option value="11" <?php if($job['working_hour']=="11"){echo "selected"; } ?>>11</option>
                                                <option value="12" <?php if($job['working_hour']=="12"){echo "selected"; } ?>>12</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            
                                            <label>Weekends</label>
                                            <div class="md-checkbox-inline">

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Monday" id="checkbox1" class="md-check" <?php if(in_array("Monday",$weekends)){echo "checked";}?>>
                                                <label for="checkbox1">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Monday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Tuesday" id="checkbox2" class="md-check" <?php if(in_array("Tuesday",$weekends)){echo "checked";}?>>
                                                <label for="checkbox2">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Tuesday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Wednesday" id="checkbox3" class="md-check" <?php if(in_array("Wednesday",$weekends)){echo "checked";}?>>
                                                <label for="checkbox3">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Wednesday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Thursday"  id="checkbox4" class="md-check" <?php if(in_array("Thursday",$weekends)){echo "checked";}?>>
                                                <label for="checkbox4">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Thursday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Friday" id="checkbox5" class="md-check" <?php if(in_array("Friday",$weekends)){echo "checked";}?>>
                                                <label for="checkbox5">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Friday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Saturday" id="checkbox6" class="md-check" <?php if(in_array("Saturday",$weekends)){echo "checked";}?>>
                                                <label for="checkbox6">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Saturday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Sunday" id="checkbox7" class="md-check" <?php if(in_array("Sunday",$weekends)){echo "checked";}?>>
                                                <label for="checkbox7">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Sunday </label>
                                              </div>

                                          </div>
                                        </div>

                                          <div class="form-group">
                                            <label>Contract Period</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo @$job['contract_period']; ?>" placeholder="Contract Period" class="form-control" name="contract_period">
                                            </div>
                                          </div>


                                          <div class="form-group">
                                            <label>State</label>
                                            <div class="input-group" id="birth_state">
                                              <select name="state" class="form-control" onChange="updatecitylist(this.value,'city')">
                                                <option value="">Select State</option>
                                                <?php foreach($states as $state){ ?>
                                                <option value="<?php echo $state['title'];?>"  <?php if($state['title'] == @$job['state'] ){ echo "selected"; }?>><?php echo $state['title'];?></option>
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
                                                <option value="<?php echo $city['title'];?>"  <?php if($city['title'] == @$job['city'] ){ echo "selected"; }?>><?php echo $city['title'];?></option>
                                                <?php } ?>
                                              </select>
                                            </div>
                                          </div>

                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="portlet box blue">
                                      <div class="portlet-title">
                                        <div class="caption">
                                          <i class="fa fa-edit"></i><label>Job Pay Details</label>>  
                                        </div>
                                        <div class="tools">
                                          <a href="javascript:;" class="collapse">
                                          </a>
                                        </div>
                                      </div>

                                      <div class="portlet-body form">
                                        <div class="form-body">

                                          <div class="form-group">
                                            <label>Basic Salary</label>
                                            <div class="input-group">
                                            <select class="form-control" name="min_max_salary">
                                            <option value="">Select Salary</option>
                                                <?php
                                                foreach ($salaryrange as $salary) { ?>
                                                  <option value="<?php echo $salary['_id']; ?>" <?php if($salary['_id'] == $job['min_max_salary']){echo "selected"; } ?>><?php echo $salary['min'].'-'.$salary['max']; ?></option>
                                                  <?php }
                                                ?>
                                              </select>
                                              
                                            
                                            </div>
                                          </div>

                                          <h3>Compensations</h3>
                                        
                                          <div class="form-group">
                                            <label>Accomodation Rate</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['accomodation_rate']; ?>" placeholder="Accomodation Rate" class="form-control" name="accomodation_rate">
                                            </div>
                                          </div>                                             
                                          
                                          <div class="form-group">
                                            <label>Car Rate</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['car_rate']; ?>" placeholder="Car Rate" class="form-control" name="car_rate">
                                            </div>
                                          </div>

                                          <h3>Benefits</h3>
                                          
                                          <div class="form-group">
                                            <label>Overtime Hour</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['overtime_hour']; ?>" placeholder="Overtime Hour" class="form-control" name="overtime_hour">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Health Insurance</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['health_insurance']; ?>" placeholder="Health Insurance" class="form-control" name="health_insurance">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Yearly Bonus</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['yearly_bonus']; ?>" placeholder="Yearly Bonus" class="form-control" name="yearly_bonus">
                                            </div>
                                          </div>

                                          <h5>Commission</h5>
                                          <div class="form-group">
                                            <label>Commission Freq</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['commission_freq']; ?>" placeholder="Commission Freq" class="form-control" name="commission_freq">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Commission Cap</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['commission_cap']; ?>" placeholder="Commission Cap" class="form-control" name="commission_cap">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Commission Conditions</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['commission_conditions']; ?>" placeholder="Commission Conditions" class="form-control" name="commission_conditions">
                                            </div>
                                          </div>

                                          

                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="portlet box blue">
                                      <div class="portlet-title">
                                        <div class="caption">
                                          <i class="fa fa-edit"></i><label>Required Employee</label>  
                                        </div>
                                        <div class="tools">
                                          <a href="javascript:;" class="collapse">
                                          </a>
                                        </div>
                                      </div>

                                      <div class="portlet-body form">
                                      
                                        <div class="form-body">

                                          <div class="form-group">
                                            <label>Nationality</label>
                                            <div class="input-group">
                                            <select name="nationality" class="form-control">
                                              <option value="">Select Country</option>
                                              <?php foreach($countries as $counrty){ ?>
                                              <option value="<?php echo $counrty['title'];?>" <?php if($job['nationality']==$counrty['title']){ echo "selected"; } ?>><?php echo $counrty['title'];?></option>
                                              <?php } ?>
                                            </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Iqama Transfer</label>
                                            <div class="input-group">
                                              <input type="checkbox" class="form-control make-switch" data-size="normal" value="yes" name="iqama_transfer" data-on-text="YES" data-off-text="NO" <?php if($job['iqama_transfer']=="yes"){echo 'checked'; } ?>>
                                            </div>
                                            </div>
                                          

                                          <div class="form-group">
                                            <label>Age Range</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['age_range']; ?>" placeholder="Age Range" class="form-control" name="age_range">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Experience Years</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['exp_years']; ?>" placeholder="Experience Years" class="form-control" name="exp_years">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Experience Field</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['exp_field']; ?>" placeholder="Experience Field" class="form-control" name="exp_field">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Experience Industry</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['exp_industry']; ?>" placeholder="Experience Industry" class="form-control" name="exp_industry">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Gender</label>
                                            <div class="input-group">
                                              <select name="gender" class="form-control">
                                                <option value="male" <?php if($job['gender']=="male"){echo "selected"; } ?>>Male</option>
                                                <option value="female" <?php if($job['gender']=="Female"){echo "selected"; } ?>>Female</option>
                                                <option value="both" <?php if($job['gender']=="both"){echo "selected"; } ?>>Both</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Car Required</label>
                                            <div class="input-group">
                                              <input type="checkbox" class="form-control make-switch" data-size="normal" value="yes" name="car_req" data-on-text="YES" data-off-text="NO" <?php if($job['car_req']=="yes"){echo 'checked'; } ?>>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Employees Required</label>
                                            <div class="input-group">
                                              <input type="text" value="<?php echo $job['employees_req']; ?>" placeholder="Employees Required" class="form-control" name="employees_req">
                                            </div>
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
                  										 <?php foreach($jobpackages as $package) { ?>
                  										 <label class="checkbox-inline">
                											 <input type="checkbox" name="job_package[]" id="optionsRadios4" value="<?php echo $package['_id'];?>" <?php if (isset($job['job_package']) && in_array($package['_id'], $job['job_package'])){ echo "checked"; }?>> <?php echo $package['title'];?> 
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
                          
                                 <div class="portlet-body form">
                                  <div class="form-actions">
                                    <input type="hidden" placeholder="Username" class="form-control" name="id" value="<?php echo $job['_id'];?>">
                                    <button class="btn blue" type="submit" name="edit_job">Submit</button>
                                    <button class="btn default" type="button" onClick="window.history.back(-1)">Cancel</button>
                                  </div>
                                  </div>
                                  </div>
                              </form>
                     </div>
