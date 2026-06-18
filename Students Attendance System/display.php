<?php
include "initSession.php";
$dates = $oop->getAllDates();
$students = $oop->getAllStudents();

echo "<h2>Display Sheets</h2>";
echo "<table border='1'>";
echo "<tr><th>Attendence</th>";
foreach($dates as $date){
    echo "<th>Sheet<br>" . $date . "</th>";
}
echo "<th>Attendence %</th></tr>";
foreach($students as $s){
    echo "<tr><td>" . $s->first_name . " " . $s->last_name . "</td>";
    $attended = 0;
    foreach($dates as $date){
        if($oop->isAttending($date, $s->student_id)){
            echo "<td>X</td>";
            $attended++;
        } else {
            echo "<td> </td>";
        }
    }
    $percentage = (count($dates) > 0) ? ($attended / count($dates)) * 100 : 0;
    echo "<td>" . $percentage . "%</td></tr>";
}