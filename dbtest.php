<?php

$url ='http://maps.googleapis.com/maps/api/geocode/json?address=Mohali&sensor=false';
$result = file_get_contents($url);
echo "<pre>";
$array = json_decode($result, true);
print_r(json_decode($array, true));

echo "raman-------------<br>";
echo $array['results']['0']['geometry']['location']['lat'];
echo "raman-------------<br>";
echo $array['results']['0']['geometry']['location']['lng'];
  
?>
