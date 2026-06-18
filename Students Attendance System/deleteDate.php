<?php
include "initSession.php";
$dates = $oop->getAllDates();
if (isset($_GET['date'])){
$oop->deleteSheet($_GET['date']);
}

echo "<h2>Delete Date</h2>";
echo "<table border='1'>";
foreach($dates as $date){
echo "<tr><td>" . $date . "</td>";
echo "<td><a href='deleteDate.php?date=" . $date . "'>Delete</a></td></tr>";
}

?>