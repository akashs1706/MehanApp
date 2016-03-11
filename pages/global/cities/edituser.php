 <!-- BEGIN PAGE HEADER-->
 <?php
 $user = admingetbyidcities($_GET['id']);
 $countries = adminglobalcountrieslistbystatus("1");
 $statelist = adminglobalstateslistbystatus("1");
 if(isset($_POST['title']) && $_POST['title']!=''){
  
  $result = adminupdatebyidcities($_POST);
  if($result == "true"){
  header('Location: /global/cities');
  }else{
  echo $result;
  }
  }
  
  ?>
                      <h3 class="page-title" style="margin-bottom: 41px;">
                       Edit City
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
                  										<label>Country</label>
                  										<div class="input-group">
                  										<select name="country" class="form-control" onChange="updatestatelist(this.value,'state','')">
                  										<option value="">Select Country</option>
                  										<?php foreach($countries as $counrty){ ?>
                  										<option value="<?php echo $counrty['title'];?>" <?php if($user['country'] == $counrty['title'] ){ echo "selected";} ?> ><?php echo $counrty['title'];?></option>
                  										<?php } ?>
                  										</select>
                  										</div>
                  									</div>
                  									
                  									
                  									<div class="form-group">
                  										<label>District</label>
                  										<div class="input-group" id="state">
                  										<select name="state" class="form-control">
                  										<option value="">Select District</option>
                  										<?php foreach($statelist as $state){ ?>
                  										<option value="<?php echo $state['title'];?>" <?php if($user['state'] == $state['title'] ){ echo "selected";} ?> ><?php echo $state['title'];?></option>
                  										<?php } ?>
                  										</select>
                  										</div>
                  									</div>
                  									
                  									
                  									<div class="form-group">
                  										<label>City Name</label>
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
