<?php 
	require "database/connect.php";
	session_start();
	$did = $_SESSION['dealer_id'];
	$fn = $_SESSION['F_name'];
	$ln = $_SESSION['L_name'];

	$sql = "SELECT * FROM `sales_person` WHERE F_name = '$fn' AND L_name = '$ln'";
					
	$result= mysqli_query($connection, $sql);
					
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){				
				/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
				$x0=$row["salesPerson_id"];
				
			}
		}else{
			echo '<script>';
			echo 'alert("Zero Result")';
			echo '</script>';
		}

	$sql3="UPDATE `dealer` SET `salesPerson_id`= $x0 WHERE `dealer_id` =$did";        
	//$sql="INSERT INTO `sales_person` (`F_name`, `area_no`, `NIC`, `address`, `L_name`, `mobileNo`, `telephoneNo`, `email`, `DOB`) VALUE('hapila','col1','38849204','Matale','Bogahapitiya','62780945','62233368','kapila@gmail.com','1985-02-19')";
	if(mysqli_query($connection,$sql3)){
		header("Location: salesAddnew.php");
        //die();
    } else{echo "error";}   
?>