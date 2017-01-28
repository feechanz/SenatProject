<?php

if(!isset($_GET['studentid'])){
		$_GET['studentid'] = "";
}

$s = $studentdao -> get_one_student($_GET['studentid']);	
$studentid = $s -> getStudentID();
$name = $s -> getName();
$email = $s -> getEmail();



if(isset($_POST['update'])){
	$studentid 			= $_POST['studentid'];
	$name 			= $_POST['name'];
	$email 		= $_POST['email'];
	
	
	
	$s = new Student();
	$studentdao = new StudentDao();
	
	$s -> setStudentID($studentid);
	$s -> setName($name);
	$s -> setEmail($email);

	$studentdao -> update_student($s);
	
	header("location: index.php?page=StudentDao");
		
}


?>

<div >  <!-- container !-->         
        <div class="form-input">  
        <form action="" method="post" enctype="multipart/form-data" > 
        <div> Student ID </div>  
        <div> <input readonly="readonly" type="text" name="studentid" value="<?php echo $studentid; ?>" /> </div>
        
        <div> Name </div>  
        <div> <input type="text" name="name" value="<?php echo $name; ?>"  /> </div>
        
        <div> Email </div>
        <div> <input type="text" name="email" value="<?php echo $email; ?>"  /> </div>
        

		<div> &nbsp; </div>
        <div> <input type="submit" name="update" value="UPDATE"/> </div>        
        
        </form>
        </div > 
        <!-- sisipkan tabel !--> 
        <table border="1" width="100%" > 
    	<tr> 
        	<td> Student ID </td>
            <td> Name </td>
            <td> Email </td>
           
            
            <td> Action </td>
        </tr>
        <?php
			
			$iterator = $studentdao -> get_all_student() -> getIterator();
			while ($iterator -> valid()) {
			
			echo " <tr> ";
			echo " <td> ".$iterator -> current()-> getStudentID() ." </td> ";
			echo " <td> ".$iterator -> current()-> getName()." </td> ";
			echo " <td> ".$iterator -> current()-> getEmail()." </td> ";
			echo " <td> ";
			echo "<button onclick='updateStudentDao(\"".$iterator -> current()-> getStudentID()."\")' class='cssbutton' > UPDATE </button> ";
			echo "<button onclick='deleteStudentDao(\"".$iterator -> current()-> getStudentID()."\")' class='cssbutton' > DELETE </button> ";
			echo "</td>";
			echo "</tr>";	
			$iterator -> next();		
			}
		?>
    
    </table>

</div >  <!-- end container !-->         
        
    
