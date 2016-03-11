<?php
$users = getpackageuser();
 $package = getpackagebyid($_GET['id']);
 if(isset($_POST['edit_pck'])){
  
  $result = updatepackagebyid($_POST);
  if($result == "true"){
  header('Location: /packages');
  }else{
  echo $result;
  }
  }
  
  ?>
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
                                      <label>Select Type</label>
                                      <div class="input-group">
                                      <select class="form-control" name="user_type">
                                            <option value="candidates" <?php if('candidates'==$package['user_type']){echo "selected"; } ?>>Candidate</option>
                                            <option value="employers" <?php if('employers' ==$package['user_type']){echo "selected"; } ?>>Employer</option>
                                            <option value="job" <?php if('job'==$package['user_type']){echo "selected"; } ?>>Job</option>                                           
                                          </select>
                                          
                                        
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label>Package Icon</label>
                                      <div class="input-group">
                                      <img src="/<?php echo @$package['package_icon']; ?>" style="max-width:200px">
                                      <input type="file" placeholder="Package Icon" name="package_icon">
                                      </div>
                                    </div>

                  									<div class="form-group">
                  										<label>Package Title</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Package Title" class="form-control" name="title" value="<?php echo $package['title'];?>">
                  										</div>
                  									</div>

                                    <div class="form-group">
                                      <label>Package Price</label>
                                      <div class="input-group">
                                        <input type="text" placeholder="price" class="form-control" name="pricing" value="<?php echo $package['pricing'];?>">
                                      </div>
                                    </div>
                                                    
                                    <div class="form-group">
                                      <label>Description</label>
                                      <div class="input-group">
                                        <textarea class="wysihtml5 form-control" rows="3" name="description"><?php echo $package['description']; ?></textarea>
                                      </div>
                                    </div>
                  							                									
                  									
                  								</div>
                  								<div class="form-actions">
                  								<input type="hidden" placeholder="Username" class="form-control" name="id" value="<?php echo $package['_id'];?>">
                  									<button class="btn blue" type="submit" name="edit_pck">Submit</button>
                  									<button class="btn default" type="button" onClick="window.history.back(-1)">Cancel</button>
                  								</div>
                  							</form>
                  						</div>
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                     </div>
