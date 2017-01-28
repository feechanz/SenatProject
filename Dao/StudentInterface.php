<?php
interface StudentInterface {

	public function get_all_student();
	public function insert_student($student);
	public function delete_student($studentid);
	public function update_student($student);
	public function get_one_student($studentid);
	
}
?>