<?php
require('connection.php');

////////////////////////Manage Job Pcakages//////////////////////////////////////

////////////////////////Get all Job Pcakages by status//////////////////////////////////////
/*
This function will return active job packages
Required Parameter::None
Rertun: array of packages
*/

function getjobpackages(){
$collection = $GLOBALS['db']->packages;
$query = array('status' => 1,'user_type' =>'job');
return $collection->find($query);
}

////////////////////////Get all active Job Pcakages//////////////////////////////////////
/*
This function will return active candidates packages
Required Parameter::None
Rertun:: array of packages
*/
function getAllPackagesArray(){
$collection = $GLOBALS['db']->packages;
$query = array('status' => 1,'user_type' =>'candidates');
return $collection->find($query);
}

////////////////////////Get all Job Pcakages//////////////////////////////////////
/*
This function will return all packages
Required Parameter::None
Rertun:: array of packages
*/

function packagelist(){

$packages = $GLOBALS['db']->packages;
return $packagelist = $packages->find();

}
////////////////////////Get Job Pcakages by id//////////////////////////////////////
/*
This function will return all packages of specific ID
Required Parameter::id
Rertun:: single packages
*/

function getpackagebyid(){
$id = func_get_arg(0);
$package = $GLOBALS['db']->packages;
      $item = $package->findOne(array(
    '_id' => new MongoId($id)));
return $item;
}


////////////////////////Update Job Pcakages by status by id//////////////////////////////////////
/*
This function will update packages status (0 or 1)of specific package ID
Required Parameter: id
Return:: true
*/
function packagestatus(){
$id = func_get_arg(0);
    $packages = $GLOBALS['db']->packages;
	  $item = $packages->findOne(array(
    '_id' => new MongoId($id)));
    
    if(isset($item['status']) && $item['status'] == 1){
    $pckgstatus =0;
    }else{
    $pckgstatus =1;
    }
	
	$packages->update(array('_id' => new MongoId($id)), 
    array('$set'=>array("status"=> $pckgstatus)));
    
return 'true';
}



////////////////////////Get all users//////////////////////////////////////

/*
This function will return all users
Required Parameter::None
Return:: array od users
*/

function getpackageuser(){

    $user = $GLOBALS['db']->users;
    $item = $user->find();
    return $item;

}

////////////////////////add new Job Pcakages ///////////////////////////////////
/*
This function will add new package
Required Parameter::$_REQUEST['user_type'], $_REQUEST['title'],$_REQUEST['description'] and $_REQUEST['pricing']
Optional Parameter::$_REQUEST['package_icon']
Return:: true
*/

function addpackage(){

$collection = $GLOBALS['db']->packages;


$package = array(
    "user_type" => $_REQUEST['user_type'],
    "title" => $_REQUEST['title'],
    "description" => $_REQUEST['description'],
    "pricing" => $_REQUEST['pricing'],
    "status" => 1,
    "created" => time(),
    "updated" => time()
);
// upload icon if uploaded
if(isset($_FILES["package_icon"]["tmp_name"]) && $_FILES["package_icon"]["tmp_name"]!=''){
 $check = getimagesize($_FILES["package_icon"]["tmp_name"]);
 if($check !== false) {
 $target_dir = "uploads/packages/";
 $target_file = $target_dir . time().'_'.basename($_FILES["package_icon"]["name"]);
 
  if (move_uploaded_file($_FILES["package_icon"]["tmp_name"], $target_file)) {
        $package['package_icon'] = $target_file;
    } 
    
 }
}

$collection->insert($package);
return "true";

}

////////////////////////Update Job Pcakages ///////////////////////////////////
/*
This function will Update package of specific ID
Required Parameter::$_REQUEST['id'],$_REQUEST['user_type'], $_REQUEST['title'],$_REQUEST['description'] and $_REQUEST['pricing']
Optional Parameter::$_REQUEST['package_icon']
Return:: true
*/

function updatepackagebyid(){

$packageId = $_REQUEST['id'];
$packages = $GLOBALS['db']->packages;
	  
$item = $packages->findOne(array(
    '_id' => new MongoId($packageId)));      
    
    $packagedata = array(
    "user_type" => $_REQUEST['user_type'],
    "title" => $_REQUEST['title'],
    "description" => $_REQUEST['description'],
    "pricing" => $_REQUEST['pricing'],
    "updated" => time()  
    
);
// upload icon if uploaded
if(isset($_FILES["package_icon"]["tmp_name"]) && $_FILES["package_icon"]["tmp_name"]!=''){
 $check = getimagesize($_FILES["package_icon"]["tmp_name"]);
 if($check !== false) {
 $target_dir = "uploads/packages/";
 $target_file = $target_dir . time().'_'.basename($_FILES["icon"]["name"]);
 
  if (move_uploaded_file($_FILES["package_icon"]["tmp_name"], $target_file)) {
        $packagedata['package_icon'] = $target_file;
    } 
    
 }
}

$packages->update(
    array('_id' => new MongoId($packageId)),
    array('$set' => $packagedata)
);
 
return "true";
}


////////////////////////Delete Job Pcakages ///////////////////////////////////
/*
This function will Delete package of specific ID
Required Parameter::id
Return:: true
*/

function packagedelete(){
    $packageId = func_get_arg(0);
    $collection = $GLOBALS['db']->packages;
    $item = $collection->findOne(array(
    '_id' => new MongoId($packageId)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    return "true";
}
