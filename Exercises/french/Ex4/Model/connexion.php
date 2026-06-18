<?php 
$hostname = 'localhost';
$bdd ='sakila';
$username='root';
$password='root';
$con = null;
try {
$con = new PDO("mysql:host=$hostname;dbname=$bdd",$username, $password) ;
//$conn = new PDO("oci:dbname=//$hostname:$port/$service_name", $username, $password);
}
catch (PDOException $e) {
	echo "Error: ".$e->getMessage()."<br/>";
 	die() ;
}
?>