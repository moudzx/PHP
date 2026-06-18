<?php

function dbConnect() {
    $username = 'root';
    $password = 'root';

    try {
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=catalog', $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }
}

function addProduct($post) {
    $pdo = dbConnect();

    try {
        $sql = "INSERT INTO product (code, name, category, description, price) VALUES (:code, :name, :category, :description, :price)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":code", $post["code"]);
        $stmt->bindParam(":name", $post["name"]);
        $stmt->bindParam(":category", $post["category"]);
        $stmt->bindParam(":description", $post["description"]);
        $stmt->bindParam(":price", $post["price"]);
        $stmt->execute();
    } catch(PDOException $e) {
        die("ERROR: Could not execute. " . $e->getMessage());
    }

    $pdo = null;
}

function deleteproduct($code){
    $pdo = dbConnect();
    try {
        $sql="delete from product where code= :code";
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(":code", $code);
        $stmt->execute();
    }
    catch(PDOException $e) {
        die("ERROR: Could not execute. " . $e->getMessage());
    }
    $pdo=null;
}



function getAllCategories() {
    $pdo = dbConnect();

    $sql = "SELECT * FROM category";
    $result = $pdo->query($sql);

    $categories = [];
    while ($row = $result->fetch()) {
        $category = new Category($row['id'], $row['name']);
        $categories[] = $category;
    }

    $pdo = null;
    return $categories;
}

function getProductsByCategory($category) {
    $pdo = dbConnect();

    $sql = "SELECT * FROM product WHERE category = :category";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":category", $category);
    $stmt->execute();

    $products = [];
    while ($row = $stmt->fetch()) {
        $product = new Product($row['code'], $row['name'], $row['category'], $row['description'], $row['price']);
        $products[] = $product;
    }

    $pdo = null;
    return $products;
}
?>
