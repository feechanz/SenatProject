<br>
<br>
<div>
	Select Movie
    <br><br />
</div>
<div>
<select name="movie-filter">
		<option disabled selected> -- select an option -- </option>
		<?php
	
        $iterator = $moviedao -> get_active_movie() -> getIterator();
        while ($iterator -> valid()) {
            echo "<option value='".$iterator -> current()-> getID_Movie()."'>".$iterator -> current()-> getName()."</option>";
        $iterator -> next();		
        }
        ?>
</select>	
</div>

<h2> Schedule Movie and Studio </h2>
<table border="1" width="100%" > 
		<caption>Available Schedule</caption>
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
		if(!isset($_GET['idmovie']))
		{
			$iterator = $scheduledao -> get_all_schedule_available() -> getIterator();
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
			echo "<button onclick='bookSchedule(\"".$iterator -> current()-> getID_Schedule()."\")' class='cssbutton' > Booking </button> ";
			echo "</td>";
			echo "</tr>";	
			$iterator -> next();		
			}
		}
		else
		{
			$iterator = $scheduledao -> get_schedule_movie($_GET['idmovie']) -> getIterator();
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
			echo "<button onclick='bookSchedule(\"".$iterator -> current()-> getID_Schedule()."\")' class='cssbutton' > Booking </button> ";
			echo "</td>";
			echo "</tr>";	
			$iterator -> next();		
			}
		}
		?>
</table>