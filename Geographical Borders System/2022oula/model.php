<?php
function ConnectDB() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=borders', 'root', '');
        return $pdo;
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }}

function addCountry($name, $area, $population) {
    $pdo = ConnectDB();
    $stmt = $pdo->prepare("INSERT INTO countries (name, area, population) VALUES (:name, :area, :population)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':area', $area);
    $stmt->bindParam(':population', $population);
    $stmt->execute();
    $pdo = null;
}

function getAllCountries() {
    $pdo = ConnectDB();
    $stmt = $pdo->query("SELECT * FROM countries");
    $stmt->execute();
    $countries = [];
    while ($row = $stmt->fetch()) {
        $countries[] = new Country($row['name'], $row['area'], $row['population']);
    }
    $pdo = null;
    return $countries;
}

function addBorder($borders) {
    $pdo = ConnectDB();
    foreach ($borders as $country => $a) {
        foreach ($a as $country2) {
            $stmt = $pdo->prepare("INSERT INTO borders (country, border_country) VALUES (:country, :border_country)");
            $stmt->bindParam(':country', $country);
            $stmt->bindParam(':border_country', $country2);
            $stmt->execute();
        }
    }
    $pdo = null;
}

function hasBorder($country1, $country2) {
    $pdo = ConnectDB();
    $stmt = $pdo->prepare("SELECT * FROM borders WHERE country = :country1 AND border_country = :country2");
    $stmt->bindParam(':country1', $country1);
    $stmt->bindParam(':country2', $country2);
    $stmt->execute();
    $pdo = null;
    return $stmt->fetch()? true : false;
}

?>