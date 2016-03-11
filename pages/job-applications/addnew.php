<?php
$candidates =admincandidateslist();
$jobs = getactivejoblist();

 if(isset($_POST['title']) && $_POST['title'] !=='' ){
  
  $result = addapplication($_POST);

  if($result == "true"){
  header('Location: /job-applications');
  }else{
  echo $result;
  }
  }
  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New Application
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
                  							<form role="form" action="" method="post" enctype="multipart/form-data">
                  								<div class="form-body">

                                    <div class="form-group">
                                      <label>Title</label>
                                      <div class="input-group">
                                        <input type="text" placeholder="Title" class="form-control" name="title">
                                      </div>
                                    </div>
                  									
                                    <div class="form-group">
                                      <label>Select Candidate</label>
                                        <div class="input-group">
                                          <select class="form-control" name="user_id">
                                            <option value="">Select Candidate</option>
                                            <?php foreach($candidates as $candidate){ ?>
                                            <option value="<?php echo $candidate['_id'];?>"><?php echo $candidate['first_name'].' '.$candidate['last_name'];?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Select Job</label>
                                        <div class="input-group">
                                          <select class="form-control" name="job_id">
                                            <option value="">Select Job</option>
                                            <?php foreach($jobs as $job){ ?>
                                            <option value="<?php echo $job['_id'];?>"><?php echo $job['title'];?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Description</label>
                                      <div class="input-group">
                                        <textarea class="wysihtml5 form-control" rows="6" name="description"></textarea>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Status Details</label>
                                      <div class="input-group">
                                        <select class="form-control" name="status_detail">
                                          <option value="">Select Status</option>
                                          <option value="To Be Interviewed">To Be Interviewed</option>
                                          <option value="Interviewed">Interviewed</option>
                                          <option value="Selected">Selected</option>
                                          <option value="Rejected">Rejected</option>
                                          <option value="On Hold">On Hold</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Add File</label>
                                      <div class="input-group">
                                        <input type="file" name="application_file">
                                      </div>
                                    </div>

                  					
                  								</div>
                  								<div class="form-actions">
                  									<button class="btn blue" type="submit" name="add_pck">Submit</button>
                  									<button class="btn default" type="button" onClick="window.history.back(-1)">Cancel</button>
                  								</div>
                  							</form>
                  						</div>
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                     </div>
