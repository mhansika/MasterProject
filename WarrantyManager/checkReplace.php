<html xmlns="http://www.w3.org/1999/html">
<?php include '../core/init.php';
protect_page();
?>
<?Php
$uid= $user_data['user_id'];
$role= $user_data['role'];
/*echo '$role';*/
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../InventoryManager/css/IM.css" type="text/css"/>

	<script type="text/javascript">

		$(function(){
			$(".autosubmit").change(function(){
				var input = $(this);
				var value = input.val();
				var column = input.attr('name');
				var id = input.attr('id');

				if ( value == "" )
					return;

				var form = input.parents('form');

				id = id.split('_')[1];

				var batch = ('#batch_').concat(id);
				var battery = ('#battery_').concat(id);

				var where_val1 = form.find(batch).val();
				var where_col1 = form.find(batch).attr('name');
				var where_val2 = form.find(battery).val();
				var where_col2 = form.find(battery).attr('name');

				$.ajax({
					url: "ajax-update.php",
					type: "POST",
					data: {
						val: value,
						col: column,
						w_col1: where_col1,
						w_val1: where_val1,
						w_col2: where_col2,
						w_val2: where_val2

					},
					cache: false,
					timeout: 10000,
					success: function(data) {
						// Alert if update failed
						if (data) {
							alert(data);
						}
						// Load output into a P
						else {
							$('#notice').text('Field updated');
							$('#notice').fadeOut().fadeIn();
						}
					}
				});
			});
		});
		$(function(){
			$("#btnConfirm").click(function(){
				var input = $(this);
				var dealer  = input.attr('value');

				if ( dealer == "" )
					return;

				$.ajax({
					url	: "confirmData.php",
					type: "POST",
					data: {action: 'confirm', dealer_id : dealer},
					success: function(result)
					{
						$("#validCount").html(result);
					}

				});
			});

			$("#btnSubmit").click(function(){
				var input = $(this);
				var dealer  = input.attr('value');

				if ( dealer == "" )
					return;

				$.ajax({
					url	: "confirmData.php",
					type: "POST",
					data: {action: 'submit', dealer_id : dealer},
					success: function(result)
					{
						alert(result);
						window.location.href = window.location.href
					}

				});
			});
		});
		//multiple dropdown selection	
		$( document ).ready(function() {
			$("select#cap").click( function(){
				//var id = this.id;
				var id = $(this).children(":selected").attr("id");
				console.log(id);

				$.ajax({

					url:'getdrop2.php?data='+id,
					type:"GET",
					success:function(data){

						$("tr#trow>th#second").html("");
						$("tr#trow>th#second").html(data);
					}


				});
			});

		});
	</script>
	
</head>
<body>
<?php
include '../InventoryManager/include/header.php';
?>
<div id="nav">
	<ul id="mainsidebar">
		<li class="sidenav">
			<div id="side">
				<a href="enterDefect.php"><img src="../img/a.png" class="pro"></a>
				<span>Enter Defects</span>
			</div>
		</li>
		<li class="sidenav">
			<div id="side">
				<a href="checkReplace.php"><img src="../img/b.png" class="pro"></a>
				<span>Check Replacements</span>
			</div>
		</li>
		<li class="sidenav">
			<div id="side">
				<a href="misDealer.php"><img src="../img/c.png" class="pro"  onclick="myAjax()"></a>
				<span>Misused Dealers</span>
			</div>
		</li>
		<li class="sidenav">
			<div id="side">
				<a href="viewAllReplace.php"><img src="../img/d.png" class="pro"></a>
				<span>All Replacements</span>
			</div>
		</li>
		<li class="sidenav">
			<div id="side">
				<a href="searchProduct.php"><img src="../img/e.png" class="pic"></a>
				<span>Search Battery</span>
			</div>
		</li>
	</ul>
</div>
<div id="content">
	<form class="AddPro" action="#" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
		<div class="ad">
			<h1 class="add"><b>Replacement Inspection</b></h1>
			<br/>
			<!--form action= "" method="post" id= "formID"-->
			<table width="70%">
				<tr>
					<th>Area :</th>
					<th>Dealer :</th>
					<th></th>
				</tr>
				<tr id= "trow">
					<th>
						<select name="area" id="cap">
							<option>     -------ALL--------   </option>
							<?php
							$sql1 = "Select DISTINCT area_no,area from area";
							$result1= mysqli_query($connection, $sql1);
							while($r=mysqli_fetch_row($result1))
							{
								echo '<option id=' .$r[0].'> ' . $r[1] . '</option>';

							}
							?>
						</select>
					</th>
					<th id="second">
						<select name= "dealer_id" id = "hat">
							<option> -------ALL--------</option>
						</select>
					</th>
		</div>
		<th>
			<button class="search" type="submit" name="submit" value="submit">search</button>
		</th>
		</tr>
		</table>
		<!--/form-->
	</form>
	<?php
	require "../core/database/connect.php";
	$dealer_name ="";

	if (isset($_POST['dealer_id'])){
		$dealer_name = $_POST['dealer_id'];
		$sql = "SELECT * FROM released_batteries WHERE battery_status = '3' AND dealer_id = '$_POST[dealer_id]'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			echo "
		<div  class='tbl-header'>
		<table cellpadding='0' cellspacing='0' border='0'>
		  <thead>
			<tr>
				<th>Replacement</th>
				<th>Replacement Date</th>
				<th>Warranty Expiry - Date</th>
				<th>Within Warranty Period</th>
				<th>Defect Type Ok/Not</th>
				<th>Valid replacement</th>
			  
			</tr>
		  </thead>
		</table>
		</div>
		<div  class='tbl-content'>
		<table cellpadding='0' cellspacing='0'border='0'> 
			<tbody>";

			// output data of each row
			while($row = $result->fetch_assoc()) {
				$batch_num = $row["batch_num"] ;
				$battery_num = $row["battery_num"] ;
				$valid = warranty_calculation( $conn, $batch_num , $battery_num );
				//print_r($valid);
				$final_valid =  warranty_validation( $conn, $valid) ;
				//print_r($final_valid);
				$row["validity"] = $final_valid ;
				$defected = check_defect ($conn, $valid);
				$row["defected"] = $defected;

				//check valid
				if (isset($final_valid)) {
					$check_replace = check_replacement ($conn,$valid,$final_valid, $defected) ;
					$row["replacement"] = $check_replace;

					$id = "".$row["batch_num"]."|".$row["battery_num"];
					$idIn = "".$row["batch_num"].$row["battery_num"];
					echo "
			<tr>
				<td>".$idIn."</td>
				<td>
					<input id='date_".$idIn."' type='date' id='date_".$idIn."' name='replaced_date' size='20' value= '".$row['replaced_date']."' class='autosubmit'>
					<input id='batch_".$idIn."' type='hidden' name='batch_num' value=".$row['batch_num']."  />
					<input id='battery_".$idIn."' type='hidden' name='battery_num' value=".$row['battery_num']."  />
				</td>
				<td>".$row['warranty_period']."</td>
				<td>".$row["validity"]."</td>
				<td>".$row["defected"]."</td>
				<td>".$row["replacement"]."</td>
			</tr>"
					;
				}
			}
		}
		echo "
		
		</tbody></table>
		</body>
	</html>";
	} else {
		echo "<div>No results to dispaly</div>";
	}

	$conn->close();
	?>
</div>
<div class="bottom" align="center">
	<div style='text-align:left;color:black;padding:5px;' id='validCount'></div>

	<button  type=button class='update' name='confirm' value='<?php echo isset($_POST['dealer_id']) ? $_POST['dealer_id'] : "" ?>'>Confirm</button>
	<button type=button class='submit' name='send' value='<?php echo isset($_POST['dealer_id']) ? $_POST['dealer_id'] : "" ?>' >Submit</button>

</div>
</div>
</div>
</div>
<?php
include '../InventoryManager/include/footer.php';
?>
</body>
</html>
