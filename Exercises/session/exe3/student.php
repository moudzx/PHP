<?php
session_start();

$courses=array("web programming"=>array("ali abbas", "fadi khaled", "roula dahdah"),
"C programming"=>array("ali abbas", "fadi khaled"),
"database"=>array("ali abbas", "houda fadi", "sami hajj"));

echo "<form method='POST' action='student.php'>";
if (isset($_GET['course'])) {
	$stud = $_GET['course'];
	$_SESSION['course'] = $stud;
	echo "<table>";
	foreach( $courses[$stud] as $value ){
		echo "<tr><td>".$value."</td><td><input type='text' name='grade[$value]'></td></tr>";
	}
	echo "</table>";
	echo "<input type='submit' name='submit' value='Valid'>";
	echo "</form>";
}
if (isset($_POST['submit'])){
	$cours = $_SESSION['course'];
	$courses[$cours]=$_POST['grade'];
	
	print_r($courses);

}
?>
	
	
	
	
	
	
	
