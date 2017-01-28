<?php

if(!isset($_SESSION['isLogin']))
{
	$_SESSION['isLogin']=false;
}

if($_SESSION['isLogin'])
{
	if($_SESSION['status'] == 5)
	{
		$menu = array(
		"Home |" => "Index",
		"Setting Acara |" => "Movie",
		"Setting Pengumuman |" => "Schedule",
		"Setting Account |" => "SettMovie",
		"Setting Pendaftaran |" => "SettSchedule",
		"Setting User |" =>"SettUser",
		"Setting Voting |" =>"SettUser",
		"Pendaftaranku |"=>"MyBooking",
		"Profile |" => "Profile",
		"Logout" => "Logout"
		);	
	}
	else if($_SESSION['status'] == 3)
	{
		$menu = array(
		"Home |" => "Index",
		"Acara |" => "Movie",
		"Pengumuman |" => "Schedule",
		"Setting Pendaftaran |" => "SettSchedule",
		"Voting |"=>"MyBooking",
		"Pendaftaranku |"=>"MyBooking",
		"Profile |" => "Profile",
		"Logout" => "Logout"
		);	
		
	}
	else if($_SESSION['status'] == 1)
	{
		$menu = array(
		"Home |" => "Index",
		"Acara |" => "Movie",
		"Pengumuman |" => "Schedule",
		"Voting |"=>"MyBooking",
		"Pendaftaranku |"=>"MyBooking",
		"Profile |" => "Profile",
		"Logout" => "Logout"
		);	
	}
	else
	{
		$menu = array(
		"Home |" => "Index",
		"Acara |" => "Movie",
		"Pengumuman |" => "Schedule",
		"Profile |" => "Profile",
		"Logout" => "Login"
	);	
	}
	echo "<ul class='ulmenu'> ";
	foreach($menu as $text => $link){
		echo "	<li> 
				<a href='index.php?page=".$link."' >".$text." </a>
				</li> ";
	}
	echo "</ul> ";
	
	
}
else
{
	
	$menu = array(
	"Home |" => "Index",
	"Acara |" => "Movie",
	"Pengumuman |" => "Schedule",
	"Login" => "Login"
	);	
	
	echo "<ul class='ulmenu'> ";
	foreach($menu as $text => $link){
		echo "	<li> 
				<a href='index.php?page=".$link."' >".$text." </a>
				</li> ";
	}
	echo "</ul> ";
	//header("location: Auth/login.php");
}





?>