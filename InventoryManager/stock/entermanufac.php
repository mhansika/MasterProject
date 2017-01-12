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
	<link rel="stylesheet" href="../css/stock.css" type="text/css"/>
</head>
<body>
<?php
include '../include/header.php'
?>
<div id="nav">
	<ul id="mainsidebar">
		<li class="sidenav">
			<div id="side">
				<a href="../inventory.php"><img src="../img/Back.png" class="pic"></a>
				<span>Back</span>
			</div>
		</li>
		<li class="sidenav">
			<div id="side">
				<a href="entermanufac.php"><img src="../img/manufac.png" class="pic"></a>
				<span>Manufactured Products</span>
			</div>
		</li>
		<li class="sidenav">
			<div id="side">
				<a href="entersold.php"><img src="../img/Sold.png" class="pic"></a>
				<span>Sold Products</span>
			</div>
		</li>
		<li class="sidenav">
			<div id="side">
				<a href="stockInHand.php"><img src="../img/stockH.png" class="pic"></a>
				<span>Stock In Hand</span>
			</div>
		</li>
	</ul>
</div>
<div id="content">
	<?php
	require "../../core/database/connect.php";
	if (isset($_POST["submit"]))
	{
		$str =$_POST['batch_num1'].$_POST['batch_num2'].$_POST['batch_num3'].$_POST['batch_num4'];
		$str = mysqli_real_escape_string($conn,$str);

		$arr1 = substr($str, 0,4);
		$arr2 = substr($str, 4);
		$arr3 = str_split($arr1);

		$serial_no		= '$arr1';
		$battery_num	= '$arr2';
		$amount			= (int)($_POST['amount']);
		$battery_name=$_POST['battery_name'];
		$b_type = $_POST['battery'];


		//checking the battery types
		if ($arr3[0]=='D'){
			$battery_type='Dagenite';

		}
		elseif ($arr3[0]=='E') {
			$battery_type='Exide';
		}
		elseif ($arr3[0]=='L') {
			$battery_type='Lucas';
		}

		//checking the production line
		if  ($arr3[1]=='1'){
			$production_line='1';

		}
		elseif ($arr3[1]=='2') {
			$production_line='2';

		}

		//checking the manufactured month
		if ($arr3[2]=='A') {
			$manufacture_month='January';
		}
		elseif ($arr3[2]=='B') {
			$manufacture_month='February';
		}
		elseif ($arr3[2]=='C') {
			$manufacture_month='March';
		}
		elseif ($arr3[2]=='D') {
			$manufacture_month='April';
		}
		elseif ($arr3[2]=='E') {
			$manufacture_month='May';
		}
		elseif ($arr3[2]=='F') {
			$manufacture_month='June';
		}
		elseif ($arr3[2]=='G') {
			$manufacture_month='July';
		}
		elseif ($arr3[2]=='H') {
			$manufacture_month='August';
		}
		elseif ($arr3[2]=='I') {
			$manufacture_month='September';
		}
		elseif ($arr3[2]=='J') {
			$manufacture_month='October';
		}
		elseif ($arr3[2]=='K') {
			$manufacture_month='November';
		}
		elseif ($arr3[2]=='L') {
			$manufacture_month='December';
		}

		//checking the manufactured year

		$manufacture_year = $arr3[3];

		$sql = "INSERT INTO manufac_batteries (batch_num,battery_type,battery_name,production_line,manufac_date,manufacture_month,manufacture_year,amount) VALUES ('$str','$battery_type','$battery_name','$production_line',(NOW()),'$manufacture_month','$manufacture_year','$amount')";

		if (mysqli_query($conn, $sql)) {
			echo "";
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		// Adding batteries as bulk
		// Uses multiple values at the VALUES clause.

		$lastEntry = getLatestBatteryNumber( $conn, $str );
		//$WarrantyPeriod = getWarrantyPeriod ($conn, $battery_type) ;

		$sql = "INSERT INTO released_batteries(batch_num, battery_num,battery_status) VALUES ";

		for ( $i = 1 ; $i < $amount; $i++ )
		{
			$num = $lastEntry + $i;
			$sql = $sql . "('$str', '". sprintf('%06d', $num )."','". '0' ."'),";

		}
		$num = $lastEntry + $amount;
		$sql = $sql . "('$str', '". sprintf('%06d', $num)."','". '0' . "');";

		if (mysqli_query($conn, $sql)) {
			echo "";
		}
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		$query =mysqli_query($conn,"SELECT battery_type FROM stock_in_hand WHERE battery_name='$battery_name' ");
		$rows=mysqli_num_rows($query);

		if ($rows == 1) {

			$query="UPDATE stock_in_hand SET current_stock=current_stock +'$amount' WHERE battery_type='$battery_type' AND battery_name ='$battery_name' ";
			if (mysqli_query($conn, $query))
			{
				echo "";
			}

			else
			{
				echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}
		}

		else{
			$query = "INSERT INTO stock_in_hand (battery_type,battery_name,current_stock) VALUES ('$battery_type','$battery_name','$amount')";

			if (mysqli_query($conn, $query)) {
				echo "";
			}
			else {
				echo "Error: " . $query . "<br>" . mysqli_error($conn);
			}
		}

	}
	// This return the last entry related to the given batch number. If the entries from the middle are removed in the sequence, they are not considered.
	function getLatestBatteryNumber( $conn, $batchNo )
	{
		$result = mysqli_query($conn, "SELECT battery_num FROM released_batteries WHERE batch_num='$batchNo' ORDER BY battery_num DESC LIMIT 1;");

		if ( mysqli_num_rows($result) > 0) {
			if($row = mysqli_fetch_array($result)) {
				return (int)($row["battery_num"]);
			}
			else{
				return 0;
			}
		} else {
			return 0;
		}
	}
	?>
				<form class="AddPro" action="entermanufac.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
					<h1 class="add">Manufactured Batteries</h1>
					<label for ="field1"><span>Batch No :</span><input type="text" class="batch-number-field" name="batch_num1" value="D" maxlength="1" required />-<input type="number" class="batch-number-field" name="batch_num2" value="2" maxlength="1" required />-<input type="text" class="batch-number-field" name="batch_num3" value="D" maxlength="1" required />-<input type="number" class="batch-number-field" name="batch_num4" value="6" maxlength="1" required /></label>
					<label for="field2"><span>Battery Type: <span class="required">*</span></span>
						<select id="battery" class="select-field" name="battery" required>
							<option value="">----Select----</option>
							<option value="Exide">Exide</option>
							<option value="Lucas">Lucas</option>
							<option value="Dagenite">Dagenite</option>
						</select>
					</label>
					<label for="field3"><span>Battery Name: <span class="required">*</span></span>
						<select class="select-field" id="batterysubtype" name="battery_name" required>
							<option value="">----Select----</option>
							<option value="MF105D31R/L">MF105D31R/L</option>
							<option value="65D31R/L">65D31R/L</option>
							<option value="MFS65R/L">MFS65R/L</option>
						</select>
					</label>
					<label for="field4"><span>Amount:<span class="required">*</span></span>
						<input type="number" class="input-field" name="amount" style="width: 70px ;" required>
					</label>
					<br><br>
						<label><button class="submit" name="submit" value="send">Submit</button></label>
						<label><button class="reset" name="reset" value="reset">Reset</button></label>
				</form>
</div>
<?php
include '../include/footer.php';
?>
</body>
</html>
