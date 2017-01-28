<?php

/*
if(isset( $_GET['studentid'])){

	$studentid = $_GET['studentid'];

	//$studentdao = new StudentDao();
	$studentdao -> delete_student($studentid);
	//echo $studentid;
	header("location: index.php?page=StudentDao");
}*/
if(isset($_POST['save']))
{
	
	$picture 				= $_FILES['picture']['name'];
	$picture2 				= $_FILES['picture2']['name'];
	$name 					= $_POST['name'];
	$duration				= $_POST['duration'];
	$price					= $_POST['price'];
	$genre					= $_POST['genre'];
	$status 				= $_POST['status'];
	$sinopsis				= $_POST['sinopsis'];
	
	move_uploaded_file($_FILES['picture']['tmp_name'],"Movies/Pictures/$picture");
	$movie = new Movie();
	
	$picture= "Movies/Pictures/".$picture;
	$movie->setPicture($picture);
	$movie->setPicture2($picture2);
	$movie->setName($name);
	$movie->setDuration($duration);
	$movie->setPrice($price);
	$movie->setGenre($genre);
	$movie->setStatus($status);
	$movie->setSinopsis($sinopsis);
	
	$moviedao -> insert_movie($movie);
	
	header("location: index.php?page=SettMovie");
		
}


?>

<div >  <!-- container !-->         
        <div class="form-input">  
        <form action="" method="post" enctype="multipart/form-data" > 
        <div> Picture Movie </div>  
        <div><input type="file" name="picture"/></div>
        <br />
        <div> Picture Movie 2 </div>  
        <div><input type="file" name="picture2"/></div>
        <br />
        <div> Name </div>  
        <div> <input type="text" name="name" /> </div>
        
        <div> Duration </div>  
        <div> <input type="text" name="duration" /> </div>
        
        <div> Price </div>  
        <div> <input type="text" name="price" /> </div>
        
        <div> Genre </div>
        <div> <input type="text" name="genre" /> </div>
        
        <div> Status </div>
        <div>
        	<select name="status" >
            	<option value="2">comming soon</option>
                <option value="1">active</option>
                <option value="0">Deactive</option>
        	</select>
        </div>
		
        <div> Sinopsis </div>
        <div>
        	<textarea name="sinopsis" value="" rows="7" cols="50"> </textarea>
        </div>
        
		<div> &nbsp; </div>
        <div> <input type="submit" name="save" value="Insert"/> </div>        
        
        </form>
        </div > 
        <!-- sisipkan tabel !--> 
        <table border="1" width="100%" > 
    	<tr> 
        	<th> Movie ID </th>
            <th> Picture </th>
            <th> Name </th>
            <th> Duration </th>
            <th> Price </th>
            <th> Genre </th>
 			<th> Status </th>
            <th> Aksi </th>
        </tr>
        <?php
			
			$iterator = $moviedao -> get_all_movie() -> getIterator();
			while ($iterator -> valid()) {
			
			echo " <tr> ";
			echo " <td align='center'> ".$iterator -> current()-> getID_Movie() ." </td> ";
			echo " <td align='center'> <img width='100px' height='160px' src='".$iterator -> current()-> getPicture() ."'/> </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getName()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getDuration()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getPrice()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getGenre()." </td> ";
			echo " <td align='center'> ".$iterator -> current()-> getStatus()." </td> ";
			echo "<td>";
			echo "<button onclick='updateMovie(\"".$iterator -> current()-> getID_Movie()."\")' class='cssbutton' > UPDATE </button> ";
			echo "</td>";
			echo "</tr>";	
			$iterator -> next();		
			}
		?>
    
    </table>

</div >  <!-- end container !-->         
        
    
