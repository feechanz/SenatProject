<?php
include_once 'Movie.php';
include_once 'MovieInterface.php';

class MovieDao implements MovieInterface {


	public function get_all_movie() {
		$movies = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT *
						FROM movie";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setPicture($row['picture']);
					$movie->setPicture2($row['picture2']);
					$movie->setName($row['name']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status']);
					$movie->setSinopsis($row['sinopsis']);
					$movies->append($movie);
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
		return $movies;
	}
	
	public function get_commingsoon_movie() {
		$movies = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT *
						FROM movie
						WHERE status = 2";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setPicture($row['picture']);
					$movie->setPicture2($row['picture2']);
					$movie->setName($row['name']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status']);
					$movie->setSinopsis($row['sinopsis']);
					$movies->append($movie);
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
		return $movies;
	}
	
	public function get_active_movie() {
		$movies = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT *
						FROM movie
						WHERE status = 1";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setPicture($row['picture']);
					$movie->setPicture2($row['picture2']);
					$movie->setName($row['name']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status']);
					$movie->setSinopsis($row['sinopsis']);
					$movies->append($movie);
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
		return $movies;
	}
	
	public function update_movie($movie) {
		$result = FALSE;
		try {
			$conn = Koneksi::get_connection();
			$sql = "UPDATE movie  
					SET picture = ?,
					name = ?,
					duration = ?,
					price = ?,
					genre = ?,
					status = ?,
					picture2 = ?,
					sinopsis =?
					WHERE id_movie = ?";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $movie -> getPicture());
			$stmt -> bindParam(2, $movie -> getName());
			$stmt -> bindParam(3, $movie -> getDuration());
			$stmt -> bindParam(4, $movie -> getPrice());
			$stmt -> bindParam(5, $movie -> getGenre());
			$stmt -> bindParam(6, $movie -> getStatus());
			$stmt -> bindParam(7, $movie -> getPicture2());
			$stmt -> bindParam(8, $movie -> getSinopsis());
			$stmt -> bindParam(9, $movie -> getID_Movie());
			
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
	
	public function get_one_movie($id_movie) {
		try {
			$conn = Koneksi::get_connection();
			$sql = "SELECT * FROM movie
                    WHERE id_movie = ?";
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $id_movie);
			$result = $stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					
					$movie = new Movie();
					$movie -> setID_Movie($row['id_movie']);
                    $movie -> setPicture($row['picture']);
					$movie -> setPicture2($row['picture2']);
                    $movie -> setName($row['name']);
                    $movie -> setDuration($row['duration']);
                    $movie -> setPrice($row['price']);
                    $movie -> setGenre($row['genre']);
                    $movie -> setStatus($row['status']);
					$movie -> setSinopsis($row['sinopsis']);
				}
			}
		} catch (PDOException $e) {
			echo $e -> getMessage();
			die();
		}
		$conn = null;
		return $movie;
	}
	
	public function insert_movie($movie)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "INSERT INTO movie(picture,name,duration,price,genre,status,picture2,sinopsis)
					VALUES(?,?,?,?,?,?,?,?)";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $movie -> getPicture());
			$stmt -> bindParam(2, $movie -> getName());
			$stmt -> bindParam(3, $movie -> getDuration());
			$stmt -> bindParam(4, $movie -> getPrice());
			$stmt -> bindParam(5, $movie -> getGenre());
			$stmt -> bindParam(6, $movie -> getStatus());
			$stmt -> bindParam(7, $movie -> getPicture2());
			$stmt -> bindParam(8, $movie -> getSinopsis());

			$result = $stmt -> execute();
			$conn -> commit();
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
			$stmt -> rollBack();
			die();
		}
		try
		{
			if(!empty($conn) || $conn != null)
			{
				$conn = null;
			}
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
		}
		return $result;	
	}

}
?>