<?php
$list = statusCourse($_GET['id']);
header('Location: /global/course/child?id='.$_GET['cat_id']);
									
									