 <!-- BEGIN PAGE HEADER-->
 <?php
 $candidatelist = admincandidateslistbystatus(1);
 $joblist = getactivejoblist("1");
 if(isset($_POST['reffered_to']) && $_POST['reffered_to']!=''){
  
  $result = addNewRefferal($_POST);
  if($result == "true"){
  header('Location: /jobs/refferal');
  }else{
  echo $result;
  }
  }
  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New Refferal
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
                  										<label>Job Title</label>
                  										<div class="input-group">
                  										<select class="form-control" name="job_id">
                                                <?php
                                                foreach ($joblist as $job) {  ?>
                                                  <option value="<?php echo $job['_id']; ?>"><?php echo $job['title']; ?></option>
                                                  <?php }
                                                ?>
                                      </select>
                  										</div>
                  								 </div>
                  								 
                  								 <div class="form-group">
                  										<label>Reffered By</label>
                  										<div class="input-group">
                  										<select class="form-control" name="reffered_by">
                                                <?php
                                                foreach ($candidatelist as $value) {  ?>
                                                  <option value="<?php echo $value['_id']; ?>" ><?php echo $value['first_name']; ?> <?php echo $value['last_name']; ?></option>
                                                  <?php }
                                                ?>
                                      </select>
                  										</div>
                  								 </div>
                  								 
                  								 <div class="form-group">
                  										<label>Reffered To</label>
                  										<div class="input-group">
                  										<input type="email" placeholder="Reffered To(email id)" class="form-control" name="reffered_to">
                  									</div>
                  								 </div>
                  								 
                                   
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
