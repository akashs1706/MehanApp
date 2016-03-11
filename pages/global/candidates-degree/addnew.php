 <!-- BEGIN PAGE HEADER-->
 <?php
 if(isset($_POST['title']) && $_POST['title']!=''){
  
  $result = adminaddnewcandidatesdegree($_POST);
  if($result == "true"){
  header('Location: /global/candidates-degree');
  }else{
  echo $result;
  }
  }
  
  ?>
  
    
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New Degree
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
                  										<label>Title</label>
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
