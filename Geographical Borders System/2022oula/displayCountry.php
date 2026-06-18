<?php
$countries = $var->getAllCountries();
echo "Choose country : <form method='post' action='displayCountry.php'>";
echo "<select name='country'>";
foreach ($countries as $country) {
    echo "<option value='" . $country->name . "'>" . $country->name . "</option>";
}
echo "</select>";
echo "<input type='submit' value='Affiche' name='submit'>";
echo "</form>";

if(isset($_POST['submit'])) {
echo "<br><br>";
echo "<h3>fiche de pays: ".$_POST['country']."</h3>";

foreach ($countries as $country) {
    if ($country->name == $_POST['country']) {
    $selectedCountry = $country;    
    break;
    }
}

echo "Area: ".$selectedCountry->area ."(km2)<br>";
echo "Population: " . $selectedCountry->population . "millions<br>";
echo "Borders with: ";
foreach ($countries as $c2) {
if($var->hasBorder($selectedCountry->name,$c2->name)) {
echo $c2->name.", ";
        }
    }
}
?>