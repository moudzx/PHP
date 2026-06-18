<?php
include 'initSession.php';
if (isset($_POST['main'])) header('Location: main.php');

if (isset($_POST['submit'])){
    if(!empty($_POST['s_code'] && !empty($_POST['s_name'])))
        $idk->addNewSpecialty($_POST['s_code'],$_POST['s_name']);
    else echo "All Values are required!";}
    
echo "<h3>Add Specialty</h3>";
echo "Specialty Code: <input type='text' name='s_code'><br><br>";
echo "Specialty Name: <input type='text' name='s_name'><br><br>";
echo "<input type='submit' value='Add' name='submit'>";
echo "<input type='submit' value='Main Menu name='main'>";
?>