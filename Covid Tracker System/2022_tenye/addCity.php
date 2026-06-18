<?php
include "controller.php";

if(isset($_POST['back'])) header("Location: main.html");
if(isset($_POST['add'])) $oop->addCity($_POST['name']);
?>

<html>
    <body>
        <form method="post" action="">
            City Name: <input type="text" name="name" required><br><br>
            <input type="submit" name="add" value="Add City">
            <input type="submit" name="back" value="Go home">
        </form>
    </body>
</html>