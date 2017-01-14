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
		require "../../database/connect.php";
		//session_start();
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
				header("Location: serchAdmin.php");
			}
		}
		?>
		<div class="AddPro">
		<div class="ad">

<tr>    <td id="data"><button class="submit" name="submit" value="send">Add New</button></td>
                        <td id="data"><button class="reset" type="reset">Search</button></td> <td id="data"><button class="reset" type="reset">Backups</button></td> </tr>

</br></br>

			<h1 class="add">Search Dataentry Operator</h1>
			<table id="ad">



                        
				<form action="" method="POST">


 


					<tr>
						<td>
							<b>Dataentry Operator Name:<span class="error">* <?php echo $dealer_iderr;?></span></b>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="text" name="dealer_name" size="30" maxlength="25" style="width: 300px" required>
							<input type="submit" name="submit" value="Search">
					</tr>
				</form>
		</div>
		</div>
		<?php
		include '../include/footer.php';
		?>
	</div>
</body>
</html>
