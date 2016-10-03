   <div class="seperate">
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
    background-color:#990000;
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

<table><tr><th>Battery type</th><th>Battery name</th><th>Warranty period</th><th>Ampere-hour Value</th><th>Voltage Value</th><th>Item Type</th><th>Image</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["battery_type"]."</td><td>".$row["battery_name"]." </td><td>".$row["warranty_period"]."</td><td>".$row["amperehour_Value"]."</td><td>".$row["voltage_Value"]."</td><td>".$row["item_Type"]."</td><td><img src='uploads/$row[imageUpload].png' height='75px' width='100px'></td></tr>";
    }
    echo "</table></body>
</html>";
} else {
    echo "0 results";
}
$conn->close();


?>