<!DOCTYPE html>
<?php
include 'header.php';
 ?>

<html lang="en">
    <head>
		<meta charset="utf-8">
	   
		<link rel="stylesheet" href="css/style1.css" media="screen" type="text/css" />
		 <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
		<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
		.widget {
		vertical-align: top ;
		margin-left: 1rem;
		font-size: 2rem;
		display: inline-block;
		position: relative;

	}

	.widget .len {
		width: 18rem;
		font-size: inherit;
		font-family: inherit;
		letter-spacing: 20px;
		background-color: transparent;
		color: white;
		border: solid black;

		-moz-appearance: textfield;
	}

	.widget .len::-webkit-inner-spin-button,
	.widget .len::-webkit-outer-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	.widget .digit-background {
		position: absolute;
		top: 1px;
		left: 0;
		z-index: -1;
	}

	.widget .digit-background .digit {
		display: inline-block;
		float: left;
	}

	.widget .digit-background .digit::before {
		content: '0';
		color: gray;
		background-color: ;
		display: inline-block;
		padding: 3px;
		margin: -1px 5px 0 -1px;
	}
	  </style>

    <head>
        <meta charset="utf-8">
       
        <link rel="stylesheet" href="css/style1.css" media="screen" type="text/css" />
         <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        .widget {
        vertical-align: top ;
        margin-left: 1rem;
        font-size: 2rem;
        display: inline-block;
        position: relative;

    }

    .widget .len {
        width: 18rem;
        font-size: inherit;
        font-family: inherit;
        letter-spacing: 20px;
        background-color: transparent;
        color: white;
        border: solid white;

        -moz-appearance: textfield;
    }

    .widget .len::-webkit-inner-spin-button,
    .widget .len::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .widget .digit-background {
        position: absolute;
        top: 1px;
        left: 0;
        z-index: -1;
    }

    .widget .digit-background .digit {
        display: inline-block;
        float: left;
    }

    .widget .digit-background .digit::before {
        content: '0';
        color: gray;
        background-color: ;
        display: inline-block;
        padding: 3px;
        margin: -1px 5px 0 -1px;
    }
      </style>

  
</head>


<div id="body">
	<div id="navigation"></div>
	<nav>
		<ul id="mainsidebar">
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" id="pd">

					<a href="../inventory.php" id="pd" style="top: 1px;
								display:block;
								position:absolute;
								float:left;
								font-family:arial;
								color:#1C1C1C;
								text-decoration:none;
								width:100%;
								height:70px;
								text-align:center;"><img class= "pic" src="../img/Back.png" align="middle"><span>Back</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" >

					<a href= "entermanufac.php" id="stock" style="top: 10px;
								display:block;
								position:absolute;
								float:left;
								font-family:arial;
								color:#1C1C1C;
								text-decoration:none;
								width:100%;
								height:70px;
								text-align:center;"><img class= "pic" src="../img/manufac.png" align="middle"><span>Manufature Products</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" id="dealer_title" >

					<a href="entersold.php" id="dealer" style="top: 10px;
								display:block;
								position:absolute;
								float:left;
								font-family:arial;
								color:#1C1C1C;
								text-decoration:none;
								width:100%;
								height:70px;
								text-align:center;"><img class= "pic" src="../img/Sold.png" align="middle"><span>Sold Products</span></a>
				</div>
			</li>
			<li class="var_nav">
				<div class="link_bg"></div>
				<div class="link_title" >

					<a href="stock_in_hand.php" id="salep" style="top: 10px;
								display:block;
								position:absolute;
								float:left;
								font-family:arial;
								color:#1C1C1C;
								text-decoration:none;
								width:100%;
								height:70px;
								text-align:center;"><img class= "pic" src="../img/stockH.png" align="middle"><span>Stock In Hand</span></a>
				</div>
			</li>

	</nav>


	</nav>
</div>
<?php

 require "../core/database/connect.php";


 /*function array_sanitize($item) {
   $conn= mysqli_connect('localhost','root','','warranty_management');
   $item=mysqli_real_escape_string($conn,$item);
 }

 
function manufac_data($manufac_data) {
 
  array_walk($manufac_data,"array_sanitize");
   
  $fields='`' .implode('`,`' ,array_keys($manufac_data)) . '`';
  $data='\'' . implode('\', \'' ,$manufac_data ) . '\' ';

   $conn= mysqli_connect('localhost','root','','warranty_management');
   mysqli_query($conn,"INSERT INTO  released_batteries($fields) VALUES ($data)");

}

*/

if (isset($_POST["submit"]))
{
	$str =$_POST['batch_num'];

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
	elseif ($arr3[2]=='2') {
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
    $WarrantyPeriod = getWarrantyPeriod ($conn, $battery_type) ;
	
	$sql = "INSERT INTO released_batteries(batch_num, battery_num,battery_status,warranty_period) VALUES ";
	
	for ( $i = 1 ; $i < $amount; $i++ )
	{
		$num = $lastEntry + $i;
		$sql = $sql . "('$str', '". sprintf('%06d', $num )."','". '0' ."','". '$WarrantyPeriod' ."'),";
       
	}
	$num = $lastEntry + $amount;
	$sql = $sql . "('$str', '". sprintf('%06d', $num)."','". '0' . "','". '$WarrantyPeriod' ."');";
	
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
	/*	 $manufac_data = array(

					'$battery_num'   =>  $_POST['battery_num'],
					'$battery_type' =>  $_POST['battery_type'],
					'$battery_name' =>  $_POST['battery_name'],
					'$production_line' =>  $_POST['production_line'],
					'$manufacture_month'   =>  $_POST['manufacture_month'],
					'$manufacture_year'   =>  $_POST['manufacture_year'],
									   
				  
				  
			   );


			manufac_data($manufac_data);
		   
				exit();

	 */					
							  
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

function getWarrantyPeriod ($conn, $batteryType)
{

$result= mysqli_query($conn, "SELECT warranty_period FROM battery_description WHERE battery_type='$batteryType'");
    
        if ( mysqli_num_rows($result) > 0) {
            if($row = mysqli_fetch_array($result)) {
                return (int)($row["warranty_period"]);
            }
            else{
                return 0;
            }
        } else {
            return 0;
        }
     }



?>

	<div class="content">

		<div class="table">
			<div id="content">
			<form action="entermanufac.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">


					<div class="ad">
						<h1><b>Manufactured Batteries</b></h1>
						<br><br>
							 <table>

									 <tr>
										<td>Batch No :
										<div class="widget">
										   <input type="text" class="len" value="D2D6" name="batch_num" required>
										   <div class="digit-background">
													 <div class="digit"></div>
													 <div class="digit"></div>
													 <div class="digit"></div>
													 <div class="digit"></div>
										   </div>
										</div>
									</td>
									</tr>
									<tr>
									<td>Battery Type:</td>


									<td> <select id="battery" style="font-color:black;" name="battery" required>
										<option value="">----Select----</option>
										<option value="Exide">Exide</option>
										<option value="Lucas">Lucas</option>
										<option value="Dagenite">Dagenite</option>
										</select>
									</td>

									</tr>
									<tr>
									<td>Battery Name:</td>
									<td> <select id="batterysubtype" name="battery_name" required>
										<option value="">----Select----</option>
										<option value="MF105D31R/L">MF105D31R/L</option>
										<option value="65D31R/L">65D31R/L</option>
										<option value="MFS65R/L">MFS65R/L</option>

									</select>

									</td>
									</tr>
						 

								   
									 <tr>
										<td>Amount:</td>
										<td><input type="number" name="amount" style="width: 70px" required></td>
									</tr>
								 <tr>
									<td><button class="submit" name="submit" value="send">Submit</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="reset" name="reset" value="reset">Reset</button></td>
								 </tr>

								</form>

								</table>

							</div>
		</div>
	   

</div>
</div>
<?php
include '../include/footer.php';
?>
<div>





