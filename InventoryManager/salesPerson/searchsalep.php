<html>
	<head>
		<style>
			.error {color: #FF0000;}
		</style>
		<link type="text/css" rel="stylesheet" href="css/m.css"/>

		<title>search salesperson</title>
	</head>
	<body>

		<?php
			require "database/connect.php";
			session_start();
			$error=FALSE;
			$salesPerson_iderr = "";
			$v0=$v1=$v2=$v3=$v4=$v5=$v6=$v7=$v8=$v9="";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if(empty($_POST['salesPerson_id'])){ 
                $salesPerson_iderr = "required";
                $error = TRUE;
				}else{
					$salesPerson_id = $_POST['salesPerson_id'];
				}
				if ($error==FALSE){
					$sql = "SELECT * FROM `sales_person` WHERE salesPerson_id = '$_POST[salesPerson_id]'";
					
					$result= mysqli_query($connection, $sql);
					
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
						$v0=$row["salesPerson_id"];
						$_SESSION['salesPerson_id']=$v0;
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
    padding-bottom: 10px;">Search Salesperson</h1>
			
			
			<table class='tbl'>
				<form action="" method="POST">
					<tr>
						<td><b>Salesperson ID<span class="error">* <?php echo $salesPerson_iderr;?></span></b></td>
					</tr>
					<tr>
						<td colspan="2"><input type=text name=salesPerson_id size="30" maxlength="25" style="width: 300px">
						<input type="submit" class="button" value="Search" ></td>
					</tr>
					<tr>
							<td><b>Salesperson Id : </b></td>
							<td><span> <?php echo $v0;?><br/></span></td>
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
						<td><span> <?php echo $v3;?><br/></span></td>
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
					
						
					
					
				</form>

			</table>
			
			<a class="link" href="delsalep.php?" onclick="return confirm('Are you sure you wish to delete this Record?');">DELETE</a>
			<a class="link" href="upsalep.php?">UPDATE</a>		
			
	

							


		</div>

	</body>
</html>