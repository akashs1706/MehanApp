<?php
session_start();
if(isset($_SESSION["userid"]) && $_SESSION["userid"]!=''){ /// check if user id logged in
require('includes/functions.php');

$list = admingetstatebycountry($_GET['countryId']);
$statename = $_GET['state'];
$cityname = $_GET['city'];
?>

  <select name="<?php echo $statename;?>" class="form-control"  onChange="updatecitylist(this.value,'<?php echo $cityname;?>')">
  <option value="">Select District</option>
  <?php foreach($list as $state){ ?>
  <option value="<?php echo $state['title'];?>"><?php echo $state['title'];?></option>
  <?php } ?>
  </select>

<?php } ?>

									