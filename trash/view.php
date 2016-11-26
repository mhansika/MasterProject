
 <?php
 $databaseHost = "localhost"; 
 $databaseUser = "root";
 $databasePassword = "";
 $databaseName = "warranty_management";
        
      $con=mysql_connect($databaseHost ,$databaseUser ,$databasePassword )or die ('Connection Error');
      mysql_select_db("warranty_management",$con) or die ('Database Error');
 ?>
<strong>Select:</strong>
<select name="dropdown">
<option value=""> -----------ALL----------- </option> 
<?php
$dd_res=mysql_query("Select DISTINCT district_name from district");
         while($r=mysql_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[0] </option>";
         }

?>
            </select>";

	


			


