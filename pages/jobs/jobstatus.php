<?php
$status = jobstatus($_GET['id']);	 
header('Location: /jobs');
die();
?>