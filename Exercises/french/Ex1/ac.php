<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'connexion.php';

$stat = $con->prepare( "SELECT * FROM  actor order by first_name ASC");

$stat->execute();
$actor_lines = $stat->fetchAll(PDO::FETCH_ASSOC);

echo '<table border="1">';

foreach($actor_lines as $actor_line)
{
    echo '<tr><td><a href="films.php?actorId=';
    echo $actor_line['actor_id'].'&actorName='.$actor_line['first_name'].' '.$actor_line['last_name'];
    echo '"'."</a>{$actor_line['first_name']} {$actor_line['last_name']}</td></tr>";
}


?>
</table>
</body>
</html>