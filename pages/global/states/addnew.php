 <!-- BEGIN PAGE HEADER-->
 <?php
 $countries = adminglobalcountrieslistbystatus("1");
 if(isset($_POST['title']) && $_POST['title']!=''){
  
  $result = adminaddnewstates($_POST);
  if($result == "true"){
  header('Location: /global/states');
  }else{
  echo $result;
  }
  }
  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New District
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
                  										<label>Country</label>
                  										<div class="input-group">
                  										<select name="country" class="form-control">
                  										<option value="">Select Country</option>
                  										<?php foreach($countries as $counrty){ ?>
                  										<option value="<?php echo $counrty['title'];?>"><?php echo $counrty['title'];?></option>
                  										<?php } ?>
                  										</select>
                  										</div>
                  									</div>
                  									
                  									
                  									<div class="form-group">
                  										<label>District Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Title" class="form-control" name="title">
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
