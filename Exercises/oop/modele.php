
<?php

function dbConnect(){

$username ='root';
$password ='root';

//connect to database
try{
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=book', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $pdo;
	} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
	}
	
}

function deleteBook($id){
	
	$pdo = dbConnect();
	
	
	// Attempt delete query execution
	//1er method to execute a query
		try{
	
			$sql = 'DELETE FROM book WHERE id='.$id;  
			$pdo->query($sql);
		//	echo "<br>Records were deleted successfully.";
		} catch(PDOException $e){
			die("ERROR: Could not able to execute $sql. " . $e->getMessage());
		}
	
	$pdo=null;
	//2nd method to execute a query
	/*$param_id=$_GET["id"];
	try{
	
		$sql = "DELETE FROM student WHERE id=:id";  
		$res = $pdo->prepare($sql);
		$res->bindParam(":id", $param_id);
		$res->execute();
		
		} catch(PDOException $e){
		die("ERROR: Could not able to execute $sql. " . $e->getMessage());
	}*/
}

function updateBook($post){

	$pdo = dbConnect();
			
	try{
			// Prepare an update statement
		$sql = "UPDATE book SET title=:title, image=:image WHERE id=:id";
 
		$stmt = $pdo->prepare($sql);
        // Bind variables to the prepared statement as parameters
       	$stmt->bindParam(":id", $post["id"]);
		$stmt->bindParam(":title", $post["title"]);
        $stmt->bindParam(":image", $post["image"]);
        			
		$stmt->execute();
		} catch(PDOException $e){
		die("ERROR: Could not able to execute $sql. " . $e->getMessage());
		}
	$pdo=null;
}

function addBook($post){
	
	$pdo = dbConnect();
	
	//Attemp insert query execution
	try{
		$sql = "INSERT INTO book (id,title, image) VALUES (:id,:title, :image)";    
		
		$stmt = $pdo->prepare($sql);
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":id", $_POST["id"]);
			$stmt->bindParam(":title", $post["title"]);
            $stmt->bindParam(":image", $post["image"]);
            
            
			$stmt->execute();
			} catch(PDOException $e){
		die("ERROR: Could not able to execute $sql. " . $e->getMessage());
			}
	$pdo=null;
}

function getAllBook(){
	
	$pdo = dbConnect();
		
	// Attempt select query execution
		
		$sql = "SELECT * FROM book";   
		$result = $pdo->query($sql);
		
		$books = [];
        while($row = $result->fetch()){
			$book = new book($row['id'],$row['title'],$row['image']); 
			$books[] = $book;	 
        }
        $pdo=null;
		return $books;
}
function getBookById($id){
	
	$pdo = dbConnect();
		
	// Attempt select query execution
		
		$sql = "SELECT * FROM book where id = :id";   
		$result = $pdo->prepare($sql);
		$result->bindParam(":id", $id);
		$result->execute();
		$row = $result->fetch();
            
        $book = new book($row['id'],$row['title'],$row['image']);
		$pdo=null;	
		
		return $book;
}


?>
</body>
</html>