<?php
	include_once '../Function/koneksi.php';
	include_once '../Dao/StudentDao.php';
$studentid = $_GET['studentid'];

$studentdao = new StudentDao();
$studentdao -> delete_student($studentid);
echo $studentid;
header("location: ../index.php?page=StudentDao");
?>