<?php
include 'init_session.php';
if ($tracking->trackingActive())
    $tracking->add_track('librairie');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Librairie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h2 {
            color: #8b4513;
        }

        ul {
            line-height: 1.8;
        }

        a {
            color: #8b4513;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Produits de Librairie</h2>
    <ul>
        <li>Roman : *Le Petit Prince* — Antoine de Saint-Exupéry</li>
        <li>Bible illustrée pour enfants</li>
        <li>Cahier à spirale 200 pages</li>
        <li>Stylo plume Parker</li>
        <li>Agenda scolaire 2025</li>
    </ul>
    <p><a href="ex4.php">⬅ Retour à la page principale</a></p>
</body>

</html>