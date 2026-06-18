<?php
include "controller.php";
$cityName=$_GET['city'];
$weekdays=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
echo "<h2>Infection in ".$cityName."</h2>";
echo "<table border='1'><tr>";
foreach($weekdays as $day) echo "<td>".$day."</td>";
echo "</tr><tr>";
foreach($weekdays as $day){
echo "<td>".$oop->getInfections($cityName,$day)."</td>";
}
echo "</table>";
echo "<br><a href='chooseCity.php'>Choose another city</a>";
?>
