<?php 

	require "core/init.php";
	session_start();
	$v = $_SESSION['dealer_name'];
		
	$sql = "DELETE FROM dealer WHERE dealer_name='$v'";

	if (mysqli_query($connection, $sql)){
		echo "Record deleted successfully";
		header("Location: searchdealer.php");
	}else{
		echo "Error deleting record: ";
		}

	mysqli_close($connection);
			
			
?>