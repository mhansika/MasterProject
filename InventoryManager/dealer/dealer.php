<?php
?>
<html>
<?php include '../../core/init.php';
protect_page();
?>
<?Php

	$role= $user_data['role'];
	echo $role;
/* function protectAdmin_page() { 
 	 if ($role === 'deo') {
		 header('Location:../../core/init.php');
    exit();
  } 

}
protectAdmin_page(); */  
 
?>
<?php
$role= $user_data['role'];
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/IM.css" type="text/css"/>

</head>
<body>
<div class="row">
    <?php
    include '../include/header.php'
    ?>
    <div id="nav">
        <ul id="mainsidebar">
            <li class="sidenav">
                <div id="side">
                    <a href="../battery/product.php"><img src="../img/a.png" class="pic"></a>
                    <span>Product Details</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../stock/stock.php"><img src="../img/b.png" class="pic"></a>
                    <span>Stock</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../dealer/dealer.php"><img src="../img/c.png" class="pic"></a>
                    <span>Dealer</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../salesperson/salep.php"><img src="../img/d.png" class="pic"></a>
                    <span>Salesperson</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../report/report.php"><img src="../img/e.png" class="pic"></a>
                    <span>Reports</span>
                </div>
            </li>
        </ul>
    </div>
    <div id="content">
        <div class="topnav">
            <a href="../dealer/dealer.php"><img src="../img/View.png"></a>
            <a href="../dealer/adddealer.php"><img src="../img/Add.png"></a>
            <a href="../dealer/view.php"><img src="../img/Search.png"></a>
        </div>
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
        $sql = "SELECT dealer_id, dealer_name, area_no,salesPerson_id, NIC,address,mobileNo,telephoneNo,email,fax FROM dealer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<style>
                    table {
                        border-collapse: collapse;
                        width: 80%;
                        
                    }
                    th, td {
                        text-align: center;
                        padding: 8px;
                    }
                    tr:nth-child(even){background-color: #f2f2f2}
                    th {
                        background-color: #990000;
                        color: white;
                    }
                    tbody {
                        height: 100px;   
                        overflow-y: auto;  
                        overflow-x: hidden;  
                    }
                    .dealer{
                        margin-left: 15%;
                        padding-top: 5%;
                        margin-top: 2%;
                    }
                    </style>
            </head>
            <body>
            <table class='dealer'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Area</th>
                    <th>Salesperson</th>
                    <th>NIC</th>
                    <th>Address</th>
                    <th>Mobile No</th>
                    <th>Tel No</th>
                    <th>E mail</th>
                    <th>Fax</th>
                </tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["dealer_id"]."</td><td>".$row["dealer_name"]." </td><td>".$row["area_no"]." </td><td>".$row["salesPerson_id"]." </td><td>".$row["NIC"]." </td><td>".$row["address"]." </td><td>".$row["mobileNo"]." </td><td>".$row["telephoneNo"]." </td><td>".$row["email"]." </td><td>".$row["fax"]." </td></tr>";
                    }
                    echo "</table></body></html>";
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            <?php
            include '../include/footer.php';
            ?>
        </div>
        </body>
        </html>
