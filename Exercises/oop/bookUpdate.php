<?
include("initSession.php");
if (isset($_GET['id'])){
	$value = $bookL->getBookById($_GET['id']);
}
?>

<!DOCTYPE html>
<html>
<body>
	<h2>Update a book</h2>
	<form method="post" action="books.php">
	<p>
        <label for="id">Id:</label>
       <input type="text" name="id" value="<?echo $value->id;?>">
    </p>
	<p>
        <label for="name">Title:</label>
        <input type="text" name="title" value="<?echo $value->title;?>">
    </p>
	<p>
        <label for="category">Image:</label>
        <input type="text" name="image" value="<?echo $value->image;?>">
    </p>
	
	<p>
	<input type="submit" name="update" value="Update">
	</p>
	</form>
</body>
</html>