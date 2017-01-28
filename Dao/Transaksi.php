<?php
class Transaksi {
	private $id_transaksi;
	private $jumlah;
	private $tanggal;
	private $user;
	private $seat;
	
	public function setID_Transaksi($id_transaksi) {
		$this -> id_transaksi = $id_transaksi;
	}
	public function getID_Transaksi() {
		return $this -> id_transaksi;
	}
	
	public function setJumlah($jumlah) {
		$this -> jumlah = $jumlah;
	}
	public function getJumlah() {
		return $this -> jumlah;
	}
	
	public function setTanggal($tanggal) {
		$this -> tanggal = $tanggal;
	}
	public function getTanggal() {
		return $this -> tanggal;
	}
	
	public function setUser($user) {
		$this -> user = $user;
	}
	public function getUser() {
		return $this -> user;
	}
	
	public function setSeat($seat) {
		$this -> seat = $seat;
	}
	public function getSeat() {
		return $this -> seat;
	}
}
?>