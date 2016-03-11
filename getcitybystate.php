<?php
session_start();
if(isset($_SESSION["userid"]) && $_SESSION["userid"]!=''){ /// check if user id logged in
require('includes/functions.php');

$list = admingetcitybystate($_GET['stateId']);
$inputname = $_GET['city'];
?>

  <select name="<?php echo $inputname;?>" class="form-control">
  <option value="">Select City</option>
  <?php foreach($list as $city){ ?>
  <option value="<?php echo $city['title'];?>"><?php echo $city['title'];?></option>
  <?php } ?>
  </select>
<?php } ?>									
									