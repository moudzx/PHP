<?php
include("../controller/initSession.php");

if (isset($_POST['addProduct'])) {
    $productL->addProduct($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Add Product</h2>
        <form method="post" action="addproduct.php">
            <div class="form-group">
                <label>Code</label>
                <input type="text" name="code" class="form-control">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control">
            </div>
            <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
            <a href="menu.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
