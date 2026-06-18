<?php
session_start();
include "initSession.php";

if(isset($_SESSION['speciality'])){
    if(!isset($_GET['page'])){
        header("Location:displayBooks.php?page=1");}
        
    else{
    $page=$_GET['page'];
    $s=unserialize($_SESSION['speciality']);
    $books=$idk->getBooks($s);
    $start=10*($page-1);
    $currentBooks=array_slice($books,$start,10);
    
    echo "<h3>Displaying Books</h3>";
    echo "<table>";
    echo "<tr>";
    echo "<td>Title<td><td>ISBN</td><td>Author</td><td>Speciality</td>";
    echo "</tr>";
    foreach($currentBooks as $book){
        echo "<tr>";
        echo "<td>".$book->title."</td><td>".$book->ISBN."</td><td>".$book->author."</td><td>".$book->s_code."</td>";
        echo "</tr>";
        }
    echo "</table>";
    echo "<br><br>";
    
    echo "pages => ";
    $count=count($books);
    $pages=ceil($count/10);
    for($i=1;$i<=$pages;$i++){
        if($i==$page) echo "<strong>".$i." </strong>";
        else echo "<a href='displayBooks?page=".$i.">".$i." </a>";
    }
    
    }

}
?>