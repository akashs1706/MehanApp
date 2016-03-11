 <!-- BEGIN PAGE HEADER-->
 <?php
 if(isset($_POST['api_key']) && $_POST['api_key']!=''){
  
  $result = addNewAPI($_POST);
  if($result == "true"){
  header('Location: /global/api');
  }else{
  echo $result;
  }
  }
  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New API Key
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
                  							<form role="form" action="" method="post">
                  								<div class="form-body">
                  									<div class="form-group">
                  										<label>API Key</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="API Key" class="form-control" name="api_key">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>API SECRET</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="API SECRET Key" class="form-control" name="api_secret">
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
