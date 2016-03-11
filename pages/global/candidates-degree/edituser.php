 <!-- BEGIN PAGE HEADER-->
 <?php
 $user = admingetbyidcandidatesdegree($_GET['id']);
 if(isset($_POST['title']) && $_POST['title']!=''){
  
  $result = adminupdatebyidcandidatesdegree($_POST);
  if($result == "true"){
  header('Location: /global/candidates-degree');
  }else{
  echo $result;
  }
  }
  
  ?>
 
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Edit Countries
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
                  							<form role="form" action="" method="post" autocomplete="off">
                  								<div class="form-body">
                  								
                  								                 									
                  									
                  									<div class="form-group">
                  										<label>Title</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Title" class="form-control" name="title" value="<?php echo $user['title'];?>">
                  										</div>
                  									</div>
                  									
                  									
                  									
                  								</div>
                  								<div class="form-actions">
                  								  <input type="hidden" placeholder="Username" class="form-control" name="id" value="<?php echo $user['_id'];?>">
                  									<button class="btn blue" type="submit">Submit</button>
                  									<button class="btn default" type="button" onClick="window.history.back(-1)">Cancel</button>
                  								</div>
                  							</form>
                  						</div>
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                     </div>
