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
$sql = "SELECT battery_type, production_line, manufac_year, manufac_month, serial_no, battery_num FROM battery";
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
    background-color: #4CAF50;
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

<table><tr><th>Battery type</th><th>Production line</th><th>Manufacture year</th><th>Manufacture month</th><th>Serial number</th><th>Battery number</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["battery_type"]."</td><td>".$row["production_line"]." </td><td>".$row["manufac_year"]." </td><td>".$row["manufac_month"]." </td><td>".$row["serial_no"]." </td><td>".$row["battery_num"]." </td></tr>";
    }
    echo "</table></body>
</html>";
} else {
    echo "0 results";
}
$conn->close();


?>