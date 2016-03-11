 <?php
 $package = getpackagebyid($_GET['id']);
// print_r($package);
 //$user = getjobuser($job['user_id']);
//$job_cat = getjobcat($job['category_id']);

//$users = jobuserslist();
 //$jobcat = jobcat();
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                      Package Preview
                     </h3>
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">
                  
                                  <div class="col-md-12">
                                    <div class="portlet box blue">
                                      <div class="portlet-title">
                                        <div class="caption">
                                          <i class="fa fa-edit"></i><b>Package Details :</b>  
                                        </div>
                                        <div class="tools">
                                          <a href="javascript:;" class="collapse">
                                          </a>
                                        </div>
                                      </div>

                                      <div class="portlet-body form">
                                        <div class="form-body">

                                          <div class="form-group">
                                            <p>
                                              <b>Package Title :</b>
                                              <?php echo @$package['title']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Package Icon :</b>
                                              <?php 
                                                if(isset($package['package_icon']))
                                                {
                                                  echo "<img src='/".$package['package_icon']."'>";
                                                }
                                               ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>User Type :</b>
                                              <?php  echo strtoupper(@$package['user_type']); ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Package Price :</b>
                                              <?php echo @$package['pricing']; ?>
                                            </p>
                                          </div>
                                                    
                                          <div class="form-group">
                                            <p>
                                              <b>Description :</b>
                                              <?php echo @$package['description']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Created On :</b>
                                              <?php echo date('d-M-Y h:i:s',$package['created']);?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Updated On :</b>
                                              <?php echo date('d-M-Y h:i:s',$package['updated']); ?>
                                            </p>
                                          </div>

                                          

                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  
                     </div>
