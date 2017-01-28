<?php

if(isset($_POST['save'])){
	
	$isbn 			= $_POST['isbn'];
	$title 			= $_POST['title'];
	$author 		= $_POST['author'];
	$publisher 		= $_POST['publisher'];
	$publisheryear 	= $_POST['publisheryear'];
	$cover_files 	= $_FILES['cover']['name'];
	$category 		= $_POST['category'];
	
	move_uploaded_file($_FILES['cover']['tmp_name'],"Images/$cover_files");
	
	$b = new Book();
	//$bookdao = new BookDao();
	
	$b -> setTitle($title);
	$b -> setAuthor($author);
	$b -> setPublisher($publisher);
	$b -> setPublishYear($publisheryear);
	//$b -> setCategory($category);
	$b -> setIsbn($isbn);
	$b -> setCover($cover_files);
	
	$cat = new Category();
	$cat -> setId($category);
	$b -> setCategory($cat);
	
	$bookdao -> insert_book($b);
	header("location: index.php?page=BookDao");
		
}


?>

<div >  <!-- container !-->         
        <div class="form-input">  
        <form action="" method="post" enctype="multipart/form-data" > 
        <div> ISBN </div>  
        <div> <input type="text" name="isbn" /> </div>
        
        <div> Title </div>  
        <div> <input type="text" name="title" /> </div>
        
        <div> Author </div>
        <div> <input type="text" name="author" /> </div>
        
        <div> Publisher </div>
        <div> <input type="text" name="publisher" /> </div>
        
        <div> Publisher Year</div>
        <div> <input type="text" name="publisheryear" /> </div>
     
     	<div> Cover</div>
        <div> <input type="file" name="cover" /> </div>
     
        <div> Category </div>
        <div> 	<select name="category" > 
            	<option value="0" > -- pilih -- </option>
                <?php 
                	$iterator = $catdao -> get_all_cat() -> getIterator();
						while ($iterator -> valid()) {
							echo "<option value='";
							echo $iterator -> current() -> getId() . "'>" . $iterator -> current() -> getName();
							echo "</option>";
							$iterator -> next();
					}
						
				?> </select>
        </div>

		<div> &nbsp; </div>
        <div> <input type="submit" name="save" value="SAVE"/> </div>        
        
        </form>
        </div > 
        <!-- sisipkan tabel !--> 
        <table border="1" width="100%" > 
    	<tr> 
        	<td> Cover </td>
            <td> ISBN </td>
            <td> Title </td>
            <td> author </td>
            <td> Name </td>
            
            <td> Action </td>
        </tr>
        <?php
			
			$iterator = $bookdao -> get_all_book() -> getIterator();
			while ($iterator -> valid()) {
			
			echo " <tr> ";
			echo " <td align='center'> <img src='".$iterator -> current()-> getCover()."' style='width:50px; height:50px;' ></td>";
			echo " <td> ".$iterator -> current()-> getIsbn() ." </td> ";
			echo " <td> ".$iterator -> current()-> getTitle()." </td> ";
			echo " <td> ".$iterator -> current()-> getAuthor()." </td> ";
			echo " <td> ".$iterator -> current()-> getCategory() -> getName()."</td>";
			echo " <td> ";
			echo "<button onclick='updateBookDao(\"".$iterator -> current()-> getIsbn()."\")' class='cssbutton' > UPDATE </button> ";
			echo "<button onclick='deleteBookDao(\"".$iterator -> current()-> getIsbn()."\")' class='cssbutton' > DELETE </button> ";
			echo "</td>";
			echo "</tr>";	
			$iterator -> next();		
			}
		?>
    
    </table>

</div >  <!-- end container !-->         
        
    
