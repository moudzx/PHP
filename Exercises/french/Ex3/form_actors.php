<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form>
        <table>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
            </tr>
            <?php
            $nb_acteurs = isset($_GET['nb_acteurs']) ? $_GET['nb_acteurs'] : 3;

            for ($i = 0; $i < $nb_acteurs; $i++) {
                echo '<tr>';
                echo '<td><input type="text" name="firstName[]"></td>';
                echo '<td><input type="text" name="lastName[]"></td>';
                echo '</tr>';
            }
            ?>
        </table>
        <input type="submit" name="submit" value="add">
    </form>

    <?php
    if (!isset($_REQUEST['submit']))
        die;
    include 'connexion.php';

    try {
        $statement = $con->prepare("insert into actor (first_name, last_name) values (:firstName , :lastName) ");

        $firstNames = $_REQUEST['firstName'];
        $lastNames = $_REQUEST['lastName'];

        for ($i = 0; $i < count($firstNames); $i++) {
            $statement->bindValue(":firstName", $firstNames[$i]);
            $statement->bindValue(":lastName", $lastNames[$i]);
            $statement->execute();
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    ?>

</body>

</html>