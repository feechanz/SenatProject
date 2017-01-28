
<?php
if(isset($_POST['update']))
{
	$accountid 			= $_SESSION['accountid'];
	$username 			= $_POST['username'];
	$password 			= $_POST['dpassword'];
	$name				= $_POST['name'];
	$nrp				= $_POST['nrp'];
	$email 				= $_POST['email'];
	$status				= $_POST['status'];
	
	$account = new Account();
	//$userdao = new UserDao();
	
	$account -> setAccountid($accountid);
	$account -> setUsername($username);
	$account -> setPassword($password);
	$account -> setName($name);
	$account -> setNrp($nrp);
	$account -> setEmail($email);
	$account -> setStatus($status);

	$result = $accountdao -> update_account($account);
	
	if($result)
	{
		//echo $user->getID_User;
		header("location: index.php?page=Profile");
	}
	else
	{
		echo "<br> Account gagal diubah";
	}
		
}
else if(isset($_POST['updatepass']))
{
	$accountid 			= $_SESSION['accountid'];
	
	$u = $accountdao -> get_one_accountid($_SESSION['accountid']);
	$accountid = $u -> getAccountid();
	$password = $u -> getPassword();
	

	
	$oldpassword 			= $_POST['oldpassword'];
	$newpassword 			= $_POST['newpassword'];
	$confirmpassword 		= $_POST['confirmpassword'];
	
	if($oldpassword != $password)
	{
		echo "<br>Password Salah !";
		$u = $accountdao -> get_one_accountid($_SESSION['accountid']);
		$accountid = $u -> getAccountid();
		$username = $u -> getUsername();
		$password = $u -> getPassword();
		$name = $u -> getName();
		$email = $u -> getEmail();
		$nrp = $u -> getNrp();
		$status = $u -> getStatus();
		//header("location: index.php?page=Profile");
	}
	else if($newpassword != $confirmpassword)
	{
		echo "<br> Password Baru Tidak Sama";
		$u = $accountdao -> get_one_accountid($_SESSION['accountid']);
		$accountid = $u -> getAccountid();
		$username = $u -> getUsername();
		$password = $u -> getPassword();
		$name = $u -> getName();
		$email = $u -> getEmail();
		$nrp = $u -> getNrp();
		$status = $u -> getStatus();
		//header("location: index.php?page=Profile");
	}
	else
	{
		$u->setPassword($newpassword);
		$result = $userdao -> update_user($u);
	
		if($result)
		{
			//echo $user->getID_User;
			header("location: index.php?page=Profile");
		}
		else
		{
			echo "<br> Account gagal diubah";
		}
	}
}
else
{
	$u = $accountdao -> get_one_accountid($_SESSION['accountid']);
	$accountid = $u -> getAccountid();
	$username = $u -> getUsername();
	$password = $u -> getPassword();
	$name = $u -> getName();
	$email = $u -> getEmail();
	$nrp = $u -> getNrp();
	$status = $u -> getStatus();
}
?>


<div>
	<div>
		<h3>My Profile</h3>
    </div>
	<div >  <!-- container !-->         
        <div class="form-input">  
        <form action="" method="post" enctype="multipart/form-data" > 
        
       
        </div>
        <div> Change Password </div>  
        
        <div>
        <table align="center">
        <tr>
         <td width="100px">Old Password </td> <td>: </td> <td><input type="password" name="oldpassword" /> </td>
        </tr>
        <tr>
         <td>New Password </td> <td>: </td> <td><input type="password" name="newpassword" /> </td>
        </tr>
        <tr>
         <td>Confirm Password </td> <td>: </td> <td><input type="password" name="confirmpassword" /> </td>
        </tr>
        <tr>
         <td colspan="3"><input type="submit" name="updatepass" value="Change Password" width="200px"/></td>
        </tr>
        </table>
        </div>
        
        <br>
        <input type="hidden" name="status" value="<?php echo $status; ?>"/>
        <input type="hidden" name="dpassword" value="<?php echo $password; ?>"/>
        <div> My Username </div>  
        <div> <input readonly="readonly" type="text" name="username" value="<?php echo $username; ?>"/> </div>
        
        <div> My Name </div>  
        <div> <input type="text" name="name" value="<?php echo $name; ?>"/> </div>
        
        <div> My Nrp </div>
        <div> <input type="text" name="nrp" value="<?php echo $nrp; ?>"/> </div>
        
        <div> Email </div>
        <div> <input type="text" name="email" value="<?php echo $email; ?>"/> </div>
        

		<div> &nbsp; </div>
        <div> <input type="submit" name="update" value="Update"/> </div>        
        
        </form>
        </div > 
    </div>
</div>