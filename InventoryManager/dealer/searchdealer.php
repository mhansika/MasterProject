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

					<a href="../battery/product.php" id="pd"><img class= "pic" src="../img/a.png" align="middle"><span>Product Details</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" >

					<a href= "../stock/stock.php" id="stock"><img class= "pic" src="../img/b.png" align="middle"><span>Stock</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" id="dealer_title" >

					<a href="../dealer/viewdealer.php" id="dealer"><img class= "pic" src="../img/c.png" align="middle"><span>Dealer</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" >

					<a href="../salesperson/salep.php" id="salep" ><img class= "pic" src="../img/d.png" align="middle"><span>Salesperson</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" >

					<a href="../../report/report.php" id="report"><img class= "pic" src="../img/e.png" align="middle"><span>Reports</span></a>

				</div>
			</li>
		</ul>
	</nav>
	<div class="content">
		<ul id="top">
			<li class="topn"><a style="width: 300px" href="product.php"><img src="../img/Add.png"><span class="bar">View</span></a></li>
			<li class="topn"><a style="width: 300px" href="addbattery.php"><img src="../img/View.png"><span class="bar">Add</span></a></li>
			<li class="topn"><a style="width: 300px" href="searchbattery.php"><img src="../img/Search.png"><span class="bar">Search</span></a></li>
		</ul>

		<?php
		require "core/init.php";
		session_start();

		$error=FALSE;

		$dealer_iderr = $v1 = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['dealer_name'])){
				$dealer_iderr = "";
				$error = TRUE;
			}else{
				$dealer_name = $_POST['dealer_name'];
				$v1 = $_POST['dealer_name'];
				$_SESSION['dealer_name'] = $v1;
				header("Location: dealerSearch.php");
			}
		}
		?>

		<div class="ad">
			<h1>View</h1>


			<table class="tbl">
				<form action="" method="POST">

					<tr>
						<td><b>Dealer Name:<span class="error">* <?php echo $dealer_iderr;?></span></b></td>
					</tr>
					<tr>
						<td colspan="2"><input type=text name=dealer_name size="30" maxlength="25" style="width: 300px" required>
							<input type="submit" name="submit">
					</tr>

				</form>

		</div>

</body>
</html>



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


<?php

		include '../../include/footer.php';
		?>

