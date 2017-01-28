<?php
if(isset( $_GET['studentid'])){

	$studentid = $_GET['studentid'];

	//$studentdao = new StudentDao();
	$studentdao -> delete_student($studentid);
	//echo $studentid;
	header("location: index.php?page=StudentDao");
}
if(isset($_POST['save'])){
	
	$studentid 			= $_POST['studentid'];
	$name 			= $_POST['name'];
	$email 		= $_POST['email'];

	
	$s = new Student();
	$studentdao = new StudentDao();
	
	$s -> setStudentID($studentid);
	$s -> setName($name);
	$s -> setEmail($email);
	
	$studentdao -> insert_student($s);
	
	header("location: index.php?page=StudentDao");
		
}


?>

<div >  <!-- container !-->         
        <div class="form-input">  
        <form action="" method="post" enctype="multipart/form-data" > 
        <div> Student ID </div>  
        <div> <input type="text" name="studentid" /> </div>
        
        <div> Name </div>  
        <div> <input type="text" name="name" /> </div>
        
        <div> Email </div>
        <div> <input type="text" name="email" /> </div>

		<div> &nbsp; </div>
        <div> <input type="submit" name="save" value="Insert"/> </div>        
        
        </form>
        </div > 
        <!-- sisipkan tabel !--> 
        <table border="1" width="100%" > 
    	<tr> 
        	<td> Student ID </td>
            <td> Name </td>
            <td> Email </td>
         	<td> Aksi </td>
 
        </tr>
        <?php
			
			$iterator = $studentdao -> get_all_student() -> getIterator();
			while ($iterator -> valid()) {
			
			echo " <tr> ";
			echo " <td> ".$iterator -> current()-> getStudentID() ." </td> ";
			echo " <td> ".$iterator -> current()-> getName()." </td> ";
			echo " <td> ".$iterator -> current()-> getEmail()." </td> ";
			
			echo "<td><button onclick='updateStudentDao(\"".$iterator -> current()-> getStudentID()."\")' class='cssbutton' > UPDATE </button> ";
			echo "<button onclick='deleteStudent(\"".$iterator -> current()-> getStudentID()."\")' class='cssbutton' > DELETE </button> </td>";
			echo "</tr>";	
			$iterator -> next();		
			}
		?>
    
    </table>

</div >  <!-- end container !-->         
        
    
