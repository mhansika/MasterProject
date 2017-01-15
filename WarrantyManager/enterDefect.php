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

	<script>
		$(function(){
			$(".AutoSubmitCombo").change(function(){
				var input = $(this);

				if ( input.selectedIndex <= 0 )
					return;

				var value = input.val();
				var id = input.attr('id');

				if ( value == "" )
					return;

				var form = input.parents('form');

				id = id.split('_')[1];

				if ( id == "" )
					return;

				var vals = id.split("|");
				var batch = vals[0];
				var num = vals[1];

				$.ajax({
					url: "ajax-update1.php",
					type: "POST",
					data: {
						batch_num: batch,
						battery_num: num,
						val: value
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
		//multiple dropdown selection
		$( document ).ready(function() {
			$("select#cap").click( function(){
				//var id = this.id;
				var id = $(this).children(":selected").attr("id");
				console.log(id);
				$.ajax({
					url:'getdrop2.php?data='+id,
					type:"get",
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
	<div class="ad">
	<form class="AddPro" action="#" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
			<h1 class="add">Defect Types Of Batteries</h1>
			</br>
			<table width="70%">
				<tr>
					<th>From : </th>
					<th>To : </th>
					<th></th>
					<th></th>
				</tr>
				<tr></tr>
				<tr>
					<form>
						<div class="form-group input-group">
							<th><input name="date_1" type="date"  size="9" value=""/></th>
							<th> <input name="date_2" type="date"  size="9" value=""/></th>
						</div>
						<th><button class="search" type="submit" name="submit" value="submit">Search</button> </th>
						<th><a href = "enterDefectType.php"><img src="img/defect.png" width="200px" height= "50px"></a></th>
					</form>
				</tr>
			</table>
			<?php
			require "../core/database/connect.php";
			if (isset($_POST['submit'])) {

			$from_date = strtotime($_POST['date_1']);
			$to_date = strtotime($_POST['date_2']);
			$First_Date = date('Y-m-d',$from_date);
			$Next_Date =  date('Y-m-d',$to_date);

			$sql="SELECT battery_status,replaced_date,batch_num,battery_num,defect_type FROM released_batteries WHERE battery_status = '3' AND replaced_date BETWEEN '" . $First_Date . "' AND  '" . $Next_Date . "' ";

			echo $sql;

			$result = $conn->query($sql);
			if ($result->num_rows > 0) {?>
			<div  class='tbl-header'>
				<table cellpadding='0' cellspacing='0' border='0'>
					<thead>
					<tr>
						<th>Replaced Battery Number</th>

						<th>Defect Type</th>
						<th>Enter/Update Defect Type</th>
					</tr>
					</thead>
				</table>
			</div>
			<div  class='tbl-content'>
				<table cellpadding='0' cellspacing='0' border='0'>
					<tbody>

					<?php
					while($row1 = $result->fetch_assoc() ){
					$id = $row1["batch_num"]."|".$row1["battery_num"];
					echo"
				<tr>
				<td>".$row1["batch_num"].$row1["battery_num"]."</td>  
				<td>".$row1["defect_type"]."</td> ";
					?>
					<td>
						<form id='form_<?php echo $id; ?>' class='autosubmit' method='POST' action='ajax-update1.php'>
							<select id ="dt_<?php echo $id; ?>" name='defect_type' class="AutoSubmitCombo">
								<option value = ''>--SELECT--</option>

								<?php
								//getting data to a drop down
								$query= "SELECT defect FROM defect_types ";
								$db = mysqli_query($conn, $query);
								while ( $d=mysqli_fetch_assoc($db)) {
									echo "<option value='".$d['defect']."' ". ( $d['defect'] == $row1["defect_type"]  ? "selected='selected'" : "" )." >".$d['defect']."</option>";
								}
								?>
							</select>
							<?php
							}
							echo "</table>";
							} else {
								echo "0 results";
							}
							echo"</form>";
							}
							mysqli_close($conn);
							?>
					</tbody>
				</table>
			</div>
	</form>
	</div>
</div>
<?php
include '../InventoryManager/include/footer.php';
?>
</body>
</html>
