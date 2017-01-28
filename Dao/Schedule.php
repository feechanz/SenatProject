<?php
class Schedule {
	private $id_schedule;
	private $studio;
	private $movie;
	private $time;
	
	public function setID_Schedule($id_schedule) {
		$this -> id_schedule = $id_schedule;
	}
	public function getID_Schedule() {
		return $this -> id_schedule;
	}
	
	public function setStudio($studio) {
		$this -> studio = $studio;
	}
	public function getStudio() {
		return $this -> studio;
	}
	
	public function setMovie($movie) {
		$this -> movie = $movie;
	}
	public function getMovie() {
		return $this -> movie;
	}
	
	public function setTime($time) {
		$this -> time = $time;
	}
	public function getTime() {
		return $this -> time;
	}
}
?>