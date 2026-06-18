<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    <title>Actors</title>
</head>

<body>
<?php
include 'connexion.php';

for ($i = ord('A'); $i <= ord('Z'); $i++) {
    $lettre = chr($i);
    echo '<a href="?index_letter=' . $lettre . '">' . $lettre . '</a> ';
}

$letter = isset($_GET['index_letter']) ? $_GET['index_letter'] : 'A';

$statement = $con->prepare("
    SELECT actor_id, first_name, last_name
    FROM actor
    WHERE last_name LIKE :letter
    ORDER BY last_name, first_name
");
$statement->bindValue(":letter", $letter . '%');
$statement->execute();

$actors_list = $statement->fetchAll(PDO::FETCH_ASSOC);

echo '<table border="1">';
foreach ($actors_list as $actor) {
    $id = $actor['actor_id'];
    $name = $actor['first_name'] . ' ' . $actor['last_name'];
    echo '<tr><td>';
    echo '<a href="films.php?actorId=' . $id . '&actorName=' . urlencode($name) . '">';
    echo htmlspecialchars($name);
    echo '</a>';
    echo '</td></tr>';
}
echo '</table>';
?>
</body>
</html>