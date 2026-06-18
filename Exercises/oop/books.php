<?php

include("initSession.php");

// Add a book
if (isset($_POST['add'])){
	
	if (!empty($_POST['id'])&& !empty($_POST['title']) && !empty($_POST['image'])){
		$bookL->addBook($_POST);
	}	
}	

//Delete a book
if (isset($_GET['id'])){
	$bookL->deleteBook($_GET['id']);
} 

//Update a book
if (isset($_POST['update'])){
	$bookL->updateBook($_POST);
}
//display books
$listB = $bookL->getAllBook();
?>
<html>
<head>
	<title>Books</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
<h2><center>Books Management</center></h2>
<a href="book.php" class="btn btn-success pull-right"> Add New book</a>
<?

	echo '<table border=1 class="table table-hover">';
	echo "<tr><td>Id</td><td>Title</td><td>Image</td><td></td></tr>";
	
	foreach($listB as $value)
	{
		echo "<tr><td>".$value->id."</td><td>".$value->title."</td><td>".$value->image."</td><td><a href='bookUpdate.php?id=". $value->id ."' class='mr-3'><span class='fa fa-eye'></span></a><a href='books.php?id=".$value->id."'><span class='fa fa-trash'></span></a></td></tr>";
	
	}
	echo "</table>";
?>
</body>

</html>