<div>
	<h3>Now Playing</h3>
	<table border="1" width="100%" > 
    	<tr> 
        	<th width ="250px"> Picture </th>
        	<th> Movie ID </th>
            <th> Name </th>
            <th> Duration </th>
            <th> Price </th>
            <th> Genre </th>
            <th> Action </th>
        </tr>
        <?php
			
			$iterator = $moviedao -> get_active_movie() -> getIterator();
			while ($iterator -> valid()) {
			
			echo " <tr> ";
			echo " <td align='center'> <img width='250px' height='400px' src='".$iterator -> current()-> getPicture() ."'/> </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getID_Movie() ." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getName()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getDuration()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getPrice()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getGenre()." </td> ";
			echo " <td align='center'> ";
			echo "<button onclick='cekSchedule(\"".$iterator -> current()-> getID_Movie()."\")' class='cssbutton' > Schedule </button> ";
			echo "</td>";
			echo "</tr>";	
			$iterator -> next();		
			}
		?>
    
    </table>
    
    <br />
    <h3>Comming Soon</h3>
	<table border="1" width="100%" > 
    	<tr> 
        	<th width ="250px"> Picture </th>
        	<th> Movie ID </th>
            <th> Name </th>
            <th> Duration </th>
            <th> Price </th>
            <th> Genre </th>
            <th> Action </th>
        </tr>
        <?php
			
			$iterator = $moviedao -> get_commingsoon_movie() -> getIterator();
			while ($iterator -> valid()) {
			
			echo " <tr> ";
			echo " <td align='center'> <img width='250px' height='400px' src='".$iterator -> current()-> getPicture() ."'/> </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getID_Movie() ." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getName()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getDuration()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getPrice()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getGenre()." </td> ";
			echo " <td align='center'> ";
			echo "Comming Soon !! ";
			echo "</td>";
			echo "</tr>";	
			$iterator -> next();		
			}
		?>
    
    </table>
</div>