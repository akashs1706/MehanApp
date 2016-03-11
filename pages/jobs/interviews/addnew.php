 <!-- BEGIN PAGE HEADER-->
 <?php

$applications = getAllApplicationsArray();
$cities = adminglobalcitylistbystatus("1");

 if(isset($_POST['inter_time']) && $_POST['inter_time']!=''){
  
  $result = addNewInterview($_POST);
  if($result == "true"){
  header('Location: /jobs/interviews');
  }else{
  echo $result;
  }
  }
  
  ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">

  $(document).ready(function() {
   
    $(".intr_reject").hide();
    $('.radio').click(function(){
        if($(this).attr("value")=="Accepted"){
            $(".intr_reject").hide();
            
        }
        if($(this).attr("value")=="Rejected"){
            $(".intr_reject").show();
            //$(".green").show();
        }
    });
});
    </script>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New Interview
                     </h3>
                    
                     <!-- END PAGE HEADER-->
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
                  							<form role="form" action="" method="post" enctype="multipart/form-data">
                  								<div class="form-body">
                  								 
                                    <div class="form-group">
                                      <label>Application</label>
                                      <div class="input-group">
                                      <select class="form-control" name="application_id">
                                                <?php
                                                foreach ($applications as $application) {  ?>
                                                  <option value="<?php echo $application['_id']; ?>"><?php echo $application['title']; ?></option>
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
                                        <input type="time" placeholder="Time" class="form-control form-control-inline input-medium" size="16" name="inter_time">
                                      </div>
                                      </div>
                                      <div class="form-group">
                                      <label>Date</label>
                                      <div class="input-group">                                      
                                        <input type="text" placeholder="Date" class="form-control form-control-inline input-medium date-picker" size="16" name="inter_date">
                                      </div> 
                                      </div>                                     
                                    </div>

                                    <div class="form-group">
                                      <label>Where</label>
                                      <div class="input-group" id="city">
                                        <select name="city" class="form-control">
                                          <option value="">Select City</option>
                                          <?php foreach($cities as $city){ ?>
                                          <option value="<?php echo $city['title'];?>"><?php echo $city['title'];?></option>
                                          <?php } ?>
                                        </select>
                                      </div>
                                    </div>

                  								 <!--  <div class="form-group">
                                      <label>Interview Status</label>
                                      <div class="input-group">
                                        <label>
                                        <input type="radio" name="interview_status" class="radio" value="Accepted">Accepted
                                        </label>
                                        <label>
                                        <input type="radio" name="interview_status" class="radio" value="Rejected">Rejected
                                        </label>
     
                                        <div class="intr_reject">
                                          <label>Reason to Reject</label>
                                          <input type="text" placeholder="Reason" class="form-control" name="reason">
                                        </div>
                                      </div>
                                    </div> -->

                  								</div>
                  								<div class="form-actions">
                  									<button class="btn blue" type="submit">Submit</button>
                  									<button class="btn default" type="button" onClick="window.history.back(-1)">Cancel</button>
                  								</div>
                  							</form>
                  						</div>
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                     </div>
