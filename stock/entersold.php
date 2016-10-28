<?php
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<head>

<style>
    body {
        margin:0;
        background-image: url("../images/2.png");
    }

    .icon-bar {
        width: 10%;
        text-align: center;
        background-color: #B40404;
        position: fixed;
        height: 100%;

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
        background-color:black;
    }
    #footer {
        position:fixed;
        left:0px;
        bottom:0px;
        height:2%;
        width:100%;
        background:#B40404;
    }
    #content{
        margin-left: 10%;
    }
    h1{
        font-size: 25px;
        color: white;
        padding: 1em 0;
        font-family: 'Segoe UI Light', 'Segoe UI', 'Open sans', Arial, Sans;
        line-height: 30px;
        text-align: center;
        padding-bottom: 10px;
        margin-top: -10%;
        margin-left: -6%;
    }
    .ad{
        font-family: 'Segoe UI Light', 'Segoe UI', 'Open sans', Arial, Sans;
        background: #990000;
        margin: 0 auto;
        padding: 30px;
        width: 30%;
        color: #fff;
        font-size: 16px;
        line-height: 1em;
    }
    .ad td{
        display: block;
        margin: 0 0 5px;
        cursor: pointer;
    }
    .ad input,.ad select,.ad option{
        font-family: 'Segoe UI Light', 'Segoe UI', 'Open sans', Arial, Sans;
        font-size: 12px;
        border: 0;
        background:#fff;
        margin: 0 0 20px;
        padding: 8px 10px;
        display: block;
        width: 50% ;
    }
    button{
        border:0;
        background: #fff;
        color: #990000;
        padding:5px 20px;
        margin-right: 10px;
        min-width: 145px;
    }
    button:hover{
        color: #000;
        background: #990000;
    }
    button.submit{
        background:url("../img/Ok.png") #fff 10px center no-repeat;
        padding-left: 44px;
        margin-right: 0;
    }
    button.reset{
        background:url("../img/Cancel.png") #fff 10px center no-repeat;
        padding-left: 44px;
        margin-right: 0;
    }

</style>
</head>
<body>
<div id="sidebar">
    <div class="icon-bar">
        <a class="active" href="http://localhost/MasterProject/inventory.php"><i class="fa fa-arrow-left fa-2x " aria-hidden="true"></i></br><span style="font-size:10px;font-family: Arial">Back</span></a>
        <a href="entermanufac.php"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></br><span style="font-size:9px;font-family: Arial">Enter Manufacture Stock</span></a>
        <a href="entersold.php"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></br><span style="font-size:10px;font-family: Arial">Enter Sold Batteries</span></a>
        <a href="#"><i class="fa fa-archive fa-2x " aria-hidden="true"></i></br><span style="font-size:10px;font-family: Arial">Stock In Hand</span></a>
    </div>
</div>

<?php
    require "../database/connect.php";
    $salesname = $x = $y = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {



        $salesname  = $_POST['salespersonname'];
        $sales = explode(" ", $salesname);
        $x = $sales[0]; 
        $y = $sales[1];
        //    $sql = "INSERT INTO `sold` (`battery_type`, `battery_name`, `amount`, `salesPerson_id`, `dealer_id`, `sold_Date`) VALUES ('$_POST[batterytype]','$_POST[batteryname]',$_POST[amount],'$_POST[salespersonname]','$_POST[dealername]')";

            $sql = "INSERT INTO `sold` (`battery_type`, `battery_name`, `amount`, `salesPerson_id`, `dealer_id`, `sold_Date`) VALUES ('$_POST[batterytype]', '$_POST[batteryname]', '$_POST[amount]', (SELECT `salesPerson_id` FROM `sales_person` WHERE F_name = '$x' AND L_name = '$y'), (SELECT `dealer_id` FROM `dealer` WHERE dealer_name = '$_POST[dealername]'), now())";
            if(mysqli_query($connection,$sql)){
                header("Location: entersold.php");
                //die();
            } else{echo "error";}
        }
    ?>
    <div id="content">
	<form action="entersold.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">


 <div class="ad">
       <h1>Sold Batteries</h1>
     <table>
        
            <tr>
                <td>Battery Type :</td>
                <td><input type="text" name="batterytype" required></td>
            </tr>
             <tr>
                <td>Battery Name :</td>
                <td><input type="text" name="batteryname" required></td>
            </tr>
            <tr>
                <td>Amount:</td>
                <td><input type="text" name="amount" style="width: 200px" required></td>
            </tr>
            <tr>
                <td>Salesperson Name:</td>
                <td><input type="text" name="salespersonname" style="width: 200px" required></td>
            </tr>
             <tr>
                <td>Dealer Name:</td>
                <td><input type="text" name="dealername" style="width: 200px" required></td>
            </tr>

              <tr>
                <td></td>
           <td><button class="submit" name="submit" value="send">Submit</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="reset" name="reset" value="reset">Reset</button></td>
            </tr>

        </form>
        
        </table>

    </div>

<div id="footer">

</div>
</body>
</html>

