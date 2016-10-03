<html>
	<head>
		<style>
			.error {color: #FF0000;}
		</style>
		<link type="text/css" rel="stylesheet" href="css/m.css"/>

		<title>search Sales</title>
	</head>
	<body>

			<?php
				require "database/connect.php";
				session_start();
				$x1 = $_SESSION['sales_name'];
				
				$pieces = explode(" ", $x1);
				//echo $pieces[0]; // piece1
				//echo $pieces[1]; // piece2

				$error=FALSE;
				$salesPerson_iderr = "";
				$x0=$v0=$v1=$v2=$v3=$v4=$v5=$v6=$v7=$v8=$v9=$v10="";
					$sql = "SELECT * FROM `sales_person` WHERE F_name = '$pieces[0]' AND L_name = '$pieces[1]'";
					
					$result= mysqli_query($connection, $sql);
					
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){				
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
						$x0=$row["salesPerson_id"];
						$_SESSION['salesPerson_id']=$x0;
						$v1=$row["F_name"];
						$v2=$row["L_name"];
						$v3=$row["area_no"];
						$v4=$row["NIC"];
						$v5=$row["address"];
						$v6=$row["DOB"];
						$v7=$row["mobileNo"];
						$v8=$row["telephoneNo"];
						$v9=$row["email"];
						}
					}else{
						echo '<script>';
						echo 'alert("Zero Result")';
						echo '</script>';
					}

			$sql1 = "SELECT * FROM area WHERE area_no = $v3";
                    
                $result1= mysqli_query($connection, $sql1);
                    
                    if(mysqli_num_rows($result1) > 0){
                        
                        while($row = mysqli_fetch_assoc($result1)){
                        /*  echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
                            $v10=$row["area"];
                            
                        }
                    }else{
                         echo '<script>';
                         echo 'alert("area_result")';
                         echo '</script>';
                        }
			?>

	
		
	<div class="ad">
		<h1>Search Sales</h1>
			
			
		<table class="tbl">
			<form action="" method="POST">
				<tr>
							<td><b>Salesperson Id : </b></td>
							<td><span> <?php echo $x0;?><br/></span></td>
					</tr>
					<tr>
							<td>
							<b>First Name :</b> 
							</td>
							<td><span> <?php echo $v1;?><br/></span></td>
					</tr>
					<tr>
						<td>
							<b>Last Name: </b>
						</td>
						<td><span> <?php echo $v2;?><br/></span></td>
					</tr>
					<tr>
						<td>
							<b>Area: </b>
						</td>
						<td><span> <?php echo $v10;?><br/></span></td>
					</tr>
					<tr>
							<td>
							<b>NIC : </b>
							</td>
							<td><span> <?php echo $v4;?><br/></span></td>
					</tr>
					<tr>
							<td>
							<b>Address : </b>
							</td>
							<td><span> <?php echo $v5;?><br/></span></td>
					</tr>
					<tr>
							<td>
							<b>DOB : </b>
							</td>
							<td><span> <?php echo $v6;?><br/></span></td>
					</tr>
					<tr>
							<td>
							<b>Mobile No : </b>
							</td>
							<td><span> <?php echo $v7;?><br/></span></td>
					</tr>
					<tr>
							<td>
							<b>Telephone No : </b>
							</td>
							<td><span> <?php echo $v8;?><br/></span></td>
					</tr>
					<tr>
							<td>
							<b>Email : </b>
							</td>
							<td><span> <?php echo $v9;?><br/></span></td>
					</tr>
		</table>
		<a class="link" href="salesDelete.php?" onclick="return confirm('Are you sure you wish to delete this Record?');">DELETE</a>
		<a class="link" href="salesUpdate.php?">UPDATE</a>
	</form>
	</div>
	</body>
</html>