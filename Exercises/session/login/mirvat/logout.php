<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Instead of: $_SESSION = array();
//unset($_SESSION["loggedin"]);
//unset($_SESSION["currentUsername"]);
// Keep the user accounts intact!

session_destroy();

// Redirect to login page
header("location: login.php");
exit
?>