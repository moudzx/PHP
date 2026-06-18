<?php
require ("initsession.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> view Assigned students </h1>
    <?php
    $courses = $cont->getcourses();
    ?>
    <form action='' method='POST'>
        <label> choose course <select name='code'> </label>
        <?php
        foreach($courses as $course){
            echo "<option value='".$course->code."'>".$course->name." </option>";
        }
        ?>
        </select>
    </br>
        <input type='submit' value='submit' name ='submit' /> 
    </form>
    </br>
    <?php
    if (isset($_POST['submit'])){
        $students = $cont->getstuofcourse($_POST['code']);
        echo "<h2> Students of course ".$_POST['code']." are: </h2>";
        echo "<table border='1'>";
        foreach ($students as $stu){
            echo "<tr> <td>".$stu->fname."</td> </tr>";
        }
        echo "</table>";
    }
    ?>
       <button> <a href='menu.php'> Back </a> </button>
</body>
</html>