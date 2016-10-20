<?php
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
    body {
        margin:0;
        background-image: url("2.png");
    }

    .icon-bar {
        width: 10%;
        text-align: center;
        background-color: #820311;
        position: fixed;
    }

    .icon-bar a {
        padding: 16px;
        display: block;
        transition: all 0.3s ease;
        color: white;
        font-size: 36px;
    }

    .icon-bar a:hover {
        background-color: #000;
    }

    .active {
        background-color: #555 !important;
    }
    #footer {
        position:fixed;
        left:0px;
        bottom:0px;
        height:30px;
        width:100%;
        background:#555;
    }
    #content{
        margin-left: 20%;
    }
</style>
<body>
<div id="sidebar">
<div class="icon-bar">
    <a class="active" href="#"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-archive fa-2x" aria-hidden="true"></i></a>
</div>
</div>
<div id="content">
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
<div id="footer">

</div>
</body>
</html>


