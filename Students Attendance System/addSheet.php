<?php
include "initSession.php";
$students=$oop->getAllStudents();

if (isset ($_POST['submit'])){
    $oop->addSheet($_POST['date'],$_POST['students']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sheet</title>
</head>
<body>
    <form action="" method="post">
        <label for="date">Date:</label>
        <input type="date" name="date"><br><br>
        <?php 
        foreach($students as $s)
        echo "<input type='checkbox' name='students[]' value='" . $s->student_id . "'>" . $s->first_name . " " . $s->last_name . "<br>";
        echo '<input type="submit" name="submit" value="Add Sheet">';
        ?> 
        
    </form>
</body>
</html>