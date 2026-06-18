<?php
include "controller.php";
$cities=$oop->getAllCities();
echo "<table border='1'><tr><th>One Week</th>";
foreach($cities as $city) echo "<th>".$city->name."</th>";
echo "</tr><tr><th>Total</th>";
foreach($cities as $city){
    echo "<td>".$oop->getTotalInfections($city->name)."</td>";
}
echo "</tr>";
echo "</table>";
echo "<br><a href='main.html'>Go home</a>";
?>