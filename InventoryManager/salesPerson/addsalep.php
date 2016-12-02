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
        .error {
            color: #FF0000;
        }
    </style>
    <script>

        $("div.content>ul#topnavi>li>a").click( function(e){

            e.preventDefault();

        });


        $("ul#topnavi>li>a").click( function(){
            var id = this.id;
            console.log(id);

            $('div.content > div.form').html("");

            if (id == "viewsalep"){

                url = "sp.php";

            } else if (id == "searchsalep"){

                url = "searchsalep.php";

            }


            $.ajax({



                type:"post",
                url:url,
                success:function(data){
                    $('div.content > div.form').html("");
                    $("div.content> div.form").html(data);

                }



            });


        });


    </script>
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
            <li class="topn"><a style="width: 300px" href="salep.php"><img src="../img/Add.png"><span class="bar">View</span></a></li>
            <li class="topn"><a style="width: 300px" href="addsalep.php"><img src="../img/View.png"><span class="bar">Add</span></a></li>
            <li class="topn"><a style="width: 300px" href="searchsalep.php"><img src="../img/Search.png"><span class="bar">Search</span></a></li>
        </ul>
        <?php
        require "database/connect.php";

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

        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <div class="ad" style="margin-top: 10%">
                <h1 style= "font-size: 20px;
    background-color: #990000;
    color: white;
    width:100%;
    padding: 10px;
    font-family: Calibri;
    line-height: 30px;
    margin:0 0 0;
    margin-bottom: 20px;
    padding-bottom: 10px;">Add Salesperson</h1>
                <table>
                    <form>
                        <tr>
                            <td><b>First Name: <span class="error">* <?php echo $F_nameerr;?></span></b></td>
                            <td><b>Area: <span class="error">* <?php echo $area_noerr;?></span></b></td>
                        </tr>

                        <tr>
                            <td width="400px"><input type="text" name="F_name" style="width: 200px" required></td>
                            <td><select class="dropdown"  name="area_no">
                                    <option value="Colombo">Col01</option>
                                    <option value="Dehiwala">De01</option>
                                    <option value="Maharahama">Mahara01</option>
                                    <option value="Nugegoda">Nuge01</option>
                                </select></td>
                        </tr>

                        <tr>
                            <td><b>Last Name: <span class="error">* <?php echo $L_nameerr;?></span></b></td>
                            <td><b>Mobile No: <span class="error">* <?php echo $mobileNoerr;?></b></span></td>

                        </tr>
                        <tr>
                            <td><input type="text" name="L_name" style="width: 200px" required></td>
                            <td><input type="text" name="mobileNo" style="width: 200px" required></td>

                        </tr>
                        <tr>

                            <td><b>Address: <span class="error">* <?php echo $addresserr;?></span></b></td>
                            <td><b>Telephone No: <span class="error">* <?php echo $telephoneNoerr;?></span></b></td>

                        </tr>
                        <tr>
                            <td><input type="text" name="address" style="width: 300px" required></td>
                            <td><input type="text" name="telephoneNo" style="width: 200px" required></td>


                        </tr>
                        <tr>

                            <td><b>NIC: <span class="error">* <?php echo $NICerr;?></span></b></td>
                            <td><b>Email: <span class="error">* <?php echo $emailerr;?></span></b></td>

                        </tr>
                        <tr>
                            <td><input type="text" name="NIC" style="width: 200px" required></td>
                            <td><input type="text" name="email" style="width: 200px" required></td>

                        </tr>
                        <tr>

                            <td><b>Date of Birth: <span class="error">* <?php echo $DOBerr;?></span><b></td>

                        </tr>
                        <tr>
                            <td><input type="date" name="DOB" style="width: 200px" required></td>
                        </tr>

                    </form>

                </table>
                <a class="link" id="SaveS" href="">Save</a>
                <a class="link" id="Reset" href="#">Reset</a>
            </div>
        <?php

        include '../../include/footer.php';
        ?>

