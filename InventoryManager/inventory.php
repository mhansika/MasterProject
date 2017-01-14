<html>
<?php include '../core/init.php';
protect_page();
?>
<?Php
$uid= $user_data['user_id'];
$role= $user_data['role'];
/*echo '$role';*/
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/IM.css" type="text/css"/>
</head>
<body>
<?php
include 'include/header.php';
?>
<div id="nav">
    <ul id="mainsidebar">
        <li class="sidenav">
            <div id="side">
                <a href="battery/product.php"><img src="../img/a.png" class="pro"></a>
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
                <a href="dealer/dealer.php"><img src="../img/c.png" class="pic"  onclick="myAjax()"></a>
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
    <?php
    include '../database/connect.php';
    $query = $connection->query("select * from users where user_id ='$uid'");
    /*$row = mysqli_fetch_assoc(mysqli_query($connection,$query));*/
    while($row = mysqli_fetch_assoc($query)){
    ?>
    <div style=" padding-top: 7%">
        <!img class="photo" src="<--?php echo $row['image']; -- ?>
        <img src="<?php echo $row['image'] ; ?>" >
        <?php echo $row['f_name']; ?>
        <?php } ?>
        <div style=" width: 50%;margin-left: 10%">
            <button class="enter">Data Entry Operator</button>
            <button class="enter">Admin</button>
        </div>
    </div>
</div>
<?php
include 'include/footer.php';
?>
</body>
</html>
