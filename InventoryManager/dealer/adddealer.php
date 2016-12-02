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

    function validate(){
    //Dealer name
    var a= document.myForm.dealer_name.value;


    //  var a = document.form.name.value;
    if(a=="")
    {
    alert("Please Enter Your Name");
    document.form.name.focus();
    return false;
    }
    if(!isNaN(a))
    {
    alert("Please Enter Only Characters for the Dealer Name");
    document.form.name.select();
    return false;
    }

    //Mobile no
    if( document.myForm.mobileNo.value == "" ||
    isNaN( document.myForm.mobileNo.value ) ||
    document.myForm.mobileNo.value.length != 10 )
    {
    alert( "Please provide a Mobile No No as the format 0#########." );
    document.myForm.telephoneNo.focus() ;
    return false;
    }

    //TP nomber
    if( document.myForm.telephoneNo.value == "" ||
    isNaN( document.myForm.telephoneNo.value ) ||
    document.myForm.telephoneNo.value.length != 10 )
    {
    alert( "Please provide a Telephone No as the format 0#########." );
    document.myForm.telephoneNo.focus() ;
    return false;
    }
    //Nic No

    var idToTest = document.myForm.NIC.value,
    myRegExp = new RegExp(/^[0-9]{9}[vVxX]$/);

    if(myRegExp.test(idToTest)) {

    }
    else {
    alert( "Please provide a NIC No as #########V" );
    }
    //Fax NO
    if( document.myForm.fax.value == "" ||
    isNaN( document.myForm.fax.value ) ||
    document.myForm.fax.value.length != 10 )
    {
    alert( "Please provide a Fax No as the format 0#########." );
    document.myForm.fax.focus() ;
    return false;
    }

    //Email Validation
    var emailID = document.myForm.email.value;
    atpos = emailID.indexOf("@");
    dotpos = emailID.lastIndexOf(".");

    if (atpos < 1 || ( dotpos - atpos < 2 ))
    {
    alert("Please enter correct email ID")
    document.myForm.email.focus() ;
    return false;
    }




    return( true );
    }

    $( document ).ready(function() {
    $("select#cap").click( function(){
    //var id = this.id;
    var id = $(this).children(":selected").attr("id");
    console.log(id);

    $.ajax({

    url:'getdrop.php?data='+id,
    type:"get",
    success:function(data){

    $("tr#trow>td#second").html("");
    $("tr#trow>td#second").html(data);
    }


    });
    });

    });



    </script>



    <script>

    $("div.content>ul#topnavi>li>a").click( function(e){

        e.preventDefault();

    });


    $("ul#topnavi>li>a").click( function(){
        var id = this.id;
        console.log(id);

        $('div.content > div.form').html("");

        if (id == "viewdealer"){

            url = "dd.php";

        } else if (id == "searchdealer"){

            url = "dealerSearch.php";

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
            <li class="topn"><a style="width: 300px" href="searchdealer.php"><img src="../img/Search.png"><span class="bar">Search</span></a></li>
        </ul>
        <?php
        require "core/init.php";

        $error=FALSE;
        $dealer_nameerr = $area_noerr =  $NICerr = $addresserr = $salesPerson_iderr = $mobileNoerr = $telephoneNoerr = $emailerr = $faxerr =  "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {






            if(empty($_POST['area'])){
                $area_noerr = "";
                $error = TRUE;
            }else{
                $area_no = $_POST['area'];
                echo $area_no;
                $sql2 = "Select DISTINCT area_no,area from area = $area_no";
                $result2= mysqli_query($connection, $sql2);
                if (mysqli_query($connection, $sql2)){
                    while($row = mysqli_fetch_assoc($result2)){
                        if($area_no==$row['area']){
                            $a_no=$row['area_no'];
                        }
                    }
                }
            }


            if(empty($_POST['NIC'])){
                $NICerr = "";
                $error = TRUE;
            }else{
                $NIC = $_POST['NIC'];
                echo $NIC;
            }



            if(empty($_POST['address'])){
                $addresserr = "";
                $error = TRUE;
            }else{
                $address = $_POST['address'];
                echo $address;
            }

            if(empty($_POST['salesPerson_id'])){
                $salesPerson_iderr = "";
                $error = TRUE;
            }else{
                $salesPerson_id = $_POST['salesPerson_id'];
                echo $salesPerson_id;
            }

            /*
             if(empty($_POST['mobileNo'])){
                 $mobileNoerr = "";
                 $error = TRUE;
             }else{
                 $mobileNo = $_POST['mobileNo'];
                 echo $mobileNo;
             }

             if(empty($_POST['telephoneNo'])){
                 $telephoneNoerr = "rq";
                 $error = TRUE;
             }else{
                 $telephoneNo = $_POST['telephoneNo'];
                 echo $telephoneNo;
             }
             */

            if(empty($_POST['email'])){
                $emailerr = "";
                $error = TRUE;
            }else{
                $email = $_POST['email'];
                echo $email;
                if (strpos($email, '@') == FALSE) {
                    $emailerr =  "Invalid email address";

                    $error = TRUE;
                }
            }

            if(empty($_POST['fax'])){
                $faxerr = "";
                $error = TRUE;
            }else{
                $fax = $_POST['fax'];
                echo $fax;
            }

            if ($error==FALSE){



                $sql="INSERT INTO `warranty_management`.`dealer` (`dealer_name`, `area_no`, `salesPerson_id`, `NIC`, `address`, `mobileNo`, `telephoneNo`, `email`, `fax`) VALUES ('$_POST[dealer_name]', $a_no , '$_POST[salesPerson_id]', '$_POST[NIC]', '$_POST[address]', '$_POST[mobileNo]', '$_POST[telephoneNo]', '$_POST[email]', '$_POST[fax]')";

                if(mysqli_query($connection,$sql)){
                    //die();
                    header("Location: adddealer.php");
                } else{echo "error";}



            }
        }
        ?>




        <div class="form">
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="hello" name= "myForm" onsubmit="return(validate());">
                <div class="ad">
                    <h1 style= "font-size: 20px;
        background-color: #990000;
        color: white;
        width:100%;
        padding: 10px;
        font-family: Calibri;
        line-height: 30px;
        margin:0 0 0;
        margin-bottom: 20px;
        padding-bottom: 10px;">Add Dealer</h1>

                    <table>

                        <tr>
                            <td colspan="2"><b>Dealer Name:<span class="error">* <?php echo $dealer_nameerr;?></span></b></td>



                            <td><b>Mobile No:<span class="error">* <?php echo $mobileNoerr;?></span></b></td>
                        </tr>
                        <tr>
                            <td colspan="2" width="400px"><input type="text" name="dealer_name" style="width: 300px" required ></td>
                            <td><input type="text" name="mobileNo" style="width: 200px"  required ></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Dealer Address: <span class="error">* <?php echo $addresserr;?></span></b></td>
                            <td><b>Telephone No: <span class="error">* <?php echo $telephoneNoerr;?></span></b></td>

                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" name="address" style="width: 300px" required></td>
                            <td><input type="text" name="telephoneNo" style="width: 200px" required></td>

                        </tr>
                        <tr>

                            <td colspan="2"><b>NIC: <span class="error">* <?php echo $NICerr;?></span></b></td>
                            <td><b>Fax No: </b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="text" name="NIC" style="width: 200px" required></td>
                            <td><input type="text" name="fax" style="width: 200px" required></td>
                        </tr>
                        <tr>

                            <td><b>Area: <span class="error">* <?php echo $area_noerr;?></span></b></td>
                            <td><b>Salesperson Name: <span class="error">* <?php echo $area_noerr;?></span></b></td>
                            <td><b>E mail: </b></td>
                        </tr>
                        <tr id= "trow">
                            <td>
                                <?php

                                echo '<select name="area" id="cap">';
                                echo '<option>     -------ALL--------   </option>';

                                $sql1 = "Select DISTINCT area_no,area from area";
                                $result1= mysqli_query($connection, $sql1);
                                while($r=mysqli_fetch_row($result1))
                                {
                                    echo '<option id=' .$r[0].'> ' . $r[1] . '</option>';

                                }
                                echo '</datalist>';
                                echo "</select>";

                                ?>
                            </td>
                            <td id="second">


                                <select name="salesPerson_id">

                                    <option> -------ALL--------</option>

                                </select>


                            </td>
                            <td><input type="text" name="email" style="width: 200px" required ></td>
                        </tr>
                        <tr>
                            <td>


                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>

                        <tr>
                            <td> </td>
                            <td> </td>
                            <td> <button type="submit">SAVE</button></td><td><button type="reset">RESET</button></td>
                        </tr>


                        <div id="required">
                            <p><span class="error">* Required Fields.</span><br/>
                            </p>
                        </div>

                    </table>

                </div>
            </form>

        <?php

        include '../../include/footer.php';
        ?>

