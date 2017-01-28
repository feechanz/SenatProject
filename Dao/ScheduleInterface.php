<?php
interface ScheduleInterface {

	public function get_all_schedule();
	public function get_all_schedule_available();
	public function get_schedule_movie($id_movie);
	public function insert_schedule($schedule);
	public function get_schedule_new($schedulenew);
	public function get_one_schedule($id_schedule);
	public function update_schedule($schedule);
}
?>