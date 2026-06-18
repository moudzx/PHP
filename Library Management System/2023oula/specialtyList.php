<?php
include "initSession.php";
echo "<h3>List of Specialities</h3>";
$arr=$idk->getAllSpecialities();
echo "<table>";
foreach($arr as $s){
echo "<tr>";
echo "<td>".$s->s_name."</td>";
echo "<td><a href='addBook.php?code='".$s->s_code."':name='".$s->s_name."'>Add Books</a></td>";
echo "</tr>";
}
echo "</table>";
?>