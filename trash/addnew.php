<?php
include 'core/init.php';




if(isset($_POST['submit'])) {


//id should be auto generate in db


$d_name=mysqli_real_escape_string($conn,$_POST['dealer_name']);
$NIC=mysqli_real_escape_string($conn,$_POST['NIC']);
//area should import from db
$d_address=mysqli_real_escape_string($conn,$_POST['address']);
//relaventsalesperson same
$mobile=mysqli_real_escape_string($conn,$_POST['mobileNo']);
$telephone=mysqli_real_escape_string($conn,$_POST['telephoneNo']);
$fax=mysqli_real_escape_string($conn,$_POST['fax']);
$email=mysqli_real_escape_string($conn,$_POST['email']);


$query = "INSERT INTO dealer(dealer_name,NIC,address,mobileNO,telephoneNo,fax,email)".
"VALUES ('$d_name','$NIc','$d_address','$mobile','$telephone','$fax,'$email') ";








$result=mysqli_query($conn, $query)
or die('Error querying database');

}
  






mysqli_close($conn);
?>
