<?php
ob_start();
session_start();
require('functions.php');
require('jobfunctions.php');
require('packagefunctions.php');
require('applicationfunctions.php');
require('refferalfunctions.php');
require('interviewfunctions.php');
?>

<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 3.9.0
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
<title>MehanApp | Admin Section</title>
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
<link href="/admintheme/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<link rel="stylesheet" href="/admintheme/global/css/awesomplete.css" />

<link rel="stylesheet" type="text/css" href="/admintheme/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="/admintheme/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css">
<script src="/admintheme/global/scripts/awesomplete.js"></script>

<link rel="stylesheet" type="text/css" href="/admintheme/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="/admintheme/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="/admintheme/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="/admintheme/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="/admintheme/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="/admintheme/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>

<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/admintheme/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
<link href="/admintheme/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="/admintheme/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="/admintheme/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- BEGIN:File Upload Plugin CSS files-->
<link href="/admintheme/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet"/>
<link href="/admintheme/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet"/>
<link href="/admintheme/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet"/>
<!-- END:File Upload Plugin CSS files-->
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="/admintheme/admin/pages/css/inbox.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/admintheme/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/admintheme/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/admintheme/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="/admintheme/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"/>
<link href="/admintheme/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

<style>
.success{
text-align:center;
font-size:14px;
padding:10px;
border: 1px solid #d6e9c6;;
background-color: #dff0d8;
color: #3c763d
}
.error{
text-align:center;
font-size:14px;
padding:10px;
background-color: #f2dede;
color: #a94442;
border: 1px solid #ebccd1;;
}
.warning{
text-align:center;
font-size:14px;
padding:10px;
border: 1px solid #faebcc;
background-color: #fcf8e3;
color: #8a6d3b;
}
.input-group{
width:100%;
}
</style>

<script>
  
  function updatestatelist(countryId,state,city){
  
  $.get("/getstatebycountry.php?countryId="+countryId+'&state='+state+'&city='+city, function(data, status){
        $('#'+state).html(data);
  });
  
  }
  
  
  function updatecitylist(stateId,city){
  $.get("/getcitybystate.php?stateId="+stateId+'&city='+city, function(data, status){
        $('#'+city).html(data);
        
    });
  
  }
  </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="/dashboard">
			<img src="/admintheme/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<?php
        if(isset($_SESSION["userid"]) && $_SESSION["userid"]!=''){
        ?>
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					
					<span class="username username-hide-on-mobile">
					<?php echo $_SESSION["username"];?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="/admin/edituser?id=<?php echo $_SESSION['userid'];?>">
							<i class="icon-user"></i> My Profile </a>
						</li>
												
						<li class="divider">
						</li>
						
						<li>
							<a href="/logout.php">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<?php } ?>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
