<?php
require "../database/connect.php";
?>
<html xmlns="http://www.w3.org/1999/html">
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
    <link rel="stylesheet" href="../InventoryManager/css/IM.css" type="text/css"/>

    
</head>
<body>
<?php
if(isset($_POST['Enter']))
{
    require "../core/database/connect.php";

    mysqli_query($conn,"UPDATE dealer SET active = 0 WHERE dealer_id = '$_POST[Enter]'");
}
?>
<?php
include '../InventoryManager/include/header.php';
?>
<div id="nav">
    <ul id="mainsidebar">
        <li class="sidenav">
            <div id="side">
                <a href="enterDefect.php"><img src="../img/a.png" class="pro"></a>
                <span>Enter Defects</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="checkReplace.php"><img src="../img/b.png" class="pro"></a>
                <span>Check Replacements</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="misDealer.php"><img src="../img/c.png" class="pro"  onclick="myAjax()"></a>
                <span>Misused Dealers</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="viewAllReplace.php"><img src="../img/d.png" class="pro"></a>
                <span>All Replacements</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="searchProduct.php"><img src="../img/e.png" class="pic"></a>
                <span>Search Battery</span>
            </div>
        </li>
    </ul>
</div>
<div id="content">
    <div class="tbl">
        <div id="content">
            <form action="#" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
                <div class="ad">
                    <h1><b> Misused Dealers</b></h1>
                    <table width="70%">
                        <tr>
                            <!--<th>Area</th>-->
                            <th></th>
                            <th></th>
                        </tr>
                        <tr></tr>
                        <tr>
                        </tr>
                    </table>
                    <div  class="tbl-header">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <thead>
                            <tr>
                                <th>Dealer Name</th>
                                <th>No of Invalid Replacements</th>
                                <th>Set Dealer Inactive</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div  class="tbl-content">
                        <table cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                            <?php
                            $sql2="SELECT dealer_id FROM dealer WHERE active=1";
                            $query2=(mysqli_query($connection,$sql2));
                            while ($res2 = mysqli_fetch_assoc($query2)){
                                $sql="SELECT battery_num,dealer_id,coalesce(count(case when battery_status =3  then 1 end), 0) as count FROM released_batteries WHERE dealer_id IS NOT NULL AND dealer_id = ANY (SELECT dealer_id FROM released_batteries WHERE battery_status=3)  AND dealer_id = '$res2[dealer_id]' GROUP BY dealer_id";
                                $query=(mysqli_query($connection,$sql));
                                while($res = mysqli_fetch_assoc($query)){
                                    $sql5 = "SELECT dealer_name FROM dealer WHERE dealer_id = '$res[dealer_id]'";
                                    $query5=(mysqli_query($connection,$sql5));
                                    while($res5 = mysqli_fetch_assoc($query5)){
                                        echo "<tr>";
                                        echo "<th>".$res5['dealer_name']."</th>";
                                    }
                                    echo "<th>".$res['count']."</th>";
                                    echo"
     <form  method='POST' >";
                                    ?>
                                    <td><button class="inactive_btn" type="submit" name="Enter" value="<?php echo "$res[dealer_id]"?>" onclick="return confirm('Are you sure you wish to inactive this dealer?');">Inactive</button></td>
                                    <?php
                                    echo'</form>';
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php
include '../InventoryManager/include/footer.php';
?>
</body>
</html>
