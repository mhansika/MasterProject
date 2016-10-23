<?php
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
    body {
        margin:0;
        background-image: url("2.png");
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
        margin-left: 20%;
    }
</style>
<body>
<div id="sidebar">
<div class="icon-bar">
    <a class="active" href="http://localhost/MasterProject/inventory.php"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-archive fa-2x" aria-hidden="true"></i></a>
</div>
</div>
<div id="content">
    <a href="viewmanufacExide.php">Exide</a>
    <a href="viewmanufacLucas.php">Lucas</a>
    <a href="viewmanufacGraganite.php">Graganite</a></br></br></br></br>
   
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
$sql = "SELECT battery_type, battery_name, production_line,manufac_year, manufac_month,battery_num FROM battery";

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

<table><tr><th>Battery Type</th><th>Battery Name</th><th>Production Line </th><th>Manufacture Year</th><th>Manufacture Month</th><th>Battery Number</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["battery_type"]=="Lucas"){
        echo "<tr><td>".$row["battery_type"]."</td><td>".$row["battery_name"]." </td><td>".$row["production_line"]." </td><td>".$row["manufac_year"]." </td><td>".$row["manufac_month"]." </td><td>".$row["battery_num"]." </td></tr>";
        }
    }
    echo "</table></body>
</html>";
} else {
    echo "0 results";
}
$conn->close();


?>

</div>
<div id="footer">

</div>
</body>
</html>
