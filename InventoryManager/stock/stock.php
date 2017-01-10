<?php
?>
<html>
<?php include '../../core/init.php';
protect_page();
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
    <?php
    include '../include/sidenav.php'
    ?>
    <div id="content">
        <div class="form">
            <div class="this">
                <div>
                    <a href="entermanufac.php">
                        <img id="more" src="../images/more.png">
                    </a>
                </div>
                <section>
                    <div  class="tbl-header">
                        <table cellpadding="0" cellspacing="0" border="0">
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
                            $sql = "SELECT battery_type,battery_name,current_stock FROM stock_in_hand";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                echo "
            <style>
        table{
              width:50%;
              margin-left: 30%;
        }
        th{
            font-size: 50px;
            font-weight: bold;
            padding: 20px 15px;
            text-align: center;
            font-weight: 500;
            font-size: 15px;
            color: #fff;
            text-transform: uppercase;
            background-color: #4e4c4c;
        }
        td{
            padding: 15px;
            text-align:center;
            vertical-align:middle;
            font-weight: 300;
            font-size: 13px;
            color: #000;
            border-bottom: 1px solid #c2c2a3;
        }
        .add{
            font-size: 20px;
            background-color: #990000;
            color: white;
            width:70%;
            padding: 10px;
            line-height: 30px;
            margin:0 0 0;
            margin-bottom: 20px;
            padding-bottom: 10px;
            text-align: center;
        }
        .stock{
            margin-left: 30%;
            padding-top: 2%;
        }
    </style>
</head>
<body>
<div class='stock'>
<h1 class='add'>Stock in Hand</h1>
<table>
<thead>
<tr>
    <th>Battery Type</th>
    <th>Battery Name</th>
    <th>Available Stock</th>
</tr>
</tr>
</thead>
</div>";
// output data of each row
while($row = $result->fetch_assoc()) {
echo "    <tbody>
<tr>
<td>".$row["battery_type"]."</td><td>".$row["battery_name"]."</td>
<td>".$row["current_stock"]."</td>
</tr>"; }
echo "
</tbody>
</table>
        </div>
</section>
</div>
</div>
</div>
</body>
</html>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
                    </div>
    </div>
    <?php
    include '../include/footer.php';
    ?>
</div>
</body>
</html>
