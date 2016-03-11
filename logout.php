<?php
session_start();
if(isset($_SESSION["userid"]) && $_SESSION["userid"]!=''){ /// check if user id logged in
	require('includes/functions.php');
  $result = logout();
  
}
header('Location: /login.php');
?>