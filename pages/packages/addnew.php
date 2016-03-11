<?php

   $package = packagelist();
 if(isset($_POST['title']) && $_POST['title'] !=='' ){
  
  $result = addpackage($_POST);

  if($result == "true"){
  header('Location: /packages');
  }else{
  echo $result;
  }
  }
//echo"<pre>";
foreach ($package as $pack) {
//print_r($pack);
}

  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New Package
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
                                      <label>Select Type</label>
                                        <div class="input-group">
                                          <select class="form-control" name="user_type">
                                            <option value="candidates">Candidate</option>
                                            <option value="employers">Employer</option>
                                            <option value="job">Job</option>                                           
                                          </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Package Icon</label>
                                      <div class="input-group">
                                        <input type="file" placeholder="Package Icon" name="package_icon">
                                      </div>
                                    </div>

                                    <div class="form-group">
                  										<label>Package Title</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Package Title" class="form-control" name="title">
                  										</div>
                  									</div>

                                    <div class="form-group">
                                      <label>Package Price</label>
                                      <div class="input-group">
                                        <input type="text" placeholder="Package Price" class="form-control" name="pricing">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Description</label>
                                      <div class="input-group">
                                        <textarea class="wysihtml5 form-control" rows="3" name="description"></textarea>
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
