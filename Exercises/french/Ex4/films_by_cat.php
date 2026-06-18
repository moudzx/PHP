<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form>
        <select name="category_id">
            <?php
            include 'Model/dao.php';

            foreach (getAllCategories() as $category) { ?>
                <option value="<?= $category->getId() ?>"> <?= $category->getName() ?></option>
            <?php }
            ?>
        </select>
        <input type="submit" name="submit" value="Search">
    </form>

    <?php
    if (!isset($_REQUEST['submit']))
        die;
    $films = getFilmsByCategory($_REQUEST['category_id']);
    ?>
    <table>
        <tr>
            <td>Title</td>
            <td>Description</td>
        </tr>
        <?php
        foreach($films as $film)
        {
            echo "<tr><td>{$film->getTitle()}</td><td>{$film->getDescription()}</td></tr>";
        }
        ?>
    </table>

</body>

</html>