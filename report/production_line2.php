
<?php
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
    body {
        margin:0;
        background-image: url("../images/2.png");
    }

    .icon-bar {
        width: 10%;
        text-align: center;
        background-color: #820311;
        position: fixed;
    }

    .icon-bar a {
        padding: 16px;
        display: block;
        transition: all 0.3s ease;
        color: white;
        font-size: 36px;
    }

    .icon-bar a:hover {
        background-color: #000;
    }

    .active {
        background-color: #555 !important;
    }
    #footer {
        position:fixed;
        left:0px;
        bottom:0px;
        height:30px;
        width:100%;
        background:#555;
    }
    #content{
        margin-left: 13%;
    }
     ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: white;
}

li {
    float: left;
}

li a {
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #990000;
}
</style>
<body>
<div id="sidebar">
    <div class="icon-bar">
        <a class="active" href="http://localhost/MasterProject/inventory.php"><i class="fa fa-arrow-left fa-2x " aria-hidden="true"></i></br><span style="font-size:10px;font-family: Arial">Back</span></a>
        <a href="production_line1.php"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></br><span style="font-size:12px;font-family: Arial">Stock-production line</span></a>
        <a href=""><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></br><span style="font-size:10px;font-family: Arial"></span></a>
        <a href="#"><i class="fa fa-archive fa-2x " aria-hidden="true"></i></br><span style="font-size:10px;font-family: Arial">Stock In Hand</span></a>
    </div>
</div>
<div id="content">
    <ul>
    <li><a href="production_line1.php">Production line1</a><li>
    <li><a href="production_line2.php">Production line2</a><li>
    <li style="float:right"><a href="pl2report.php">Go</a></li>
        </br></br></br>
   </ul>
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
$sql = "SELECT battery_type, battery_name,production_line, manufacture_year, manufacture_month,amount FROM released_batteries";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #990000;
    color: white;
}
tbody {
    height: 100px;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
}
</style>
</head>
<body>

<table><tr><th>Battery Type</th><th>Battery Name</th><th>Production Line</th><th>Manufacture Year</th><th>Manufacture Month</th><th>Amount</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["production_line"]==2){
        echo "<tr><td>".$row["battery_type"]."</td><td>".$row["battery_name"]." </td><td>".$row["production_line"]." </td><td>".$row["manufacture_year"]." </td><td>".$row["manufacture_month"]." </td><td>".$row["amount"]." </td></tr>";
        }
    }
    echo "</table></body>
</html>";
} else {
    echo "0 results";
}
$conn->close();


?>
  