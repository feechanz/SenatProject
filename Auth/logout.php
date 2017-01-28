<?php

	session_start();
	session_destroy();
	//header("location:login.php");
	$_SESSION['isLogin'] = false;
	header("location:index.php")
	
?>