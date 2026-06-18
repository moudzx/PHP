<?php
session_start();

$courses = array(
	"C1:Web programming" => array("Ali Abbas", "Fadi Khaled", "Roula Dahdah"),
	"C2:C programming" => array("Ali Abbas", "Fadi Khaled"),
	"C3:Database" => array("Ali Abbas", "Houda Fadi", "Sami Hajj")
);

echo "<form method='POST' action='student.php'>";
if (isset($_GET['course'])) { // when we come from courses.php
	$stud = $_GET['course']; // course name
	$_SESSION['course'] = $stud; // store the course name in session variable to use it after submitting the form bcause we will lose the GET variable because of POST method
	echo "<table>";
	foreach ($courses[$stud] as $value) { // $value is the student name
		echo "<tr><td>" . $value . "</td><td><input type='text' name='grade[$value]'></td></tr>"; //$value here is the key of the grade array
	}
	echo "</table>";
	echo "<input type='submit' name='submit' value='Valid'>";
	echo "</form>";
}
if (isset($_POST['submit'])) {
	$cours = $_SESSION['course'];   	// retrieve the course name from session variable
	// now we have the course name in $cours and the grades in $_POST['grade'] associative array
	// we can combine them to have the desired result
	$courses[$cours] = $_POST['grade']; // update the course with the grades ie student name as key and grade as value 

	print_r($courses);
}


