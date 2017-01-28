<!DOCTYPE html>
<?php 

if(isset($_POST['save']))
{
	
	$idstudio 			= $_POST['idstudio'];
	$idmovie 			= $_POST['idmovie'];
	$time				= $_POST['time'];
	
	
	$schedule = new Schedule();
	//$userdao = new UserDao();
	
	$movie = $moviedao->get_one_movie($idmovie);
	$studio = $studiodao->get_one_studio($idstudio);
	
	$schedule->setMovie($movie);
	$schedule->setStudio($studio);
	$schedule->setTime($time);
	
	$scheduledao -> insert_schedule($schedule);
	
	$schedule = $scheduledao->get_schedule_new($schedule);
	for($i =1;$i<=$studio->getKapasitas();$i++)
	{
		$seat = new Seat();
		$seat->setSchedule($schedule);
		$seat->setNo_seat($i);
		$seat->setStatus(0);
		$seatdao -> insert_seat($seat);
	}
	
	header("location: index.php?page=SettSchedule");
		
}


?>

<div >  <!-- container !-->         
        <div class="form-input">  
        <form action="" method="post" enctype="multipart/form-data" > 
        
      
        
       
        
        <div> Select Studio </div>
        <div>
        	<select name="idstudio">
            	<?php
				$iterator = $studiodao -> get_all_studio() -> getIterator();
				while ($iterator -> valid()) {
					echo "<option value='".$iterator -> current()-> getID_Studio()."'>".$iterator -> current()-> getNamastudio()."</option>";
				$iterator -> next();		
				}
				?>
        	</select>	
        </div>
        <br>
        <div> Select Active Movie </div>
        <div>
        	<select name="idmovie">
            	<?php
				$iterator = $moviedao -> get_active_movie() -> getIterator();
				while ($iterator -> valid()) {
					echo "<option value='".$iterator -> current()-> getID_Movie()."'>".$iterator -> current()-> getName()."</option>";
				$iterator -> next();		
				}
				?>
        	</select>	
        </div>
        <br>
        <div> Schedule Time</div>
        <div> <input type="datetime-local" name="time" /> </div>

		<div> &nbsp; </div>
        <div> <input type="submit" name="save" value="Insert"/> </div>        
        
        </form>
        </div > 
        <!-- sisipkan tabel !--> 
        <table border="1" width="100%" > 
        <caption>All Schedule</caption>
    	<tr> 
        	<th width ="200px"> Picture </th>
            <th width="200px"> Movie Name </th>
            <th width="100px"> Duration </th>
            <th> Price </th>
            <th> Genre </th>
            <th> Studio </th>
            <th width="150px"> Time </th>
            <th> Action </th>
        </tr>
        <?php
			$iterator = $scheduledao -> get_all_schedule() -> getIterator();
			while ($iterator -> valid()) {
			
			echo " <tr> ";
			echo " <td align='center'> <img width='100px' height='160px' src='".$iterator -> current()-> getMovie()->getPicture() ."'/> </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getMovie()->getName()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getMovie()->getDuration()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getMovie()->getPrice()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getMovie()->getGenre()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getStudio()->getNamastudio()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getTime()." </td> ";
			echo " <td align='center'> ";
			echo "<button onclick='updateSchedule(\"".$iterator -> current()-> getID_Schedule()."\")' class='cssbutton' >Edit </button> ";
			echo "</td>";
			echo "</tr>";	
			$iterator -> next();		
			}
		?>
    
    </table>

</div >  <!-- end container !-->         
        
    
