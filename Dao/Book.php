<?php
class Book {
	private $isbn;
	private $title;
	private $author;
	private $publisher;
	private $cover;
	private $publishYear;
	private $category;

	public function setIsbn($isbn) {
		$this -> isbn = $isbn;
	}
	public function getIsbn() {
		return $this -> isbn;
	}
	public function setTitle($title) {
		$this -> title = $title;
	}
	public function getTitle() {
		return $this -> title;
	}
	public function setAuthor($author) {
		$this -> author = $author;
	}
	public function getAuthor() {
		return $this -> author;
	}
	public function setPublisher($publisher) {
		$this -> publisher = $publisher;
	}
	
	public function getPublisher() {
		return $this -> publisher;
	}
	public function setCover($cover) {
		$this -> cover = $cover;
	}
	public function getCover() {
		return $this -> cover;
	}
	public function setPublishYear($publishYear) {
		$this -> publishYear = $publishYear;
	}
	public function getPublishYear() {
		return $this -> publishYear;
	}
	public function setCategory($category) {
		$this -> category = $category;
	}
	public function getCategory() {
		return $this -> category;
	}
}
?>