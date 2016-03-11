 <!-- BEGIN PAGE HEADER-->
 <?php
 if(isset($_POST['min']) && $_POST['min']!=''){
  
  $result = adminaddnewsalaryrange($_POST);
  if($result == "true"){
  header('Location: /global/salary-range');
  }else{
  echo $result;
  }
  }
  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New Salary Range
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
                  										<label>Min Salary</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Min Salary" class="form-control" name="min">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Max Salary</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Max Salary" class="form-control" name="max">
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
