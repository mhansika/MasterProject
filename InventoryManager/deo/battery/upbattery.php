<?php
?>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<?php include '../../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/IM2.css" type="text/css"/>
    <!-- bxSlider Javascript file -->
    <script src="../js/jquery.bxslider.js"></script>
    <!-- bxSlider CSS file -->
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<?php
require "../../../database/connect.php";
session_start();
$v = $_SESSION['type'];
$sql = "SELECT * FROM battery_description WHERE battery_type = '$v'";
$result= mysqli_query($connection, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $h0=$row["battery_type"];
        $h1=$row["warranty_period"];
    }
}else{
    echo "Zero results";
}
$error=FALSE;
$typeerr = $warranty_perioderr  = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
    if(empty($_POST['type'])){
        $typeerr = "";
        $error = TRUE;
    }else{
        $type = $_POST['type'];
    }
    if(empty($_POST['warranty_period'])){
        $warranty_perioderr = "";
        $error = TRUE;
    }else{
        $warranty_period = $_POST['warranty_period'];
    }
    if ($error==FALSE){
        $sql = "UPDATE `battery_description` SET `battery_type`='$_POST[type]',`warranty_period`='$_POST[warranty_period]' WHERE `battery_type`='$v'";
        if(mysqli_query($connection,$sql)){
            //die();
            header("Location: searchbattery.php");
        } else{echo "error";}
}
?>
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
        <table>
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                <tr>
                    <td><b>Product type: <?php echo $_SESSION['type'] ?></b></td>
                </tr>
                <tr>
                    <td><b>Warranty period:</b></td>
                    <td width="400px">
                        <input type="text" name="warranty_period" style="width: 300px" value="<?php echo $h1; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td> <button class="save" type="submit">Save</button></td>
                </tr>
            </form>
        </table>
    </div>
    <?php
include '../include/footer.php';
?>
</div>
</body>
</html>
