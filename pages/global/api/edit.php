 <!-- BEGIN PAGE HEADER-->
 <?php
 $api = getByIdAPI($_GET['id']);
 if(isset($_POST['api_key']) && $_POST['api_key']!=''){
  
  $result = updateAPI($_POST);
  if($result == "true"){
  header('Location: /global/api');
  }else{
  echo $result;
  }
  }
  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Edit API Key
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
                  										<label>API Key</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Min Salary" class="form-control" name="api_key" value="<?php echo $api['api_key'];?>">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>API SECRET </label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Max Salary" class="form-control" name="api_secret" value="<?php echo $api['api_secret'];?>">
                  										</div>
                  									</div>
                  									
                  								</div>
                  								<div class="form-actions">
                  								  <input type="hidden" placeholder="Username" class="form-control" name="id" value="<?php echo $api['_id'];?>">
                  									<button class="btn blue" type="submit">Submit</button>
                  									<button class="btn default" type="button" onClick="window.history.back(-1)">Cancel</button>
                  								</div>
                  							</form>
                  						</div>
                           </div>
                           <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                     </div>
