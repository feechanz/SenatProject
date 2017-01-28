<?php
class Movie {
	private $id_movie;
	private $picture;
	private $picture2;
	private $name;
	private $duration;
	private $price;
	private $genre;
	private $status;
	private $sinopsis;

	public function setID_Movie($id_movie) {
		$this -> id_movie = $id_movie;
	}
	public function getID_Movie() {
		return $this -> id_movie;
	}
	public function setPicture($picture) {
		$this -> picture = $picture;
	}
	public function getPicture() {
		return $this -> picture;
	}
	
	public function setPicture2($picture2) {
		$this -> picture2 = $picture2;
	}
	public function getPicture2() {
		return $this -> picture2;
	}
	
	public function setName($name) {
		$this -> name = $name;
	}
	public function getName() {
		return $this -> name;
	}
	public function setDuration($duration) {
		$this -> duration = $duration;
	}
	
	public function getDuration() {
		return $this -> duration;
	}
	
	public function setPrice($price) {
		$this -> price = $price;
	}
	public function getPrice() {
		return $this -> price;
	}
	public function setGenre($genre) {
		$this -> genre = $genre;
	}
	public function getGenre() {
		return $this -> genre;
	}
	public function setStatus($status) {
		$this -> status = $status;
	}
	public function getStatus() {
		return $this -> status;
	}
	
	public function setSinopsis($sinopsis) {
		$this -> sinopsis = $sinopsis;
	}
	public function getSinopsis() {
		return $this -> sinopsis;
	}
}
?>