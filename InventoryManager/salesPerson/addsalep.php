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
            <a href="../salesperson/salep.php"><img src="../img/View.png"></a>
            <a href="../salesperson/addsalep.php."><img src="../img/Add.png"></a>
            <a href="../salesperson/searchsalep.php."><img src="../img/Search.png"></a>
        </div>
        <?php
        require "../../database/connect.php";
        $error=FALSE;
        $F_nameerr = $L_nameerr =  $NICerr = $addresserr = $area_noerr = $mobileNoerr = $telephoneNoerr = $emailerr = $DOBerr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST['F_name'])){
                $F_nameerr = "";
                $error = TRUE;
            }else{
                $F_name = $_POST['F_name'];
            }
            if(empty($_POST['L_name'])){
                $L_nameerr = "";
                $error = TRUE;
            }else{
                $L_name = $_POST['L_name'];
            }
            if(empty($_POST['area_no'])){
                $area_noerr = "";
                $error = TRUE;
            }else{
                $area_no = $_POST['area_no'];
            }
            if(empty($_POST['NIC'])){
                $NICerr = "";
                $error = TRUE;
            }else{
                $NIC = $_POST['NIC'];
            }
            if(empty($_POST['address'])){
                $addresserr = "";
                $error = TRUE;
            }else{
                $address = $_POST['address'];
            }
            if(empty($_POST['mobileNo'])){
                $mobileNoerr = "";
                $error = TRUE;
            }else{
                $mobileNo = $_POST['mobileNo'];
            }
            if(empty($_POST['telephoneNo'])){
                $telephoneNoerr = "";
                $error = TRUE;
            }else{
                $telephoneNo = $_POST['telephoneNo'];

            }
            if(empty($_POST['email'])){
                $emailerr = "";
                $error = TRUE;
            }else{
                $email = $_POST['email'];
                if (strpos($email, '@') == FALSE) {
                    $emailerr =  "Invalid email address";
                    $error = TRUE;
                }
            }
            if(empty($_POST['DOB'])){
                $DOBerr = "";
                $error = TRUE;
            }else{
                $DOB = $_POST['DOB'];
            }
            if ($error==FALSE){
                $sql="INSERT INTO `sales_person` (`F_name`, `area_no`, `NIC`, `address`, `L_name`, `mobileNo`, `telephoneNo`, `email`, `DOB`) VALUES ('$_POST[F_name]','$_POST[area_no]','$_POST[NIC]','$_POST[address]','$_POST[L_name]','$_POST[mobileNo]','$_POST[telephoneNo]','$_POST[email]','$_POST[DOB]')";
                //$sql="INSERT INTO `sales_person` (`F_name`, `area_no`, `NIC`, `address`, `L_name`, `mobileNo`, `telephoneNo`, `email`, `DOB`) VALUES ('hapila','col1','38849204','Matale','Bogahapitiya','62780945','62233368','kapila@gmail.com','1985-02-19')";
                if(mysqli_query($connection,$sql)){
                    header("Location: addsales.php");
                    //die();
                } else{echo "error";}
            }
        }
        ?>
        <form class="AddPro" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <h1 class="add">Add Salesperson</h1>
                <table id="ad">
                        <tr>
                            <td>
                                <b>First Name: <span class="error">* <?php echo $F_nameerr;?></span></b>
                            </td>
                            <td>
                                <b>Area: <span class="error">* <?php echo $area_noerr;?></span></b>
                            </td>
                        </tr>
                        <tr>
                            <td width="400px">
                                <input type="text" name="F_name" style="width: 200px" required>
                            </td>
                            <td>
                                <select class="dropdown"  name="area_no">
                                    <option value="Colombo">Col01</option>
                                    <option value="Dehiwala">De01</option>
                                    <option value="Maharahama">Mahara01</option>
                                    <option value="Nugegoda">Nuge01</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Last Name: <span class="error">* <?php echo $L_nameerr;?></span></b>
                            </td>
                            <td>
                                <b>Mobile No: <span class="error">* <?php echo $mobileNoerr;?></b></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="L_name" style="width: 200px" required>
                            </td>
                            <td>
                                <input type="text" name="mobileNo" style="width: 200px" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Address: <span class="error">* <?php echo $addresserr;?></span></b>
                            </td>
                            <td>
                                <b>Telephone No: <span class="error">* <?php echo $telephoneNoerr;?></span></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="address" style="width: 300px" required>
                            </td>
                            <td>
                                <input type="text" name="telephoneNo" style="width: 200px" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>NIC: <span class="error">* <?php echo $NICerr;?></span></b>
                            </td>
                            <td>
                                <b>Email: <span class="error">* <?php echo $emailerr;?></span></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="NIC" style="width: 200px" required>
                            </td>
                            <td>
                                <input type="text" name="email" style="width: 200px" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Date of Birth: <span class="error">* <?php echo $DOBerr;?></span><b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="date" name="DOB" style="width: 200px" required>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="save"  value="send">Save</button></td>
                            <td> <button class="reset" type="reset">Reset</button></td>
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
