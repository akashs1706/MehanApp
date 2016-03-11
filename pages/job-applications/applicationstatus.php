<?php
$status = applicationstatus($_GET['id']);
	 
header('Location: /job-applications');
die();
?>