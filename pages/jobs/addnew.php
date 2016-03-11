 <?php

/*$job = jobgetjobbyid('56d930bc4d5278a1113c9869');
print_r($job);*/

/*$district = admingloballiststates();
$city = admingloballistcities();*/
 $countries = adminglobalcountrieslistbystatus("1");
 $states = adminglobalstateslistbystatus("1");
 $cities = adminglobalcitylistbystatus("1");
 //$users = jobuserslist();
 $users = employeruserslist();
 $jobcat = jobcat();
 $jobpackages = getjobpackages(1);
 $salaryrange = getsalaryrange(1);

 if(isset($_POST['add_job'])){
  
//  print_r($_POST);
  $result = addjob($_POST);
  if($result == "true"){
  header('Location: /jobs');
  }else{
  echo $result;
  }
  }
  
  ?>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
       
function addRow(tableID) {
  var table = document.getElementById(tableID);
  var rowCount = table.rows.length;
  if(rowCount < 5){             // limit the user from creating fields more than your limits
    var row = table.insertRow(rowCount);
    var colCount = table.rows[0].cells.length;
    for(var i=0; i<colCount; i++) {
      var newcell = row.insertCell(i);
      newcell.innerHTML = table.rows[0].cells[i].innerHTML;/* +"<p>"+ (rowCount+1)+"</p>";*/


    }
//alert(rowCount+1);
  }else{
     alert("Maximum Tasks per Job is 5.");
         
  }
}

$(document).ready(function() {
   $('.btn-toggle').click(function(e) {
    $(this).find('.btn').toggleClass('active');  
    
    if ($(this).find('.btn-primary').size()>0) {
      $(this).find('.btn').toggleClass('btn-primary');
    }
    if ($(this).find('.btn-danger').size()>0) {
      $(this).find('.btn').toggleClass('btn-danger');
    }
    if ($(this).find('.btn-success').size()>0) {
      $(this).find('.btn').toggleClass('btn-success');
    }
    if ($(this).find('.btn-info').size()>0) {
      $(this).find('.btn').toggleClass('btn-info');
    }
    
    $(this).find('.btn').toggleClass('btn-default');
    e.preventDefault();
       
});

    $(".cntrct").hide();
    $('.radio').click(function(){
        if($(this).attr("value")=="one"){
            $(".cntrct").hide();
            
        }
        if($(this).attr("value")=="ltone"){
            $(".cntrct").show();
            //$(".green").show();
        }
    });
});
    </script>
    <style type="text/css">
    .input-group.addmore {
      text-align: right;
      padding-top: 1em;
      }
    .btn-group.btn-toggle {
      margin-left: 1em;
      }
    input.addTask {
      color: #fff;
      background-color: #3379b5;
      border-color: #2a6496;
      border-width: 0;
      padding: 7px 14px;
      font-size: 14px;
      }
    </style>



                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New Job
                     </h3>
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">


                                <form role="form" action="" method="post">
                                  <div class="col-md-6">
                                    <div class="portlet box blue">
                                      <div class="portlet-title">
                                        <div class="caption">
                                          <i class="fa fa-edit"></i><label>Job Details</label>  
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
                                                  <option value="<?php echo $value['_id']; ?>"><?php echo $name; ?></option>
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
                                                  <option value="<?php echo $value['_id']; ?>"><?php echo $value['title']; ?></option>
                                                  <?php }
                                                ?>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Job Title</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Job Title" class="form-control" name="title">
                                            </div>
                                          </div>

                                           <div class="form-group">
                                           <label>Tasks Of The Job</label>
                                            <table id="dataTable" style="width:100%">
                                              <tbody>
                                                <tr>
                                                <td>
                                                <div class="input-group">
                                                  <input type="text" class="form-control" name="job_tasks[]" placeholder="Task" style="margin-top:1em">
                                                  </div>
                                                 </td>
                                                        </tr>
                                                        </tbody>
                                            </table>
                                            <div class="input-group addmore">
                                              <input type="button" class="addTask" value="Add Task" onClick="addRow('dataTable')" /> 
                                            </div>
                                            </div>
                                          
                                          <div class="form-group">
                                            <label>Working Hours Per Day</label>
                                            <div class="input-group">
                                              <select class="form-control" name="working_hour">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            
                                            <label>Weekends</label>
                                            <div class="md-checkbox-inline">

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Monday" id="checkbox1" class="md-check">
                                                <label for="checkbox1">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Monday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Tuesday" id="checkbox2" class="md-check">
                                                <label for="checkbox2">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Tuesday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Wednesday" id="checkbox3" class="md-check">
                                                <label for="checkbox3">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Wednesday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Thursday"  id="checkbox4" class="md-check">
                                                <label for="checkbox4">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Thursday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Friday" id="checkbox5" class="md-check">
                                                <label for="checkbox5">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Friday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Saturday" id="checkbox6" class="md-check">
                                                <label for="checkbox6">
                                                <span></span>
                                                <span class="check"></span>
                                                <span class="box"></span>
                                                Saturday </label>
                                              </div>

                                              <div class="md-checkbox input-group">
                                                <input type="checkbox" name="weekends[]" value="Sunday" id="checkbox7" class="md-check">
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
                                              <label>
                                              <input type="radio" name="contract" class="radio" value="one"> 1 Year</label>
                                              <label>
                                              <input type="radio" name="contract" class="radio" value="ltone"> Less than 1 year</label>
     
                                              <div class="cntrct">
                                              <input type="text" placeholder="Months" class="form-control" name="contract_period">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>District</label>
                                            <div class="input-group" id="birth_state">
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
                                  </div>

                                  <div class="col-md-6">
                                    <div class="portlet box blue">
                                      <div class="portlet-title">
                                        <div class="caption">
                                          <i class="fa fa-edit"></i><label>Job Pay Details</label>  
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
                                                foreach ($salaryrange as $salary) {  ?>
                                                  <option value="<?php echo $salary['_id']; ?>" ><?php echo $salary['min'].'-'.$salary['max']; ?></option>
                                                  <?php }
                                                ?>
                                              </select>
                                            </div>
                                          </div>
                                          
                                          <h3>Compensations</h3>

                                          <div class="form-group">
                                            <div class="input-group">
                                            <label>Accomodation</label>
                                               <div class="btn-group btn-toggle"> 
                                              <button class="btn btn-default" data-toggle="collapse" data-target="#collapsible1">Yes</button>
                                              <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible1">No</button>
                                            </div>
                                              
                                            </div>
                                          </div>

                                        <div  class="well collapse" id="collapsible1">
                                          <div class="form-group">
                                            <label>Accomodation Rate</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Accomodation Rate" class="form-control" name="accomodation_rate">
                                            </div>
                                          </div>  
                                        </div> 

                                          <div class="form-group">
                                            <div class="input-group">
                                              <label>Car Offer</label>
                                              <div class="btn-group btn-toggle"> 
                                              <button class="btn btn-default" data-toggle="collapse" data-target="#collapsible2">Yes</button>
                                              <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible2">No</button>
                                            </div>
                                            </div>
                                          </div>

                                        <div class="well collapse" id="collapsible2">
                                          <div class="form-group">
                                            <label>Car Rate</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Car Rate" class="form-control" name="car_rate">
                                            </div>
                                          </div>  
                                        </div>   

                                          <h3>Benefits</h3>
                                          
                                          <div class="form-group">
                                            <div class="input-group">
                                              <label>Overtime</label>
                                              <div class="btn-group btn-toggle"> 
                                              <button class="btn btn-default" data-toggle="collapse" data-target="#collapsible3">Yes</button>
                                              <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible3">No</button>
                                            </div>
                                            </div>
                                          </div>

                                        <div class="well collapse" id="collapsible3">
                                          <div class="form-group">
                                            <label>Overtime Hour</label>
                                            <div class="input-group">
                                               <input type="text" placeholder="Overtime Hour" class="form-control" name="overtime_hour">
                                            </div>
                                          </div>  
                                        </div> 
                                          
                                          <div class="form-group">
                                            <div class="input-group">
                                              <label>Health Insurance</label>
                                              <div class="btn-group btn-toggle">
                                              <input type="checkbox" class="form-control make-switch" data-size="normal" value="yes" name="health_insurance" data-on-text="YES" data-off-text="NO" >
                                              </div>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="input-group">
                                            <label>Yearly Bonus</label>
                                            <div class="btn-group btn-toggle">
                                            <input type="checkbox" value="yes" data-size="normal" class="form-control make-switch"  data-on-text="YES" data-off-text="NO" name="yearly_bonus">
                                            </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="input-group">
                                              <label>Commission</label>
                                              <div class="btn-group btn-toggle"> 
                                              <button class="btn btn-default" data-toggle="collapse" data-target="#collapsible4">Yes</button>
                                              <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible4">No</button>
                                            </div>
                                            </div>
                                          </div>

                                        <div  class="well collapse" id="collapsible4">
                                          <div class="form-group">
                                            <label>Commission Freq</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Commission Freq" class="form-control" name="commission_freq">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Commission Cap</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Commission Cap" class="form-control" name="commission_cap">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Commission Conditions</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Commission Conditions" class="form-control" name="commission_conditions">
                                            </div>
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
<!-- 
                                          <div class="form-group">
                                            <label>Nationality</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Nationality" class="form-control" name="nationality">
                                            </div>
                                          </div> -->

                                          <div class="form-group">
                                            <label>Nationality</label>
                                            <div class="input-group">
                                            <select name="nationality" class="form-control">
                                              <option value="">Select Country</option>
                                              <?php foreach($countries as $counrty){ ?>
                                              <option value="<?php echo $counrty['title'];?>"><?php echo $counrty['title'];?></option>
                                              <?php } ?>
                                            </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Iqama Transfer</label>
                                            <div class="input-group">
                                              <input type="checkbox" class="form-control make-switch" data-size="normal" value="yes" name="iqama_transfer" data-on-text="YES" data-off-text="NO" >
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Age Range</label>
                                            <div class="input-group">
                                              <select class="form-control" name="age_range">
                                                <option value="18-20">18-20</option>
                                                <option value="20-25">20-25</option>
                                                <option value="20-30">20-30</option>
                                                <option value="30-40">30-40</option>
                                                <option value="35-45">30-45</option>
                                              </select>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="input-group">
                                              <label>Experience Required</label>
                                              <div class="btn-group btn-toggle"> 
                                              <button class="btn btn-default" data-toggle="collapse" data-target="#collapsible5">Yes</button>
                                              <button class="btn btn-primary active" data-toggle="collapse" data-target="#collapsible5">No</button>
                                            </div>
                                            </div>
                                          </div>

                                        <div class="well collapse" id="collapsible5">
                                          <div class="form-group">
                                            <label>Experience Years</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Experience Years" class="form-control" name="exp_years">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Experience Field</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Experience Field" class="form-control" name="exp_field">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Experience Industry</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Experience Industry" class="form-control" name="exp_industry">
                                            </div>
                                          </div>
                                        </div>

                                          <div class="form-group">
                                            <label>Gender</label>
                                            <div class="input-group col-md-9">
                                              <select name="gender" class="form-control">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="both">Both</option>
                                              </select>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="input-group">
                                            <label>Car Required</label>
                                            <div class="btn-group btn-toggle">
                                            <input name="car_req" type="checkbox" class="form-control make-switch" data-size="normal" data-on-text="YES" data-off-text="NO" value="yes">
                                            </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Employees Required</label>
                                            <div class="input-group">
                                              <select class="form-control" name="employees_req">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                              </select>
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
                											 <input type="checkbox" name="job_package[]" id="optionsRadios4" value="<?php echo $package['_id'];?>"> <?php echo $package['title'];?> 
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
                                    <button class="btn blue" type="submit" name="add_job">Submit</button>
                                    <button class="btn default" type="button" onClick="window.history.back(-1)">Cancel</button>
                                  </div>
                                </div>
                              </div>
                              </form>
                                
                     </div>
