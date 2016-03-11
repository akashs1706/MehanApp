 <!-- BEGIN PAGE HEADER-->
 <?php
 $countries = adminglobalcountrieslistbystatus("1");
 $statelist = adminglobalstateslistbystatus("0");
 if(isset($_POST['title']) && $_POST['title']!=''){
  
  $result = adminaddnewcities($_POST);
  if($result == "true"){
  header('Location: /global/cities');
  }else{
  echo $result;
  }
  }
  
  ?>
  
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New City
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
                  										<select name="country" class="form-control" onChange="updatestatelist(this.value,'state','')">
                  										<option value="">Select Country</option>
                  										<?php foreach($countries as $counrty){ ?>
                  										<option value="<?php echo $counrty['title'];?>"><?php echo $counrty['title'];?></option>
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
                  										<option value="<?php echo $state['title'];?>" ><?php echo $state['title'];?></option>
                  										<?php } ?>
                  										</select>
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>City Name</label>
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
