<?php
require('connection.php');

////////////////////////////Manage Job Application///////////////////////////


////////////////////////////Get all active Job Application///////////////////////////
/*
This function will return all active Job Applications.
Required Parameters::none
Rertun: Array of Active Job Applications
*/
function getAllApplicationsArray(){
$collection = $GLOBALS['db']->applications;
$query = array('status' => 1);
return $collection->find($query);
}


////////////////////////////Get all Job Applications///////////////////////////
/*
This function will return all Job Applications.
Required Parameters::none
Rertun: Array of All Job Applications merged with data from attached attributes
*/
function applicationlist(){

$applications = $GLOBALS['db']->applications;
$query = array();
$applicationlist = array();
$app_list = $applications->find($query);

$i=0;
foreach($app_list as $apps){

$usercollection = $GLOBALS['db']->users;
$user = $usercollection->findOne(array(
    '_id' => new MongoId($apps['user_id'])));


$jobscollection = $GLOBALS['db']->jobs;
$jobs = $jobscollection->findOne(array(
    '_id' => new MongoId($apps['job_id'])));


$applicationlist[$i]['title']=$apps['title'];
$applicationlist[$i]['user']=$user['first_name'].' '.$user['last_name'];
$applicationlist[$i]['job']=$jobs['title'];
$applicationlist[$i]['_id']=$apps['_id'];
$applicationlist[$i]['status']=$apps['status'];
$applicationlist[$i]['status_detail']=$apps['status_detail'];

$i++;
}

return $applicationlist;

}


////////////////////////////Get Job Application by id///////////////////////////
/*
This function will return a Job Application with specific id.
Required Parameters::id
Rertun: Single Job Application in array merged with attached attributes(user,jobs)
*/
function getapplicationbyid(){
$id = func_get_arg(0);
$application = $GLOBALS['db']->applications;
      $item = $application->findOne(array(
    '_id' => new MongoId($id)));


$usercollection = $GLOBALS['db']->users;
$user['user'] = $usercollection->findOne(array(
    '_id' => new MongoId($item['user_id'])));

$jobs = $GLOBALS['db']->jobs;
	  $job['job'] = $jobs->findOne(array(
    '_id' => new MongoId($item['job_id'])));
        
return array_merge($item,$user,$job);
}


////////////////////////////Update Job Application status///////////////////////////
/*
This function will update Job Application status.
Required Parameters::id
Rertun: true
*/
function applicationstatus(){
$id = func_get_arg(0);
    $applications = $GLOBALS['db']->applications;
	  $item = $applications->findOne(array(
    '_id' => new MongoId($id)));
    
    if(isset($item['status']) && $item['status'] == 1){
    $pckgstatus =0;
    }else{
    $pckgstatus =1;
    }
	
	$applications->update(array('_id' => new MongoId($id)), 
    array('$set'=>array("status"=> $pckgstatus)));

    return true;
}


////////////////////////////Add new Job Application ///////////////////////////
/*
This function will add a new Job Applications.
Required Parameters::$_REQUEST['user_id'],$_REQUEST['job_id'],$_REQUEST['title'],$_REQUEST['description'],$_REQUEST['status_detail'],
Optional Parameters::$_FILES["application_file"]
Rertun: true
*/
function addapplication(){

$collection = $GLOBALS['db']->applications;


$application = array(
    "user_id" => new MongoId($_REQUEST['user_id']),
    "job_id" => new MongoId($_REQUEST['job_id']),
    "title" => $_REQUEST['title'],
    "description" => $_REQUEST['description'],
    "status_detail" => $_REQUEST['status_detail'],
    "status" => 1,
    "created" => time(),
    "updated" => time()
);

if(isset($_FILES["application_file"]["tmp_name"]) && $_FILES["application_file"]["tmp_name"]!=''){
 $check = getimagesize($_FILES["application_file"]["tmp_name"]);
 if($check !== false) {
 $target_dir = "uploads/applications/";
 $target_file = $target_dir . time().'_'.basename($_FILES["application_file"]["name"]);
 
  if (move_uploaded_file($_FILES["application_file"]["tmp_name"], $target_file)) {
        $application['application_file'] = $target_file;
    } 
    
 }
}

$collection->insert($application);
return "true";

}


////////////////////////////Update Job Application by id ///////////////////////////
/*
This function will update Job Application of specific id
Required Parameters:: $_REQUEST['id'],$_REQUEST['user_id'],$_REQUEST['job_id'],$_REQUEST['title'],$_REQUEST['description'],$_REQUEST['status_detail'],$_FILES["application_file"]
Rertun: true
*/
function updateapplicationbyid(){

$applicationId = $_REQUEST['id'];
$applications = $GLOBALS['db']->applications;
	  
$item = $applications->findOne(array(
    '_id' => new MongoId($applicationId)));      
    
    $applicationdata = array(
     "user_id" => new MongoId($_REQUEST['user_id']),
    "job_id" => new MongoId($_REQUEST['job_id']),
    "title" => $_REQUEST['title'],
    "description" => $_REQUEST['description'],
    "status_detail" => $_REQUEST['status_detail'],
    "updated" => time() 
    
);

if(isset($_FILES["application_file"]["tmp_name"]) && $_FILES["application_file"]["tmp_name"]!=''){
 $check = getimagesize($_FILES["application_file"]["tmp_name"]);
 if($check !== false) {
 $target_dir = "uploads/applications/";
 $target_file = $target_dir . time().'_'.basename($_FILES["icon"]["name"]);
 
  if (move_uploaded_file($_FILES["application_file"]["tmp_name"], $target_file)) {
        $applicationdata['application_file'] = $target_file;
    } 
    
 }
}

$applications->update(
    array('_id' => new MongoId($applicationId)),
    array('$set' => $applicationdata)
);
 
return "true";
}


////////////////////////////Delete Job Application ///////////////////////////
/*
This function will delete Job Application of specific id
Required Parameters:: $_REQUEST['id']
Rertun: true
*/
function applicationdelete(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->applications;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    $collection->remove( array( '_id' => $item['_id'] ) );

    return true;
}
