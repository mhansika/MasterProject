<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Dealer</title>
    <link rel="stylesheet" href="css/m.css" media="screen" type="text/css" />
</head>
    <body>
	<?php
		require "database/connect.php";
		session_start();
		$v = $_SESSION['dealer_id'];
		//echo $v;
		
		$sql = "SELECT * FROM dealer WHERE dealer_id = '$v'";
					
					$result= mysqli_query($connection, $sql);
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
						$h0=$row["dealer_id"];
						$h1=$row["dealer_name"];
						$h2=$row["NIC"];
						$h3=$row["area_no"];
						$h4=$row["address"];
						$h5=$row["salesPerson_id"];
						$h6=$row["mobileNo"];
						$h7=$row["telephoneNo"];
						$h8=$row["email"];
						$h9=$row["fax"];
						}
					}else{
						echo "Zero results";
					}
					
					 $error=FALSE;
        $dealer_nameerr = $area_noerr =  $NICerr = $addresserr = $salesPerson_iderr = $mobileNoerr = $telephoneNoerr = $emailerr = $faxerr = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            
            if(empty($_POST['dealer_name'])){ 
                $dealer_nameerr = "";
                $error = TRUE;
            }else{
                $dealer_name = $_POST['dealer_name'];
            }
            
          
            
            if(empty($_POST['area_no'])){ 
                $area_noerr = "";
                $error = TRUE;
            }else{
                $area_no = $_POST['area_no'];
            }
            
            if(empty($_POST['NIC'])){ 
                $NICerr = "";
                $error = TRUE;
            }else{
                $NIC = $_POST['NIC'];
                
            }
            
            
			
			if(empty($_POST['address'])){
				$addresserr = "";
				$error = TRUE;
			}else{
				$address = $_POST['address'];
			}
			
			if(empty($_POST['salesPerson_id'])){ 
                $salesPerson_iderr = "";
                $error = TRUE;
            }else{
                $salesPerson_id = $_POST['salesPerson_id'];
            }
            
           
            if(empty($_POST['mobileNo'])){ 
                $mobileNoerr = "";
                $error = TRUE;
            }else{
                $mobileNo = $_POST['mobileNo'];
            }
            
            if(empty($_POST['telephoneNo'])){ 
                $telephoneNoerr = "";
                $error = TRUE;
            }else{
                $telephoneNo = $_POST['telephoneNo'];
                
            }
        
            if(empty($_POST['email'])){ 
                $emailerr = "";
                $error = TRUE;
            }else{
                $email = $_POST['email'];
                if (strpos($email, '@') == FALSE) {
                    $emailerr =  "Invalid email address";
                    $error = TRUE;
                }
            }
			
			if(empty($_POST['fax'])){ 
                $faxerr = "";
                $error = TRUE;
            }else{
                $fax = $_POST['fax'];
            }
            
             if ($error==FALSE){
           

            
			//$sql="UPDATE 'dealer' SET dealer_name='$_POST[dealer_name]', NIC='$_POST[NIC]', address='$_POST[address]', salesPerson_id='$_POST[salesPerson_id]', mobileNo='$_POST[mobileNo]', telephoneNo='$_POST[telephoneNo]', email='$_POST[email]', fax='$_POST[fax]' WHERE dealer_id='$v'";
			$sql = "UPDATE `dealer` SET `dealer_name`='$_POST[dealer_name]',`area_no`='$_POST[area_no]',`salesPerson_id`='$_POST[salesPerson_id]',`NIC`='$_POST[NIC]',`address`='$_POST[address]',`mobileNo`='$_POST[mobileNo]',`telephoneNo`='$_POST[telephoneNo]',`email`='$_POST[email]',`fax`='$_POST[fax]' WHERE `dealer_id`='$v'";
			if(mysqli_query($connection,$sql)){
                //die();
				header("Location: searchdealer.php");
            } else{echo "error";}
			
			
             
            }
        }

	?>
    <div class="ad">
    <h1 style= "font-size: 20px;
    background-color: #990000;
    color: white;
    width:100%;
    padding: 10px;
    font-family: Calibri;
    line-height: 30px;
    margin:0 0 0;
    margin-bottom: 20px;
    padding-bottom: 10px;">Update Dealer</h1>
        <table>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <tr>
                <td><b>Dealer ID: <?php echo $_SESSION['dealer_id'] ?></b></td>
            </tr>
            
            <tr>
				<td><b>Dealer Name:</b></td>
                <td><b>Mobile No:</b></td>
            </tr>
            
			<tr>
				<td width="400px"><input type="text" name="dealer_name" style="width: 300px" value="<?php echo $h1; ?>"></td>
                <td><input type="text" name="mobileNo" style="width: 200px" value="<?php echo $h6; ?>"></td>
            </tr>
            
			<tr>
                <td><b>Dealer Address:</b></td>
				<td><b>Telephone No:</b></td>
			</tr>
            
			<tr>
                <td><input type="text" name="address" style="width: 300px" value="<?php echo $h4; ?>"></td>
				<td><input type="text" name="telephoneNo" style="width: 200px" value="<?php echo $h7; ?>"></td>
			</tr>
            
			<tr>
				<td><b>NIC:</b></td>
                <td><b>Fax No:</b></td>
            </tr>
            
			<tr>
                <td><input type="text" name="NIC" style="width: 200px" value="<?php echo $h2; ?>"></td>
                <td><input type="text" name="fax" style="width: 200px" value="<?php echo $h9; ?>"></td>
            </tr>
            
			<tr>
				<td><b>Area:</b></td>
                <td><b>E mail:</b></td>
            </tr>
            
			<tr>
                <td><select class="dropdown" name= "area_no">
					<option value="Colombo">Col01</option>
					<option value="Dehiwala">De01</option>
					<option value="Maharahama">Mahara01</option>
					<option value="Nugegoda">Nuge01</option>
					</select>
				</td>
                <td><input type="text" name="email" style="width: 200px" value="<?php echo $h8; ?>"></td>
            </tr>
            
			<tr>

                <td><b>Relevant Salesperson ID:</b></td>
            </tr>
            
			<tr>
                <td ><input type="text" name="salesPerson_id" style="width: 200px" value="<?php echo $h5; ?>"></td>
            </tr>
            <tr>
                <td></td>
           <td> <button type="submit">SAVE</button></td>
            </tr>

        </form>
        
        </table>

    </div>
    
    </body>
</html>