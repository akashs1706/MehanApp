<?php
require('connection.php');

////////////////////////Manage Job Refferal//////////////////////////////////////

////////////////////////Get All Interviews by status//////////////////////////////////////
/*
This function will return list of Interviews
Required Parameter::none
Return:: array of Interviews
*/


function interviewlist(){
$collection = $GLOBALS['db']->interviews;
$query = array();
$interviewslist = $collection->find($query);

$interviewarray = array();
$i=0;
foreach($interviewslist as $interview){
$applications = $GLOBALS['db']->applications;
$application = $applications->findOne(array(
    '_id' => new MongoId($interview['application_id'])));

$users = $GLOBALS['db']->users;
$candidate = $users->findOne(array(
    '_id' => new MongoId($application['user_id'])));

$jobs = $GLOBALS['db']->jobs;
$job = $jobs->findOne(array(
    '_id' => new MongoId($application['job_id'])));

$employer = $users->findOne(array(
    '_id' => new MongoId($job['user_id'])));


$jobrefferalarray[$i]['title']=$application['title'];
$jobrefferalarray[$i]['_id']=$interview['_id'];
$jobrefferalarray[$i]['candidate']=$candidate['first_name'].' '.$candidate['last_name'];
$jobrefferalarray[$i]['job']=$job['title'];
$jobrefferalarray[$i]['employer']=$employer['first_name'].' '.$employer['last_name'];
$jobrefferalarray[$i]['interview_status']=$interview['interview_status'];
$jobrefferalarray[$i]['time']=$interview['time'];
$jobrefferalarray[$i]['date']=$interview['date'];
$jobrefferalarray[$i]['city']=$interview['city'];

$i++;
}

return $jobrefferalarray;
}

////////////////////////Get All Interviews by status//////////////////////////////////////
/*
This function will return list of Interviews
Required Parameter::none
Return:: array of Interviews
*/


function interviewlistbystatus(){
$collection = $GLOBALS['db']->interviews;
$query = array('status' => 1);
return $adminuser = $collection->find($query);
}


////////////////////////Get all Job Refferal by job id//////////////////////////////////////
/*
This function will return list of refferals for specific job
Required Parameter::job_id
Optional Parameter::none
Return:: array of refferals
*/

/*function getallRefferalByJobId(){
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
*/


////////////////////////Manage Job Refferal by candidate id//////////////////////////////////////
/*
This function will return list of refferals from specific user
Required Parameter::user_id
Optional Parameter::none
Return:: array of refferals
*/
/*
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
*/

////////////////////////Get all Job Refferal//////////////////////////////////////
/*
This function will return list all refferals
Required Parameter::none
Optional Parameter::none
Return:: array of refferals
*/
/*
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
*/

////////////////////////Add new Job Refferal//////////////////////////////////////
/*
This function will create new refferals and send notification email to user
Required Parameter::job_id,reffered_by and reffered_to
Optional Parameter::none
Return:: true
*/

function addNewInterview(){

$collection = $GLOBALS['db']->interviews;

$data = array(
    "application_id" => $_REQUEST['application_id'],
    "time" => $_REQUEST['inter_time'],
    "date" => $_REQUEST['inter_date'],
    "city" => $_REQUEST['city'],
    "status" => 1,
    "interview_status" => $_REQUEST['interview_status'],
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);

/*$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$job_token = substr( str_shuffle( $chars ), 0, 20 );

$data['job_token'] = $job_token;*/


    /*$to = $candidate['email'];

    $subject = 'Interview Scheduled for '.$candidate['first_name'].' '.$candidate['last_name'];
    
    $headers = "From: ".$employer['email']." \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    $message = '<html><body>';
    $message .= '<h4>Hello,</h4>';
    $message .= '<p>Find bellow link view the job reffered to you:</p>';
    $message .= '<p>copy this url '.$GLOBALS['domainname'].'jobdetail.php?job_token='.$job_token.' and open in your browser <br />or<br /> <a href="'.$GLOBALS['domainname'].'jobdetail.php?fp_token='.$job_token.'">Click Here</a></p>';
    $message .= '</body></html>';
    
    mail($to, $subject, $message, $headers);*/
    
    
return 'true';

}


////////////////////////Delete Interview//////////////////////////////////////
/*
This function will delete Interview by ID
Required Parameter::id
Optional Parameter::none
Return:: true
*/
function deleteInterview(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->interviews;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    return "true";

}




////////////////////////Get Interview by id//////////////////////////////////////
/*
This function will return Interview by ID
Required Parameter::id
Optional Parameter::none
Return:: single Interview record
*/

function getByIdInterview(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->interviews;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;

}


////////////////////////Update Interview//////////////////////////////////////
/*
This function will update Interview by ID
Required Parameter::id,job_id,reffered_by,reffered_to
Optional Parameter::none
Return:: true
*/

function updateInterview(){
$collId = $_REQUEST['id'];
$collection = $GLOBALS['db']->interviews;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($collId)));

    if($_REQUEST['interview_status']=="no"){
        
        if ($_REQUEST['why']=='reschedule') {
            $data = array(
                "previous_interview" =>  new MongoId($_REQUEST['id']),
                "application_id" => $_REQUEST['application_id'],
                "time" => $_REQUEST['new_time'],
                "date" => $_REQUEST['new_date'],
                "city" => $_REQUEST['city'],
                "status" => 1,
                "interview_status" => 'In Progress',
                "created" => time(),
            );
            $collection->insert($data);

            $data1 = array(
            "interview_status" => 'Rescheduled'    
        );
            $collection->update(
            array('_id' => new MongoId($collId)),
            array('$set' => $data1)
            );
            $return =  "true";

        }else
        {
            $data1 = array(
            "interview_status" => "Candidate didn't Showed Up"    
        );
            $collection->update(
            array('_id' => new MongoId($collId)),
            array('$set' => $data1)
            );
            $return =  "true";
        }

    }elseif($_REQUEST['interview_status']=="yes"){
            
            $data = array(
            "time" => $_REQUEST['inter_time'],
            "date" => $_REQUEST['inter_date'],
            "city" => $_REQUEST['city'],
            "interview_status" => 'Conducted',
            "appearance" => $_REQUEST['appearance'],
            "attitude" => $_REQUEST['attitude'],
            "willingness" => $_REQUEST['willingness'],
            "skills" => $_REQUEST['skills'],
            "knowledge" => $_REQUEST['knowledge'],
            "other_notes" => $_REQUEST['other_notes'],
            "conclusion" => $_REQUEST['conclusion'],
            );

            $collection->update(
            array('_id' => new MongoId($collId)),
            array('$set' => $data)
            );
    
            $return =  "true";

    }elseif($_REQUEST['interview_status']=="cancel"){
        $data = array(
            "interview_status" => 'Cancelled'    
        );
        
        $collection->update(
        array('_id' => new MongoId($collId)),
        array('$set' => $data)
        );
    
$return =  "true";

    }




return $return;

}





////////////////////////Update Job Refferal sttaus//////////////////////////////////////
/*
This function will update status(0 or 1) refferal by ID
Required Parameter::id
Optional Parameter::none
Return:: true
*/

/*function statusRefferal(){
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

*/

//////////////////////--------------------------------/////////////////////

?>