 <?php
 $application = getapplicationbyid($_GET['id']);
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                      Application Preview
                     </h3>
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">
                  
                                  <div class="col-md-12">
                                    <div class="portlet box blue">
                                      <div class="portlet-title">
                                        <div class="caption">
                                          <i class="fa fa-edit"></i><b>Application Details :</b>  
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
                                              <b>Title :</b>
                                              <?php echo @$application['title']; ?>
                                            </p>
                                          </div>

                                         

                                          <div class="form-group">
                                            <p>
                                              <b>Candidate :</b>
                                              <?php  
                                                echo @$application['user']['first_name'].' '. @$application['user']['last_name']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Job :</b>
                                              <?php  
                                               echo  @$application['job']['title']; ?>
                                            </p>
                                          </div>
                                                    
                                          <div class="form-group">
                                            <p>
                                              <b>Description :</b>
                                              <?php echo @$application['description']; ?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Status Detail :</b>
                                              <?php echo $application['status_detail'];?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Created On :</b>
                                              <?php echo date('d-M-Y h:i:s',$application['created']);?>
                                            </p>
                                          </div>

                                          <div class="form-group">
                                            <p>
                                              <b>Updated On :</b>
                                              <?php echo date('d-M-Y h:i:s',$application['updated']); ?>
                                            </p>
                                          </div>

                                           <div class="form-group">
                                            <p>
                                              <b>Application File :</b>
                                              <?php 
                                                if(isset($application['application_file']))
                                                {
                                                  echo "<img src='/".$application['application_file']."'>";
                                                }
                                               ?>
                                            </p>
                                          </div>

                                          

                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  
                     </div>
