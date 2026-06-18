<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>   
     <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    include 'connexion.php';
    if (isset($_REQUEST['actorId']) && isset($_REQUEST['actorName'])) {
        $actor_id = $_REQUEST['actorId'];
        $actor_name=$_REQUEST['actorName'];
    } else {
        echo "pas d'acteur specifie";
        die;
    }
    $query = "select film.title, film.description from film ";
    $query .= "inner join film_actor on film.film_id=film_actor.film_id ";
    $query .= "inner join actor on film_actor.actor_id = actor.actor_id ";
    $query .= " where actor.actor_id=:actorId";
    $stat = $con->prepare($query);
    $stat->bindValue(':actorId', $actor_id);
    $stat->execute();
    $film_lines = $stat->fetchAll(PDO::FETCH_ASSOC);
    if (!$film_lines) {
        echo 'pas de films trouves';
    } else {
        echo "<h2>$actor_name</h2>";
        echo '<table border="1">';
        foreach ($film_lines as $film_line) {
            echo "<tr>";
            echo "<td>{$film_line['title']}</td>";
            echo "<td>{$film_line['description']}</td>";
            echo "</tr>";
        }
        echo '</table>';
    }
    ?>
</body>

</html>