<?php
include "controller.php";
$weekdays=["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
echo "<form method='post' action=''>";
echo "<table border='0'>";
$cities=$oop->getAllCities();

echo "<tr>";
echo "<th>Infections Nb.</th>";
foreach($weekdays as $day) echo "<th>".$day."</th>";
echo "</tr>";

foreach($cities as $city){
    echo "<tr>";
    echo "<td>".$city->name."</td>";
    foreach($weekdays as $day){
        echo "<td><input type='number' name='inf[".$city->name."][".$day."]'
        value='".$oop->getInfections($city->name,$day)."'></td>";
    }
    echo "</tr>";
}

echo "</table><br>";
echo "<input type='submit' name='add' value='Add Infections'>";
echo "<input type='submit' name='back' value='Go home'>";
echo "</form>";
if(isset($_POST['back'])) header("Location: main.html");
if(isset($_POST['add'])) $oop->addInfection($_POST['inf']);
?>
