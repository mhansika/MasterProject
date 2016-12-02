<!DOCTYPE html>
<html lang="en">
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="../css/m.css" media="screen" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
	<!-- bxSlider Javascript file -->
	<script src="../js/jquery.bxslider.js"></script>
	<!-- bxSlider CSS file -->
	<link href="css/jquery.bxslider.css" rel="stylesheet" />
	<style>
		nav{
			float: left;
		}
		.error {
			color: #FF0000;
		}
	</style>

</head>
<body>
<?php
include '../../include/header.php';
?>
<div id="body">

	<nav>
		<ul id="mainsidebar">
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" id="pd">

					<a href="../battery/product.php" id="pd" style="top: 1px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/a.png" align="middle"><span>Product Details</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" >

					<a href= "../stock/stock.php" id="stock" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/b.png" align="middle"><span>Stock</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" id="dealer_title" >

					<a href="../dealer/viewdealer.php" id="dealer" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/c.png" align="middle"><span>Dealer</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" >

					<a href="../salesperson/salep.php" id="salep" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/d.png" align="middle"><span>Salesperson</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" >

					<a href="../../report/report.php" id="report" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/e.png" align="middle"><span>Reports</span></a>

				</div>
			</li>
		</ul>
	</nav>
	<div class="content">
		<ul id="top">
			<li class="topn"><a style="width: 300px" href="salep.php"><img src="../img/Add.png"><span class="bar">View</span></a></li>
			<li class="topn"><a style="width: 300px" href="addsalep.php"><img src="../img/View.png"><span class="bar">Add</span></a></li>
			<li class="topn"><a style="width: 300px" href="searchsalep.php"><img src="../img/Search.png"><span class="bar">Search</span></a></li>
		</ul>
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
			<?php

			include '../../include/footer.php';
			?>

