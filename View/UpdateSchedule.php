<!DOCTYPE html>
<?php 

if(isset($_POST['update']))
{
	$idschedule			= $_POST['idschedule'];
	$idstudio 			= $_POST['idstudio'];
	$idmovie 			= $_POST['idmovie'];
	$time				= $_POST['time'];
	
	
	$schedule = new Schedule();
	//$userdao = new UserDao();
	
	$movie = $moviedao->get_one_movie($idmovie);
	$studio = $studiodao->get_one_studio($idstudio);
	
	$schedule->setID_Schedule($idschedule);
	$schedule->setMovie($movie);
	$schedule->setStudio($studio);
	$schedule->setTime($time);
	
	$scheduledao -> update_schedule($schedule);
	
	
	//echo $time;
	header("location: index.php?page=SettSchedule");
		
}

if(isset($_GET['idschedule']))
{
	$scheduleedit = $scheduledao->get_one_schedule($_GET['idschedule']);
}
else
{
	$scheduleedit = new Schedule();
}

?>

<div >  <!-- container !-->         
        <div class="form-input">  
        <form action="" method="post" enctype="multipart/form-data" > 
		
        <input type="hidden" name="idschedule" value="<?php echo $scheduleedit->getID_Schedule();?>">
        
        <div> Studio (Can't be changed)</div>
        <div>
        	
            <?php
				echo "<input type='hidden' name='idstudio' value='".$scheduleedit->getStudio()->getID_Studio()."'>";
            	echo "<input readonly='readonly' type='text' name='studioename' value='".$scheduleedit->getStudio()->getNamastudio()."'>";
            ?>
        	
        </div>
        <br>
        <div> Active Movie </div>
        <div>
        	<select name="idmovie">
			<?php
				$iterator = $moviedao -> get_active_movie() -> getIterator();
				while ($iterator -> valid()) {
					if($scheduleedit->getMovie()->getID_Movie() == $iterator ->current()-> getID_Movie())
					{
						echo "<option value='".$iterator -> current()-> getID_Movie()."' selected>".$iterator -> current()-> getName()."</option>";
					}
					else
					{
						echo "<option value='".$iterator -> current()-> getID_Movie()."'>".$iterator -> current()-> getName()."</option>";
					}
				$iterator -> next();		
				}
				?>
            </select>
        </div>
        <br>
        <div> Schedule Time</div>
        <div> <input type="datetime-local" name="time" value="<?php 
																$date = date_create($scheduleedit->getTime());
																echo date_format($date,'Y-m-d'."\T".'H:i'); 
																?>"/>
        </div>

		<div> &nbsp; </div>
        <div> <input type="submit" name="update" value="Update"/> </div>        
        
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
        
    
