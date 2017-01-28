<?php
	
	session_start();
	if (!isset($_SESSION['isLogin']))
	{
		$_SESSION['isLogin']=false;
			//header("location: Auth/login.php");
	}
	include_once 'Dao/Account.php';
	include_once 'Dao/AccountDao.php';
	
	/*
	include_once 'Dao/Movie.php';
	include_once 'Dao/MovieDao.php';
	include_once 'Dao/Studio.php';
	include_once 'Dao/StudioDao.php';
	include_once 'Dao/Schedule.php';
	include_once 'Dao/ScheduleDao.php';
	include_once 'Dao/Seat.php';
	include_once 'Dao/SeatDao.php';
	include_once 'Dao/Transaksi.php';
	include_once 'Dao/TransaksiDao.php';
	*/
	//include_once 'Dao/BookDao.php';
	//include_once 'Dao/CategoryDao.php';
	//include_once 'Dao/Book.php';
	//include_once 'Dao/Category.php';
	//include_once 'Dao/StudentDao.php';
	
	
	
	include_once 'Function/config.php';
	include_once 'Function/koneksi.php';
	
	

	//$bookdao = new BookDao();
	//$catdao = new CategoryDao();
	//$studentdao = new StudentDao();
	/*$seatdao = new SeatDao();
	$studiodao = new StudioDao();
	$scheduledao = new ScheduleDao();
	
	$moviedao = new MovieDao();
	$transaksidao = new TransaksiDao();*/
	$accountdao = new AccountDao();
?>
<!DOCTYPE html>
<html>
<head>


<title>Senat Fakultas IT</title>
<link rel="stylesheet" href="Style/Style.css" />
<!--<script src="Style/JavaScript.js" type="text/javascript"> </script> !-->
<script >
	// JavaScript Document

	function updateCategory(id)
	{
		window.location = "index.php?page=updateCategory&id="+ id;
	
	}
	
	function deleteCategory(id)
	{
		result = confirm("Yakin?");
		if(result){
			window.location = "ViewOld/deleteCategory.php?id="+ id;
		}
	}
	
	function updateBook(isbn)
	{
		window.location = "index.php?page=updateBook&isbn="+ isbn;
		
	}
	
	function updateBookDao(isbn)
	{
		window.location = "index.php?page=updateBookDao&isbn="+ isbn;
		
	}
	
	
	
	function deleteBook(_isbn)
	{
		result = confirm("Yakin?");
		if(result){
		window.location = "ViewOld/deleteBook.php?isbn="+ _isbn;
		}
		
	}
	
	function updateStudentDao(studentid)
	{
		window.location = "index.php?page=updateStudentDao&studentid="+ studentid;
	}
	
	function deleteStudent(id)
	{
		result = confirm("Yakin?");
		if(result){
			window.location = "View/deleteStudent.php?studentid="+ id;
		}
	}
	
	/*function deleteUser(id)
	{
		result = confirm("Yakin?");
		if(result){
			window.location = "View/deleteUser.php?id_user="+ id;
		}
	}*/
	function cekSchedule(idmovie)
	{
		window.location = "index.php?page=cekSchedule&idmovie="+ idmovie;
	}
	
	function bookSchedule(idschedule)
	{
		window.location = "index.php?page=bookSchedule&idschedule="+ idschedule;
	}
	
	function updateUser(iduser)
	{
		window.location = "index.php?page=updateUser&iduser="+ iduser;
	}
	
	function updateMovie(idmovie)
	{
		window.location = "index.php?page=updateMovie&idmovie="+ idmovie;
	}
	
	function updateSchedule(idschedule)
	{
		window.location = "index.php?page=updateSchedule&idschedule="+ idschedule;
	}
	
	function buySeat(idseat)
	{
		window.location = "index.php?page=buySeat&idseat="+ idseat;
	}
	
	
</script>
<body>
</head>

	<div id="left" >
    	<?php 
			include("template/menu.php");
			date_default_timezone_set('Asia/Jakarta');
			   
			echo date("d M Y, h:i a");
		?>
    		
        
    </div>
    
    <div id="right" >
    	<!-- sisipkan form !-->
 
		<?php 
			if($_SESSION['isLogin'])
			{
				echo "Welcome : " . $_SESSION['name'];
			}
			else
			{
				echo "Welcome : Guest";
			}
			
			if(isset($_GET['page']))
			{
				
				$link = $_GET['page']; 
				
			} 
			else
			{
				$link = "Index";
			}		
			switch ($link)
			{
					case ("Index") : 
					include_once("Index.php");
					break;
					
					
					/*
					case ("Movie") : 
					include_once("view/movieView.php");
					break;	
					
					
					
					case ("cekSchedule") : 
					include_once("view/scheduleView.php");
					break;	
					
					case ("Schedule") : 
					include_once("view/scheduleView.php");
					break;	
					
					case ("updateUser") : 
					include_once("view/UpdateUser.php");
					break;
					
					case ("updateMovie") : 
					include_once("view/UpdateMovie.php");
					break;
					
					case ("updateSchedule") : 
					include_once("view/UpdateSchedule.php");
					break;	
					
					case ("SettUser") : 
					include_once("view/SettUser.php");
					break;
					
					case ("SettMovie") : 
					include_once("view/SettMovie.php");
					break;
					
					case ("SettSchedule") : 
					include_once("view/SettSchedule.php");
					break;
					
					case ("bookSchedule") : 
					include_once("view/BookSchedule.php");
					break;
					
					case ("MyBooking") : 
					include_once("view/MyBooking.php");
					break;
					
					
					case ("buySeat") : 
					include_once("view/BuySeat.php");
					break;*/
					case ("Profile") :
					include_once("Auth/profile.php");
					break;
					
					case ("Login") : 
					header("location: Auth/login.php");
					break;	
					
					case ("Logout") : 
					include_once("Auth/logout.php");
					break;
					
					default : 
					echo "<script> alert('menu tidak tersedia / belum memiliki akses');</script>";
					break;			
			}
		?>
    </div>
    
    <div id="footer" > 
    <?php include_once("template/footer.php");?>
    </div> 



</body>
</html>