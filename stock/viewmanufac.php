<?php
?>
<head>
<link rel="stylesheet" href="css/table.css">
 <link rel="stylesheet" type="text/css" href="css/viewmanufac.css">

    <style>
       
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="icon">
            <div class="back">
                <a href="http://localhost/MasterProject/inventory.php"><img src="../images/back.png"></a>
                <span style="color: #9FBAC0; font-family: Calibri; font-size: 35px; margin-left: 5%;text-align: center">Stock</span>
            </div>
        </div>
        <ul>
            <div class="list">
                <li class="view_Manu">
                    <span style="color: #fff"><a href="viewmanufac.php">View Manufactured Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="Enter_Manu">
                    <span style="color: white"><a href="entermanufac.php">Enter Manufactured Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="view_sold">
                    <span style="color: #9FBAC0"><a href="#">View Sold Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="enter_sold">
                    <span style="color: #9FBAC0"><a href="#">Enter Sold Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="stockIH">
                    <span style="color: #9FBAC0"><a href="#">Stock In Hand</a></span>
                </li>
            </div>

        </ul>

    </div>
    <div id="content">
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
$sql = "SELECT battery_type, production_line, manufac_year,manufac_month,battery_num FROM battery";
$result = $conn->query($sql);

?>

<div  class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th>Battery Type</th>
      <th>Production Line</th>
	  <th>Manufacture Year</th>
      <th>Manufacture Month</th>
      <th>Battery Number</th>
    </tr>
  </thead>
</table>
</div>
         <div  class="tbl-content">
             <?php
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                     echo "<tr><td>".$row["battery_type"]."</td><td>".$row["production_line"]." </td><td>".$row["manufac_year"]."</td><td>".$row["manufac_month"]."</td><td>".$row["battery_num"]."</td></tr>";
                 }

             }


             ?>
             <table cellpadding="0" cellspacing="0" border="0">
                 <tbody>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>

                 </tbody>
             </table>
</div>
</section>

    <div id="footer">

    </div>
</body>
