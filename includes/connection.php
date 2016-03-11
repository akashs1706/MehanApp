<?php
$GLOBALS['m'] = new MongoClient();
/*$GLOBALS['m'] = new MongoClient('mongodb://localhost', array(
   'username' => 'mehanapp',
   'password' => 'mehanappstaff',
   'db'       => 'mehan_app'
));*/
$GLOBALS['db'] = $GLOBALS['m']->mehan_app;
$GLOBALS['domainname'] = 'http://'.$_SERVER['HTTP_HOST'].'/'; //"http://www.mehanapp.com/";

?>