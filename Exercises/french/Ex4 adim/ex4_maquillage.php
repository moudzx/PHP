<?php
include 'init_session.php';
if ($tracking->trackingActive())
    $tracking->add_track('maquillage');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Maquillage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h2 {
            color: #e91e63;
        }

        ul {
            line-height: 1.8;
        }

        a {
            color: #e91e63;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h2>Produits de Maquillage</h2>
    <ul>
        <li>Rouge à lèvres Maybelline SuperStay</li>
        <li>Fond de teint L’Oréal True Match</li>
        <li>Palette d’ombres à paupières NYX</li>
        <li>Mascara waterproof Essence</li>
        <li>Pinceaux de maquillage Real Techniques</li>
    </ul>
    <p><a href="ex4.php">⬅ Retour à la page principale</a></p>
</body>

</html>