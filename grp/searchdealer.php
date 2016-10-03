<html>
	<head>
		<style>
			.error {color: #FF0000;}
		</style>
		<link type="text/css" rel="stylesheet" href="css/m.css"/>

		<title>search dealer</title>
	</head>
	<body>

	<?php
		require "database/connect.php";
		session_start();
		$error=FALSE;
		
		$dealer_iderr = "";
		$v0=$v1=$v2=$v3=$v4=$v5=$v6=$v7=$v8=$v9=$zero="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['dealer_id'])){ 
                $dealer_iderr = "";
                $error = TRUE;
			}else{
				$dealer_id = $_POST['dealer_id'];
				}
			if ($error==FALSE){
				$sql = "SELECT * FROM dealer WHERE dealer_id = '$_POST[dealer_id]'";
					
				$result= mysqli_query($connection, $sql);
					
					if(mysqli_num_rows($result) > 0){
						
						while($row = mysqli_fetch_assoc($result)){
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
							$v0=$row["dealer_id"];
							$_SESSION['dealer_id']=$v0;
							$v1=$row["dealer_name"];
							$v2=$row["NIC"];
							$v3=$row["area_no"];
							$v4=$row["address"];
							$v5=$row["salesPerson_id"];
							$v6=$row["mobileNo"];
							$v7=$row["telephoneNo"];
							$v8=$row["email"];
							$v9=$row["fax"];
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
    padding-bottom: 10px;">Search Dealer</h1>
			
			
		<table class="tbl">
			<form action="" method="POST">
					
				<tr>
					<td><b>Dealer ID<span class="error">* <?php echo $dealer_iderr;?></span></b></td>
				</tr>
					
				<tr>
					<td colspan="2"><input type=text name=dealer_id size="30" maxlength="25" style="width: 300px" required><input type="submit" class="button" value="Search" ></td>
				</tr>
					
				<tr>
					<td><b>Dealer ID : </b></td>
					<td><span> <?php echo $v0;?><br/></span></td>
				</tr>
					
				<tr>
					<td><b>Name : </b></td>
					<td><span> <?php echo $v1;?><br/></span></td>
				</tr>
					
				<tr>
					<td><b>NIC: </b></td>
					<td><span> <?php echo $v2;?><br/></span></td>
				</tr>
					
				<tr>
					<td><b>Area: </b></td>
					<td><span> <?php echo $v3;?><br/></span></td>
				</tr>
					
				<tr>
					<td><b>Address : </b></td>
					<td><span> <?php echo $v4;?><br/></span></td>
				</tr>
					
				<tr>
					<td><b>Relevant Salesperson ID: </b></td>
					<td><span> <?php echo $v5;?><br/></span></td>
				</tr>
					
				<tr>
					<td><b>Mobile No : </b></td>
					<td><span> <?php echo $v6;?><br/></span></td>
				</tr>
					
				<tr>
					<td><b>Telephone No : </b></td>
					<td><span> <?php echo $v7;?><br/></span></td>
				</tr>
					
				<tr>
					<td><b>Email : </b></td>
					<td><span> <?php echo $v8;?><br/></span></td>
				</tr>
					
				<tr>
					<td><b>Fax : </b></td>
					<td><span> <?php echo $v9;?><br/></span></td>
				</tr>
				
			
			

		</table>
		<a class="link" href="deldealer.php?" onclick="return confirm('Are you sure you wish to delete this Record?');">DELETE</a>
		<a class="link" href="updealer.php?">UPDATE</a>
			
	</form>

							


	</div>

	</body>
</html>