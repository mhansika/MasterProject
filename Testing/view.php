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
					<input type="submit" name="submit" value="Search">
				</tr>

			</form>

		</div>

	</body>
</html>