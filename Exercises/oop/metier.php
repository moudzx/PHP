<?php
include("modele.php");
 class Book{
	public $id;
	public $title;
	public $image;
				
	public function __construct($id, $title, $image)
	{
		$this->id = $id ;
		$this->title = $title;
		$this->image = $image;
	}
}

class Books{
	
	
	public function addBook($post)
	{
		addBook($post);
	}
	
	public function updateBook($post)
	{
		updateBook($post);
	}
	
	public function deleteBook($id)
	{
		deleteBook($id);
	}
	
	public function getBookById($id)
	{	
		$book = getBookById($id);
		return $book;
	}
	
	public function getAllBook()
	{
		$listB = getAllBook();
		return $listB;
	}
	
}
?>