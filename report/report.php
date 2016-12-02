<!DOCTYPE html>
<html lang="en">
<?php include '../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="../css/m.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="css/report.css" media="screen" type="text/css" /> <!-- middle icon styles -->
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
include '../include/header.php';
?>
<div id="body">

    <nav>
        <ul id="mainsidebar">
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="pd">

                    <a href="../InventoryManager/battery/product.php" id="pd"><img class= "pic" src="../img/a.png" align="middle"><span>Product Details</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "../InventoryManager/stock/stock.php" id="stock" ><img class= "pic" src="../img/b.png" align="middle"><span>Stock</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="dealer_title" >

                    <a href="../InventoryManager/dealer/viewdealer.php" id="dealer" ><img class= "pic" src="../img/c.png" align="middle"><span>Dealer</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href="../InventoryManager/salesperson/salep.php" id="salep" ><img class= "pic" src="../img/d.png" align="middle"><span>Salesperson</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href="../report/report.php" id="report"><img class= "pic" src="../img/e.png" align="middle"><span>Reports</span></a>

                </div>
            </li>
        </ul>
    </nav>
    <div class="content" style="margin-top: 5%">
        <ul class="ca-menu" style="margin-top: 5%;margin-left: 30%">
            <li>
                <a href="../report/salesp-report.php">
                    <span class="ca-icon"><img src="../img/sm.png"> </span>
                    <div class="ca-content">
                        <h3 class="ca-sub">Salesperson</h3>
                    </div>
                </a>
            </li>
            <li>
                <a href="../report/dealer-report.php">
                    <span class="ca-icon"><img src="../img/dd.png"> </span>
                    <div class="ca-content">
                        <h3 class="ca-sub">Dealer</h3>
                    </div>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="ca-icon"><img src="../img/w.png"></span>
                    <div class="ca-content">
                        <h3 class="ca-sub">Warranty</h3>
                    </div>
                </a>
            </li>
            <li>
                <a href="../report/production_line1.php">
                    <span class="ca-icon"><img src="../img/st.png"></span>
                    <div class="ca-content">
                        <h3 class="ca-sub">Stock</h3>
                    </div>
                </a>
            </li>

        </ul>

        <?php

        include '../include/footer.php';
        ?>

