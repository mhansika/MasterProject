<?php 

	require "database/connect.php";
	session_start();
	$v = $_SESSION['dealer_id'];
		
	$sql = "DELETE FROM dealer WHERE dealer_id=$v";

	if (mysqli_query($connection, $sql)){
		echo "Record deleted successfully";
		header("Location: searchdealer.php");
	}else{
		echo "Error deleting record: ";
		}

	mysqli_close($connection);
			
			
?>