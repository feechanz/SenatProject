<?php
if(!isset($_GET['iduser']))
{
		$_GET['iduser'] = "";
}

if(isset($_POST['update']))
{
	$iduser 			= $_POST['iduser'];
	$username 			= $_POST['username'];
	$password 			= $_POST['password'];
	$name				= $_POST['name'];
	$address			= $_POST['address'];
	$phone				= $_POST['phone'];
	$email 				= $_POST['email'];
	$photos 			= $_POST['photos'];
	$level				= $_POST['level'];
	
	$user = new User();
	//$userdao = new UserDao();
	
	$user -> setID_User($iduser);
	$user -> setUsername($username);
	$user -> setPassword($password);
	$user -> setName($name);
	$user -> setAddress($address);
	$user -> setPhone($phone);
	$user -> setEmail($email);
	$user -> setPhotos($photos);
	$user -> setLevel($level);

	$result = $userdao -> update_user($user);
	
	if($result)
	{
		//echo $user->getID_User;
		header("location: index.php?page=SettUser");
	}
	else
	{
		echo "<br> Account gagal diubah";
	}
		
}
else
{
	$u = $userdao -> get_one_userid($_GET['iduser']);
	$iduser = $u -> getID_User();
	$username = $u -> getUsername();
	$password = $u -> getPassword();
	$name = $u -> getName();
	$address = $u -> getAddress();
	$phone = $u -> getPhone();
	$email = $u -> getEmail();
	$level = $u -> getLevel();
	$photos = $u -> getPhotos();
}


?>

<div >  <!-- container !-->         
        <div class="form-input">  
        <form action="" method="post" enctype="multipart/form-data" > 
        
	<input type="hidden" name="photos" value="<?php echo $photos; ?>"/>
	<div> ID User (can't be changed)</div>  
        <div> <input readonly = "readonly" type="text" name="iduser" value="<?php echo $iduser; ?>"/> </div>
        
        <div> Username (can't be changed)</div>  
        <div> <input type="text" readonly="readonly" name="username" value="<?php echo $username; ?>"/> </div>
        
        <div> Password </div>  
        <div> <input type="text" name="password" value="<?php echo $password; ?>"/> </div>
        
        <div> Name </div>  
        <div> <input type="text" name="name" value="<?php echo $name; ?>"/> </div>
        
        <div> Address </div>
        <div> <input type="text" name="address" value="<?php echo $address; ?>"/> </div>
        
        <div> Phone </div>
        <div> <input type="text" name="phone" value="<?php echo $phone; ?>"/> </div>
        
        <div> Email </div>
        <div> <input type="text" name="email" value="<?php echo $email; ?>"/> </div>
        
        <div> Level User</div>
        <div>
			<select name='level' >
            	<option values="user">user</option>
                <?php 
                	if($level == "admin")
					{
						echo "<option values='admin' selected='selected'>admin</option>";
					}
					else
					{
						echo "<option values='admin'>admin</option>";
					}
				?>
                
        	</select>
        </div>

		<div> &nbsp; </div>
        <div> <input type="submit" name="update" value="Update"/> </div>        
        
        </form>
        </div > 
        <!-- sisipkan tabel !--> 
        <table border="1" width="100%" > 
    	<tr> 
        	<td> User ID </td>
            <td> Username </td>
            <td> Password </td>
            <td> Name </td>
            <td> Address </td>
            <td> Phone </td>
            <td> Email </td>
            <td> Level </td>
         	<td> Aksi </td>
 
        </tr>
        <?php
			
			$iterator = $userdao -> get_all_user() -> getIterator();
			while ($iterator -> valid()) {
			
			echo " <tr> ";
			echo " <td> ".$iterator -> current()-> getID_User() ." </td> ";
			echo " <td> ".$iterator -> current()-> getUsername()." </td> ";
			echo " <td> ".$iterator -> current()-> getPassword()." </td> ";
			echo " <td> ".$iterator -> current()-> getName()." </td> ";
			echo " <td> ".$iterator -> current()-> getAddress()." </td> ";
			echo " <td> ".$iterator -> current()-> getPhone()." </td> ";
			echo " <td> ".$iterator -> current()-> getEmail()." </td> ";
			echo " <td> ".$iterator -> current()-> getLevel()." </td> ";
			echo "<td>";
			echo "<button onclick='updateUser(\"".$iterator -> current()-> getID_User()."\")' class='cssbutton' > UPDATE </button> ";
			echo "</td>";
			echo "</tr>";	
			$iterator -> next();		
			}
		?>
    
    </table>

</div >  <!-- end container !-->         
        
    
