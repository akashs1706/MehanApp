 <!-- BEGIN PAGE HEADER-->
 <?php
 $interview = getByIdInterview($_GET['id']);
 $applications = getAllApplicationsArray();
$cities = adminglobalcitylistbystatus("1");


 if(isset($_POST['sub_inter']) ){
  
 /* echo"<pre>";
  print_r($_POST);
*/  $result = updateInterview($_POST);
  if($result == "true"){
    echo $result;
// header('Location: /jobs/interviews');
  }else{
  echo $result;
  }
  }
  
  ?>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">

  $(document).ready(function() {
   
    $(".follow_yes").hide();
    $(".follow_no").hide();

    $('.radio').click(function(){
        if($(this).attr("value")=="yes"){
            $(".follow_yes").show("slow");
            $(".follow_no").hide();
            
        }
        if($(this).attr("value")=="no"){
            $(".follow_no").show("slow");
            $(".follow_yes").hide();
        }
        if($(this).attr("value")=="cancel"){
            $(".follow_no").hide();
            $(".follow_yes").hide();
        }
    });

      $(".reschedule").hide();
     $('.no').click(function(){
        if($(this).attr("value")=="not showed"){
           $(".reschedule").hide();
            
        }
        if($(this).attr("value")=="reschedule"){
            $(".reschedule").show();
        }
    });
});
    </script>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Edit Interview
                     </h3>
                     
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">
                        <div class="col-md-12">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i>
                                      
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              <div class="portlet-body form">
                  							<form role="form" action="" method="post" autocomplete="off" enctype="multipart/form-data">
                  								
                  								<div class="form-body">


                                    <div class="form-group">
                                      <label>Application</label>
                                      <div class="input-group">
                                      <select class="form-control" name="application_id">
                                                <?php
                                                foreach ($applications as $application) {  ?>
                                                  <option value="<?php echo $application['_id']; ?>" <?php if($application['_id']==$interview['application_id']){echo "selected";} ?>><?php echo $application['title']; ?></option>
                                                  <?php }
                                                ?>
                                      </select>
                                      </div>
                                   </div>
                  								
                  								 <div class="form-group">
                                      <label><h4>When</h4></label>
                                      <div class="form-group">
                                      <label>Time</label>
                                      <div class="input-group">                                           
                                        <input type="time" placeholder="Time" class="form-control form-control-inline input-medium" size="16" name="inter_time" value="<?php echo @$interview['time'];?>">
                                      </div>
                                      </div>
                                      <div class="form-group">
                                      <label>Date</label>
                                      <div class="input-group">                                      
                                        <input type="text" placeholder="Date" class="form-control form-control-inline input-medium date-picker" size="16" name="inter_date" value="<?php echo @$interview['date'];?>">
                                      </div> 
                                      </div>                                     
                                    </div>

                                    <div class="form-group">
                                      <label>Where</label>
                                      <div class="input-group" id="city">
                                        <select name="city" class="form-control">
                                          <option value="">Select City</option>
                                          <?php foreach($cities as $city){ ?>
                                          <option value="<?php echo $city['title'];?>" <?php if($city['title']==$interview['city']){echo "selected";} ?>><?php echo $city['title'];?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>

                                    <h3>Interview Follow Up</h3>
                                    <div class="form-group">
                                      <label>Interview Conducted?</label>
                                      <div class="input-group">
                                        <label>
                                        <input type="radio" name="interview_status" class="radio" value="yes">Yes
                                        </label>
                                        <label>
                                        <input type="radio" name="interview_status" class="radio" value="no">No
                                        </label>
                                        <label>
                                        <input type="radio" name="interview_status" class="radio" value="cancel">Cancel Interview
                                        </label>

                                      </div>  
                                      </div>

                                      
                                      <div class="follow_no">
                                        <div class="form-group">

                                          <label>Why</label>
                                          <div class="input-group">
                                            <label>
                                            <input type="radio" name="why" class="no" value="not showed">Didn't Showed Up
                                            </label>
                                          </div>
                                          <div class="input-group">
                                            <label>
                                            <input type="radio" name="why" class="no" value="reschedule">Rescheduled
                                            </label>
                                          </div>
                                        </div>

                                          <div class="reschedule">
                                            <div class="form-group">
                                      <label><h4>When</h4></label>
                                      <div class="form-group">
                                      <label>Time</label>
                                      <div class="input-group">                                           
                                        <input type="time" placeholder="Time" class="form-control form-control-inline input-medium" size="16" name="new_time" value="<?php echo @$interview['new_time'];?>">
                                      </div>
                                      </div>
                                      <div class="form-group">
                                      <label>Date</label>
                                      <div class="input-group">                                      
                                        <input type="text" placeholder="Date" class="form-control form-control-inline input-medium date-picker" size="16" name="new_date" value="<?php echo @$interview['new_date'];?>">
                                      </div> 
                                      </div>                                     
                                    </div>

                                    <div class="form-group">

                                          <label>Same Place</label>
                                          <div class="input-group">
                                            <label>
                                            <input type="radio" name="same_place" class="place" value="yes">Yes
                                            </label>
                                          </div>
                                          <div class="input-group">
                                            <label>
                                            <input type="radio" name="same_place" class="place" value="no">No
                                            </label>
                                          </div>
                                        </div>
                                            
                                          </div> 
                                          
                                        
                                      </div>

                                        <div class="follow_yes">

                                        <div class="form-group">
                                          <label>What Do You Think</label>
                                          <div class="input-group">
                                          <label>Appearence(in star)</label>
                                            <select class="form-control" name="appearance">                              
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>                                             
                                            </select>
                                          </div>

                                          <div class="input-group">
                                          <label>Attitude(in star)</label>
                                            <select class="form-control" name="attitude">                              
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>                                             
                                            </select>
                                          </div>

                                          <div class="input-group">
                                          <label>Willingness(in star)</label>
                                            <select class="form-control" name="willingness">                              
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>                                             
                                            </select>
                                          </div>

                                          <div class="input-group">
                                          <label>Skills(in star)</label>
                                            <select class="form-control" name="skills">                              
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>                                             
                                            </select>
                                          </div>

                                          <div class="input-group">
                                          <label>Knowledge(in star)</label>
                                            <select class="form-control" name="knowledge">                              
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4</option>
                                              <option value="5">5</option>                                             
                                            </select>
                                          </div>

                                          <div class="form-group">
                                            <label>Other Notes</label>
                                            <div class="input-group">
                                              <input type="text" placeholder="Other Notes" class="form-control" name="other_notes">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label>Conclusion?</label>
                                            <div class="input-group">
                                              <input type="checkbox" class="form-control make-switch" data-size="normal" value="accepted" name="conclusion" data-on-text="ACCEPTED" data-off-text="REJECTED" >
                                            </div>
                                          </div>

                                        </div>


                                        </div>
                  								 
                                   
                  								</div>
                  								
                                  
                                  
                  								<div class="form-actions">
                  								  <input type="hidden" placeholder="Username" class="form-control" name="id" value="<?php echo $interview['_id'];?>">
                  									<button class="btn blue" name="sub_inter" type="submit">Submit</button>
                  									<button class="btn default" type="button" onClick="window.history.back(-1)">Cancel</button>
                  								</div>
                  							</form>
                  						</div>
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                     </div>
