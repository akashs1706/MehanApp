<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Login Options - Login Form 1</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="/admintheme/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/admintheme/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="/admintheme/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/admintheme/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/admintheme/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="/admintheme/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/admintheme/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/admintheme/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="/admintheme/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="/admintheme/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="/admintheme/layout/img/logo-big.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	
	<?php
	
  if(isset($_POST['password']) && $_POST['password']!=''){
  require('includes/functions.php');
  $result = resetpassword($_POST);
  if($result == "true"){
  header('Location: /login.php');
  }else{
  echo $result;
  }
  }
  
  ?>
	<form class="register-form" action="" method="post" style="display:block">
		<h3 class="form-title">Reset Password</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter password and Re-type password. </span>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
			<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"/>
		</div>
		<div class="form-actions">
		  <input type="hidden" name="fp_token" value="<?php echo $_GET['fp_token'];?>"/>
			<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
			<a href="/login.php"class="forget-password">Login</a>
		</div>
		
		
	</form>

	
	
</div>
<div class="copyright">
	 2016 © MehanApp. Admin Dashboard.
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/admintheme/global/plugins/respond.min.js"></script>
<script src="/admintheme/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="/admintheme/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/admintheme/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/admintheme/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/admintheme/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/admintheme/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/admintheme/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/admintheme/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admintheme/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/admintheme/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/admintheme/layout/scripts/demo.js" type="text/javascript"></script>
<script src="/admintheme/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>