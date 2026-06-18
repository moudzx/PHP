<?php
include 'initSession.php';
if(isset($_POST['submit']))
    $var->addCountry($_POST['name'], $_POST['area'], $_POST['population']);

echo "<h3>Enter a country</h3>";
echo '<form action="addCountry.php" method="post">';
echo 'Country Name: <input type="text" name="name"><br>';
echo 'Area: <input type="number" name="area"><br>';
echo 'Population: <input type="number" name="population"><br>';
echo '<input type="submit" value="Add Country">';
?>