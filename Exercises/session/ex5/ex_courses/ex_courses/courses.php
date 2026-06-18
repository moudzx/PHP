<?php
$courses = array(
	"C1:Web programming" => array("Ali Abbas", "Fadi Khaled", "Roula Dahdah"),
	"C2:C programming" => array("Ali Abbas", "Fadi Khaled"),
	"C3:Database" => array("Ali Abbas", "Houda Fadi", "Sami Hajj")
);

echo "<table>";
foreach ($courses as $key => $value) {
	echo "<tr><td>" . $key . "</td><td><button><a href='student.php?course=$key'/>Display Students</button></td></tr>";
	// here we use GET to send the course name to student.php 
}
echo "</table>";
