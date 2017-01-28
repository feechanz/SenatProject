<?php
include_once 'Schedule.php';
include_once 'Studio.php';
include_once 'Movie.php';
include_once 'ScheduleInterface.php';

class ScheduleDao implements ScheduleInterface {


	public function get_all_schedule() {
		$schedules = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT sc.*, s.id_studio AS id_studio, s.namastudio AS namastudio, s.kapasitas AS kapasitas,
						 m.id_movie AS id_movie, m.picture AS picture, m.name AS name, m.duration AS duration,
						 m.price AS price, m.genre AS genre, m.status AS status
						FROM schedule sc JOIN studio s ON sc.id_studio = s.id_studio
						JOIN movie m ON sc.id_movie = m.id_movie";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$schedule = new Schedule();
					$schedule->setID_Schedule($row['id_schedule']);
					$schedule->setTime($row['time']);
					
					$studio = new Studio();
					$studio->setID_Studio($row['id_studio']);
					$studio->setNamastudio($row['namastudio']);
					$studio->setKapasitas($row['kapasitas']);
					
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setPicture($row['picture']);
					$movie->setName($row['name']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status']);
					
					$schedule->setStudio($studio);
					$schedule->setMovie($movie);
					$schedules->append($schedule);
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
		return $schedules;
	}
	
	public function get_all_schedule_available() {
		$schedules = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT sc.*, s.id_studio AS id_studio, s.namastudio AS namastudio, s.kapasitas AS kapasitas,
						 m.id_movie AS id_movie, m.picture AS picture, m.name AS name, m.duration AS duration,
						 m.price AS price, m.genre AS genre, m.status AS status
						FROM schedule sc JOIN studio s ON sc.id_studio = s.id_studio
						JOIN movie m ON sc.id_movie = m.id_movie
						WHERE sc.time >= sysdate()";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$schedule = new Schedule();
					$schedule->setID_Schedule($row['id_schedule']);
					$schedule->setTime($row['time']);
					
					$studio = new Studio();
					$studio->setID_Studio($row['id_studio']);
					$studio->setNamastudio($row['namastudio']);
					$studio->setKapasitas($row['kapasitas']);
					
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setPicture($row['picture']);
					$movie->setName($row['name']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status']);
					
					$schedule->setStudio($studio);
					$schedule->setMovie($movie);
					$schedules->append($schedule);
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
		return $schedules;
	}
		
	public function get_schedule_movie($id_movie) {
		$schedules = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT sc.*, s.id_studio AS id_studio, s.namastudio AS namastudio, s.kapasitas AS kapasitas,
						 m.id_movie AS id_movie, m.picture AS picture, m.name AS name, m.duration AS duration,
						 m.price AS price, m.genre AS genre, m.status AS status
						FROM schedule sc JOIN studio s ON sc.id_studio = s.id_studio
						JOIN movie m ON sc.id_movie = m.id_movie
						WHERE sc.time >= sysdate() AND
						m.id_movie = ?";
			$stmt = $conn -> prepare($query);
			$stmt -> bindParam(1, $id_movie);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$schedule = new Schedule();
					$schedule->setID_Schedule($row['id_schedule']);
					$schedule->setTime($row['time']);
					
					$studio = new Studio();
					$studio->setID_Studio($row['id_studio']);
					$studio->setNamastudio($row['namastudio']);
					$studio->setKapasitas($row['kapasitas']);
					
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setPicture($row['picture']);
					$movie->setName($row['name']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status']);
					
					$schedule->setStudio($studio);
					$schedule->setMovie($movie);
					$schedules->append($schedule);
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
		return $schedules;
	}
	
	public function get_schedule_new($schedulenew) {
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT sc.*, s.id_studio AS id_studio, s.namastudio AS namastudio, s.kapasitas AS kapasitas,
						 m.id_movie AS id_movie, m.picture AS picture, m.name AS name, m.duration AS duration,
						 m.price AS price, m.genre AS genre, m.status AS status
						FROM schedule sc JOIN studio s ON sc.id_studio = s.id_studio
						JOIN movie m ON sc.id_movie = m.id_movie
						WHERE sc.id_studio = ? AND sc.id_movie = ? AND sc.time = ?";
			$stmt = $conn -> prepare($query);
			$stmt -> bindParam(1, $schedulenew->getStudio()->getID_Studio());
			$stmt -> bindParam(2, $schedulenew->getMovie()->getID_Movie());
			$stmt -> bindParam(3, $schedulenew->getTime());
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$schedule = new Schedule();
					$schedule->setID_Schedule($row['id_schedule']);
					$schedule->setTime($row['time']);
					
					$studio = new Studio();
					$studio->setID_Studio($row['id_studio']);
					$studio->setNamastudio($row['namastudio']);
					$studio->setKapasitas($row['kapasitas']);
					
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setPicture($row['picture']);
					$movie->setName($row['name']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status']);
					
					$schedule->setStudio($studio);
					$schedule->setMovie($movie);
					
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
		return $schedule;
	}
	
	public function insert_schedule($schedule)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "INSERT INTO schedule(id_studio,id_movie,time)
					VALUES(?,?,?)";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $schedule -> getStudio()->getID_Studio());
			$stmt -> bindParam(2, $schedule -> getMovie()->getID_Movie());
			$stmt -> bindParam(3, $schedule -> getTime());
			
			

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
	
	
	
	public function update_schedule($schedule)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "UPDATE schedule
					SET id_studio = ?,id_movie = ?,time = ?
					WHERE id_schedule = ?";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $schedule -> getStudio()->getID_Studio());
			$stmt -> bindParam(2, $schedule -> getMovie()->getID_Movie());
			$stmt -> bindParam(3, $schedule -> getTime());
			$stmt -> bindParam(4, $schedule -> getID_Schedule());

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
	
	public function get_one_schedule($id_schedule) {
		$schedules = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT sc.*, s.id_studio AS id_studio, s.namastudio AS namastudio, s.kapasitas AS kapasitas,
						 m.id_movie AS id_movie, m.picture AS picture, m.name AS name, m.duration AS duration,
						 m.price AS price, m.genre AS genre, m.status AS status
						FROM schedule sc JOIN studio s ON sc.id_studio = s.id_studio
						JOIN movie m ON sc.id_movie = m.id_movie
						WHERE sc.id_schedule = ?";
			$stmt = $conn -> prepare($query);
			$stmt -> bindParam(1, $id_schedule);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$schedule = new Schedule();
					$schedule->setID_Schedule($row['id_schedule']);
					$schedule->setTime($row['time']);
					
					$studio = new Studio();
					$studio->setID_Studio($row['id_studio']);
					$studio->setNamastudio($row['namastudio']);
					$studio->setKapasitas($row['kapasitas']);
					
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setPicture($row['picture']);
					$movie->setName($row['name']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status']);
					
					$schedule->setStudio($studio);
					$schedule->setMovie($movie);
					$schedules->append($schedule);
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
		return $schedule;
	}
}
?>