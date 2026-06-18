<?php
include "initSession.php";
if(isset($_POST['submit']))
    $oop->addStudent($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <form action="" method="post">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" required><br><br>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br><br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br><br>
        <input type="submit" name="submit" value="Add Student">
    </form>
</body>
</html>