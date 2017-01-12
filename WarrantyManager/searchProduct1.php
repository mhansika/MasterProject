<!DOCTYPE html>
 <?php include '../core/init.php';
      protect_page(); 
	
      ?>

<html lang="en">
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="css/form.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script>
		 <script>
	
		// JQUERY: Plugin "autoSumbit"
	(function($) {
		$.fn.autoSubmit = function(options) {
			return $.each(this, function() {
				// VARIABLES: Input-specific
				var input = $(this);
				var column = input.attr('name');
	
				// VARIABLES: Form-specific
				var form = input.parents('form');
				var method = form.attr('method');
				var action = form.attr('action');

				// VARIABLES: Where to update in database
				var where_val1 = form.find('#where1').val();
				var where_col1 = form.find('#where1').attr('name');
				var where_val2 = form.find('#where2').val();
				var where_col2 = form.find('#where2').attr('name');
	
				// ONBLUR: Dynamic value send through Ajax
				input.bind('blur', function(event) {
					// Get latest value
					var value = input.val();
					// AJAX: Send values
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
					// Prevent normal submission of form
					return false;
				})
			});
		}
	})(jQuery);
	// JQUERY: Run .autoSubmit() on all INPUT fields within form
	$(function(){
		$('#ajax-form INPUT').autoSubmit();
	});
	 
	 </script>
  
</head>


<div id="body">
    <div id="navigation"></div>
    <nav>
        <ul id="mainsidebar">
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="dt">

                    <a href="enterDefect.php" id="dt" style="top: 1px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 20px;
                                text-align:center;"><img class= "pic" src="img/b.png" align="middle" width="80px"><span>Enter Defects</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "checkReplace.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/c.png" align="middle" width="80px"><span>Check Replacements</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="md" >

                    <a href="misDealer.php" id="mis" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/d.png" align="middle" width="80px"><span>Misused </br> Dealers</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "viewAllReplace.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/f.png" align="middle" width="80px"><span>View All Replacements</span></a>
                </div>
            </li>
             <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                      <a href= "searchProduct.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/g.png" align="middle" width="80px"><span>Search Product</span></a>
                </div>
            </li>

            

    </nav>


    </nav>
</div>

    <div class="content">

            <div id="content">
            <form  class='autosubmit' method='POST' action='ajax-update2.php' method="POST" enctype="multipart/form-data" id='ajax-form' name="Form">


                    <div class="ad">
					<a href="../index.php"  style="display:block;float:right;margin-right:45px;margin-top:20px;color: black;font-size:18px;margin-bottom:10px;padding-bottom:10px;"> <img class="logout" src="../img/lgout.png" ></a> 
              
					
<div id = "form-align">
	<div class="form-style-2">
		<div class="form-style-2-heading">Results</div>
				<br/>					

<?php

if (isset($_POST['submit']))
{
	$batch_num = $_POST['batch_num'];
	$battery_num = $_POST['battery_num'];
	
	$sql = "SELECT * 
	FROM released_batteries
	WHERE batch_num = '$batch_num' AND battery_num= '$battery_num' " ;
	
	$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc() ){
		echo "

					<form method ='POST' action ='searchProduct1.php'>
					<label><span>Batch No :</span><input type='text' class='input-field' name='batch_num' style='width: 150px' value= ".$row['batch_num']." />

					<label for='field2'><span>Battery Number:</span>
					<input type='number' class='input-field' name='battery_num' style='width: 150px ;' value= ".$row['battery_num'].">
					</label>
					<label for='field3'><span>Defect Type : </span>
							<select class='select-field' id='batterysubtype' name='defect_type' >
							
							  <option value= ".$row['defect_type']." selected>".$row['defect_type']."</option>"; 
								$query= "SELECT defect FROM defect_types ";
								$db = mysqli_query($conn, $query);
								while ( $d=mysqli_fetch_assoc($db)) {
		
	
	
  echo "
  
  <option value='{".$d['defect']."}'>".$d['defect']."</option>";
}

			$sql5 = "SELECT dealer_name FROM dealer WHERE dealer_id = '$row[dealer_id]'";
            $query5=(mysqli_query($conn,$sql5));
            while($res5 = mysqli_fetch_assoc($query5)){
echo "
</select>		  
							  
							
					</label>
					<label for='field4'><span>Dealer Name:</span>
					<input type='text' class='input-field' name='dealer_id' style='width: 200px ;' value= ".$res5['dealer_name'].">
					</label>
					<label for='field3'><span>Validity Status: </span>
					<select class='select-field' id='batterysubtype' name='battery_status'>
				
				";
				
				
				$sql5 = "SELECT status_name FROM battery_status WHERE indicator = '$row[battery_status]'";
				$query5=(mysqli_query($conn,$sql5));
				while($res5 = mysqli_fetch_assoc($query5)){
		echo"
				<option value=".$row['battery_status']." selected>".$res5['status_name']."</option>	";	
				
				}
				
				 //getting data to a drop down
 
				$query= "SELECT * FROM battery_status ";
				$db = mysqli_query($conn, $query);
				while ( $d=mysqli_fetch_assoc($db)) {
		
	
	
  echo "
  
				<option value='".$d['indicator']."'>".$d['status_name']."</option>";
				}

				
			}
			
			
		echo "
				</select></label>
					<label for='field7'><span>Replaced Date:</span>
					<input type='date' class='input-field' name='replaced_date' style='width: 150px ;' value= ".$row['replaced_date'].">
					</label>
					<label for='field7'><span>Warranty Expiry Date:</span>
					<input type='date' class='input-field' name='warranty_period' style='width: 150px ;' value= ".$row['warranty_period'].">
					</label>
					<label for='field'><span>Customer Sold Date:</span>
					<input type='date' class='input-field' name='cus_sold_date' style='width: 150px ;' value= ".$row['cus_sold_date'].">
					</label>
					<input id='where1' type='hidden' name='batch_num' value=".$row['batch_num']."  />
					<input id='where2' type='hidden' name='battery_num' value=".$row['battery_num']."  />
					";
	}
}
}
?>	
					
		
		

				
					
	  
							  
							
			
										 

	
	
				

					
</div>
</div>
