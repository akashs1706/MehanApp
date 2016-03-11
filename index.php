<?php 
ob_start();
////////////////////////////Include Header file ///////////////////////
include 'includes/header.php';?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR MENU -->
	
	<?php include 'includes/menu.php';?>
	
	<!-- END SIDEBAR MENU-->
	<!-- BEGIN CONTENT AREA-->
	<div class="page-content-wrapper">
	
		<div class="page-content">
					
         <?php 
         if(isset($_SESSION["userid"]) && $_SESSION["userid"]!=''){ /// check if user id logged in
             $uri = strtok($_SERVER["REQUEST_URI"],'?');
             $urinew = trim($uri, '/').'.php'; // get page url
             if(file_exists('pages/'.$urinew)) { // check if file associated with url exist 
              include 'pages/'.$urinew;
             }elseif (file_exists('pages/'.trim($uri, '/').'/index.php')) { // check if file associated with url exist 
              include 'pages/'.trim($uri, '/').'/index.php';
             }elseif($urinew == '.php'){
              include 'pages/dashboard.php';
             }else{
               include 'pages/404.php'; // if file not found show 404 eoore page 
             }
         }else{
            header('Location: /login.php'); // else redirect to login page 
         }
         ?> 
  </div>
	</div>
	<!-- END CONTENT AREA-->
	
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<?php include 'includes/footer.php';?>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>