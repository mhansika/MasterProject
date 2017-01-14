<?php
?>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/IM.css" type="text/css"/>
    <!-- bxSlider Javascript file -->
    <script src="../js/jquery.bxslider.js"></script>
    <!-- bxSlider CSS file -->
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
                    <a href="../battery/product.php"><img src="../img/a.png" class="pro"></a>
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
            <a href="product.php"><img src="../img/View.png"></a>
            <a href="addbattery.php"><img src="../img/Add.png"></a>
            <a href="searchbattery.php"><img src="../img/Search.png"></a>
        </div>
        <form class="AddPro" action="searchbattery.php" method="POST">
        <table id="ad">
            <h1 class="add">Search Product</h1>
                <tr>
                    <td id="data">
                        <b>Product Name:</b>
                    </td>
                </tr>
                <td id="data"></td>
                <tr>
                    <td colspan="2" id="data">
                        <input name="name" size="30" maxlength="25" style="width: 300px" required>
                        <input type="submit" class="save" value="Search" name="submit" >
                    </td>
                </tr>
            </form>
            <!--tr>
                <td id="data"><b>Battery Type:</td>
                <td id="data"></td>
            </tr>
            <tr>
                <td id="data"><b>Warranty Period:</td>
            </tr-->
            <?php
            require "../../core/database/connect.php";
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
        <!--tr>
            <td id="data"></td>
            <td id="data">
        <a class="link" id="delbattery" href="delbattery.php?" onclick="return confirm('Are you sure you wish to delete this Record?');">
            <button class="delete"> Delete</button></a>
            </td>
            <td id="data">
        <a class="link" id="upbattery" href="upbattery.php">
            <button class="update">Update</button> </a>
            </td>
        </tr-->
        </table>
        </form>
    </div>
</div>
<?php
include '../include/footer.php';
?>
</div>
</body>
</html>
