
<html>
<head>
    <link rel="stylesheet" href="../css/IM.css" type="text/css"/>
</head>
<body>
<?php
include '../include/header.php'
?>
<?php
include '../include/sidenav.php';
?>
<div id="content">
    <div class="topnav">
        <a href="product.php"><img src="../img/View.png"></a>
        <a href="addbattery.php"><img src="../img/Add.png"></a>
        <a href="searchbattery.php"><img src="../img/Search.png"></a>
    </div>
    <?php
    require "../../core/database/connect.php";
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
    }
    ?>
    <div class="ad">
        <form class="AddPro" action="" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
            <h1 class="add">Add Product</h1>
            <table id="ad">
                <tbody>
                <tr>
                    <td>Product type:</td>
                    <td>
                        <select name="battery_type">
                            <option value="Exide">Exide</option>
                            <option value="Lucas">Lucas</option>
                            <option value="Dagenite">Dagenite</option>
                    </td>
                </tr>
                <tr>
                    <td>Product Name:</td>
                    <td>
                        <input type="text" name="battery_name" style="width: 200px" required>
                    </td>
                </tr>
                <tr>
                    <td>Warranty period:</td>
                    <td>
                        <select name="warranty_period">
                            <option value="1year">1 year</option>
                            <option value="2year">2 year</option>
                    </td>
                </tr>
                <tr>
                    <td>Ampere-hour Value:</td>
                    <td>
                        <input type="text" name="amperehour_Value" style="width: 200px" required>
                    </td>
                </tr>
                <tr>
                    <td>Voltage Value:</td>
                    <td>
                        <input type="text" name="voltage_Value" style="width: 200px" required>
                    </td>
                </tr>
                <tr>
                    <td>Item Type:</td>
                    <td>
                        <input type="text" name="item_Type" style="width: 200px" required>
                    </td>
                </tr>
                <tr>
                    <td>Insert a image here: </td>
                    <td>
                        <input type="file" name="imageUpload" id="imageUpload">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button class="submit" name="submit" value="send">Submit</button></td>
                    <td> <button class="reset" type="reset">Reset</button></td>
                </tr>
                </tbody>
            </table>
    </div>
    </form>
</div>
<?php
include '../include/footer.php';
?>
</body>
</html>