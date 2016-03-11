<?php
$status = jobcatstatus($_GET['id']);
	 
header('Location: /jobcategories');
die();
?>