<?php
$candidates =admincandidateslist();
$jobs = getactivejoblist();
 $application = getapplicationbyid($_GET['id']);
 if(isset($_POST['edit_app'])){
  
  $result = updateapplicationbyid($_POST);
  if($result == "true"){
  header('Location: /job-applications');
  }else{
  echo $result;
  }
  }
  
  ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
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

                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Edit Package
                     </h3>
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">
                        <div class="col-md-12">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i> General Information  
                                 </div>
                                 <div class="tools">
                                    <a href="javascript:;" class="collapse">
                                    </a>
                                 </div>
                              </div>
                              <div class="portlet-body form">
                  							<form role="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                  								<div class="form-body">

                                    <div class="form-group">
                                      <label>Title</label>
                                      <div class="input-group">
                                        <input type="text" placeholder="Title" class="form-control" name="title" value="<?php echo $application['title'];?>">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Candidate</label>
                                      <div class="input-group">
                                        <select class="form-control" name="user_id">
                                          <?php
                                            foreach ($candidates as $value) { ?>
                                             <option value="<?php echo $value['_id']; ?>" <?php if($value['_id']==$application['user_id']){echo "selected"; } ?>>
                                             <?php echo $value['first_name'].' '.$value['last_name']; ?></option>
                                          <?php }
                                                ?>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Job</label>
                                        <div class="input-group">
                                          <select class="form-control" name="job_id">
                                            <option value="">Select Job</option>
                                            <?php foreach($jobs as $job){ ?>
                                            <option value="<?php echo $job['_id'];?>" <?php if($job['_id']==$application['job_id']){echo "selected"; } ?>><?php echo $job['title'];?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Description</label>
                                      <div class="input-group">
                                        <textarea class="wysihtml5 form-control" rows="3" name="description"><?php echo $application['description']; ?></textarea>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Status Details</label>
                                      <div class="input-group">
                                        <select class="form-control" name="status_detail">
                                          <option value="">Select Status</option>
                                          <option value="To Be Interviewed" <?php if($application['status_detail']=='To Be Interviewed'){echo  "selected";} ?>>To Be Interviewed</option>
                                          <option value="Interviewed" <?php if($application['status_detail']=='Interviewed'){echo  "selected";} ?>>Interviewed</option>
                                          <option value="Selected" <?php if($application['status_detail']=='Selected'){echo  "selected";} ?>>Selected</option>
                                          <option value="Rejected" <?php if($application['status_detail']=='Rejected'){echo  "selected";} ?>>Rejected</option>
                                          <option value="On Hold" <?php if($application['status_detail']=='On Hold'){echo  "selected";} ?>>On Hold</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Application File</label>
                                      <div class="input-group">
                                      <img src="/<?php echo @$application['application_file']; ?>" style="max-width:200px">
                                      <input type="file" name="application_file">
                                      </div>
                                    </div>



                                    <div class="form-group">
                                      <div class="input-group">
                                        <label><h3>Withdraw Application</h3></label>
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

                  								</div>
                  								<div class="form-actions">
                  								<input type="hidden" placeholder="Username" class="form-control" name="id" value="<?php echo $application['_id'];?>">
                  									<button class="btn blue" type="submit" name="edit_app">Submit</button>
                  									<button class="btn default" type="button" onClick="window.history.back(-1)">Cancel</button>
                  								</div>
                  							</form>
                  						</div>
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                     </div>
