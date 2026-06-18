<?php
include_once ('metier.php');
//session_start();

/*if (!isset($_SESSION['listBook']))
    $_SESSION['listBook'] = new Books();
$bookL = $_SESSION['listBook'];*/
if(!isset($bookL))
	$bookL = new Books();
?>