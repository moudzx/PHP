<?php 
include './Model/Tracking.php';
session_start();
$session_name = 'tracking_sess2';
if (!isset($_SESSION[$session_name]))
{
    $tracking = new Tracking();
    $_SESSION[$session_name]=$tracking;
}
else $tracking = $_SESSION[$session_name];
?>