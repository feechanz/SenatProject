<?php
interface AccountInterface {
	public function get_all_account();
	public function insert_account($account);
	public function update_account($account);
	public function get_one_account($username, $password);
}
?>