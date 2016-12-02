<!DOCTYPE html>
<html lang="en">
<?php include '../core/init.php';
  protect_page();
  include '../include/header.php';
  ?>
<?php
$role= $user_data['role'];
?>

<head>
  <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="css/m.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="../js/jquery.bxslider.js"></script>
    <!-- bxSlider CSS file -->
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
</head>
<body>
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
                                text-align:center;"><img class= "pic" src="img/a.png" align="middle"><span>Product Details</span></a>
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
                                text-align:center;"><img class= "pic" src="img/b.png" align="middle"><span>Stock</span></a>
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
                                text-align:center;"><img class= "pic" src="img/c.png" align="middle"><span>Dealer</span></a>
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
                                text-align:center;"><img class= "pic" src="img/d.png" align="middle"><span>Salesperson</span></a>
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
                                text-align:center;"><img class= "pic" src="img/e.png" align="middle"><span>Reports</span></a>

                </div>
            </li>
        </ul>
    </nav>
    <div class="content">
        <h5 style="float:right;">   Logged in as : (<?php echo $user_data['role']; ?>)</h5>

        <h2 style="margin-top: 5%; margin-left: 5%; font-size: xx-large; color:black">Hello, <?php echo $user_data['f_name'] .'  ' .$user_data['l_name'];?></h2>

        <div class="form">
                <div class= "this" style="margin-left: 5%;margin-top: 5%">
                     <ul class="bxslider">
                        <li><img src="img/img/a.png" /></li>
                         <li><img src="img/img/b.png" /></li>
                         <li><img src="img/img/c.png" /></li>
                         <li><img src="img/img/d.png" /></li>
                     </ul>
                </div>
        </div>
    </div>
<div>
<script>
 $(document).ready(function(){
  $('.bxslider').bxSlider();
})
</script>

  	<?php

include '../include/footer.php';
 ?>

