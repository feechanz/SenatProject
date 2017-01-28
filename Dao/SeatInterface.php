<?php
interface SeatInterface
{
	public function get_all_seat_schedule($id_schedule);
	public function insert_seat($seat);
	public function update_seat($seat);
	public function get_one_seat($id_seat);
}
?>