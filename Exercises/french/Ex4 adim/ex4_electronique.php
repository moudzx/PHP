<?php
include 'init_session.php';
if ($tracking->trackingActive())
    $tracking->add_track('electronique');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Électronique</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h2 {
            color: #1a73e8;
        }

        ul {
            line-height: 1.8;
        }

        a {
            color: #1a73e8;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Produits Électroniques</h2>
    <ul>
        <li>Ordinateur portable HP 15"</li>
        <li>Smartphone Samsung Galaxy A35</li>
        <li>Écouteurs Bluetooth Sony WF-1000XM5</li>
        <li>Montre connectée Apple Watch SE</li>
        <li>Caméra numérique Canon PowerShot G7X</li>
    </ul>
    <p><a href="ex4.php">⬅ Retour à la page principale</a></p>
</body>

</html>