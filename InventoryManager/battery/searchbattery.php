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
         .error {color: #FF0000;}
        table {
            border-collapse: collapse;
        }

        td {
            padding-top: .3em;
            padding-bottom: .3em;
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

                    <a href="../battery/product.php" id="pd"><img class= "pic" src="../img/a.png" align="middle"><span>Product Details</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "../stock/stock.php" id="stock"><img class= "pic" src="../img/b.png" align="middle"><span>Stock</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="dealer_title" >

                    <a href="../dealer/viewdealer.php" id="dealer"><img class= "pic" src="../img/c.png" align="middle"><span>Dealer</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href="../salesperson/salep.php" id="salep" ><img class= "pic" src="../img/d.png" align="middle"><span>Salesperson</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href="../../report/report.php" id="report"><img class= "pic" src="../img/e.png" align="middle"><span>Reports</span></a>

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
        <div class="ad">
            <h1  style= "font-size: 20px;
    background-color: #990000;
    color: white;
    width:100%;
    padding: 10px;
    font-family: Calibri;
    line-height: 30px;
    margin:0 0 0;
    margin-bottom: 20px;
    padding-bottom: 10px;">Search Product</h1>
            <table class="tbl">
                <form action="searchbattery.php" method="POST">

                    <tr>
                        <td><b>Product Name:</b></td>
                    </tr>
                    <td></td>
                    <tr>
                        <td colspan="2"><input name="name" size="30" maxlength="25" style="width: 300px" required><input type="submit" class="button" value="Search" name="submit" ></td>
                    </tr>



                </form>



                <tr><td><b>Battery Type:</td><td></td></tr>
                <tr><td><b>Warranty Period:</td></tr>

                <?php
                require "core/database/connect.php";

                if(isset($_POST['submit'])){

                    $name = $_POST['battery_name'];



                    $sql = "SELECT * FROM battery_description WHERE battery_name='$name' LIMIT 1" ;

                    $result= mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr><td>".$row['battery_type']."</td><td></td><td>".$row['warranty_period']."</td></tr>";
                        }



// in the first time inputs are empty
                    }

                }




                mysqli_close($conn);







                ?>



            </table>
            <a class="link" id="delbattery" href="delbattery.php?" onclick="return confirm('Are you sure you wish to delete this Record?');">DELETE</a>
            <a class="link" id="upbattery" href="#">UPDATE</a>
        </div>
        <?php

        include '../../include/footer.php';
        ?>