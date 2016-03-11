 <!-- BEGIN PAGE HEADER-->
 <?php
 $category = getallCoursescategoryBystatus(1);
 if(isset($_POST['title']) && $_POST['title']!=''){
  
  $result = addNewCourse($_POST);
  if($result == "true"){
  header('Location: /global/course/child?id='.$_GET['cat_id']);
  }else{
  echo $result;
  }
  }
  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Add New Course
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
                  							<form role="form" action="" method="post" enctype="multipart/form-data">
                  								<div class="form-body">
                  								
                  								 <div class="form-group">
                  										<label>Icon</label>
                  										<div class="input-group">
                  											<input type="file" name="icon">
                  										</div>
                  								 </div>
                  								 
                  								 <div class="form-group">
                  										<label>Category</label>
                  										<div class="input-group">
                  											<select class="form-control" name="category">
                  											<?php
                                        foreach($category as $cate){ ?>
                                          <option value="<?php echo $cate['title'];?>" <?php if(@$_GET['cat_id'] == $cate['_id']){ echo "selected" ;}?> ><?php echo $cate['title'];?></option>
                                        <?php } ?>
                  											</select>
                  										</div>
                  								 </div>
                  								 
                  								 
                                   <div class="form-group">
                  										<label>Title</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Title" class="form-control" name="title">
                  										</div>
                  								 </div>
                  								 
                  								 <div class="form-group">
                  										<label>Course Price</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Course Price" class="form-control" name="course_price">
                  										</div>
                  								 </div>
                  								 
                  								 <div class="form-group">
                  										<label>Course Duration (in Hr.)</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Course Duration(Enter Hr. only)" class="form-control" name="course_duration">
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
