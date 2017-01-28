<?php
if(isset( $_GET['studentid'])){

	$studentid = $_GET['studentid'];

	//$studentdao = new StudentDao();
	$studentdao -> delete_student($studentid);
	//echo $studentid;
	header("location: index.php?page=StudentDao");
}
if(isset($_POST['save']))
{
	
	$username 			= $_POST['username'];
	$password 			= $_POST['password'];
	$name				= $_POST['name'];
	$address			= $_POST['address'];
	$phone				= $_POST['phone'];
	$email 				= $_POST['email'];
	$photos 			= "images/nophoto.jpg";
	$level				= $_POST['level'];
	
	$user = new User();
	//$userdao = new UserDao();
	
	$user -> setUsername($username);
	$user -> setPassword($password);
	$user -> setName($name);
	$user -> setAddress($address);
	$user -> setPhone($phone);
	$user -> setEmail($email);
	$user -> setPhotos($photos);
	$user -> setLevel($level);
	
	$userdao -> insert_user($user);
	
	header("location: index.php?page=SettUser");
		
}


?>

<div >  <!-- container !-->         
        <div class="form-input">  
        <form action="" method="post" enctype="multipart/form-data" > 
        <div> Username </div>  
        <div> <input type="text" name="username" /> </div>
        
        <div> Password </div>  
        <div> <input type="text" name="password" /> </div>
        
        <div> Name </div>  
        <div> <input type="text" name="name" /> </div>
        
        <div> Address </div>
        <div> <input type="text" name="address" /> </div>
        
        <div> Phone </div>
        <div> <input type="text" name="phone" /> </div>
        
        <div> Email </div>
        <div> <input type="text" name="email" /> </div>
        
        <div> Level User</div>
        <div>
        	<select name="level" >
            	<option values="user">user</option>
                <option values="admin">admin</option>
        	</select>
        </div>

		<div> &nbsp; </div>
        <div> <input type="submit" name="save" value="Insert"/> </div>        
        
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
        
    
