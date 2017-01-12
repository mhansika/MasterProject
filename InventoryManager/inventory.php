<html>
<?php include '../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
echo $role;
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/IM.css" type="text/css"/>
</head>
<body>
<div class="row">
<?php
include 'include/header.php'
?>
    <div id="nav">
        <ul id="mainsidebar">
            <li class="sidenav">
                <div id="side">
                    <a href="battery/product.php"><img src="../img/a.png" class="pic"></a>
                    <span>Product Details</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="stock/stock.php"><img src="../img/b.png" class="pic"></a>
                    <span>Stock</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="dealer/dealer.php"><img src="../img/c.png" class="pic"></a>
                    <span>Dealer</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="salesperson/salep.php"><img src="../img/d.png" class="pic"></a>
                    <span>Salesperson</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="report/report.php"><img src="../img/e.png" class="pic"></a>
                    <span>Reports</span>
                </div>
            </li>
        </ul>
    </div>
    <div id="content">
        <div id="product">
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
                $sql = "SELECT f_name,l_name,email,role FROM users";
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
                            background-color:#990000;
                            color: white;
                        }
                        tbody {
                            height: 100px;      
                            overflow-y: auto;   
                            overflow-x: hidden;  
                        }
                        .tbl-content{
                          
                        }
                        </style>
                    </head>
                    <body>
                        <table >
                        <tr>
                        <th>Battery type</th>
                        <th>Battery name</th>
                        <th>Warranty period</th>
                        <th>Ampere-hour Value</th>
                        <th>Voltage Value</th>
                        <th>Item Type</th>
                        <th>Image</th>
                        </tr>";
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='tbl-content'>
                           <tr>
                                <td>".$row["f_name"]."</td>
                                <td>".$row["l_name"]."</td>
                                <td>".$row["email"]."</td>
                                <td>".$row["role"]."</td>
                                <td><img src='uploads/$row[imageUpload].png' height='75px' width='100px'></td>
                          </tr>";
                    }
                    echo "</div></table></body></html>";
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
<?php
include 'include/footer.php';
?>
</div>
</body>
</html>
