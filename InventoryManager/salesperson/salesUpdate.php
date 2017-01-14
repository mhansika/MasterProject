<?php include '../../core/init.php';
protect_page();



$role= $user_data['role'];
	
 	 if ($role == "DEO") {
		echo "<script>window.location.href = '../restrict.php';</script>";
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Salesperson</title>
    <link rel="stylesheet" href="css/m.css" media="screen" type="text/css" />
</head>
    <body>
	<?php
		require "database/connect.php";
		//session_start();
		$v = $_SESSION['salesPerson_id'];
		//echo $v;
		
		$sql = "SELECT * FROM sales_person WHERE salesPerson_id = '$v'";
					
					$result= mysqli_query($connection, $sql);
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
						$h0=$row["salesPerson_id"];
						$h1=$row["F_name"];
						$h2=$row["L_name"];
						$h3=$row["area_no"];
						$h4=$row["NIC"];
						$h5=$row["address"];
						
						$h7=$row["mobileNo"];
						$h8=$row["telephoneNo"];
						$h9=$row["email"];
						}
					}else{
						echo "Zero results";
					}
                    $sql1 = "SELECT * FROM area WHERE area_no = $h3";
                    
                $result1= mysqli_query($connection, $sql1);
                    
                    if(mysqli_num_rows($result1) > 0){
                        
                        while($row = mysqli_fetch_assoc($result1)){
                        /*  echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
                            $h10=$row["area"];
                            
                        }
                    }else{
                         echo '<script>';
                         echo 'alert("area_result")';
                         echo '</script>';
                        }
					
					 $error=FALSE;
        $F_nameerr = $L_nameerr =  $NICerr = $addresserr = $area_noerr = $mobileNoerr = $telephoneNoerr = $emailerr = $DOBerr = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            
            
           

            
			//$sql="UPDATE 'dealer' SET dealer_name='$_POST[dealer_name]', NIC='$_POST[NIC]', address='$_POST[address]', salesPerson_id='$_POST[salesPerson_id]', mobileNo='$_POST[mobileNo]', telephoneNo='$_POST[telephoneNo]', email='$_POST[email]', fax='$_POST[fax]' WHERE dealer_id='$v'";
			$sql = "UPDATE `sales_person` SET `F_name`='$_POST[F_name]',`L_name`='$_POST[L_name]',`NIC`='$_POST[NIC]',`address`='$_POST[address]',`mobileNo`='$_POST[mobileNo]',`telephoneNo`='$_POST[telephoneNo]',`email`='$_POST[email]' WHERE `salesPerson_id`='$v'";
			if(mysqli_query($connection,$sql)){
                //die();
				header("Location: salesSearch.php");
            } else{echo "error";}
			
			
             
            }
        

	?>
    <div class="ad">
    <h1>Update Salesperson</h1>
        <table>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <tr>
                <td><b>Salesperson ID: <?php echo $_SESSION['salesPerson_id'] ?></b></td>
                </tr>
            </tr>
            <tr>
				<td><b>First Name:<b></td>
                <td><b>Area:</b></td>
            </tr>
            <tr>
				<td width="400px"><input type="text" name="F_name" style="width: 300px" value="<?php echo $h1; ?> " ></td>
                <td><?php echo $h10;?></td>
            </tr>
            <tr>
                <td><b>Last Name:</b></td>
				<td><b>Mobile No:</b></td>

            </tr>
            <tr>
                <td><input type="text" name="L_name" style="width: 300px" value="<?php echo $h2; ?>" ></td>
				<td><input type="text" name="mobileNo" style="width: 300px" value="<?php echo $h7; ?>" ></td>
			</tr>
            
			<tr>

                <td><b>Address:</b></td>
                <td><b>Telephone No:</b></td>
            </tr>
            
			<tr>
                <td><input type="text" name="address" style="width: 200px" value="<?php echo $h5; ?>" ></td>
                <td><input type="text" name="telephoneNo" style="width: 200px" value="<?php echo $h8; ?>" ></td>
            </tr>
            <tr>

                <td><b>NIC:</b></td>
                <td><b>Email:</b></td>
            </tr>
            <tr>
                <td><input type="text" name="NIC" style="width: 200px" value="<?php echo $h4; ?>" ></td>
                <td><input type="text" name="email" style="width: 200px" value="<?php echo $h9; ?>" ></td>
            </tr>
            <
            <tr>
                <td></td>
           <td> <button type="submit">SAVE</button></td>
            </tr>

        </form>
        
        </table>

    </div>
    
    </body>
</html>