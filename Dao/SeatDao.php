<?php
include_once 'SeatInterface.php';
include_once 'Seat.php';
include_once 'Schedule.php';
include_once 'Studio.php';
include_once 'Movie.php';

class SeatDao implements SeatInterface {

	public function get_all_seat_schedule($id_schedule) {
		$seats = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "
					SELECT se.*, sc.id_schedule AS id_schedule_sc,
					sc.id_movie AS id_movie, sc.id_studio AS id_studio, sc.time AS time,
					st.id_studio AS id_studio, st.namastudio AS namastudio, st.kapasitas AS kapasitas,
					m.id_movie AS id_movie, m.picture AS picture, m.name AS namamovie, m.duration AS duration,
					m.price AS price, m.genre AS genre, m.status AS statusmovie
					FROM seat se
					JOIN schedule sc
					ON se.id_schedule = sc.id_schedule
					JOIN studio st
					ON sc.id_studio = st.id_studio
					JOIN movie m
					ON sc.id_movie = m.id_movie
					WHERE se.id_schedule = ?";
					
			$stmt = $conn -> prepare($query);
			$stmt -> bindParam(1, $id_schedule);
			$stmt -> execute();
			while ($row = $stmt -> fetch()) {
				$seat = new Seat();
				$seat -> setID_Seat($row['id_seat']);
				$seat -> setNo_seat($row['no_seat']);
				$seat -> setStatus($row['status']);
				
				$schedule = new Schedule();
				$schedule->setID_Schedule($row['id_schedule']);
				$schedule->setTime($row['time']);
				
				$studio = new Studio();
				$studio->setID_Studio($row['id_studio']);
				$studio->setKapasitas($row['kapasitas']);
				$studio->getNamastudio($row['namastudio']);
				
				$movie = new Movie();
				$movie->setID_Movie($row['id_movie']);
				$movie->setPicture($row['picture']);
				$movie->setName($row['namamovie']);
				$movie->setDuration($row['duration']);
				$movie->setPrice($row['price']);
				$movie->setGenre($row['genre']);
				$movie->setStatus($row['statusmovie']);
				
				$schedule->setStudio($studio);
				$schedule->setMovie($movie);
				
				$seat->setSchedule($schedule);
				
				$seats -> append($seat);
			}
		} catch (PDOException $e) {
			echo $e -> getMessage();
			die();
		}
		$conn = null;
		return $seats;
	}
	
	public function insert_seat($seat)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "INSERT INTO seat(id_schedule,no_seat,status)  
					VALUES(?,?,?)";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $seat -> getSchedule()->getID_Schedule());
			$stmt -> bindParam(2, $seat -> getNo_seat());
			$stmt -> bindParam(3, $seat -> getStatus());

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
	
	public function update_seat($seat)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "UPDATE seat  
					SET id_schedule = ?,
					no_seat = ?,
					status = ?
					WHERE id_seat = ?";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $seat -> getSchedule()-> getID_Schedule());
			$stmt -> bindParam(2, $seat -> getNo_Seat());
			$stmt -> bindParam(3, $seat -> getStatus());
			$stmt -> bindParam(4, $seat -> getID_Seat());
			
			$result = $stmt -> execute();
			$conn -> commit();
		}
		catch (PDOException $e)
		{
			echo $e -> getMessage();
			$conn -> rollBack();
			die();
		}
		$conn = null;
		return $result;	
	}
	
	public function get_one_seat($idseat)
	{
		$seats = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "
					SELECT se.*, sc.id_schedule AS id_schedule,
					sc.id_movie AS id_movie, sc.id_studio AS id_studio, sc.time AS time,
					st.id_studio AS id_studio, st.namastudio AS namastudio, st.kapasitas AS kapasitas,
					m.id_movie AS id_movie, m.picture AS picture, m.name AS namamovie, m.duration AS duration,
					m.price AS price, m.genre AS genre, m.status AS statusmovie
					FROM seat se
					JOIN schedule sc
					ON se.id_schedule = sc.id_schedule
					JOIN studio st
					ON sc.id_studio = st.id_studio
					JOIN movie m
					ON sc.id_movie = m.id_movie
					WHERE se.id_seat = ?";
					
			$stmt = $conn -> prepare($query);
			$stmt -> bindParam(1, $idseat);
			$seat = new Seat();
			$stmt -> execute();
			
				while ($row = $stmt -> fetch()) {
					
					$seat -> setID_Seat($row['id_seat']);
					$seat -> setNo_seat($row['no_seat']);
					$seat -> setStatus($row['status']);
					
					$schedule = new Schedule();
					$schedule->setID_Schedule($row['id_schedule']);
					$schedule->setTime($row['time']);
					
					$studio = new Studio();
					$studio->setID_Studio($row['id_studio']);
					$studio->setKapasitas($row['kapasitas']);
					$studio->setNamastudio($row['namastudio']);
					
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setPicture($row['picture']);
					$movie->setName($row['namamovie']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['statusmovie']);
					
					$schedule->setStudio($studio);
					$schedule->setMovie($movie);
					
					$seat->setSchedule($schedule);
				
				}
			
		} catch (PDOException $e) {
			echo $e -> getMessage();
			die();
		}
		$conn = null;
		return $seat;
	}
	
}
?>