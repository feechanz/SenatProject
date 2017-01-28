<?php
include_once 'StudioInterface.php';
include_once 'Studio.php';

class StudioDao implements StudioInterface {

	public function get_all_studio() {
		$studios = new ArrayObject();
		try {
			$conn = Koneksi::get_connection();
			$query = "SELECT * FROM studio";
			$stmt = $conn -> prepare($query);
			$stmt -> execute();
			while ($row = $stmt -> fetch()) {
				$studio = new Studio();
				$studio -> setID_Studio($row['id_studio']);
				$studio -> setNamastudio($row['namastudio']);
				$studio -> setKapasitas($row['kapasitas']);
				
				$studios -> append($studio);
			}
		} catch (PDOException $e) {
			echo $e -> getMessage();
			die();
		}
		$conn = null;
		return $studios;
	}
	
	public function get_one_studio($id_studio) {
		
		try {
			$conn = Koneksi::get_connection();
			$query = "SELECT * FROM studio
					 WHERE id_studio = ?";
			$stmt = $conn -> prepare($query);
			$stmt -> bindParam(1, $id_studio);
			$stmt -> execute();
			if ($stmt -> rowCount() > 0) {
				while ($row = $stmt -> fetch()) {
					$studio = new Studio();
					$studio -> setID_Studio($row['id_studio']);
					$studio -> setNamastudio($row['namastudio']);
					$studio -> setKapasitas($row['kapasitas']);
				}
			}
		} catch (PDOException $e) {
			echo $e -> getMessage();
			die();
		}
		$conn = null;
		return $studio;
	}
}
?>