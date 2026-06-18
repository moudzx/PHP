<?php
session_start();
include "initSesssion.php";
if(isset($_POST['submit']))
    if(!empty($_POST['speciality'])){
        $_SESSION['speciality']=serialize($_POST['speciality']);
        header('Location: displayBooks.php');}
    else echo "Select at least one!";

echo "<h3>Choose Speciality</h3>";
$arr = $idk->getAllSpecialities();
echo "<table>";
foreach($arr as $s){
echo "<tr>";
echo "<td><input type='checkbox' name='speciality[]' value='".$s->s_code."'></td>";
echo "<td>".$s->s_name."</td>";
echo "</tr>";
}
echo "</table>";
echo "<input type='submit' value='Display Books' name='submit'>";
?>