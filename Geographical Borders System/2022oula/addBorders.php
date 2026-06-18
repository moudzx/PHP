<?php
include 'initSession.php';
$countries=$var->getAllCountries();
if(isset($_POST['submit']))
    $var->addBorder($_POST['borders']);

echo "<h3>Definition des frontiers</h3>";
echo '<form action="addBorders.php" method="post">';
echo "<table>";
foreach($countries as $country){
echo "<tr>";
echo "<td>".$country->name." has borders with: </td>";
foreach($countries as $country2){
    if($country->name != $country2->name){
        echo "<td><input type='checkbox' name='borders[".$country->name."][]' value='".$country2->name."'>".$country2->name."</td>";
    }
}
echo "</tr>";
}
?>