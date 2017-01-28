<?php
	include_once '../Function/koneksi.php';
	include_once '../Dao/UserDao.php';
$iduser = $_GET['id_user'];

$userdao = new UserDao();
$userdao -> delete_user($iduser);
header("location: ../index.php?page=UserDao");
?>