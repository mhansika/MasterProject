<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Battery Details</title>
  
        <link rel="stylesheet" href="css/table.css">
        <style>

        .button {
    background-color: #6f6f6e;
    color: white;
    border: 10px;
    border-color: #CCD1D1;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin-right: 15px;
    cursor: hand;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
    float: right;
    margin-top: 10px;
    margin-left: 10px;
}
        </style>

    
  </head>




  <body>
     <a class="button" style="" href="http://localhost/ABM/inventory.php">Back</a>
     <a class="button" style="" href="#">Print</a>

       <br><br>

    <section> <!--for demo wrap-->
<h1>Battery Details</h1> 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "warranty_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT battery_type, battery_name, warranty_period,amperehour_Value,voltage_Value,item_Type,imageUpload FROM battery_description";
$result = $conn->query($sql);

?>

<div  class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th>Battery Type</th>
      <th>Battery Name</th>
	  <th>Code</th>
      <th>Warrenty Period</th>
      <th>Ampere-hour Value</th>
      <th>Voltage Value</th>
    </tr>
  </thead>
</table>
</div>
<div  class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
  <tbody>
    <?php
    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["battery_type"]."</td><td>".$row["battery_name"]." </td><td>".$row["item_Type"]."</td><td>".$row["warranty_period"]."</td><td>".$row["amperehour_Value"]."</td><td>".$row["voltage_Value"]."</td></tr>";
    }

}


    ?>
  
      
	
  
</tbody>
</table>
</div>
</section>

    
    
  </body>
</html>


  <?php

include 'footer.php';
 ?>

