<?php
include 'initSession.php';
$countries = $var->getAllCountries();
echo "<h3>Display Borders</h3>";
echo "<table>";
echo "<tr><td></td>";
foreach ($countries as $country) {
    echo "<th>" . $country->name . "</th>";
}
echo "</tr>";
foreach ($countries as $country) {
    echo "<tr>";
    echo "<th>" . $country->name . "</th>";
    foreach ($countries as $country2) {
        if ($country->name == $country2->name) {
            echo "<td>0</td>";
        } else {
            if ($var->hasBorder($country->name, $country2->name)) {
                echo "<th>1</th>";
            } else {
                echo "<td>0</td>";
            }
        }
    }
    echo "</tr>";
}
echo "</table>";
?>