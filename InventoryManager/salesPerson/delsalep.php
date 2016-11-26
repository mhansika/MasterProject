<?php 

	require "database/connect.php";
		session_start();
		$v = $_SESSION['salesPerson_id'];
		
	
				
		$sql = "DELETE FROM sales_person WHERE salesPerson_id=$v";

			if (mysqli_query($connection, $sql)) {
				echo "Record deleted successfully";
				header("Location: searchsalep.php");
			} else {
				echo "Error deleting record: ";
			}

			mysqli_close($connection);
			
			
?>