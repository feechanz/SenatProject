<h2>List My Booking</h2>

<table border="1">
	<tr>
    	<th>Tanggal Transaksi </th>
        <th>Jumlah </th>
        <th>Nama Movie</th>
        <th>Waktu Movie</th>
        <th>No Seat</th>
    </tr>
    
    <?php
			$iduser = $_SESSION['iduser'];
			
			$iterator = $transaksidao -> get_all_transaksi_user($iduser) -> getIterator();
			while ($iterator -> valid()) {
			
			echo " <tr> ";
			echo " <td align='center'> ".$iterator -> current()-> getTanggal()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getJumlah()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getSeat()->getSchedule()->getMovie()->getName()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getSeat()->getSchedule()->getTime()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getSeat()->getNo_seat()." </td> ";
			echo "</tr>";	
			$iterator -> next();		
			}
	?>
</table>