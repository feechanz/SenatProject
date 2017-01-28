<?php

if(!isset($_GET['idmovie'])){
		$_GET['idmovie'] = "";
}

$m = $moviedao -> get_one_movie($_GET['idmovie']);	

$picture 				= $m->getPicture();
$name 					= $m->getName();
$duration				= $m->getDuration();
$price					= $m->getPrice();
$genre					= $m->getGenre();
$status 				= $m->getStatus();
$id_movie				= $m->getID_Movie();
$picture2				= $m->getPicture2();
$sinopsis				= $m->getSinopsis();

if(isset($_POST['update'])){
	$id_movie 				= $_POST['id_movie'];
	$picture 				= $_POST['picture'];
	$name 					= $_POST['name'];
	$duration				= $_POST['duration'];
	$price					= $_POST['price'];
	$genre					= $_POST['genre'];
	$status 				= $_POST['status'];
	
	
	$movie = new Movie();
	
	$movie->setID_Movie($id_movie);
	$movie->setPicture($picture);
	$movie->setName($name);
	$movie->setDuration($duration);
	$movie->setPrice($price);
	$movie->setGenre($genre);
	$movie->setStatus($status);
	
	$moviedao -> update_movie($movie);
	
	header("location: index.php?page=SettMovie");
		
}
else if(isset($_POST['updatepp'])){
	
	$id_movie 	= $_POST['id_movie'];
	$picture 	= $_FILES['picture']['name'];
	move_uploaded_file($_FILES['picture']['tmp_name'],"Movies/Pictures/$picture");
	
	$picture= "Movies/Pictures/".$picture;
	
	$movie = $moviedao -> get_one_movie($_POST['id_movie']);	
	$movie->setPicture($picture);
	
	$moviedao -> update_movie($movie);
	
	header("location: index.php?page=settMovie&idmovie="+ $id_movie);
}



?>

<div >  <!-- container !-->         
        <div class="form-input">  
        <form action="" method="post" enctype="multipart/form-data" > 
        
        <input type="hidden" name="picture2" value="<?php echo $picture2;?>"/>
        <input type ="hidden" name="picture" value="<?php echo $picture; ?>" />
        <input type ="hidden" name="id_movie" value="<?php echo $id_movie; ?>" />
        
        
        <div> Picture Movie </div>  
        <div> <img src="<?php echo $picture; ?>" width="125px" height ="200px"/> </div>
        <div><input type="file" name="picture" /></div>
        <div> <input type="submit" name="updatepp" value="Upload Picture"/> </div>        
        <br />
        
        
        <div> Name </div>  
        <div> <input type="text" name="name" value="<?php echo $name; ?>"/> </div>
        
        <div> Duration </div>  
        <div> <input type="text" name="duration" value="<?php echo $duration; ?>"/> </div>
        
        <div> Price </div>  
        <div> <input type="text" name="price" value="<?php echo $price; ?>"/> </div>
        
        <div> Genre </div>
        <div> <input type="text" name="genre" value="<?php echo $genre; ?>"/> </div>
        
        <div> Status </div>
        <div>
        	<select name="status" >
            	
            	<option value="2">comming soon</option>
                <?php
                	if($status == 1 )
					{
						echo "<option value='1' selected>active</option>";
					}
					else
					{
						echo "<option value='1' >active</option>";
					}
				?>
                
                <?php
                	if($status == 0 )
					{
						echo "<option value='9' selected>deactive</option>";
					}
					else
					{
						echo "<option value='0' >deactive</option>";
					}
				?>
        	</select>
        </div>
		
        <div> Sinopsis </div>
        <div>
        	<textarea name="sinopsis" value="" rows="7" cols="50"> <?php echo $sinopsis; ?></textarea>
        </div>
		<div> &nbsp; </div>
        <div> <input type="submit" name="update" value="Update"/> </div>        
        
        </form>
        </div > 
        <!-- sisipkan tabel !--> 
        <table border="1" width="100%" > 
    	<tr> 
        	<th> Movie ID </th>
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

</div >  <!-- end container !-->           <!-- end container !-->         
        
    
