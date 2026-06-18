<?php
$courses=array("web programming"=>array("ali abbas", "fadi khaled", "roula dahdah"),
"C programming"=>array("ali abbas", "fadi khaled"),
"database"=>array("ali abbas", "houda fadi", "sami hajj"));

echo "<table>";
foreach ($courses as $key=>$value){
	echo "<tr><td>".$key."</td><td><button><a href='student.php?course=$key'/>display students</button></td></tr>";
}
echo "</table>";



?>