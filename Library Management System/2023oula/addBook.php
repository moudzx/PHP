<?php
include "initSession.php";
if(isset($_GET['code']) && isset($_GET['name'])){
echo "<h3>Speciality : ".$_GET['name']."</h3>";
echo "ISBN: <input type='number' name='ISBN'><br>";
echo "Title: <input name='title'><br>";
echo "Author: <input name='author'><br>";
echo "<input type='submit' value='Add Book' name='submit'>";
echo "<input type='submit' value='Main Menu' name='main'";


if(isset($_POST['main'])) header('Location: main.php');
if(isset($_POST['submit'])){
    if (!empty($_POST['ISBN']) && !empty($_POST['title']) && !empty($_POST['author']))
        $idk->addNewBook($_POST['ISBN'],$_POST['title'],$_POST['author'],$_GET['code']);
    else echo "All values are required!";
}}
?>