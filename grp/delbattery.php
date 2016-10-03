
<?php 

	require "database/connect.php";
	session_start();
	$k = $_SESSION['type'];
		
	$sql = "DELETE FROM battery_description WHERE battery_type=$k";

	if (mysqli_query($connection, $sql)){
		echo "Record deleted successfully";
		header("Location: searchbattery.php");
	}else{
		echo "Error deleting record: ";
		}

	mysqli_close($connection);
			
			
?>