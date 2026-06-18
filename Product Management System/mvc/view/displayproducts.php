<?php
include("../controller/initSession.php");

$products = [];

if (isset($_GET['name'])) {
    $products = $productL->getProductsByCategory($_GET['name']);
}

if (isset($_GET['code'])) {
    $productL->deleteProduct($_GET['code']);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Products Found</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Products Found</h2>
        <table class="table table-bordered">
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
            </tr>
            <?php foreach($products as $v) { ?>
            <tr>
                <td><?php echo $v->code; ?></td>
                <td><?php echo $v->name; ?></td>
                <td><?php echo $v->price; ?>$</td>
                <td><?php echo $v->category; ?></td>
                <td><?php echo $v->description; ?></td>
                <td><a href="displayproducts.php?code=<?php echo $v->code; ?>">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        <a href="listcategory.php" class="btn btn-secondary">Back</a>
    </div>
</body>
</html>
