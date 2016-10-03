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
			
			$nameerr = $v1 = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if(empty($_POST['sales_name'])){ 
	                $nameerr = "required";
	                $error = TRUE;
				}else{
					$sales_name = $_POST['sales_name'];
					$v1 = $_POST['sales_name'];
					$_SESSION['sales_name'] = $v1;
					header("Location: sales.php");
					}
				}
		?>

		<div class="ad">
			<h1>Search Salesperson</h1>
			<table class='tbl'>
				<form action="" method="POST">
					<tr>
						<td><b>Salesperson Name:<span class="error">* <?php echo $nameerr;?></span></b></td>
					</tr>
					<tr>
						<td colspan="2"><input type=text name=sales_name size="30" maxlength="25" style="width: 300px" required>
						<input type="submit" class="button" value="Search" ></td>
					</tr>
				</form>
			</table>						
		</div>
	</body>
</html>