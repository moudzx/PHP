<!DOCTYPE html>
<html>

<body>
    <?php
    session_start();
    $students = array("Ali", "Samir", "Houda", "Toufik");
    $some = $_SESSION["hh"];
    if (isset($_POST["submit"])) {
        $dat = $_POST["date"];
        $attendance = $_POST["stud"];
        $some[$dat] = $attendance;
        // print_r($some);
        $count = 0;
        echo "<table border='1'>";
        foreach ($some as $dat => $attendance) {
            $per = (count($attendance) / count($students)) * 100;
            echo "<tr><td>" . $dat . "</td><td>" . $per . "%</td></tr>";
        }
        echo "</table>";
        foreach ($students as $val) { // iza bl session bde estaeml l i bde zdla charac.. bs hon mfi de3i
            $i = 0;
            foreach ($some as $value) {
                if (in_array($val, $value)) $i++;
            }
            echo $val . " attendance Total:" . $i . "<br>";
        }
        $_SESSION["hh"] = $some;
    }
    ?>
</body>

</html>