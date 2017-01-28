<?php
class Studio {
	private $id_studio;
	private $namastudio;
	private $kapasitas;
	
	public function setID_Studio($id_studio) {
		$this -> id_studio = $id_studio;
	}
	public function getID_Studio() {
		return $this -> id_studio;
	}
	
	public function setNamastudio($namastudio) {
		$this -> namastudio = $namastudio;
	}
	public function getNamastudio() {
		return $this -> namastudio;
	}
	
	public function setKapasitas($kapasitas) {
		$this -> kapasitas = $kapasitas;
	}
	public function getKapasitas() {
		return $this -> kapasitas;
	}
}
?>