<?php
include 'connexion.php';
include 'category.php';
include 'film.php';


function getAllCategories()
{
    global $con;
    $categories = [];
    if ($con == null)
        return $categories;
    try {
        $statement = $con->prepare("select category_id, name from category ");
        $statement->execute();
        $categoriesArr = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categoriesArr as $actegorieElem) {
            $categorieObj = new Category($actegorieElem['category_id'], $actegorieElem['name']);
            $categories[] = $categorieObj;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $categories;
}

function getFilmsByCategory($category_id)
{
    global $con;
    $films = [];
    if ($con == null)
        return $films;

    try {
        $sql_str = "SELECT film.film_id, title, description FROM film inner join film_category 
	            on film.film_id = film_category.film_id 
                where category_id= :category_id;";
        $statement = $con->prepare($sql_str);
        $statement->bindValue(":category_id", $category_id);
        $statement->execute();
        $film_list = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($film_list as $film) {
            $film = new Film($film['film_id'], $film['title'], $film['description']);
            $films[] = $film;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $films;
}
