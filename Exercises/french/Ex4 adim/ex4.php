<?php
include 'init_session.php';

$cookie_question = !$tracking->questionPosee();

if (isset($_REQUEST['reponse'])) {
    if ($_REQUEST['reponse'] == 'accepter')
        $tracking->activerTracking();

    $tracking->poserQuestion();
    $cookie_question = false;
}

$categorie_principale = $tracking->calcul_tracking();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Categorie principale</title>
    <style>
        .box {
            border: 3px solid black;
            padding: 10px;
            width: 400px;
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-top: 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-family: Arial, sans-serif;
            margin: 5px;
            border: none;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="box">
        <h2>Categorie principale:<?= $categorie_principale ?></h2>
        <ul>
            <li><a href="ex4_electronique.php">Electronique</a></li>
            <li><a href="ex4_librairie.php">Librairie</a></li>
            <li><a href="ex4_maquillage.php">Maquillage</a></li>
        </ul>
    </div>

    <?php
    if ($cookie_question) {
    ?>
        <a href="ex4.php?reponse=accepter" class="btn">Accepter Cookies</a>
        <a href="ex4.php?reponse=refuser" class="btn">Refuser Cookies</a>
    <?php } ?>
</body>

</html>