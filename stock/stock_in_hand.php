<?php



function stock_in_hand($stock_in_hand){

 $conn= mysqli_connect('localhost','root','','warranty_management');
 $query=mysqli_query($conn,"SELECT battery_type, amount FROM released_batteries");
  $result1=mysqli_fetch_assoc($query);
  $sql=mysqli_query($conn,"SELECT battery_type, amount FROM sold");
  $result2=mysqli_fetch_assoc($sql);


$query=mysqli_query($conn,"UPDATE stock_in_hand WHERE battery_type=$ ");


        return $data;
       die();
















}


















	?>


