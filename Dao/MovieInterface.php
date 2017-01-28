<?php
interface MovieInterface
{
	public function get_all_movie();
	public function get_active_movie();
	public function get_commingsoon_movie();
	public function insert_movie($movie);
	public function update_movie($movie);
	public function get_one_movie($id_movie);
}
?>