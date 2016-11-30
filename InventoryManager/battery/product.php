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
        
    </style>
</head>
<body>
<?php
include '../../include/header.php';
?>
<div id="body">
    <div id="navigation"></div>
    <nav>
        <ul id="mainsidebar">
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="pd">

                    <a href="battery/product.php" id="pd" style="top: 1px;
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

                    <a href= "stock/stock.php" id="stock" style="top: 10px;
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

                    <a href="dealer/viewdealer.php" id="dealer" style="top: 10px;
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

                    <a href="salesperson/salep.php" id="salep" style="top: 10px;
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

                    <a href="../report/report.php" id="report" style="top: 10px;
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
            <li class="topn"><a href="#home">View</a></li>
            <li class="topn"><a href="#news">Add</a></li>
            <li class="topn"><a href="#contact">Search</a></li>
        </ul>
            <div class="form">
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

<table>
<tr>
<th>Battery type</th>
<th>Battery name</th>
<th>Warranty period</th>
<th>Ampere-hour Value</th>
<th>Voltage Value</th>
<th>Item Type</th>
<th>Image</th></tr>";
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


                </div>
            </div>

        </div>
        <script>

            $("div.content>ul#topnavi>li>a").click( function(e){

                e.preventDefault();

            });


            $("ul#topnavi>li>a").click( function(){
                var id = this.id;
                console.log(id);

                $('div.content > div.form').html("");

                if (id == "addbattery"){

                    url = "addbattery.php";

                } else if (id == "searchbattery"){

                    url = "searchbattery.php";



                }


                $.ajax({



                    type:"post",
                    url:url,
                    success:function(data){

                        $("div.content> div.form").html(data);

                    }



                });





            });







        </script>



        <div>
    <script>
        $(document).ready(function(){
            $('.bxslider').bxSlider();
        })
    </script>

    <?php

    include '../../include/footer.php';
    ?>

