<?php
class Seat {
	private $id_seat;
	private $schedule;
	private $no_seat;
	private $status;
	
	public function setID_Seat($id_seat) {
		$this -> id_seat = $id_seat;
	}
	public function getID_Seat() {
		return $this -> id_seat;
	}
	
	public function setSchedule($schedule) {
		$this -> schedule = $schedule;
	}
	public function getSchedule() {
		return $this -> schedule;
	}
	
	public function setNo_seat($no_seat) {
		$this -> no_seat = $no_seat;
	}
	public function getNo_seat() {
		return $this -> no_seat;
	}
	
	public function setStatus($status) {
		$this->status=$status;
	}
	public function getStatus() {
		return $this -> status;
	}
	
}
?>