<?php
require('connection.php');

////////////////////////////Get all users array///////////////////////
/*
This function will return all users.
Required Parameters::None
Rertun: array of users
*/
function jobuserslist(){

$users = $GLOBALS['db']->users;
/*$query = array('user_type' => 'superadmin');
return $adminuser = $users->find($query);*/
return $adminuser = $users->find();
}


////////////////////////////Get all Employers array///////////////////////
/*
This function will return all employer.
Required Parameters::None
Rertun: array of employer
*/
function employeruserslist(){

$users = $GLOBALS['db']->users;
$query = array('user_type' => 'employers');
return $canduser = $users->find($query);

}


////////////////////////Manage Jobs//////////////////////////////////////

////////////////////////////Get all job's array///////////////////////
/*
This function will return all jobs.
Required Parameters::None
Rertun: array of Jobs
*/
function joblist(){

$jobs = $GLOBALS['db']->jobs;
return $joblist = $jobs->find();

}

////////////////////////////Get all active jobs array///////////////////////
/*
This function will return all active jobs.
Required Parameters::None
Rertun: array of active Jobs
*/
function getactivejoblist(){

$jobs = $GLOBALS['db']->jobs;
$query = array('status' => 1);
return $joblist = $jobs->find($query);

}

////////////////////////////Update job status///////////////////////
/*
This function will update job's status.
Required Parameters::job's _id
Rertun: true
*/
function jobstatus(){
$id = func_get_arg(0);
    $jobs = $GLOBALS['db']->jobs;
	  $item = $jobs->findOne(array(
    '_id' => new MongoId($id)));
    
    if(isset($item['status']) && $item['status'] == 1){
    $jobstatus =0;
    }else{
    $jobstatus =1;
    }
	
	$jobs->update(array('_id' => new MongoId($id)), 
    array('$set'=>array("status"=> $jobstatus)));
    return "true";
}


////////////////////////////Get job creator///////////////////////
/*
This function will return user using user_id stored in the job.
Required Parameters::id
Rertun: user
*/
function getjobuser(){
$id = func_get_arg(0);
    $user = $GLOBALS['db']->users;
    $item = $user->findOne(array(
    '_id' => new MongoId($id)));
    return $item;

}

////////////////////////////Add new job///////////////////////
/*
This function will add new job

Required Parameter::$_REQUEST['user_id'], $_REQUEST['category_id'],$_REQUEST['title'],$_REQUEST['description'],
$_REQUEST['city'],$_REQUEST['state'],$_REQUEST['min_max_salary'],$_REQUEST['working_hour'],$weekends,$_REQUEST['job_tasks'],
$_REQUEST['nationality'],$_REQUEST['iqama_transfer'],$_REQUEST['age_range'],$_REQUEST['exp_years'],$_REQUEST['exp_field'],
$_REQUEST['exp_industry'],$_REQUEST['gender'],$_REQUEST['employees_req']

Optional Parameter::$_REQUEST['accomodation_rate'],$_REQUEST['car_rate'],$_REQUEST['overtime_hour'],$_REQUEST['health_insurance'],$_REQUEST['yearly_bonus'],$_REQUEST['commission_freq'],
$_REQUEST['commission_cap'],$_REQUEST['commission_conditions'],$_REQUEST['car_req'],$_REQUEST['contract'],$_REQUEST['job_package']

Return:: true
*/

function addjob(){

$collection = $GLOBALS['db']->jobs;
$weekends = implode(',', $_REQUEST['weekends']);
if ($_REQUEST['contract']=="one") {
	$contract_period = "One Year";
}
else{
	$contract_period = $_REQUEST['contract_period'];
}

$job = array(
	"user_id" => new MongoId($_REQUEST['user_id']),
    "category_id" => new MongoId($_REQUEST['category_id']),
    "title" => $_REQUEST['title'],
    "description" => $_REQUEST['description'],
    "city" => $_REQUEST['city'],
    "state" => $_REQUEST['state'],
    "min_max_salary" => $_REQUEST['min_max_salary'],
    "working_hour" => $_REQUEST['working_hour'],
    "weekends" => $weekends,
    "job_tasks" => $_REQUEST['job_tasks'],
    "status" => 1,
    "active_from" => time(),
    "created" => time(),
    "updated" => time(),
    "contract_period" => $contract_period ,
    "accomodation" => $_REQUEST['accomodation'],
    "accomodation_rate" => $_REQUEST['accomodation_rate'],
    "car_offer" => $_REQUEST['car_offer'],
    "car_rate" => $_REQUEST['car_rate'],
    "overtime" => $_REQUEST['overtime'],
    "overtime_hour" => $_REQUEST['overtime_hour'],
    "health_insurance" => $_REQUEST['health_insurance'],
    "yearly_bonus" => $_REQUEST['yearly_bonus'],
    "commission" => $_REQUEST['commission'],
    "commission_freq" => $_REQUEST['commission_freq'],
    "commission_cap" => $_REQUEST['commission_cap'],
    "commission_conditions" => $_REQUEST['commission_conditions'],
    "nationality" => $_REQUEST['nationality'],
    "iqama_transfer" => $_REQUEST['iqama_transfer'],
    "age_range" => $_REQUEST['age_range'],
    "exp_req" => $_REQUEST['exp_req'],
    "exp_years" => $_REQUEST['exp_years'],
    "exp_field" => $_REQUEST['exp_field'],
    "exp_industry" => $_REQUEST['exp_industry'],
    "gender" => $_REQUEST['gender'],
    "car_req" => $_REQUEST['car_req'],
    "employees_req" => $_REQUEST['employees_req'],
    "job_package" => $_REQUEST['job_package'],
    "job_refferal_id" => "",
    "package_id" => ""
);
$collection->insert($job);
return "true";

}


////////////////////////////Get job by id///////////////////////
/*
This function will return job with specific id.
Required Parameters::id
Rertun: Single job and its attached attributes fetched from other tables(users,salary,job-category etc) in a single array.
*/
function jobgetjobbyid(){
$id = func_get_arg(0);
$jobs = $GLOBALS['db']->jobs;
	  $item = $jobs->findOne(array(
    '_id' => new MongoId($id)));

$salary = array();   
$collection = $GLOBALS['db']->salaryrange;
$query = array('_id' => new MongoId($item['min_max_salary']));
$salary['salary'] =  $collection->findOne($query);


$users = array();   
$usercollection = $GLOBALS['db']->users;
$usersquery = array('_id' => new MongoId($item['user_id']));
$users['user'] =  $usercollection->findOne($usersquery);


$jcategory = array();   
$categorycollection = $GLOBALS['db']->job_category;
$jcategoryquery = array('_id' => new MongoId($item['category_id']));
$jcategory['category'] =  $categorycollection->findOne($jcategoryquery);

$applications = array();
    $applicationscollection = $GLOBALS['db']->applications;
    $applicationsquery = array('job_id' => new MongoId($item['_id']));
    $applications['applications'] = $applicationscollection->find($applicationsquery);
    
$jobrefferalarray = array();
$jobrefferalscollection = $GLOBALS['db']->jobrefferals;
$jobrefferalsquery = array('job_id' =>new MongoId($item['_id']));
$refferalsarray = $jobrefferalscollection->find($jobrefferalsquery);

$i=0;
if($refferalsarray!=''){
foreach($refferalsarray as $referal){

$user = $usercollection->findOne(array(
    '_id' => new MongoId($referal['reffered_by'])));
    
$jobrefferalarray['refferals'][$i]['reffered_by']=$user['first_name'].' '.$user['last_name'];
$jobrefferalarray['refferals'][$i]['reffered_to']=$referal['reffered_to'];
$jobrefferalarray['refferals'][$i]['_id']=$referal['_id'];
$jobrefferalarray['refferals'][$i]['status']=$referal['status'];

$i++;
}
}
    
return array_merge($item,$salary,$applications,$users,$jcategory,$jobrefferalarray);

}



////////////////////////////Update job by id///////////////////////
/*
This function will update job

Required Parameter::$_REQUEST['id'],$_REQUEST['user_id'], $_REQUEST['category_id'],$_REQUEST['title'],$_REQUEST['description'],
$_REQUEST['city'],$_REQUEST['state'],$_REQUEST['min_max_salary'],$_REQUEST['working_hour'],$weekends,$_REQUEST['job_tasks'],
$_REQUEST['nationality'],$_REQUEST['iqama_transfer'],$_REQUEST['age_range'],$_REQUEST['exp_years'],$_REQUEST['exp_field'],
$_REQUEST['exp_industry'],$_REQUEST['gender'],$_REQUEST['employees_req'],$_REQUEST['accomodation_rate'],$_REQUEST['car_rate'],$_REQUEST['overtime_hour'],$_REQUEST['health_insurance'],$_REQUEST['yearly_bonus'],$_REQUEST['commission_freq'],
$_REQUEST['commission_cap'],$_REQUEST['commission_conditions'],$_REQUEST['car_req'],$_REQUEST['contract'],$_REQUEST['job_package']

Return:: true
*/
function jobupdatejobbyid(){

$jobId = $_REQUEST['id'];
$jobs = $GLOBALS['db']->jobs;
	  
$item = $jobs->findOne(array(
    '_id' => new MongoId($jobId)));
 $weekends = implode(',', $_REQUEST['weekends']);   
 $jobdata = array(
    "user_id" => new MongoId($_REQUEST['user_id']),
    "category_id" => new MongoId($_REQUEST['category_id']),
    "title" => $_REQUEST['title'],
	  "city" => $_REQUEST['city'],
    "state" => $_REQUEST['state'],
    "min_max_salary" => $_REQUEST['min_max_salary'],
    "working_hour" => $_REQUEST['working_hour'],
    "weekends" => $weekends,
    "job_tasks" => $_REQUEST['job_tasks'],
    "active_from" => time(),
    "updated" => time(),
    "contract_period" => $_REQUEST['contract_period'],
    "accomodation_rate" => $_REQUEST['accomodation_rate'],
    "car_rate" => $_REQUEST['car_rate'],
    "overtime" => $_REQUEST['overtime'],
    "overtime_hour" => $_REQUEST['overtime_hour'],
    "health_insurance" => $_REQUEST['health_insurance'],
    "yearly_bonus" => $_REQUEST['yearly_bonus'],
    "commission" => $_REQUEST['commission'],
    "commission_freq" => $_REQUEST['commission_freq'],
    "commission_cap" => $_REQUEST['commission_cap'],
    "commission_conditions" => $_REQUEST['commission_conditions'],
    "nationality" => $_REQUEST['nationality'],
    "iqama_transfer" => $_REQUEST['iqama_transfer'],
    "age_range" => $_REQUEST['age_range'],
    "exp_req" => $_REQUEST['exp_req'],
    "exp_years" => $_REQUEST['exp_years'],
    "exp_field" => $_REQUEST['exp_field'],
    "exp_industry" => $_REQUEST['exp_industry'],
    "gender" => $_REQUEST['gender'],
    "car_req" => $_REQUEST['car_req'],
    "employees_req" => $_REQUEST['employees_req'],
    "job_package" => $_REQUEST['job_package'],
    "job_refferal_id" => "",
    "package_id" => ""  
    
);

$jobs->update(
    array('_id' => new MongoId($jobId)),
    array('$set' => $jobdata)
);
 
return "true";
}


////////////////////////////Delete job by id///////////////////////
/*
This function will Delete job of specific ID
Required Parameter::id
Return:: true
*/
function jobdelete(){
$jobId = func_get_arg(0);
    $collection = $GLOBALS['db']->jobs;
    $item = $collection->findOne(array(
    '_id' => new MongoId($jobId)));
    $collection->remove( array( '_id' => $item['_id'] ) );
    return "true";
}



////////////////////////////Get job category by id///////////////////////
/*
This function will return job-category of a specific job.
Required Parameters::id
Rertun: Single Job-category
*/
function getjobcat(){
$id = func_get_arg(0);
    $user = $GLOBALS['db']->job_category;
    $item = $user->findOne(array(
    '_id' => new MongoId($id)));
    return $item;

}


////////////////////////////Get all Job Category ///////////////////////
/*
This function will return all job-categories.
Required Parameters::None
Rertun: array of job-categories
*/
function jobcat(){

$job_cat = $GLOBALS['db']->job_category;
return $jobcat = $job_cat->find();

}


////////////////////////////Update Job Category status ///////////////////////
/*
This function will update status of a specific job-category.
Required Parameters::id
Rertun: true
*/
function jobcatstatus(){
$id = func_get_arg(0);
    $jobs = $GLOBALS['db']->job_category;
	  $item = $jobs->findOne(array(
    '_id' => new MongoId($id)));
    
    if(isset($item['status']) && $item['status'] == 1){
    $jobstatus =0;
    }else{
    $jobstatus =1;
    }
	
	$jobs->update(array('_id' => new MongoId($id)), 
    array('$set'=>array("status"=> $jobstatus)));
    return "true";
}


////////////////////////////add new Job Category ///////////////////////
/*
This function will create a new job-category.
Required Parameters::$_REQUEST['title']
Rertun: true
*/
function jobaddcat(){
$collection = $GLOBALS['db']->job_category;
$job_cat = array(
    "title" => $_REQUEST['title'],
    "status" => 1,
    "created" => time(),
    "updated" => time()
);
$collection->insert($job_cat);
return "true";


}
////////////////////////////Get  Job Category by id///////////////////////
/*
This function will return a job-category with specific id.
Required Parameters:: id
Rertun: job category
*/
function jobgetcatbyid(){
$id = func_get_arg(0);
$user = $GLOBALS['db']->job_category;
	  $item = $user->findOne(array(
    '_id' => new MongoId($id)));
return $item;
}

////////////////////////////Update Job Category ///////////////////////
/*
This function will update a job-category with specific id.
Required Parameters::$_REQUEST['id'],$_REQUEST['title']
Rertun: true
*/
function jobupdatecatbyid(){

$catId = $_REQUEST['id'];
$cat = $GLOBALS['db']->job_category;
	  
$item = $cat->findOne(array(
    '_id' => new MongoId($catId)));
    
$catdata = array(
    "title" => $_REQUEST['title'],
    "updated" => time()   
    
);

$cat->update(
    array('_id' => new MongoId($catId)),
    array('$set' => $catdata)
);
 
return "true";
}


////////////////////////////Delete Job Category by id///////////////////////
/*
This function will delete a job-category with specific id.
Required Parameters::$_REQUEST['id']
Rertun: true
*/
function jobcatdelete(){
    $jobcatId = func_get_arg(0);
    $collection = $GLOBALS['db']->job_category;
    $item = $collection->findOne(array(
    '_id' => new MongoId($jobcatId)));
    $collection->remove( array( '_id' => $item['_id'] ) );
  return "true";
}
?>