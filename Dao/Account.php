<?php
class Account
{
	private $accountid;
	private $username;
	private $password;
	private $name;
	private $nrp;
	private $email;
	private $status;

	public function setAccountid($accountid) {
		$this -> accountid = $accountid;
	}
	public function getAccountid() {
		return $this -> accountid;
	}
	public function setUsername($username) {
		$this -> username = $username;
	}
	public function getUsername() {
		return $this -> username;
	}
	public function setPassword($password) {
		$this -> password = $password;
	}
	public function getPassword() {
		return $this -> password;
	}
	public function setName($name) {
		$this -> name = $name;
	}
	public function getName() {
		return $this -> name;
	}
	public function setNrp($nrp) {
		$this -> nrp = $nrp;
	}
	public function getNrp() {
		return $this -> nrp;
	}
	public function setEmail($email) {
		$this -> email = $email;
	}
	public function getEmail() {
		return $this -> email;
	}
	public function setStatus($status) {
		$this -> status = $status;
	}
	public function getStatus() {
		return $this -> status;
	}
}
?>