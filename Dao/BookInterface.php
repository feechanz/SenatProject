<?php
interface BookInterface {

	public function get_all_book();
	//public function insert_book($book);
	//public function delete_book($isbn);
	//public function update_book_cover($book);
	public function update_book($book);
	public function get_one_book($isbn);
}
?>