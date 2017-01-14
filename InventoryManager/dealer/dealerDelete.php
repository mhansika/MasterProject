<?php 

	require "../../database/connect.php";
	session_start();
	$v = $_SESSION['dealer_name'];
		
	$sql = "UPDATE dealer SET active=0 WHERE dealer_name='$v'";

	if (mysqli_query($connection, $sql)){
		echo "Record deleted successfully";
		header("Location: dealerSearch.php");
	}else{
		echo "Error deleting record: ";
		}

	mysqli_close($connection);
			
			
?>