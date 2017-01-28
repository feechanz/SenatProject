<?php

	

?>

<div >  <!-- container !-->         
        
    	<!-- sisipkan form !-->
       <div class="form-input">    <!-- form update rata tengah!-->
       	
        <form action="viewCategory.php" method="post" > 
        
        <div> Name </div>
        <div> <input 
              	type="text" 
                name="txt_name"  
                 
                class="textbox-update" /> 
        </div>
        
        
     
		<div> &nbsp; </div>
        <div> 
        		<input type="submit" name="btn_save" value="Save" class="cssbutton"  />
        		
        </div>  
              
        </form> <!-- end of form update !-->
        
        </div> <!-- end of DIV form update rata tengah!-->
         
        <!-- sisipkan tabel !--> 
        <table border="1" width="100%" > 
    	<tr> 
        	<td> ID </td>
            <td> Name </td>
            <td> Action </td>
        </tr>
        <?php
        	$iterator = $catdao -> get_all_cat() -> getIterator();
			while($iterator-> valid()){
			echo " <tr> ";
			echo " <td> ".$iterator -> current() -> getId()." </td> ";
			echo " <td> ".$iterator -> current() -> getName()." </td> ";
			echo " <td> ";
			echo "<button onclick='updateCategory(".$iterator -> current() -> getId().")' class='cssbutton' > UPDATE </button> ";
			echo "<button onclick='deleteCategory(".$iterator -> current() -> getId().")' class='cssbutton' > DELETE </button> ";
			echo "</td>";
			echo "</tr>";
			$iterator -> next();			
			}
		?>
    
    </table>
</div >  <!-- end container !-->
        
        