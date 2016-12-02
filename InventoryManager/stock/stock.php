<!DOCTYPE html>
<html lang="en">
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="../css/m.css" media="screen" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <!-- bxSlider Javascript file -->
    <script src="../js/jquery.bxslider.js"></script>
    <!-- bxSlider CSS file -->
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <style>
        nav{
            float: left;
        }
    </style>
</head>
<body>
<?php
include '../../include/header.php';
?>
<div id="body">

    <nav>
        <ul id="mainsidebar">
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="pd">

                    <a href="../battery/product.php" id="pd" style="top: 1px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/a.png" align="middle"><span>Product Details</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "../stock/stock.php" id="stock" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/b.png" align="middle"><span>Stock</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="dealer_title" >

                    <a href="../dealer/viewdealer.php" id="dealer" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/c.png" align="middle"><span>Dealer</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href="../salesperson/salep.php" id="salep" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/d.png" align="middle"><span>Salesperson</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href="../../report/report.php" id="report" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/e.png" align="middle"><span>Reports</span></a>

                </div>
            </li>
        </ul>
    </nav>
    <div class="content">
        <ul id="top">
            <li class="topn"><a style="width: 300px" href="product.php"><img src="../img/Add.png"><span class="bar">View</span></a></li>
            <li class="topn"><a style="width: 300px" href="addbattery.php"><img src="../img/View.png"><span class="bar">Add</span></a></li>
            <li class="topn"><a style="width: 300px" href="searchbattery.php"><img src="../img/Search.png"><span class="bar">Search</span></a></li>
        </ul>
                <div class="form">
                    <div class="this">

                        <div class="more"style="margin-left: 10%">
                            <a href="entermanufac.php"><img src="../images/more.png" style="margin-left: 79%;margin-top: 5%">
                                <span style="color: #000; font-family: Calibri; font-size: 20px; margin-left: 5%;text-align: center;margin-left: 80%;margin-top: -2%">Enter for more</span></a>
                        </div>
                        <section style="width:60% ;margin-right:15% "> <!--for demo wrap-->
                            <h1 style="font-size: 30px;
                    color: #000;
                    text-transform: uppercase;
                    font-weight: 300;
                    text-align: center;">Stock in Hand</h1>
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
                                    $sql = "SELECT battery_type, current_stock FROM stock_in_hand";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        echo "
            <style>
        table{
            width:80%;
            table-layout:fixed;
            
        
             
        }
        .tbl-header{
            background-color: rgba(255,255,255,0.3);
            border: 1px solid #c2c2a3;
        }
        th{
            font-size: 50px;
            font-weight: bold;
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 15px;
            color: #fff;
            text-transform: uppercase;
            background-color: #990000;
        }
        td{
            padding: 15px;
            text-align:left;
            vertical-align:middle;
            font-weight: 300;
            font-size: 13px;
            color: #000;
            border-bottom: 1px solid #c2c2a3;
        }


        /* demo styles */

        @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
        body{
            font-family: 'Roboto', sans-serif;
        }

    </style>


</head>
<body>

                        <thead>
                        <tr>
                            <th>Battery Type</th>
                            <th>Available Stock</th>
                        </tr>
                        </tr>
                        </thead>
                </div>";
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            echo "    <tbody>
                <tr><td>".$row["battery_type"]."</td><td>".$row["current_stock"]."</td></tr>"; }
                                        echo "
                </tbody></table></table>
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
                                    <?php

        include '../../include/footer.php';
        ?>

