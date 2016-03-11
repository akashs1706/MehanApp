 <!-- BEGIN PAGE HEADER-->
 <?php
 $user = admingetuserbyid($_GET['id']);
 if(isset($_POST['first_name']) && $_POST['first_name']!=''){
  
  $result = adminupdateuserbyid($_POST);
  if($result == "true"){
  header('Location: /admin');
  }else{
  echo $result;
  }
  }
  
  ?>
                     <h3 class="page-title" style="margin-bottom: 41px;">
                       Edit Admin User
                     </h3>
                     
                     <!-- BEGIN PAGE CONTENT-->
                     <div class="row">
                        <div class="col-md-12">
                           <!-- BEGIN EXAMPLE TABLE PORTLET-->
                           <div class="portlet box blue">
                              <div class="portlet-title">
                                 <div class="caption">
                                    <i class="fa fa-edit"></i>
                                    General Profile  
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
                  										<label>First Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="First Name" class="form-control" name="first_name" value="<?php echo $user['first_name'];?>">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Last Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?php echo $user['last_name'];?>">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Email Address</label>
                  										<div class="input-group">
                  											<input type="email" placeholder="Email Address" class="form-control" name="email" value="<?php echo $user['email'];?>">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Phone</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Phone" class="form-control" name="phone" value="<?php echo $user['phone'];?>">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>User Name</label>
                  										<div class="input-group">
                  											<input type="text" placeholder="Username" class="form-control" name="username" value="<?php echo $user['username'];?>">
                  										</div>
                  									</div>
                  									
                  									<div class="form-group">
                  										<label>Password</label>
                  										<div class="input-group">
                  											<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" value=""/>
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
