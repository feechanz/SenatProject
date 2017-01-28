<?php
include_once 'CategoryInterface.php';
include_once 'Category.php';

class CategoryDao implements CategoryInterface {

	public function get_all_cat() {
		$categories = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "SELECT * FROM category ORDER BY name ASC";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			while ($row = $stmt -> fetch()) {
				$category = new Category();
				$category -> setId($row['id']);
				$category -> setName($row['name']);
				
				$categories -> append($category);
			}
		} catch (PDOException $e) {
			echo $e -> getMessage();
			die();
		}
		$conn = null;
		return $categories;
	}
	

}
?>