<!DOCTYPE html>
<html>

<body>
    <?php

    $students = array("Ali", "Samir", "Houda", "Toufik");
    echo "<form method='post' action='sup2.php'>";
    echo "<table>";
    echo '<tr><td>date:</td><td><input type="date" name="date"></td></tr>';

    foreach ($students as $value) {
        echo '<tr><td>' . $value . '</td><td><input type="checkbox" name="stud[]" value=' . $value . ' "></td></tr>'; // deymn bl checkbox iza bde estrjae kza maelume bde hton bi array w hdda bde deymn bde esm l student aw yalli hd l checkbox
    }
    echo "</table>";
    echo '<input type="submit" name="submit" value="Valid">';
    echo "</form>";
    ?>
</body>

</html>