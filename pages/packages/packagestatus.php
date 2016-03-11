<?php
$status = packagestatus($_GET['id']);
	 
header('Location: /packages');
die();
?>