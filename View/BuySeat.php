<?php

	if(!$_SESSION['isLogin'])
	{
		header("location: Auth/login.php");
	}
	else
	{
		$seat= $seatdao->get_one_seat( $_GET['idseat']);
		
	}
	
	if(isset($_POST['cancel']))
	{
		header("location: index.php");
	}
	if(isset($_POST['submit']))
	{
		$jumlah 				= $_POST['jumlah'];
		$tanggal				= $_POST['tanggal'];
		$id_user				= $_POST['iduser'];
		$id_seat				= $_POST['idseat'];
		
		
		
		$user = $userdao->get_one_userid($id_user);
		$seat = $seatdao->get_one_seat($id_seat);
		
		$transaksi = new Transaksi();
		$transaksi->setJumlah($jumlah);
		$transaksi->setTanggal($tanggal);
		$transaksi->setUser($user);
		$transaksi->setSeat($seat);
		
		$seat->setStatus(1);
		$seatdao = $seatdao->update_seat($seat);
		$transaksidao->insert_transaksi($transaksi);
		
		header("location: index.php?page=MyBooking");
		
	}
?>
 <form action="" method="post" enctype="multipart/form-data" > 
<table>
	<caption><h3>Detail Pembelian</h3></caption>
    <tr><?php $iduser = $_SESSION['iduser'];?>
    	
    	<input type="hidden" name="tanggal" value="<?php echo date("d M Y");?>" />
        <input type="hidden" name="idseat" value="<?php echo $seat->getID_Seat();?>"/>
        <input type="hidden" name="iduser" value="<?php echo $iduser;?>"/>
        <input type="hidden" name="jumlah" value="<?php echo $seat->getSchedule()->getMovie()->getPrice();?>"/> 
        
    	<td align="right">Tanggal Pembelian </td>
        <td>:</td>
        <td><?php echo date("d M Y");?></td>
    </tr>
	<tr>
    	
    	<td align="right">Nama Movie </td>
        <td>:</td>
        <td><?php echo $seat->getSchedule()->getMovie()->getName();?></td>
    </tr>
    <tr>
    	<td align="right">Harga Movie </td>
        <td>:</td>
        <td><?php echo $seat->getSchedule()->getMovie()->getPrice();?></td>
    </tr>
    <tr>
    	<td align="right">Waktu Movie</td>
        <td>:</td>
        <td><?php echo $seat->getSchedule()->getTime();?></td>
    </tr>
    <tr>
    	<td align="right">No Seat</td>
        <td>:</td>
        <td><?php echo $seat->getNo_seat();?></td>
    </tr>
    <tr>
    	<td align="right">Nama Studio</td>
        <td>:</td>
        <td><?php echo $seat->getSchedule()->getStudio()->getNamastudio() ;?></td>
    </tr>
    <tr>
    	<td colspan="3" align="center">
        	<input type="submit" name="submit" value="Buy"/>
            <input type="submit" name="cancel" value="Cancel"/>
        </td>
    </tr>
</table>
</form>