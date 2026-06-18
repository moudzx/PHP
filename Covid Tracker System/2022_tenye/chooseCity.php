<?php
include "controller.php";
echo "<h2>Choose a city</h2>";
$cities=$oop->getAllCities();
foreach($cities as $city){
    echo "<a href='displayCity.php?city=".$city->name."'>".$city->name."</a><br>";
}
echo "<br><a href='main.html'>Go home</a>";
?>