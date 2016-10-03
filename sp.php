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
$sql = "SELECT salesPerson_id, F_name, L_name, area_no, NIC, address,DOB,mobileNo,telephoneNo,email FROM sales_person";
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

<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Area </th><th>NIC</th><th>Address</th><th>DOB</th><th>Mobile No</th><th>Tel No</th><th>E mail</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["salesPerson_id"]."</td><td>".$row["F_name"]." </td><td>".$row["L_name"]." </td><td>".$row["area_no"]." </td><td>".$row["NIC"]." </td><td>".$row["address"]." </td><td>".$row["DOB"]." </td><td>".$row["mobileNo"]." </td><td>".$row["telephoneNo"]." </td><td>".$row["email"]." </td></tr>";
    }
    echo "</table></body>
</html>";
} else {
    echo "0 results";
}
$conn->close();


?>
            </div>