<?php
include_once 'Transaksi.php';
include_once 'TransaksiInterface.php';
include_once 'User.php';
include_once 'Seat.php';
include_once 'Schedule.php';
include_once 'Studio.php';
include_once 'Movie.php';

class TransaksiDao implements TransaksiInterface {


	public function get_all_transaksi() {
		$transaksis = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT t.*,se.id_seat AS se_id_seat, se.id_schedule AS id_schedule,
						se.no_seat AS no_seat, se.status AS status_seat, 
						u.id_user AS id_user, u.username AS username, u.password AS password, 
						u.name AS nama_user, u.address AS address, u.phone AS phone, u.email AS email,
						u.photos AS photos , u.level AS level,
						sc.id_studio AS id_studio, sc.id_movie AS id_movie, sc.time AS time,
						st.namastudio AS namastudio, st.kapasitas AS kapasitas, 
						m.picture AS picture, m.name AS namamovie, m.duration AS duration,
						m.price AS price, m.genre AS genre, m.status AS status_movie
						FROM transaksi t JOIN user u
						ON t.id_user = u.id_user
					 	JOIN seat se 
						ON t.id_seat = se.id_seat
						JOIN schedule sc
						ON se.id_schedule = sc.id_schedule
						JOIN studio st
						ON sc.id_studio = st.id_studio
						JOIN movie m
						ON sc.id_movie = m.id_movie
						
					 ";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$transaksi = new Transaksi();
					$transaksi->setID_Transaksi($row['idtransaksi']);
					$transaksi->setJumlah($row['jumlah']);
					$transaksi->setTanggal($row['tanggal']);
					
					$user = new User();
					$user->setID_User($row['id_user']);
					$user->setName($row['nama_user']);
					$user->setUsername($row['username']);
					$user->setPassword($row['password']);
					$user->setAddress($row['address']);
					$user->setPhone($row['phone']);
					$user->setEmail($row['email']);
					$user->setPhotos($row['photos']);
					$user->setLevel($row['level']);
					
					$seat = new Seat();
					$seat->setID_Seat($row['id_seat']);
					$seat->setNo_seat($row['no_seat']);
					$seat->setStatus($row['status_seat']);
					
					$schedule = new Schedule();
					$schedule->setID_Schedule($row['id_schedule']);
					$schedule->setTime($row['time']);
					
					$studio = new Studio();
					$studio->setID_Studio($row['id_studio']);
					$studio->setNamastudio($row['namastudio']);
					$studio->setKapasitas($row['kapasitas']);
					
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setName($row['namamovie']);
					$movie->setPicture($row['picture']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status_movie']);
					
					$schedule->setStudio($studio);
					$schedule->setMovie($movie);
					
					$seat->setSchedule($schedule);
					
					$transaksi->setSeat($seat);
					$transaksi->setUser($user);
					
					
					$transaksis->append($transaksi);
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
		return $transaksis;
	}
	
	public function get_all_transaksi_user($iduser) {
		$transaksis = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT t.*,se.id_seat AS se_id_seat, se.id_schedule AS id_schedule,
						se.no_seat AS no_seat, se.status AS status_seat, 
						u.id_user AS id_user, u.username AS username, u.password AS password, 
						u.name AS nama_user, u.address AS address, u.phone AS phone, u.email AS email,
						u.photos AS photos , u.level AS level,
						sc.id_studio AS id_studio, sc.id_movie AS id_movie, sc.time AS time,
						st.namastudio AS namastudio, st.kapasitas AS kapasitas, 
						m.picture AS picture, m.name AS namamovie, m.duration AS duration,
						m.price AS price, m.genre AS genre, m.status AS status_movie
						FROM transaksi t JOIN user u
						ON t.id_user = u.id_user
					 	JOIN seat se 
						ON t.id_seat = se.id_seat
						JOIN schedule sc
						ON se.id_schedule = sc.id_schedule
						JOIN studio st
						ON sc.id_studio = st.id_studio
						JOIN movie m
						ON sc.id_movie = m.id_movie
						WHERE t.id_user = ?
					 ";
			$stmt = $conn -> prepare($query);
			$stmt -> bindParam(1, $iduser);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$transaksi = new Transaksi();
					$transaksi->setID_Transaksi($row['idtransaksi']);
					$transaksi->setJumlah($row['jumlah']);
					$transaksi->setTanggal($row['tanggal']);
					
					$user = new User();
					$user->setID_User($row['id_user']);
					$user->setName($row['nama_user']);
					$user->setUsername($row['username']);
					$user->setPassword($row['password']);
					$user->setAddress($row['address']);
					$user->setPhone($row['phone']);
					$user->setEmail($row['email']);
					$user->setPhotos($row['photos']);
					$user->setLevel($row['level']);
					
					$seat = new Seat();
					$seat->setID_Seat($row['id_seat']);
					$seat->setNo_seat($row['no_seat']);
					$seat->setStatus($row['status_seat']);
					
					$schedule = new Schedule();
					$schedule->setID_Schedule($row['id_schedule']);
					$schedule->setTime($row['time']);
					
					$studio = new Studio();
					$studio->setID_Studio($row['id_studio']);
					$studio->setNamastudio($row['namastudio']);
					$studio->setKapasitas($row['kapasitas']);
					
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setName($row['namamovie']);
					$movie->setPicture($row['picture']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status_movie']);
					
					$schedule->setStudio($studio);
					$schedule->setMovie($movie);
					
					$seat->setSchedule($schedule);
					
					$transaksi->setSeat($seat);
					$transaksi->setUser($user);
					
					
					$transaksis->append($transaksi);
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
		return $transaksis;
	}
	
	
	
	
	public function insert_transaksi($transaksi)
	{
		$result = FALSE;
		try
		{
			$conn = Koneksi::get_connection();
			$sql = "INSERT INTO transaksi(jumlah,tanggal,id_user,id_seat)
					VALUES(?,sysdate(),?,?)";
			$conn -> beginTransaction();
			$stmt = $conn -> prepare($sql);
			$stmt -> bindParam(1, $transaksi->getJumlah());
			//$stmt -> bindParam(2, $transaksi->getTanggal());
			$stmt -> bindParam(2, $transaksi->getUser()->getID_User());
			$stmt -> bindParam(3, $transaksi->getSeat()->getID_Seat());
			

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
	
	
	public function get_one_transaksi($id_transaksi) {
		$transaksis = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "	SELECT t.*,se.id_seat AS se_id_seat, se.id_schedule AS id_schedule,
						se.no_seat AS no_seat, se.status AS status_seat, 
						u.id_user AS id_user, u.username AS username, u.password AS password, 
						u.name AS nama_user, u.address AS address, u.phone AS phone, u.email AS email,
						u.photos AS photos , u.level AS level,
						sc.id_studio AS id_studio, sc.id_movie AS id_movie, sc.time AS time,
						st.namastudio AS namastudio, st.kapasitas AS kapasitas, 
						m.picture AS picture, m.name AS namamovie, m.duration AS duration,
						m.price AS price, m.genre AS genre, m.status AS status_movie
						FROM transaksi t JOIN user u
						ON t.id_user = u.id_user
					 	JOIN seat se 
						ON t.id_seat = se.id_seat
						JOIN schedule sc
						ON se.id_schedule = sc.id_schedule
						JOIN studio st
						ON sc.id_studio = st.id_studio
						JOIN movie m
						ON sc.id_movie = m.id_movie
						WHERE t.idtransaksi = ?
					 ";
			$stmt = $conn -> prepare($query);
			$stmt -> bindParam(1, $id_transaksi);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$transaksi = new Transaksi();
					$transaksi->setID_Transaksi($row['idtransaksi']);
					$transaksi->setJumlah($row['jumlah']);
					$transaksi->setTanggal($row['tanggal']);
					
					$user = new User();
					$user->setID_User($row['id_user']);
					$user->setName($row['nama_user']);
					$user->setUsername($row['username']);
					$user->setPassword($row['password']);
					$user->setAddress($row['address']);
					$user->setPhone($row['phone']);
					$user->setEmail($row['email']);
					$user->setPhotos($row['photos']);
					$user->setLevel($row['level']);
					
					$seat = new Seat();
					$seat->setID_Seat($row['id_seat']);
					$seat->setNo_seat($row['no_seat']);
					$seat->setStatus($row['status_seat']);
					
					$schedule = new Schedule();
					$schedule->setID_Schedule($row['id_schedule']);
					$schedule->setTime($row['time']);
					
					$studio = new Studio();
					$studio->setID_Studio($row['id_studio']);
					$studio->setNamastudio($row['namastudio']);
					$studio->setKapasitas($row['kapasitas']);
					
					$movie = new Movie();
					$movie->setID_Movie($row['id_movie']);
					$movie->setName($row['namamovie']);
					$movie->setPicture($row['picture']);
					$movie->setDuration($row['duration']);
					$movie->setPrice($row['price']);
					$movie->setGenre($row['genre']);
					$movie->setStatus($row['status_movie']);
					
					$schedule->setStudio($studio);
					$schedule->setMovie($movie);
					
					$seat->setSchedule($schedule);
					
					$transaksi->setSeat($seat);
					$transaksi->setUser($user);
					
					
					$transaksis->append($transaksi);
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
		return $transaksi;
	}
}
?>