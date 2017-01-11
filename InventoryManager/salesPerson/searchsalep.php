<?php
?>
<html>
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/IM.css" type="text/css"/>
</head>
<body>
<div class="row">
	<?php
	include '../include/header.php'
	?>
	<?php
	include '../include/sidenav.php'
	?>
	<div id="content">
		<div class="topnav">
			<a href="../salesperson/salep.php"><img src="../img/View.png"></a>
			<a href="../salesperson/addsalep.php."><img src="../img/Add.png"></a>
			<a href="../salesperson/searchsalep.php."><img src="../img/Search.png"></a>
		</div>
		<?php
		require "../../database/connect.php";
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
				<form class="AddPro" action="" method="POST">
					<h1 class="add">Search Salesperson</h1>
					<table id='ad'>
					<tr>
						<td><b>Salesperson ID<span class="error">* <?php echo $salesPerson_iderr;?></span></td>
					</tr>
					<tr>
						<td><input type=text name=salesPerson_id size="30" maxlength="25" style="width: 300px">
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
					<tr>
						<td></td>
						<td>
							<button class="save"  value="send" <a class="link" href="delsalep.php?" onclick="return confirm('Are you sure you wish to delete this Record?');">Delete</button></a>
						</td>
						<td></td>
						<td> <button class="reset" type="reset" <a class="link" href="upsalep.php?">Update</button></a>
						</td>
					</tr>
				</form>
			</table>
	</div>
	<?php
	include '../include/footer.php';
	?>
</div>
</body>
</html>
