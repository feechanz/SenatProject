<?php
include_once 'Book.php';
include_once 'Category.php';
include_once 'BookInterface.php';

class BookDao implements BookInterface {


	public function get_all_book() {
		$books = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT b.*, c.id AS cat_id, c.name AS cat_name 
						FROM book b JOIN category c ON b.category_id = c.id";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$book = new Book();
					$book->setIsbn($row['isbn']);
					$book->setTitle($row['title']);
					$book->setAuthor($row['author']);
					$book->setPublisher($row['publisher']);
					$book->setPublishYear($row['publisher_year']);
					$book->setCover($row['cover']);
					$category = new Category();
					$category->setId($row['cat_id']);
					$category->setName($row['cat_name']);
					$book->setCategory($category);
					$books->append($book);
				}
			}
		} catch (PDOException $e) {
			echo $e -> getMessage();
			die();
		}
		try {
			if (!empty($conn) || $conn != null) {
				$conn = null;
			}
		} catch (PDOException $e) {
			echo $e -> getMessage();
		}
		return $books;
	}

		
	public function delete_book($isbn) {
		$result = FALSE;
		try {
			$conn = Koneksi::get_connection();
			$sql = "DELETE FROM book WHERE isbn = ?";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $isbn);			
			$result = $stmt -> execute();
			$conn -> commit();
		} catch (PDOException $e) {
			echo $e -> getMessage();
			$conn -> rollBack();
			die();
		}
		$conn = null;
		return $result;
	}
	
	public function update_book_cover($book) {
		$result = FALSE;
		try {
			$conn = Koneksi::get_connection();
			$sql = "UPDATE book  
					SET title = ?,
					author = ?,
					publisher = ?,
					publish_year = ?,
					cover = ?,
					category_id = ?
					WHERE isbn = ?";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $book -> getTitle());
			$stmt -> bindParam(2, $book -> getAuthor());
			$stmt -> bindParam(3, $book -> getPublisher());
			$stmt -> bindParam(4, $book -> getPublishYear());
			$stmt -> bindParam(5, $book -> getCover());
			$stmt -> bindParam(6, $book -> getCategory() -> getId());
			$stmt -> bindParam(7, $book -> getIsbn());
			
			$result = $stmt -> execute();
			$conn -> commit();
		} catch (PDOException $e) {
			echo $e -> getMessage();
			$conn -> rollBack();
			die();
		}
		$conn = null;
		return $result;	
	}
	
	public function update_book_cover2($isbn, $title, $author, $publisher, $publisheryear, $cover, $category) {
		$result = FALSE;
		try {
			$conn = Koneksi::get_connection();
			$sql = "UPDATE book  
					SET title = ?,
					author = ?,
					publisher = ?,
					publish_year = ?,
					cover = ?,
					category_id = ?
					WHERE isbn = ?";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $title);
			$stmt -> bindParam(2, $author);
			$stmt -> bindParam(3, $publisher);
			$stmt -> bindParam(4, $publishYear);
			$stmt -> bindParam(5, $cover);
			$stmt -> bindParam(6, $category);
			$stmt -> bindParam(7, $isbn);
			
			$result = $stmt -> execute();
			$conn -> commit();
		} catch (PDOException $e) {
			echo $e -> getMessage();
			$conn -> rollBack();
			die();
		}
		$conn = null;
		return $result;	
	}
	
	public function update_book($book) {
		$result = FALSE;
		try {
			$conn = Koneksi::get_connection();
			$sql = "UPDATE book  
					SET title = ?,
					author = ?,
					publisher = ?,
					publisher_year = ?,
					category_id = ?
					WHERE isbn = ?";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $book -> getTitle());
			$stmt -> bindParam(2, $book -> getAuthor());
			$stmt -> bindParam(3, $book -> getPublisher());
			$stmt -> bindParam(4, $book -> getPublishYear());
			$stmt -> bindParam(5, $book -> getCategory() -> getId());
			$stmt -> bindParam(6, $book -> getIsbn());
			
			$result = $stmt -> execute();
			$conn -> commit();
		} catch (PDOException $e) {
			echo $e -> getMessage();
			$conn -> rollBack();
			die();
		}
		$conn = null;
		return $result;	
	}
	
	public function get_one_book($isbn) {
		try {
			$conn = Koneksi::get_connection();
			$sql = "SELECT * FROM book b 
                    JOIN category c ON b.category_id = c.id 
                    WHERE isbn = ?";
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $isbn);
			$result = $stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$cat = new Category();
					$cat -> setId($row['id']);
                    $cat -> setName($row['name']);
					$buku = new Book();
					$buku -> setIsbn($row['isbn']);
                    $buku -> setTitle($row['title']);
                    $buku -> setAuthor($row['author']);
                    $buku -> setPublisher($row['publisher']);
                    $buku -> setPublishYear($row['publisher_year']);
                    $buku -> setCover($row['cover']);
                    
					$buku -> setCategory($cat);
				}
			}
		} catch (PDOException $e) {
			echo $e -> getMessage();
			die();
		}
		$conn = null;
		return $buku;
	}

}
?>