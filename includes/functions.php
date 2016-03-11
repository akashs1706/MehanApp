<?php
require('connection.php');
// global settting details


// manage cources for candidated

////////////////////////////Get lat/longitude by address///////////////////////
/*
This function get the latitude and langitude from 3rd part server
Required Parameter::address
Optional Parameter::none
Return:: array of latitude and langitude
*/
function getLatLongByAdd($address){
$latlong =array();

$url ='http://maps.googleapis.com/maps/api/geocode/json?address=$address&sensor=false';
$result = file_get_contents($url);
$arrayresult = json_decode($result, true);
$latlong['lat'] = $arrayresult['results']['0']['geometry']['location']['lat'];
$latlong['lng'] = $arrayresult['results']['0']['geometry']['location']['lng'];
return $latlong;
//
}



////////////////////////////Add new api key///////////////////////
/*
This function will add new api key for webservices
Required Parameter::api_key and api_secret
Optional Parameter::none
Return:: true
*/
function addNewAPI(){

$collection = $GLOBALS['db']->api;

$data = array(
    "api_key" => $_REQUEST['api_key'],
    "api_secret" => $_REQUEST['api_secret'],
    "created" => time()
);
$collection->insert($data);
return 'true';

}

////////////////////////////Get API ///////////////////////
/*
This function will return all api keyss
Required Parameter::none
Optional Parameter::none
Return:: arrayy of keys
*/

function getAllAPI(){

$collection = $GLOBALS['db']->api;
$query = array();
return $collection->find($query);

}

////////////////////////////Get single API yby ID///////////////////////
/*
This function will return all api keys by id
Required Parameter::id
Optional Parameter::none
Return:: single  keys
*/

function getByIdAPI(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->api;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;

}


////////////////////////////Updated API by ID///////////////////////
/*
This function will update api keys by id
Required Parameter::id,api_key,api_secret
Optional Parameter::none
Return:: true
*/

function updateAPI(){
$collId = $_REQUEST['id'];
$collection = $GLOBALS['db']->api;
      $item = $collection->findOne(array(
    '_id' => new MongoId($collId)));
  
$data = array(
   "api_key" => $_REQUEST['api_key'],
    "api_secret" => $_REQUEST['api_secret']  
    
);


$collection->update(
    array('_id' => new MongoId($collId)),
    array('$set' => $data)
);

$return =  "true";

return $return;

}


////////////////////////////Delete API by ID///////////////////////

/*
This function will delete api keys by id
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function deleteAPI(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->api;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
return "true";
}

////////////////////////////Verify API///////////////////////
/*
This function will verify the webservice access
Required Parameter::api_key and api_secret
Optional Parameter::none
Return:: true/false
*/

function verifyAPI(){
//$id = func_get_arg(0);
$collection = $GLOBALS['db']->api;
/*$item = $collection->findOne(array(
    '_id' => new MongoId($id)));*/

$requested_api = $_REQUEST['api_key'];
$requested_api_secret = $_REQUEST['api_secret'];

$apidetail = $collection->findOne(array('api_key' => $requested_api,'api_secret' => $requested_api_secret));

    if($apidetail){

       return "true"; 
    }else{
        return "false"; 
    }



}

////////////////////////achievements//////////////////////////////////////


////////////////////////////Get achievements array///////////////////////

/*
This function will return list of achievements
Required Parameter::none
Optional Parameter::none
Return::array of achievements 
*/

function getAllAchievements(){

$collection = $GLOBALS['db']->achievements;
$query = array();
return $collection->find($query);

}

////////////////////////////Add new achievement///////////////////////
/*
This function will add new achievements
Required Parameter::title
Optional Parameter::none
Return:: true
*/

function addNewAchievement(){

$collection = $GLOBALS['db']->achievements;

$data = array(
    "title" => $_REQUEST['title'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
return 'true';

}

////////////////////////////Get single achievement yby ID///////////////////////
/*
This function will return achievements by id
Required Parameter::id
Optional Parameter::none
Return:: single achievements
*/

function getByIdAchievement(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->achievements;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;

}


////////////////////////////Updated achievement by ID///////////////////////
/*
This function will update achievements by id
Required Parameter::id and title
Optional Parameter::none
Return:: true
*/

function updateAchievement(){
$collId = $_REQUEST['id'];
$collection = $GLOBALS['db']->achievements;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($collId)));
  
$data = array(
    "title" => $_REQUEST['title'],
    "updated" => time()   
    
);


$collection->update(
    array('_id' => new MongoId($collId)),
    array('$set' => $data)
);

$return =  "true";

return $return;

}


////////////////////////////Delete achievement by ID///////////////////////
/*
This function will delete achievements by id
Required Parameter::id 
Optional Parameter::none
Return:: true
*/
function deleteAchievement(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->achievements;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
$return =  "true";

return $return;
}

////////////////////////////Update achievement status by id///////////////////////
/*
This function will update status(0 or 1) achievements by id
Required Parameter::id 
Optional Parameter::none
Return:: true
*/

function statusAchievement(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->achievements;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($Id)));
    if(isset($item['status']) && $item['status'] == 1){
    $userstatus =0;
    }else{
    $userstatus =1;
    }
	  $collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => array("status" => $userstatus))
);
}


////////////////////////////Get all achievements by status///////////////////////
/*
This function will return achievements by status(0 or 1)
Required Parameter::status 
Optional Parameter::none
Return:: araray of achievements
*/

function getAllAchievementsByStatus(){
$status = func_get_arg(0);
$collection = $GLOBALS['db']->achievements;
$query = array('status' => $status);
$resut =   $collection->find($query);
$return = '';
foreach($resut as $re){
if($re['title'] !=''){
$return .= $re['title'].',';
}
}
return $return;

}


//////////////////////----------Manage Courses-----------/////////////////////


////////////////////////////Get all Courses///////////////////////
/*
This function will return list of all courses by category
Required Parameter::category_id 
Optional Parameter::none
Return:: araray of courses
*/

function getallCoursesBycategory(){

$collection = $GLOBALS['db']->courses;
if(isset($_REQUEST['id'])){
$categorycollection = $GLOBALS['db']->coursecategories;
$item = $categorycollection->findOne(array(
    '_id' => new MongoId($_REQUEST['id'])));
    
    
$query = array('category' => $item['title']);
}else{
$query = array();
}
return $collection->find($query);
}


////////////////////////////Add new Courses///////////////////////
/*
This function will add new courses 
Required Parameter::title,category,course_duration and course_price
Optional Parameter::none
Return:: true
*/

function addNewCourse(){
$collection = $GLOBALS['db']->courses;

$data = array(
    "title" => $_REQUEST['title'],
    "category" => $_REQUEST['category'],
    "course_duration" => $_REQUEST['course_duration'],
    "course_price" => $_REQUEST['course_price'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);


if(isset($_FILES["icon"]["tmp_name"]) && $_FILES["icon"]["tmp_name"]!=''){
 $check = getimagesize($_FILES["icon"]["tmp_name"]);
 if($check !== false) {
 $target_dir = "uploads/icon/";
 $target_file = $target_dir . time().'_'.basename($_FILES["icon"]["name"]);
 
  if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
        $data['icon'] = $target_file;
    } 
    
 }
}

$collection->insert($data);
return 'true';

}


////////////////////////////Get single Courses by id///////////////////////
/*
This function will return courses by id 
Required Parameter::id
Optional Parameter::none
Return:: single course
*/

function getByIdCourse(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->courses;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;

}


////////////////////////////update Courses by id///////////////////////
/*
This function will update courses by id 
Required Parameter::id,title,category,course_duration and course_price
Optional Parameter::none
Return:: true
*/

function updateCourse(){

$collId = $_REQUEST['id'];
$collection = $GLOBALS['db']->courses;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($collId)));
  
$data = array(
    "title" => $_REQUEST['title'],
    "category" => $_REQUEST['category'],
    "course_duration" => $_REQUEST['course_duration'],
    "course_price" => $_REQUEST['course_price'],
    "updated" => time()   
    
);


if(isset($_FILES["icon"]["tmp_name"]) && $_FILES["icon"]["tmp_name"]!=''){
 $check = getimagesize($_FILES["icon"]["tmp_name"]);
 if($check !== false) {
 $target_dir = "uploads/icon/";
 $target_file = $target_dir . time().'_'.basename($_FILES["icon"]["name"]);
 
  if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
        $data['icon'] = $target_file;
    } 
    
 }
}

$collection->update(
    array('_id' => new MongoId($collId)),
    array('$set' => $data)
);

$return =  "true";

return $return;

}


////////////////////////////Delete Courses By id///////////////////////
/*
This function will delete courses by id 
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function deleteCourse(){
    $id = func_get_arg(0);
    $collection = $GLOBALS['db']->courses;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    $return =  "true";

   return $return;

}


////////////////////////////Update Courses status by id///////////////////////
/*
This function will update status(0 or 1) courses by id 
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function statusCourse(){
    $id = func_get_arg(0);
    $collection = $GLOBALS['db']->courses;
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

 $return =  "true";

   return $return;
}



////////////////////////////Get all Courses and courser category array///////////////////////
/*
This function will return all courses and course category
Required Parameter::none
Optional Parameter::none
Return:: array of course category and courses
*/

function getAllCoursesArray(){

$coursescollection = $GLOBALS['db']->courses;
$collection = $GLOBALS['db']->coursecategories;

$query = array('status' => 1);
$categories =  $collection->find($query);
$returnArray = array();
$i=0;
foreach($categories as $ccat){
$returnArray[$i]['category'] = $ccat['title'];
$coursesquery = array('category' => $ccat['title']);
$courses =  $coursescollection->find($coursesquery);
$returnArray[$i]['courses'] = $courses;
$i++;
}
return $returnArray;
//echo "<pre>";
//print_r($returnArray);
}


////////////////////////////Get all Courses Category///////////////////////
/*
This function will return all course category
Required Parameter::none
Optional Parameter::none
Return:: array of course category 
*/
function getallCoursescategory(){
$collection = $GLOBALS['db']->coursecategories;
$query = array();
return $collection->find($query);
}


////////////////////////////Get all Courses Category by status///////////////////////
/*
This function will return all course category by status
Required Parameter::status
Optional Parameter::none
Return:: array of course category 
*/

function getallCoursescategoryBystatus(){
$newstatus = func_get_arg(0);
if($newstatus ==1){
$status = 1;
}else{
$status = 0;
}
$collection = $GLOBALS['db']->coursecategories;
$query = array('status' => $status);
return $collection->find($query);

}

////////////////////////////Add new Courses Category///////////////////////
/*
This function will add new course category
Required Parameter::title
Optional Parameter::none
Return:: true
*/

function addNewCoursescategory(){
$collection = $GLOBALS['db']->coursecategories;

$data = array(
    "title" => $_REQUEST['title'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);


if(isset($_FILES["icon"]["tmp_name"]) && $_FILES["icon"]["tmp_name"]!=''){
 $check = getimagesize($_FILES["icon"]["tmp_name"]);
 if($check !== false) {
 $target_dir = "uploads/icon/";
 $target_file = $target_dir . time().'_'.basename($_FILES["icon"]["name"]);
 
  if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
        $data['icon'] = $target_file;
    } 
    
 }
}

$collection->insert($data);
return 'true';

}


////////////////////////////Get Courses Category by id///////////////////////
/*
This function will return category by id
Required Parameter::id
Optional Parameter::none
Return:: single item
*/

function getByIdCoursescategory(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->coursecategories;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;

}


////////////////////////////Update Courses Category///////////////////////
/*
This function will update category by id
Required Parameter::id,title
Optional Parameter::none
Return:: true
*/

function updateCoursescategory(){
$collId = $_REQUEST['id'];
$collection = $GLOBALS['db']->coursecategories;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($collId)));
  
$data = array(
    "title" => $_REQUEST['title'],
    "updated" => time()   
    
);


if(isset($_FILES["icon"]["tmp_name"]) && $_FILES["icon"]["tmp_name"]!=''){
 $check = getimagesize($_FILES["icon"]["tmp_name"]);
 if($check !== false) {
 $target_dir = "uploads/icon/";
 $target_file = $target_dir . time().'_'.basename($_FILES["icon"]["name"]);
 
  if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
        $data['icon'] = $target_file;
    } 
    
 }
}

$collection->update(
    array('_id' => new MongoId($collId)),
    array('$set' => $data)
);

$return =  "true";

return $return;

}


////////////////////////////Delete Courses Category by id///////////////////////
/*
This function will delete category by id
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function deleteCoursescategory(){
    $id = func_get_arg(0);
    $collection = $GLOBALS['db']->coursecategories;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    $return =  "true";
    return $return;

}


////////////////////////////Update Courses Category status///////////////////////
/*
This function will update staus(0 or 1) category by id
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function statusCoursescategory(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->coursecategories;
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
}



/////////////////////-----------Industory types------------////////////////////////////

////////////////////////////Get all Industory Types///////////////////////
/*
This function will return all Industory Types
Required Parameter::none
Optional Parameter::none
Return:: array of Industory Types
*/
function adminglobalindustorytypeslist(){
$collection = $GLOBALS['db']->industorytypes;

////////////////////////////Insert Industory Types array if empty///////////////////////
if($collection->count(array()) < 5){
$indtypes = array("Accounting","Airlines/Aviation","Alternative Dispute Resolution","Alternative Medicine","Animation","Apparel and Fashion","Architecture and Planning","Arts and Crafts","Automotive","Aviation and Aerospace","Banking","Biotechnology","Broadcast Media","Building Materials","Business Supplies and Equipment","Capital Markets","Chemicals","Civic and Social Organization","Civil Engineering","Commercial Real Estate","Computer and Network Security","Computer Games","Computer Hardware","Computer Networking","Computer Software","Construction","Consumer Electronics","Consumer Goods","Consumer Services","Cosmetics","Dairy","Defense and Space","Design","Education Management","E-Learning","Electrical/Electronic Manufacturing","Entertainment","Environmental Services","Events Services","Executive Office","Facilities Services","Farming","Financial Services","Fine Art","Fishery","Food and Beverages","Food Production","Fund-Raising","Furniture","Gambling and Casinos","Glass, Ceramics and Concrete","Government Administration","Government Relations","Graphic Design","Health, Wellness and Fitness","Higher Education","Hospital and Health Care","Hospitality","Human Resources","Import and Export","Individual and Family Services","Industrial Automation","Information Services","Information Technology and Services","Insurance","International Affairs","International Trade and Development","Internet","Investment Banking","Investment Management","Judiciary","Law Enforcement","Law Practice","Legal Services","Legislative Office","Leisure, Travel and Tourism","Libraries","Logistics and Supply Chain","Luxury Goods and Jewelry","Machinery","Management Consulting","Maritime","Marketing and Advertising","Market Research","Mechanical or Industrial Engineering","Media Production","Medical Devices","Medical Practice","Mental Health Care","Military","Mining and Metals","Motion Pictures and Film","Museums and Institutions","Music","Nanotechnology","Newspapers","Nonprofit Organization Management","Oil and Energy","Online Media","Outsourcing/Offshoring","Package/Freight Delivery","Packaging and Containers","Paper and Forest Products","Performing Arts","Pharmaceuticals","Philanthropy","Photography","Plastics","Political Organization","Primary/Secondary Education","Printing","Professional Training and Coaching","Program Development","Public Policy","Public Relations and Communications","Public Safety","Publishing","Railroad Manufacture","Ranching","Real Estate","Recreational Facilities and Services","Religious Institutions","Renewables and Environment","Research","Restaurants","Retail","Security and Investigations","Semiconductors","Shipbuilding","Sporting Goods","Sports","Staffing and Recruiting","Supermarkets","Telecommunications","Textiles","Think Tanks","Tobacco","Translation and Localization","Transportation/Trucking/Railroad","Utilities","Venture Capital and Private Equity","Veterinary","Warehousing","Wholesale","Wine and Spirits","Wireless","Writing and Editing");
foreach($indtypes as $title){
//echo $title;
$data = array(
    "title" => $title,
    "status" => "1",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
}

}
$query = array();
return $collection->find($query);

}


////////////////////////////Get all Industory Types by status///////////////////////
/*
This function will return all Industory Types by status
Required Parameter::status
Optional Parameter::none
Return:: array of Industory Types
*/

function adminglobalindustrytypeslistbystatus(){
$status = func_get_arg(0);
$collection = $GLOBALS['db']->industorytypes;
$query = array();
return $collection->find($query);
}

////////////////////////////Add new Industory Types///////////////////////
/*
This function will add new Industory Types
Required Parameter::title
Optional Parameter::none
Return:: true
*/

function adminaddnewindustorytypes(){

$collection = $GLOBALS['db']->industorytypes;
$user = array(
    "title" => $_REQUEST['title'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);
$collection->insert($user);
$return = "true";
return $return;

}


////////////////////////////Get Industory Types by id///////////////////////
/*
This function will return Industory Types by id
Required Parameter::id
Optional Parameter::none
Return:: single item
*/

function admingetindustorytypesbyid(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->industorytypes;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;
}


////////////////////////////Update Industory Types by id///////////////////////
/*
This function will update Industory Types by id
Required Parameter::id,title
Optional Parameter::none
Return:: true
*/
function adminupdateindustorytypesbyid(){

$id = $_REQUEST['id'];
$collection = $GLOBALS['db']->industorytypes;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
  
$data = array(
    "title" => $_REQUEST['title'],
    "updated" => time()   
    
);

$collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => $data)
);

$return =  "true";
return $return;
}


////////////////////////////Update Industory Types Status///////////////////////
/*
This function will update status Industory Types by id
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function adminindustorytypesstatus(){
    $id = func_get_arg(0);
    $collection = $GLOBALS['db']->industorytypes;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if(isset($item['status']) && $item['status'] == 1){
    $status =0;
    }else{
    $status =1;
    }
	  $collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => array("status" => $status))
);
$return =  "true";
return $return;
}


////////////////////////////Delete Industory Types by ID///////////////////////
/*
This function will delete Industory Types by id
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function adminindustorytypesdelete(){
    $id = func_get_arg(0);
    $collection = $GLOBALS['db']->industorytypes;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    $return =  "true";
return $return;
}




////////////////////////////Manage Country///////////////////////

////////////////////////////Get all Country///////////////////////
/*
This function will return all countries
Required Parameter::none
Optional Parameter::none
Return:: array of countries
*/

function adminglobalcountrieslist(){
$collection = $GLOBALS['db']->countries;

if($collection->count(array()) < 5){
$country = array("us"=>"United States","af" =>"Afghanistan","ax"=>"Aland Islands","al"=>"Albania","dz"=>"Algeria","as"=>"American Samoa","ad"=>"Andorra","ao"=>"Angola","ai"=>"Anguilla","aq"=>"Antarctica","ag"=>"Antigua and Barbuda","ar"=>"Argentina","am"=>"Armenia","aw"=>"Aruba","au"=>"Australia","at"=>"Austria","az"=>"Azerbaijan","bs"=>"Bahamas","bh"=>"Bahrain","bd"=>"Bangladesh","bb"=>"Barbados","by"=>"Belarus","be"=>"Belgium","bz"=>"Belize","bj"=>"Benin","bm"=>"Bermuda","bt"=>"Bhutan","bo"=>"Bolivia","ba"=>"Bosnia and Herzegovina","bw"=>"Botswana","bv"=>"Bouvet Island","br"=>"Brazil","io"=>"British Indian Ocean Territory","bn"=>"Brunei Darussalam","bg"=>"Bulgaria","bf"=>"Burkina Faso","bi"=>"Burundi","kh"=>"Cambodia","cm"=>"Cameroon","ca"=>"Canada","cv"=>"Cape Verde","cb"=>"Caribbean Nations","ky"=>"Cayman Islands","cf"=>"Central African Republic","td"=>"Chad","cl"=>"Chile","cn"=>"China","cx"=>"Christmas Island","cc"=>"Cocos (Keeling) Islands","co"=>"Colombia","km"=>"Comoros","cg"=>"Congo","ck"=>"Cook Islands","cr"=>"Costa Rica","ci"=>"Cote D'Ivoire (Ivory Coast)","hr"=>"Croatia","cu"=>"Cuba","cy"=>"Cyprus","cz"=>"Czech Republic","cd"=>"Democratic Republic of the Congo","dk"=>"Denmark","dj"=>"Djibouti","dm"=>"Dominica","do"=>"Dominican Republic","tp"=>"East Timor","ec"=>"Ecuador","eg"=>"Egypt","sv"=>"El Salvador","gq"=>"Equatorial Guinea","er"=>"Eritrea","ee"=>"Estonia","et"=>"Ethiopia","fk"=>"Falkland Islands (Malvinas)","fo"=>"Faroe Islands","fm"=>"Federated States of Micronesia","fj"=>"Fiji","fi"=>"Finland","fr"=>"France","gf"=>"French Guiana","pf"=>"French Polynesia","tf"=>"French Southern Territories","ga"=>"Gabon","gm"=>"Gambia","ge"=>"Georgia","de"=>"Germany","gh"=>"Ghana","gi"=>"Gibraltar","gr"=>"Greece","gl"=>"Greenland","gd"=>"Grenada","gp"=>"Guadeloupe","gu"=>"Guam","gt"=>"Guatemala","gg"=>"Guernsey","gn"=>"Guinea","gw"=>"Guinea-Bissau","gy"=>"Guyana","ht"=>"Haiti","hm"=>"Heard Island and McDonald Islands","hn"=>"Honduras","hk"=>"Hong Kong","hu"=>"Hungary","is"=>"Iceland","in"=>"India","id"=>"Indonesia","ir"=>"Iran","iq"=>"Iraq","ie"=>"Ireland","im"=>"Isle of Man","il"=>"Israel","it"=>"Italy","jm"=>"Jamaica","jp"=>"Japan","je"=>"Jersey","jo"=>"Jordan","kz"=>"Kazakhstan","ke"=>"Kenya","ki"=>"Kiribati","kr"=>"Korea","kp"=>"Korea (North)","ko"=>"Kosovo","kw"=>"Kuwait","kg"=>"Kyrgyzstan","la"=>"Laos","lv"=>"Latvia","lb"=>"Lebanon","ls"=>"Lesotho","lr"=>"Liberia","ly"=>"Libya","li"=>"Liechtenstein","lt"=>"Lithuania","lu"=>"Luxembourg","mo"=>"Macao","mk"=>"Macedonia","mg"=>"Madagascar","mw"=>"Malawi","my"=>"Malaysia","mv"=>"Maldives","ml"=>"Mali","mt"=>"Malta","mh"=>"Marshall Islands","mq"=>"Martinique","mr"=>"Mauritania","mu"=>"Mauritius","yt"=>"Mayotte","mx"=>"Mexico","md"=>"Moldova","mc"=>"Monaco","mn"=>"Mongolia","me"=>"Montenegro","ms"=>"Montserrat","ma"=>"Morocco","mz"=>"Mozambique","mm"=>"Myanmar","na"=>"Namibia","nr"=>"Nauru","np"=>"Nepal","nl"=>"Netherlands","an"=>"Netherlands Antilles","nc"=>"New Caledonia","nz"=>"New Zealand","ni"=>"Nicaragua","ne"=>"Niger","ng"=>"Nigeria","nu"=>"Niue","nf"=>"Norfolk Island","mp"=>"Northern Mariana Islands","no"=>"Norway","pk"=>"Pakistan","pw"=>"Palau","ps"=>"Palestinian Territory","pa"=>"Panama","pg"=>"Papua New Guinea","py"=>"Paraguay","pe"=>"Peru","ph"=>"Philippines","pn"=>"Pitcairn","pl"=>"Poland","pt"=>"Portugal","pr"=>"Puerto Rico","qa"=>"Qatar","re"=>"Reunion","ro"=>"Romania","ru"=>"Russian Federation","rw"=>"Rwanda","gs"=>"S. Georgia and S. Sandwich Islands","sh"=>"Saint Helena","kn"=>"Saint Kitts and Nevis","lc"=>"Saint Lucia","pm"=>"Saint Pierre and Miquelon","vc"=>"Saint Vincent and the Grenadines","ws"=>"Samoa","sm"=>"San Marino","st"=>"Sao Tome and Principe","sa"=>"Saudi Arabia","sn"=>"Senegal","rs"=>"Serbia","cs"=>"Serbia and Montenegro","sc"=>"Seychelles","sl"=>"Sierra Leone","sg"=>"Singapore","sk"=>"Slovak Republic","si"=>"Slovenia","sb"=>"Solomon Islands","so"=>"Somalia","za"=>"South Africa","ss"=>"South Sudan","es"=>"Spain","lk"=>"Sri Lanka","sd"=>"Sudan","om"=>"Sultanate of Oman","sr"=>"Suriname","sj"=>"Svalbard and Jan Mayen","sz"=>"Swaziland","se"=>"Sweden","ch"=>"Switzerland","sy"=>"Syria","tw"=>"Taiwan","tj"=>"Tajikistan","tz"=>"Tanzania","th"=>"Thailand","tl"=>"Timor-Leste","tg"=>"Togo","tk"=>"Tokelau","to"=>"Tonga","tt"=>"Trinidad and Tobago","tn"=>"Tunisia","tr"=>"Turkey","tm"=>"Turkmenistan","tc"=>"Turks and Caicos Islands","tv"=>"Tuvalu","ug"=>"Uganda","ua"=>"Ukraine","ae"=>"United Arab Emirates","gb"=>"United Kingdom","uy"=>"Uruguay","uz"=>"Uzbekistan","vu"=>"Vanuatu","va"=>"Vatican City State (Holy See)","ve"=>"Venezuela","vn"=>"Vietnam","vg"=>"Virgin Islands (British)","vi"=>"Virgin Islands (U.S.)","wf"=>"Wallis and Futuna","eh"=>"Western Sahara","ye"=>"Yemen","zm"=>"Zambia","zw"=>"Zimbabwe","oo"=>"Other");
foreach($country as $title){
//echo $title;
$data = array(
    "title" => $title,
    "status" => "1",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
}

}

$query = array();
return $collection->find($query);

}


////////////////////////////Get all Country by status///////////////////////
/*
This function will return all countries by status
Required Parameter::status
Optional Parameter::none
Return:: array of countries
*/

function adminglobalcountrieslistbystatus(){
$status = func_get_arg(0);
$collection = $GLOBALS['db']->countries;
$query = array('status' => $status);
return $collection->find($query);

}


////////////////////////////Add new Country///////////////////////
/*
This function will add new countries 
Required Parameter::title
Optional Parameter::none
Return:: true
*/

function adminaddnewcountries(){

$collection = $GLOBALS['db']->countries;
$data = array(
    "title" => $_REQUEST['title'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
$return = "true";
return $return;

}


////////////////////////////Get Country By id///////////////////////
/*
This function will add new countries by id
Required Parameter::id
Optional Parameter::none
Return:: single country
*/

function admingetcountriesbyid(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->countries;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;
}

////////////////////////////Update Country by id///////////////////////
/*
This function will update countries by id
Required Parameter::id,title
Optional Parameter::none
Return:: true
*/

function adminupdatecountriesbyid(){

$id = $_REQUEST['id'];
$collection = $GLOBALS['db']->countries;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
  
$data = array(
    "title" => $_REQUEST['title'],
    "updated" => time()   
    
);

$collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => $data)
);

$return =  "true";
return $return;
}

////////////////////////////Update Country status///////////////////////
/*
This function will update status countries by id
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function admincountriesstatus(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->countries;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if(isset($item['status']) && $item['status'] == 1){
    $status =0;
    }else{
    $status =1;
    }
	  $collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => array("status" => $status))
);
$return =  "true";
return $return;
}

////////////////////////////Delete Country///////////////////////
/*
This function will delete status countries by id
Required Parameter::id
Optional Parameter::none
Return:: true
*/

function admincountriesdelete(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->countries;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    $return =  "true";
return $return;
}



////////////////////////////Manage Salery array///////////////////////


////////////////////////////Get all Salery by status///////////////////////
/*
This function will retuen all status Salery by status
Required Parameter::status
Optional Parameter::none
Return:: array of Salery
*/

function getsalaryrange(){
$status = func_get_arg(0);
$collection = $GLOBALS['db']->salaryrange;
$query = array('status' => $status);
return $collection->find($query);

}

////////////////////////////Get all Salery///////////////////////
/*
This function will retuen all status Salery
Required Parameter::none
Optional Parameter::none
Return:: array of Salery
*/

function admingloballistsalaryrange(){
$collection = $GLOBALS['db']->salaryrange;
$query = array();
return $collection->find($query);

}

////////////////////////////Add new Salery///////////////////////
/*
This function will add new Salery
Required Parameter::min,max
Optional Parameter::none
Return::true
*/

function adminaddnewsalaryrange(){

$collection = $GLOBALS['db']->salaryrange;
$data = array(
    "min" => $_REQUEST['min'],
    "max" => $_REQUEST['max'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
$return = "true";
return $return;

}


////////////////////////////Get Salery by id///////////////////////
/*
This function will return Salery by id
Required Parameter::id
Optional Parameter::none
Return::single salary 
*/
function admingetbyidsalaryrange(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->salaryrange;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;
}

////////////////////////////Update Salery///////////////////////
/*
This function will update Salery
Required Parameter::id,min,max
Optional Parameter::none
Return::true
*/

function adminupdatebyidsalaryrange(){

$id = $_REQUEST['id'];
$collection = $GLOBALS['db']->salaryrange;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
  
$data = array(
    "min" => $_REQUEST['min'],
    "max" => $_REQUEST['max'],
    "updated" => time()   
    
);

$collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => $data)
);

$return =  "true";
return $return;
}


////////////////////////////Update Salery status///////////////////////
/*
This function will update status Salery by id
Required Parameter::id
Optional Parameter::none
Return::true
*/

function adminsalaryrangestatus(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->salaryrange;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if(isset($item['status']) && $item['status'] == 1){
    $status =0;
    }else{
    $status =1;
    }
	  $collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => array("status" => $status))
);
$return =  "true";
return $return;
}

////////////////////////////Delete Salery///////////////////////
/*
This function will delete Salery by id
Required Parameter::id
Optional Parameter::none
Return::true
*/

function admindeletesalaryrange(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->salaryrange;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    $return =  "true";
    return $return;
}


////////////////////////////Manage District///////////////////////


////////////////////////////Get all District///////////////////////
/*
This function will return all District
Required Parameter::none
Optional Parameter::none
Return::array of District
*/

function admingloballiststates(){
$collection = $GLOBALS['db']->states;
$query = array();
return $collection->find($query);
}

////////////////////////////Get all District by status///////////////////////
/*
This function will return all District by status
Required Parameter::status
Optional Parameter::none
Return::array of District
*/

function adminglobalstateslistbystatus(){
$status = func_get_arg(0);
$collection = $GLOBALS['db']->states;
$query = array();
return $collection->find($query);


}


////////////////////////////Add new District///////////////////////
/*
This function will add new District 
Required Parameter::country,title
Optional Parameter::none
Return::true
*/

function adminaddnewstates(){

$collection = $GLOBALS['db']->states;
$data = array(
    "country" => $_REQUEST['country'],
    "title" => $_REQUEST['title'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
$return = "true";
return $return;

}


////////////////////////////Get District by id///////////////////////
/*
This function will return  District by id
Required Parameter::id
Optional Parameter::none
Return::single District
*/

function admingetbyidstates(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->states;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;
}

////////////////////////////Update District b y id///////////////////////
/*
This function will update  District by id
Required Parameter::id,country,title
Optional Parameter::none
Return::true
*/

function adminupdatebyidstates(){

$id = $_REQUEST['id'];
$collection = $GLOBALS['db']->states;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($userId)));
  
$data = array(
    "country" =>$_REQUEST['country'],
    "title" => $_REQUEST['title'],
    "updated" => time()   
    
);

$collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => $data)
);

$return =  "true";
return $return;
}

////////////////////////////Update District Status///////////////////////
/*
This function will update status  District by id
Required Parameter::id
Optional Parameter::none
Return::true
*/

function adminstatusstates(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->states;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if(isset($item['status']) && $item['status'] == 1){
    $status =0;
    }else{
    $status =1;
    }
   // echo $userstatus;
	  $collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => array("status" => $status))
    );
    $return =  "true";
return $return;
}


////////////////////////////Delete District///////////////////////
/*
This function will delete District by id
Required Parameter::id
Optional Parameter::none
Return::true
*/
function admindeletestates(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->states;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    $return =  "true";
return $return;
}


////////////////////////////Get District by country ID///////////////////////
/*
This function return District by country id
Required Parameter::country_id
Optional Parameter::none
Return::array of District
*/

function admingetstatebycountry(){
$country = func_get_arg(0);
 $collection = $GLOBALS['db']->states;
 $query = array("country" => $country);
 return $collection->find($query);
}


////////////////////////////Manage City///////////////////////

////////////////////////////Get all City///////////////////////
/*
This function will return City
Required Parameter::none
Optional Parameter::none
Return::array of City
*/

function admingloballistcities(){
$collection = $GLOBALS['db']->cities;
$query = array();
return $collection->find($query);

}


////////////////////////////Get all City by disctict///////////////////////
/*
This function will return City by disctict
Required Parameter::disctict
Optional Parameter::none
Return::array of City
*/

function admingetcitybystate(){
$state = func_get_arg(0);
 $collection = $GLOBALS['db']->cities;
 $query = array("state" => $state);
 return $collection->find($query);
}


////////////////////////////get all City by status///////////////////////
/*
This function will return City by status
Required Parameter::status
Optional Parameter::none
Return::array of City
*/

function adminglobalcitylistbystatus(){

$collection = $GLOBALS['db']->cities;
$query = array();
return $collection->find($query);
}

////////////////////////////add new City ///////////////////////
/*
This function will create new City 
Required Parameter::country,state, title
Optional Parameter::none
Return::true
*/

function adminaddnewcities(){

$collection = $GLOBALS['db']->cities;
$data = array(
    "country" => $_REQUEST['country'],
    "state" => $_REQUEST['state'],
    "title" => $_REQUEST['title'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
$return = "true";
return $return;

}


////////////////////////////get City by ID ///////////////////////
/*
This function will return City by id 
Required Parameter::id
Optional Parameter::none
Return::single city
*/

function admingetbyidcities(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->cities;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;
}

////////////////////////////Update City ///////////////////////
/*
This function will update City by id 
Required Parameter::id,country,state, title
Optional Parameter::none
Return::true
*/

function adminupdatebyidcities(){

$id = $_REQUEST['id'];
$collection = $GLOBALS['db']->cities;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
  
$data = array(
    "country" => $_REQUEST['country'],
    "state" => $_REQUEST['state'],
    "title" => $_REQUEST['title'],
    "updated" => time()   
    
);

$collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => $data)
);

$return =  "true";

return $return;
}



////////////////////////////Update City Status ///////////////////////
/*
This function will update Status City by id 
Required Parameter::id
Optional Parameter::none
Return::true
*/

function adminstatuscities(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->cities;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if(isset($item['status']) && $item['status'] == 1){
    $status =0;
    }else{
    $status =1;
    }
   // echo $userstatus;
	  $collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => array("status" => $status))
    );
    $return =  "true";

return $return;
}


////////////////////////////Delete City ///////////////////////
/*
This function will delete City by id 
Required Parameter::id
Optional Parameter::none
Return::true
*/

function admindeletecities(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->cities;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    $return =  "true";

return $return;
}




////////////////////////////Manage Candidated Degrees ///////////////////////

////////////////////////////Get all Candidated Degrees ///////////////////////
/*
This function will return all Candidated Degrees
Required Parameter::none
Optional Parameter::none
Return::array of Candidated Degrees
*/

function admingloballistcandidatesdegree(){
$collection = $GLOBALS['db']->degrees;
if($collection->count(array()) < 5){
$educationarray= array("High School"=>"High School","Associate’s Degree"=>"Associate’s Degree","Bachelor’s Degree"=>"Bachelor’s Degree","Master’s Degree"=>"Master’s Degree","Master of Business Administration (M.B.A.)"=>"Master of Business Administration (M.B.A.)","Juris Doctor (J.D.)"=>"Juris Doctor (J.D.)","Doctor of Medicine (M.D.)"=>"Doctor of Medicine (M.D.)","Doctor of Philosophy (Ph.D.)"=>"Doctor of Philosophy (Ph.D.)","Engineer’s Degree"=>"Engineer’s Degree","other"=>"Other");
foreach($educationarray as $title){
//echo $title;
$data = array(
    "title" => $title,
    "status" => "1",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
}

}
$query = array();
return $collection->find($query);
}

////////////////////////////Get all Candidated Degrees by status///////////////////////
/*
This function will return all Candidated Degrees by status
Required Parameter::status
Optional Parameter::none
Return::array of Candidated Degrees
*/
function adminglobaldegreeslistbystatus(){
$status = func_get_arg(0);
$collection = $GLOBALS['db']->degrees;
$query = array();
return $collection->find($query);


}

////////////////////////////Add new Candidated Degrees ///////////////////////

/*
This function will add new Candidated Degrees
Required Parameter::title
Optional Parameter::none
Return::true
*/
function adminaddnewcandidatesdegree(){

$collection = $GLOBALS['db']->degrees;
$data = array(
    "title" => $_REQUEST['title'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
$return = "true";
return $return;

}


////////////////////////////Get Candidated Degrees by id///////////////////////
/*
This function will add new Candidated Degrees by id
Required Parameter::id
Optional Parameter::none
Return::single candidated Degrees
*/

function admingetbyidcandidatesdegree(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->degrees;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;
}

////////////////////////////Update Candidated Degrees ///////////////////////
/*
This function will update Candidated Degrees by id
Required Parameter::id,title
Optional Parameter::none
Return::true
*/

function adminupdatebyidcandidatesdegree(){

$id = $_REQUEST['id'];
$collection = $GLOBALS['db']->degrees;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
  
$data = array(
    "title" => $_REQUEST['title'],
    "updated" => time()   
    
);

$collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => $data)
);

$return =  "true";

return $return;
}


////////////////////////////Update Candidated Degrees Status ///////////////////////
/*
This function will update Status Candidated Degrees by id
Required Parameter::id
Optional Parameter::none
Return::true
*/

function adminstatuscandidatesdegree(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->degrees;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if(isset($item['status']) && $item['status'] == 1){
    $status =0;
    }else{
    $status =1;
    }
   // echo $userstatus;
	  $collection->update(
    array('_id' => new MongoId($id)),
    array('$set' => array("status" => $status))
    );
    $return =  "true";

return $return;
}


////////////////////////////Delete Candidated Degrees ///////////////////////
/*
This function will delete Candidated Degrees by id
Required Parameter::id
Optional Parameter::none
Return::true
*/

function admindeletecandidatesdegree(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->degrees;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    if($item)
    $collection->remove( array( '_id' => $item['_id'] ) );
    $return =  "true";

return $return;
}






////////////////////////////Manage dashborad statics ///////////////////////

////////////////////////////Get admin User Count///////////////////////
function getadminCount(){
$collection = $GLOBALS['db']->users;
return $collection->count(array('user_type'=>'superadmin','status' =>1));
}


////////////////////////////Get Employer Count///////////////////////
function getempCount(){
$collection = $GLOBALS['db']->users;
return $collection->count(array('user_type'=>'employers','status' =>1));
}

////////////////////////////Get Candidates Count///////////////////////
function getcandCount(){
$collection = $GLOBALS['db']->users;
return $collection->count(array('user_type'=>'candidates','status' =>1));
}


////////////////////////////Get Job Category Count///////////////////////
function getjobCateCount(){
$collection = $GLOBALS['db']->job_category;
return $collection->count();
}


////////////////////////////Get JOb Posted Count///////////////////////
function getjobsCount(){
$collection = $GLOBALS['db']->jobs;
return $collection->count();
}



////////////////////////////Manage admin login/forgotpassword///////////////////////

function login() 
{ 
	 	$collection = $GLOBALS['db']->users;
	 	////////////////////////////Manage admin login///////////////////////
	 	if($_REQUEST['formaction'] == 'login'){
	  $password = md5($_REQUEST['password']);
	  $username = $_REQUEST['username'];
    $userdetail = $collection->findOne(array('username' => $username,'password' => $password,'user_type' => 'superadmin','status' =>1));
    if(!$userdetail){
    $userdetailfinal = $collection->findOne(array('email' => $username,'password' => $password,'user_type' => 'superadmin','status' =>1));
    }else{
    $userdetailfinal = $userdetail;
    }
    
   	if($userdetailfinal)
		{
		  $_SESSION["userid"] = $userdetailfinal['_id'];
		  $_SESSION["username"] = $userdetailfinal['username'];
			return "loggedin";
			
		}else
		{
			return "Invalid username or password";
		}
		}
		////////////////////////////Manage admin Forgot password///////////////////////
		if($_REQUEST['formaction'] == 'forgot_password'){
    $email = $_REQUEST['email'];
    $userdetail = $collection->findOne(array('email' => $email,'user_type' => 'superadmin','status' =>1));
    if($userdetail){
    $userId = $userdetail['_id'];
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $fp_token = substr( str_shuffle( $chars ), 0, 20 );
    
    $collection->update(
    array('_id' => new MongoId($userId)),
    array('$set' => array("fp_token" => $fp_token))
    );
    ////////////////////////////Send email for reset password///////////////////////
    $to = $email;

    $subject = 'Re-set Password Request';
    
    $headers = "From: admin@mehanapp.com \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    $message = '<html><body>';
    $message .= '<h4>Hello, '.$userdetail['first_name'].',</h4>';
    $message .= '<p>Find bellow link to re-set your password:</p>';
    $message .= '<p>copy this url '.$GLOBALS['domainname'].'resetpassword.php?fp_token='.$fp_token.' and open in your browser <br />or<br /> <a href="'.$GLOBALS['domainname'].'resetpassword.php?fp_token='.$fp_token.'">Click Here</a></p>';
    $message .= '</body></html>';
    
    if(mail($to, $subject, $message, $headers)){
    return "<div class='success'>Email with link to re-set password is sent to your email.</div>";
    }else{
    return "<div class='error'>Error while sending email, please try again...</div>";
    }
    }else{
    return "<div class='warning'>Email is not registered with us.</div>";
    }
    
    }
	
}

////////////////////////////admin restpassword///////////////////////
function resetpassword(){

$collection = $GLOBALS['db']->users;
$fp_token = $_REQUEST['fp_token'];
$userdetail = $collection->findOne(array('fp_token' =>$fp_token));
if($userdetail){
$userdata = array(
    "fp_token" => '',
    "password" => md5($_REQUEST['password']),
    "updated" => time()   
    
);
$userId =$userdetail['_id'];
$collection->update(
    array('_id' => new MongoId($userId)),
    array('$set' => $userdata)
);

return "true";
}else{
return "<div class='error'>Token is invalid or expired</div>";
}

}

////////////////////////////Manage admin logout///////////////////////
function logout(){

unset($_SESSION["userid"]);
unset($_SESSION["username"]);

return "true";
}


////////////////////////////Get all admin user ///////////////////////
function adminuserslist(){

$collection = $GLOBALS['db']->users;
$query = array('user_type' => 'superadmin');
return $adminuser = $collection->find($query);

}
////////////////////////////add new admin user ///////////////////////
function adminaddnew(){
$collection = $GLOBALS['db']->users;
$userbyemail = $collection->findOne(array('email' => $_REQUEST['email']));
$userbyusername = $collection->findOne(array('username' => $_REQUEST['username']));
$return = '';
if($userbyemail){
$return .=  "<div class='error'>This email is already registered, Please try different email address.</div>";
}elseif($userbyusername){
$return .= "<div class='error'>This Username is already registered, Please try different email address.</div>";
}else{
$user = array(
    "user_type" => "superadmin",
    "user_role" => "Mehan Staff",
    "first_name" => $_REQUEST['first_name'],
    "last_name" => $_REQUEST['last_name'],
    "email" => $_REQUEST['email'],
    "username" => $_REQUEST['username'],
    "phone" => $_REQUEST['phone'],
    "postal_code" => "",
    "fp_token" =>"",
    "status" => "0",
    "created" => time(),
    "updated" => time(),
    "password" => md5($_REQUEST['password'])
);
$collection->insert($user);
$return .= "true";
}
return $return;
}


////////////////////////////Get admin user by id ///////////////////////
function admingetuserbyid(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->users;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
return $item;
}

////////////////////////////Update admin user ///////////////////////
function adminupdateuserbyid(){

$userId = $_REQUEST['id'];
$collection = $GLOBALS['db']->users;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($userId)));

$userbyemail = $collection->findOne(array('email' => $_REQUEST['email']));
$userbyusername = $collection->findOne(array('username' => $_REQUEST['username']));
$return = '';
if($userbyemail && $userbyemail['_id']!= $userId){
$return .=  "<div class='error'>This email is already registered, Please try different email address.</div>";
}elseif($userbyusername  && $userbyemail['_id'] != $userId){
$return .= "<div class='error'>This Username is already registered, Please try different email address.</div>";
}else{    
$userdata = array(
    "first_name" => $_REQUEST['first_name'],
    "last_name" => $_REQUEST['last_name'],
    "email" => $_REQUEST['email'],
    "username" => $_REQUEST['username'],
    "phone" => $_REQUEST['phone'],
    "postal_code" => "",
    "updated" => time()   
    
);

$collection->update(
    array('_id' => new MongoId($userId)),
    array('$set' => $userdata)
);

//$item->update($userdata);
if($_REQUEST['password'] !=''){
$collection->update(
    array('_id' => new MongoId($userId)),
    array('$set' => array("password" => md5($_REQUEST['password'])))
);
}  
$return .=  "true";
}
return $return;
}

////////////////////////////Update admin user status ///////////////////////
function adminuserstatus(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->users;
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
}

////////////////////////////Delete admin user  ///////////////////////
function adminuserdelete(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->users;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    $collection->remove( array( '_id' => $item['_id'] ) );
}




////////////////////////////Manage Emplyeres  ///////////////////////

////////////////////////////Get all Emplyeres  ///////////////////////
function adminemployerslist(){

$collection = $GLOBALS['db']->users;
$query = array('user_type' => 'employers');
return $adminuser = $collection->find($query);

}

////////////////////////////Add new Emplyeres  ///////////////////////
function adminaddnewemployers(){
$collection = $GLOBALS['db']->users;
$userbyemail = $collection->findOne(array('email' => $_REQUEST['email']));
$userbyusername = $collection->findOne(array('username' => $_REQUEST['username']));
$return = '';
if($userbyemail){
$return .=  "<div class='error'>This email is already registered, Please try different email address.</div>";
}elseif($userbyusername){
$return .= "<div class='error'>This Username is already registered, Please try different email address.</div>";
}else{
$user = array(
    "user_type" => "employers",
    "user_role" => "employers",
    "first_name" => $_REQUEST['first_name'],
    "last_name" => $_REQUEST['last_name'],
    "email" => $_REQUEST['email'],
    "password" => md5($_REQUEST['password']),
    "username" => $_REQUEST['username'],
    "phone" => $_REQUEST['phone'],
    //"address_1" => $_REQUEST['address_1'],
    //"address_2" => $_REQUEST['address_2'],
    "country" => $_REQUEST['country'],
    "state" => $_REQUEST['state'],
    "city" => $_REQUEST['city'],
    "postal_code" => getLatLongByAdd($_REQUEST['city'],$_REQUEST['state']),
    "emp_position" => $_REQUEST['emp_position'],
    "emp_industry" => $_REQUEST['emp_industry'],
    "emp_company_name" => $_REQUEST['emp_company_name'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
    
);
$collection->insert($user);
$return .= "true";
}
return $return;
}


////////////////////////////Get Emplyeres by ID ///////////////////////
function admingetemployersbyid(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->users;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    
    
$jobsarray['jobsarray']  = admingetjobsbyemployersid($id);
return array_merge($item,$jobsarray);
}


////////////////////////////Update Emplyeres  ///////////////////////
function adminupdateemployersbyid(){

$userId = $_REQUEST['id'];
$collection = $GLOBALS['db']->users;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($userId)));

$userbyemail = $collection->findOne(array('email' => $_REQUEST['email']));
$userbyusername = $collection->findOne(array('username' => $_REQUEST['username']));
$return = '';
if($userbyemail  && $userbyemail['_id'] != $userId){
$return .=  "<div class='error'>This email is already registered, Please try different email address.</div>";
}elseif($userbyusername  && $userbyemail['_id'] != $userId){
$return .= "<div class='error'>This Username is already registered, Please try different email address.</div>";
}else{
    
$userdata = array(
    "first_name" => $_REQUEST['first_name'],
    "last_name" => $_REQUEST['last_name'],
    "email" => $_REQUEST['email'],
    "username" => $_REQUEST['username'],
    "phone" => $_REQUEST['phone'],
    //"address_1" => $_REQUEST['address_1'],
    //"address_2" => $_REQUEST['address_2'],
    "country" => $_REQUEST['country'],
    "state" => $_REQUEST['state'],
    "city" => $_REQUEST['city'],
    "postal_code" => getLatLongByAdd($_REQUEST['city'],$_REQUEST['state']),
    "emp_position" => $_REQUEST['emp_position'],
    "emp_industry" => $_REQUEST['emp_industry'],
    "emp_company_name" => $_REQUEST['emp_company_name'],
    "updated" => time()   
    
);

$collection->update(
    array('_id' => new MongoId($userId)),
    array('$set' => $userdata)
);



//$item->update($userdata);
if($_REQUEST['password'] !=''){
$collection->update(
    array('_id' => new MongoId($userId)),
    array('$set' => array("password" => md5($_REQUEST['password'])))
);
}  
$return .="true";
}
return $return;
}

////////////////////////////Update Emplyeres Status  ///////////////////////
function adminemployersstatus(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->users;
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
}

////////////////////////////Delete Emplyeres  ///////////////////////
function adminemployersdelete(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->users;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    $collection->remove( array( '_id' => $item['_id'] ) );
}






////////////////////////////Manage Candidates  ///////////////////////

////////////////////////////Get all Candidates  ///////////////////////
function admincandidateslist(){

$collection = $GLOBALS['db']->users;
$query = array('user_type' => 'candidates');
return $adminuser = $collection->find($query);

}

////////////////////////////Add new Candidates  ///////////////////////
function adminaddnewcandidates(){
$collection = $GLOBALS['db']->users;
$userbyemail = $collection->findOne(array('email' => $_REQUEST['email']));
$userbyusername = $collection->findOne(array('username' => $_REQUEST['username']));
$return = '';
if($userbyemail){
$return .=  "<div class='error'>This email is already registered, Please try different email address.</div>";
}elseif($userbyusername){
$return .= "<div class='error'>This Username is already registered, Please try different email address.</div>";
}else{

 
$user = array(
    "user_type" => "candidates",
    "user_role" => "candidates",
    "first_name" => $_REQUEST['first_name'],
    "last_name" => $_REQUEST['last_name'],
    "email" => $_REQUEST['email'],
    "password" => md5($_REQUEST['password']),
    "username" => $_REQUEST['username'],
    "phone" => $_REQUEST['phone'],
    "gender" => $_REQUEST['gender'],
    "dob" => $_REQUEST['dob'],
    "birth_country" => $_REQUEST['birth_country'],
    "birth_state" => $_REQUEST['birth_state'],
    "birth_city" => $_REQUEST['birth_city'],
    "country" => $_REQUEST['country'],
    "livenow_country" => $_REQUEST['livenow_country'],
    "livenow_state" => $_REQUEST['livenow_state'],
    "livenow_city" => $_REQUEST['livenow_city'],
    "postal_code" => getLatLongByAdd($_REQUEST['livenow_city'],$_REQUEST['livenow_state']),
    "major" => $_REQUEST['major'],
    "university_institutes" => $_REQUEST['university_institutes'],
    "graduation_date" => $_REQUEST['graduation_date'],
    "right_now_i_am" => $_REQUEST['right_now_i_am'],
    "cand_job_title" => $_REQUEST['cand_job_title'],
    "educational_level" => $_REQUEST['educational_level'],
    "cand_industry_type" => $_REQUEST['cand_industry_type'],
    "cand_company_name" => $_REQUEST['cand_company_name'],
    "working_since" => $_REQUEST['working_since'],
    "achievments" => $_REQUEST['achievments'],
    "cand_courses" => $_REQUEST['cand_courses'],
    "cand_package" => $_REQUEST['cand_package'],
    "status" => "0",
    "created" => time(),
    "updated" => time()
);

if(isset($_FILES["profile_photo"]["tmp_name"]) && $_FILES["profile_photo"]["tmp_name"]!=''){
 $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
 if($check !== false) {
 $target_dir = "uploads/profiles/";
 $target_file = $target_dir . time().'_'.basename($_FILES["profile_photo"]["name"]);
 
  if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
        $user['profile_photo'] = $target_file;
    } 
    
 }
}

$collection->insert($user);
$return .= "true";
}
return $return;

}


////////////////////////////Get Candidates by id  ///////////////////////
function admingetcandidatesbyid(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->users;
$item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    
$packagescollection = $GLOBALS['db']->packages;
$coursearray = array();
$i=0;
if(isset($item['cand_package']) && $item['cand_package']!=''){
foreach($item['cand_package'] as $package){

$packageitem = $packagescollection->findOne(array(
    '_id' => new MongoId($package)));
$coursearray['packages'][$i]['title'] = $packageitem['title'] ;
$i++;
}
}

$applicationscollection = $GLOBALS['db']->applications;
$applicationsitem['applications'] = $applicationscollection->find(array(
    'user_id' => new MongoId($item['_id'])));

$jobrefferalarray['refferals'] = getallRefferalByUserID($id);
return array_merge($item, $coursearray,$applicationsitem,$jobrefferalarray);
}


////////////////////////////Update Candidates  ///////////////////////
function adminupdatecandidatesbyid(){

$userId = $_REQUEST['id'];
$collection = $GLOBALS['db']->users;
	  $item = $collection->findOne(array(
    '_id' => new MongoId($userId)));
$userbyemail = $collection->findOne(array('email' => $_REQUEST['email']));
$userbyusername = $collection->findOne(array('username' => $_REQUEST['username']));
$return = '';
if($userbyemail  && $userbyemail['_id'] != $userId){
$return .=  "<div class='error'>This email is already registered, Please try different email address.</div>";
}elseif($userbyusername  && $userbyemail['_id'] != $userId){
$return .= "<div class='error'>This Username is already registered, Please try different email address.</div>";
}else{ 



   
$user = array(
    "first_name" => $_REQUEST['first_name'],
    "last_name" => $_REQUEST['last_name'],
    "email" => $_REQUEST['email'],
    "username" => $_REQUEST['username'],
    "phone" => $_REQUEST['phone'],
    "dob" => $_REQUEST['dob'],
    "gender" => $_REQUEST['gender'],
    "birth_country" => $_REQUEST['birth_country'],
    "birth_state" => $_REQUEST['birth_state'],
    "birth_city" => $_REQUEST['birth_city'],
    "country" => $_REQUEST['country'],
    "livenow_country" => $_REQUEST['livenow_country'],
    "livenow_state" => $_REQUEST['livenow_state'],
    "livenow_city" => $_REQUEST['livenow_city'],
    "postal_code" => getLatLongByAdd($_REQUEST['livenow_city'],$_REQUEST['livenow_state']),
    "major" => $_REQUEST['major'],
    "university_institutes" => $_REQUEST['university_institutes'],
    "graduation_date" => $_REQUEST['graduation_date'],
    "right_now_i_am" => $_REQUEST['right_now_i_am'],
    "cand_job_title" => $_REQUEST['cand_job_title'],
    "educational_level" => $_REQUEST['educational_level'],
    "cand_industry_type" => $_REQUEST['cand_industry_type'],
    "cand_company_name" => $_REQUEST['cand_company_name'],
    "working_since" => $_REQUEST['working_since'],
    "achievments" => $_REQUEST['achievments'],
    "cand_courses" => $_REQUEST['cand_courses'],
    "cand_package" => $_REQUEST['cand_package'],
    
    "updated" => time()
);

if(isset($_FILES["profile_photo"]["tmp_name"]) && $_FILES["profile_photo"]["tmp_name"]!=''){
 $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
 if($check !== false) {
 $target_dir = "uploads/profiles/";
 $target_file = $target_dir . time().'_'.basename($_FILES["profile_photo"]["name"]);
 
  if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
        $user['profile_photo'] = $target_file;
    } 
    
 }
}
$collection->update(
    array('_id' => new MongoId($userId)),
    array('$set' => $user)
);
//$item->update($userdata);
if($_REQUEST['password'] !=''){
$collection->update(
    array('_id' => new MongoId($userId)),
    array('$set' => array("password" => md5($_REQUEST['password'])))
);
}  
$return .= "true";
}
return $return;
}


////////////////////////////Update Candidates status  ///////////////////////
function admincandidatesstatus(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->users;
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
}

////////////////////////////Delete Candidates  ///////////////////////
function admincandidatesdelete(){
$id = func_get_arg(0);
    $collection = $GLOBALS['db']->users;
    $item = $collection->findOne(array(
    '_id' => new MongoId($id)));
    $collection->remove( array( '_id' => $item['_id'] ) );
}


////////////////////////////Get job array by employer id  ///////////////////////
function admingetjobsbyemployersid(){
$id = func_get_arg(0);
$collection = $GLOBALS['db']->jobs;
$query = array('user_id' => new MongoId($id));
$joblist = $collection->find($query);

$returnarray = array();
$i=0;
foreach($joblist as $job){

$jccollection = $GLOBALS['db']->job_category;
$category = $jccollection->findOne(array(
    '_id' => new MongoId($job['category_id'])));

$returnarray[$i]['title'] = $job['title'];
$returnarray[$i]['description'] = $job['description'];
$returnarray[$i]['created'] = $job['updated'];
$returnarray[$i]['active_from'] = $job['active_from'];
$returnarray[$i]['status'] = $job['status'];
$returnarray[$i]['category_name'] = $category['title'];
$i++;
}
return $returnarray;

}


 
////////////////////////////common function to update country.city.state,degree and industory///////////////////////
function createnewcountry(){
$country = func_get_arg(0);
$collection = $GLOBALS['db']->countries;
$data = array(
    "title" => $country,
    "status" => "1",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
return 'true';

}

function createnewstate(){
$country = func_get_arg(0);
$states = func_get_arg(1);
$collection = $GLOBALS['db']->states;
$data = array(
    "country" => $country,
    "title" => $states,
    "status" => "1",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
return 'true';

}

function createnewcity(){
$country = func_get_arg(0);
$states = func_get_arg(1);
$citie = func_get_arg(2);

$collection = $GLOBALS['db']->cities;
$data = array(
    "country" => $country,
    "state" => $states,
    "title" => $citie,
    "status" => "1",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
return 'true';

}

function createnewdegrees(){
$degree = func_get_arg(0);
$collection = $GLOBALS['db']->degrees;
$data = array(
    "title" => $degree,
    "status" => "1",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
return 'true';

}

function createnewindustoryty(){
$industry = func_get_arg(0);
$collection = $GLOBALS['db']->industorytypes;
$data = array(
    "title" => $industry,
    "status" => "1",
    "created" => time(),
    "updated" => time()
);
$collection->insert($data);
return 'true';

}
?>