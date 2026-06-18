<?php

require("initsession.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_POST['submit'])){
        $cont->assign($_POST['assign']);
    }
    ?>

  <form action='' method='POST'>
    <table border='1'>
        <?php 
        $courses = $cont->getcourses();
        $students = $cont->getstudents();
        ?>
        <tr> 
            <td> </td>
            <?php
            foreach($courses as $course){
                echo "<td>".$course->name."</td>";
            }
            ?>
        </tr>
        <?php
        foreach ($students as $stu){
            echo"<tr>";
            echo "<td>".$stu->fname."</td>";
            foreach ($courses as $course){
                echo "<td>";
                echo "<input type='checkbox' name='assign[".$stu->stuId."][]' value='".$course->code."'/>";
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <input type='submit' value='submit' name='submit' />
  </form>  
   <button> <a href='menu.php'> Back </a> </button>
</body>
</html>