<?php
include("../model/model.php");

class Category {
    public $id;
    public $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}

class Product {
    public $code;
    public $name;
    public $category;
    public $description;
    public $price;

    public function __construct($code, $name, $category, $description, $price) {
        $this->code = $code;
        $this->name = $name;
        $this->category = $category;
        $this->description = $description;
        $this->price = $price;
    }
}

class Products {

    public function addProduct($post) {
        addProduct($post);
    }

    public function deleteproduct($code){
        deleteproduct($code);
    }

    public function getAllCategories() {
        $categories = getAllCategories();
        return $categories;
    }

    public function getProductsByCategory($category) {
        $products = getProductsByCategory($category);
        return $products;
    }
}
?>
