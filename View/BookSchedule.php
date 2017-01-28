<h2> Seat Schedule  </h2>
<table border="1" align="center"> 
		<caption>Available Seat</caption>
    	<tr> 
            <th> No Seat </th>
            <th> Status </th>
         
        </tr>
        <?php
			$iterator = $seatdao -> get_all_seat_schedule($_GET['idschedule']) -> getIterator();
			//echo $_GET['idschedule'];
			while ($iterator -> valid()) {
				echo "<tr>";
				echo "<td width='50px' align='center'> Seat No : ".$iterator -> current()-> getNo_seat()." </td>";
				if($iterator -> current()-> getStatus() == 0)
				{
					echo "<td width='100px' align='center'><button onclick='buySeat(\"".$iterator -> current()-> getID_Seat()."\")' class='cssbutton' > Buy </button> </td>";
				}
				else
				{
					echo "<td width='100px' align='center'> Not Available </td>";
				}
				
				
				echo "</tr>";
			$iterator -> next();		
			}
		?>
</table>