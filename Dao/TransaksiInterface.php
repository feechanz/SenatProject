<?php
interface TransaksiInterface {

	public function get_all_transaksi();
	public function get_all_transaksi_user($iduser);
	public function insert_transaksi($schedule);
	public function get_one_transaksi($id_transaksi);
	//public function update_schedule($schedule);
}
?>