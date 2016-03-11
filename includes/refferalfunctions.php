<?php
require('connection.php');

////////////////////////Manage Job Refferal//////////////////////////////////////

////////////////////////Get All Candidate by status//////////////////////////////////////
/*
This function will return list of active candidates
Required Parameter::id
Optional Parameter::none
Return:: array of candidates
*/


function admincandidateslistbystatus(){
$status = func_get_arg(0);
$collection = $GLOBALS['db']->users;
$query = array('status' => $status,'user_type' => 'candidates');
return $adminuser = $collection->find($query);
}


////////////////////////Get all Job Refferal by job id//////////////////////////////////////
/*
This function will return list of refferals for specific job
Required Parameter::job_id
Optional Parameter::none
Return:: array of refferals
*/

function getallRefferalByJobId(){
$jobId = func_get_arg(0);
$collection = $GLOBALS['db']->jobrefferals;
$query = array('job_id' =>new MongoId($jobId));

$jobrefferalarray = array();
$jobrefferalslist =  $collection->find($query);
$i=0;
foreach($jobrefferalslist as $referal){
$usercollection = $GLOBALS['db']->users;
$user = $usercollection->findOne(array(
    '_id' => new MongoId($referal['reffered_by'])));



$jobrefferalarray[$i]['reffered_by']=$user['first_name'].' '.$user['last_name'];
$jobrefferalarray[$i]['reffered_to']=$referal['reffered_to'];
$jobrefferalarray[$i]['_id']=$referal['_id'];
$jobrefferalarray[$i]['status']=$referal['status'];

$i++;
}

return $jobrefferalarray;
}



////////////////////////Manage Job Refferal by candidate id//////////////////////////////////////
/*
This function will return list of refferals from specific user
Required Parameter::user_id
Optional Parameter::none
Return:: array of refferals
*/

function getallRefferalByUserID(){
$userID = func_get_arg(0);
$collection = $GLOBALS['db']->jobrefferals;
$query = array('reffered_by' =>new MongoId($userID));

$jobrefferalarray = array();
$jobrefferalslist =  $collection->find($query);
$i=0;
foreach($jobrefferalslist as $referal){

$jobscollection = $GLOBALS['db']->jobs;
$jobs = $jobscollection->findOne(array(
    '_id' => new MongoId($referal['job_id'])));


$jobrefferalarray[$i]['job']=$jobs['title'];
$jobrefferalarray[$i]['reffered_to']=$referal['reffered_to'];
$jobrefferalarray[$i]['_id']=$referal['_id'];
$jobrefferalarray[$i]['status']=$referal['status'];

$i++;
}

return $jobrefferalarray;
}


////////////////////////Get all Job Refferal//////////////////////////////////////
/*
This function will return list all refferals
Required Parameter::none
Optional Parameter::none
Return:: array of refferals
*/

function getallRefferal(){

$collection = $GLOBALS['db']->jobrefferals;
$query = array();
$jobrefferalarray = array();
$jobrefferalslist =  $collection->find($query);
$i=0;
foreach($jobrefferalslist as $referal){
$usercollection = $GLOBALS['db']->users;
$user = $usercollection->findOne(array(
    '_id' => new MongoId($referal['reffered_by'])));


$jobscollection = $GLOBALS['db']->jobs;
$jobs = $jobscollection->findOne(array(
    '_id' => new MongoId($referal['job_id'])));


$jobrefferalarray[$i]['reffered_by']=$user['first_name'].' '.$user['last_name'];
$jobrefferalarray[$i]['job']=$jobs['title'];
$jobrefferalarray[$i]['reffered_to']=$referal['reffered_to'];
$jobrefferalarray[$i]['_id']=$referal['_id'];
$jobrefferalarray[$i]['status']=$referal['status'];

$i++;
}

return $jobrefferalarray;
}


////////////////////////Add new Job Refferal//////////////////////////////////////
/*
This function will create new refferals and send notification email to user
Required Parameter::job_id,reffered_by and reffered_to
Optional Parameter::none
Return:: true
*/

function addNewRefferal(){

$collection = $GLOBALS['db']->jobrefferals;

$data = array(
    "job_id" => new MongoId($_REQUEST['job_id']),
    "reffered_by" => new MongoId($_REQUEST['reffered_by']),
    "reffered_to" => $_REQUEST['reffered_to'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);

$usercollection = $GLOBALS['db']->users;
$user = $usercollection->findOne(array(
    '_id' => new MongoId($_REQUEST['reffered_by'])));
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$job_token = substr( str_shuffle( $chars ), 0, 20 );

$data['job_token'] = $job_token;
$collection->insert($data);

    $to = $_REQUEST['reffered_to'];

    $subject = 'New Job Reffered to you by '.$user['first_name'].' '.$user['last_name'];
    
    $headers = "From: ".$user['email']." \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    $message = '<html><body>';
    $message .= '<h4>Hello,</h4>';
    $message .= '<p>Find bellow link view the job reffered to you:</p>';
    $message .= '<p>copy this url '.$GLOBALS['domainname'].'jobdetail.php?job_token='.$job_token.' and open in your browser <br />or<br /> <a href="'.$GLOBALS['domainname'].'jobdetail.php?fp_token='.$job_token.'">Click Here</a></p>';
    $message .= '</body></html>';
    
    mail($to, $subject, $message, $headers);
    
    
return 'true';

}


////////////////////////Get Job Refferal by id//////////////////////////////////////
/*
This function will return refferal by ID
Required Parameter::id
Optional Parameter::none
Return:: single refferal record
*/

function getByIdRefferal(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->jobrefferals;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;

}


////////////////////////Update Job Refferal//////////////////////////////////////
/*
This function will update refferal by ID
Required Parameter::id,job_id,reffered_by,reffered_to
Optional Parameter::none
Return:: true
*/

function updateRefferal(){
$collId = $_REQUEST['id'];
$collection = $GLOBALS['db']->jobrefferals;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($collId)));

$usercollection = $GLOBALS['db']->users;
$user = $usercollection->findOne(array(
    '_id' => new MongoId($_REQUEST['reffered_by'])));
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$job_token = substr( str_shuffle( $chars ), 0, 20 );


$data = array(
    "job_id" => new MongoId($_REQUEST['job_id']),
    "reffered_by" => new MongoId($_REQUEST['reffered_by']),
    "reffered_to" => $_REQUEST['reffered_to'],
    "job_token" => $job_token,
    "updated" => time()   
    
);


$collection->update(
    array('_id' => new MongoId($collId)),
    array('$set' => $data)
);



    $to = $_REQUEST['reffered_to'];

    $subject = 'New Job Reffered to you by '.$user['first_name'].' '.$user['last_name'];
    
    $headers = "From: ".$user['email']." \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    $message = '<html><body>';
    $message .= '<h4>Hello,</h4>';
    $message .= '<p>Find bellow link view the job reffered to you:</p>';
    $message .= '<p>copy this url '.$GLOBALS['domainname'].'jobdetail.php?job_token='.$job_token.' and open in your browser <br />or<br /> <a href="'.$GLOBALS['domainname'].'jobdetail.php?fp_token='.$job_token.'">Click Here</a></p>';
    $message .= '</body></html>';
    
    mail($to, $subject, $message, $headers);
    
    
    
$return =  "true";

return $return;

}

////////////////////////Delete Job Refferal//////////////////////////////////////
/*
This function will delete refferal by ID
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function deleteRefferal(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->jobrefferals;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    return "true";

}


////////////////////////Update Job Refferal sttaus//////////////////////////////////////
/*
This function will update status(0 or 1) refferal by ID
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function statusRefferal(){
    $id = func_get_arg(0);
    $collection = $GLOBALS['db']->jobrefferals;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if(isset($item['status']) && $item['status'] == 1){
    $userstatus =0;
    }else{
    $userstatus =1;
    }
	  $collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => array("status" => $userstatus))
    
);
return "true";
}



//////////////////////--------------------------------/////////////////////

?>