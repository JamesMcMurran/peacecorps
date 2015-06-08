<?php
ini_set('display_errors',1);  error_reporting(E_ALL);

/*
      "Country": "Archenland",
      "City": "",
      "region": "",
      "province":"",
      "Issued":"1433609674",
      "level":"Travel through airport and by bus for work only",
      "current":"Yes",
      "reason":"Recent Flooding",
      "reasonLong":"River Winding Arrow, a large bordering river that runs West to East, recently flooded portions of Archenland. Flash floods and dangerous conditions are currently still being reported",
      "lat":"-40.44452",
      "lng":"-64.17245",
      
      
      "Date": "1433609674"*/



include '.././include/db.php';

$query = "SELECT * FROM `Alerts`";

//execute the query. 

$result = $mysqli->query($query); 
 
//display information: 

$stingOut = '';
while($row = mysqli_fetch_array($result,(MYSQLI_ASSOC))) {
  if(!empty($row["Issued"]))  {
    $stingOut .= json_encode ($row) . ',';  
  }
  

}
echo '{
  "Locations": [
    '.rtrim($stingOut, ",").'
  ],
  "Date": "'.time().'"
}';

?> 