<?php
class Student {
	private $studentid;
	private $name;
	private $email;

	public function setStudentID($studentid) {
		$this -> studentid = $studentid;
	}
	public function getStudentID() {
		return $this -> studentid;
	}
	public function setName($name) {
		$this -> name = $name;
	}
	public function getName() {
		return $this -> name;
	}
	public function setEmail($email) {
		$this -> email = $email;
	}
	public function getEmail() {
		return $this -> email;
	}
}
?>