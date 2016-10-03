<?php

 $conn= mysqli_connect('localhost','root','','warranty_management');
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
