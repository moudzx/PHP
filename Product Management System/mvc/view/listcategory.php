<?php
include("../controller/initSession.php");

$categories = $productL->getAllCategories();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Categories List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Categories List</h2>
        <table class="table table-bordered">
            <tr>
                <th>Categories</th>
            </tr>
            <?php foreach($categories as $v) { ?>
            <tr>
                <?php echo "<td><a href='displayproducts.php?name=".$v->name."'>".$v->name."</a></td>"; ?>

            </tr>
            <?php } ?>
        </table>
        <a href="menu.php" class="btn btn-secondary">Back</a>
    </div>
</body>
</html>
