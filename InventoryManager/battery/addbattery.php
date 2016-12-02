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
        <script><!-- test-->
            //comment
            $("div.content>ul#topnavi>li>a").click( function(e){

                e.preventDefault();

            });


            $("ul#topnavi>li>a").click( function(){
                var id = this.id;
                console.log(id);

                $('div.content > div.form').html("");

                if (id == "viewbattery"){

                    url = "pd.php";

                } else if (id == "searchbattery"){

                    url = "searchbattery.php";

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









        <!DOCTYPE html>
        <html lang="en">
        <head>
            <style>
                .error {color: #FF0000;}
                table {
                    border-collapse: collapse;
                }

                td {
                    padding-top: .5em;
                    padding-bottom: .5em;
                }
            </style>
            <meta charset="UTF-8">
            <title>Add Product</title>
            <link rel="stylesheet" href="css/m.css" media="screen" type="text/css" />

            <!--javascript form validation -->
            <script type="text/javascript">


                function validate(){

                    if (document.Form.battery_type.value == ""){
                        alert("Please fill out this field");
                        document.Form.battery_type.focus() ;
                        return false;

                    } if (document.Form.battery_name.value == ""){
                        alert("Please fill out this field!");
                        document.Form.battery_name.focus() ;
                        return false;

                    } if (document.Form.warranty_period.value == ""){
                        alert("Please fill out this field!");
                        document.Form.warranty_period.focus() ;
                        return false;
                    }


                    if (document.Form.amperehour_Value.value == ""){
                        alert("Please fill out this field!");
                        document.Form.amperehour_Value.focus() ;
                        return false;
                    }

                    if (document.Form.voltage_Value.value == "") {
                        alert("Please fill out this field!")
                        document.Form.voltage_Value.focus();
                        return false;
                    }

                    if (document.Form.item_Type.value == "") {
                        alert("Please fill out this field!")
                        document.Form.item_Type.focus();
                        return false;
                    }




                }





            </script>


        </head>

        <body>
        <?php
        require "core/database/connect.php";

        if (isset($_POST["submit"])) {

            $battery_type = $_POST['battery_type'];
            $battery_name =$_POST['battery_name'];
            $warranty_period=$_POST['warranty_period'];
            $amperehour_Value=$_POST['amperehour_Value'];
            $VoltageValue=$_POST['voltage_Value'];
            $item_Type=$_POST['item_Type'];



            //Process the image that is uploaded by the user

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }

            $image=basename( $_FILES["imageUpload"]["name"],".png"); // used to store the filename in a variable


            $sql = "INSERT INTO battery_description (battery_type,battery_name,warranty_period,amperehour_Value,voltage_Value,item_Type,imageUpload) VALUES ('$battery_type','$battery_name','$warranty_period','$amperehour_Value','$VoltageValue',' $item_Type','$image')";

            if (mysqli_query($conn, $sql)) {
                echo "";
            }

            else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }


            header("Location:inventory.php");



        }
        ?>




        <form action="addbattery.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">

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
    padding-bottom: 10px;">Add Product</h1>
                <table>

                    <tr>
                        <td>Product type:</td>


                        <td> <select name="battery_type">
                                <option value="Exide">Exide</option>
                                <option value="Lucas">Lucas</option>
                                <option value="Dagenite">Dagenite</option>
                        </td>

                    </tr>
                    <tr>
                        <td>Product Name:</td>
                        <td><input type="text" name="battery_name" style="width: 200px" required></td>
                    </tr>
                    <tr>
                        <td>Warranty period:</td>
                        <td><select name="warranty_period">
                                <option value="1year">1 year</option>
                                <option value="2year">2 year</option>
                        </td>
                    </tr>
                    <tr>
                        <td>Ampere-hour Value:</td>
                        <td><input type="text" name="amperehour_Value" style="width: 200px" required></td>
                    </tr>

                    <tr>
                        <td>Voltage Value:</td>
                        <td><input type="text" name="voltage_Value" style="width: 200px" required></td>
                    </tr>
                    <tr>
                        <td>Item Type:</td>
                        <td><input type="text" name="item_Type" style="width: 200px" required></td>
                    </tr>
                    <tr>
                        <td>Insert a image here: </td>
                        <td><input type="file" name="imageUpload" id="imageUpload">
                    </tr>



                    <tr>
                        <td></td>
                        <td><button class="submit" name="submit" value="send">Submit</button></td>
                        <td> <button type="reset">RESET</button></td>
                    </tr>

        </form>

        </table>

    </div>

</body>
</html>


<?php

        include '../../include/footer.php';
        ?>

