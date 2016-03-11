<?php
require_once("Rest.inc.php");
require('../includes/functions.php');
require('../includes/jobfunctions.php');
require('../includes/packagefunctions.php');
require('../includes/applicationfunctions.php');
require('../includes/refferalfunctions.php');
class API extends REST {
    
    
    public function __construct(){
    parent::__construct();				// Init parent contructor
    $this->dbConnect();					// Initiate Database connection
    }
    
    /*
    *  Database connection 
    */
    private function dbConnect(){
    
   
    }
    
    
    public function processApi(){
   if($this->is_authorized()){
    $func = trim(str_replace("/","",$_REQUEST['action']));
    
    
    if(function_exists($func)){
    
    if(isset($_REQUEST['id']) && $_REQUEST['id']!=''){
     $resultarray = $func($_REQUEST['id']);
    }elseif(isset($_REQUEST['status']) && $_REQUEST['status']!=''){
     $resultarray = $func($_REQUEST['status']);
    }else{
    $resultarray = $func();
    }
    
    if(!$resultarray instanceof Traversable && !is_array($resultarray)){
    $this->response($resultarray, 200);
    }else{
    
    if(is_array($resultarray)){
    
    $this->response($this->json($resultarray), 200);
    }else{
    
    $this->response($this->json(iterator_to_array($resultarray)), 200);
    }
    
    }
     
    }
    else{
    $this->response('Invalid Request',404);				// If the method not exist with in this class, response would be "Page not found".
    }
    }else{
    $this->response('Authentication Required',203);	
    }
    }
    
    
    
}
    
 $api = new API;
 $api->processApi();
?>