<html>
	<head>
		<style>
			.error {color: #FF0000;}
		</style>
		<link type="text/css" rel="stylesheet" href="css/m.css"/>

		<title>search dealer</title>

<script>
        
    $("div.content>ul#topnavi>li>a").click( function(e){

        e.preventDefault();

    });


    $("ul#topnavi>li>a").click( function(){
    var id = this.id;
    console.log(id);

    $('div.content > div.form').html("");

     if (id == "viewdealer"){

        url = "dd.php";

    } else if (id == "adddealer"){

        url = "adddealer.php";

    }


     $.ajax({


            
        type:"post",
        url:url,
        success:function(data){
            $('div.content > div.form').html("");            
            $("div.content> div.form").html(data);

        }



    });

    



});







</script>









	</head>
	<body>

	<!--<?php
		require "database/connect.php";
		
		session_start();
		$v1 = $_SESSION['dealer_name'];
		$error=FALSE;
		
		$dealer_iderr = "";
		$v0=$v2=$v3=$v4=$v5=$v6=$v7=$v8=$v9=$zero="";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$dealer_name = $_POST['dealer_name'];
				}
		/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['dealer_id'])){ 
                $dealer_iderr = "";
                $error = TRUE;
			}else{
				$dealer_id = $_POST['dealer_id'];
				}
			if ($error==FALSE){*/
				$sql = "SELECT * FROM dealer WHERE dealer_name = '$v1'";
					
				$result= mysqli_query($connection, $sql);
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
							$v0=$row["dealer_id"];
							$v1=$row["dealer_name"];
							$_SESSION['dealer_name']=$v1;
							$v2=$row["NIC"];
							$v3=$row["area_no"];
							$v4=$row["address"];
							$v5=$row["salesPerson_id"];
							$v6=$row["mobileNo"];
							$v7=$row["telephoneNo"];
							$v8=$row["email"];
							$v9=$row["fax"];
						}
					}else{
						 echo "<script>alert('No result found'); window.location.href='view.php'; </script>";
						}

				$sql1 = "SELECT * FROM area WHERE area_no = $v3";
					
				$result1= mysqli_query($connection, $sql1);
					
					if(mysqli_num_rows($result1) > 0){
						
						while($row = mysqli_fetch_assoc($result1)){
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
							$v10=$row["area"];
							
						}
					}else{
						 echo '<script>';
						 echo 'alert("area_result")';
						 echo '</script>';
						}

				$sql2 = "SELECT * FROM sales_person WHERE salesPerson_id = $v5";
					
				$result2= mysqli_query($connection, $sql2);
					
					if(mysqli_num_rows($result2) > 0){
						
						while($row = mysqli_fetch_assoc($result2)){
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
							$v11=$row["F_name"];
							$v12=$row["L_name"];
							
						}
					}else{
						 echo '<script>';
						 echo 'alert("Sales Person result")';
						 echo '</script>';
						}

					
			/*
		}*/
	?>
	-->
		
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
        padding-bottom: 10px;">Add Dealer</h1>
			
			
		<table class="tbl">
			<form action="" method="POST">
				<tr>
					<td><b>Dealer ID : </b></td>
					<td><span> <br/></span></td>
				</tr>
					
				<tr>
					<td><b>Name : </b></td>
					<td><span> <br/></span></td>
				</tr>
					
				<tr>
					<td><b>NIC: </b></td>
					<td><span> <br/></span></td>
				</tr>
					
				<tr>
					<td><b>Area: </b></td>
					<td><span> <br/></span></td>
				</tr>
					
				<tr>
					<td><b>Address : </b></td>
					<td><span> <br/></span></td>
				</tr>
					
				<tr>
					<td><b>Relevant Salesperson Name: </b></td>
					<td><span><br/></span></td>
				</tr>
					
				<tr>
					<td><b>Mobile No : </b></td>
					<td><span> <br/></span></td>
				</tr>
					
				<tr>
					<td><b>Telephone No : </b></td>
					<td><span><br/></span></td>
				</tr>
					
				<tr>
					<td><b>Email : </b></td>
					<td><span> <br/></span></td>
				</tr>
					
				<tr>
					<td><b>Fax : </b></td>
					<td><span> <?php echo $v9;?><br/></span></td>
				</tr>
		</table>
		<a class="link" href="dealerDelete.php" onclick="return confirm('Are you sure you wish to delete this Record?');">DELETE</a>
		<a class="link" href="dealerUpdate.php">UPDATE</a>
	</form>
	</div>
	</body>
</html>