<?php
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
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
        margin-left: 35%;
    }
    h1{
        font-size: 25px;
        background-color: #990000;
        color: white;
        width:50%;
        padding: 10px;
        font-family: Arial;
        line-height: 30px;
        margin:0 0 0;
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }
    .ad{
        font-family: Arial;
    }
</style>
<body>
<div id="sidebar">
    <div class="icon-bar">
        <a class="active" href="http://localhost/MasterProject/inventory.php"><i class="fa fa-arrow-left fa-2x " aria-hidden="true"></i></br><span style="font-size:10px;font-family: Arial">Back</span></a>
        <a href="entermanufac.php"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></br><span style="font-size:9px;font-family: Arial">Enter Manufacture Stock</span></a>
        <a href="#"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></br><span style="font-size:10px;font-family: Arial">Enter Sold Batteries</span></a>
        <a href="#"><i class="fa fa-archive fa-2x " aria-hidden="true"></i></br><span style="font-size:10px;font-family: Arial">Stock In Hand</span></a>
    </div>
</div>
    <div id="content">
	<form action="entersold.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">

	
 <div class="ad">
       <h1>Sold Batteries</h1>
     <table>
        
            <tr>
            <td>Battery Type:</td>
               
           
            <td> <select id="battery" onchange="ChangebatteryList()">
                <option value="">----Select----</option>
                <option value="Exide">Exide</option>
                <option value="Lucas">Lucas</option>
                <option value="Deganite">Deganite</option>
                </select>
            </td>
            
            </tr>
            <tr>
            <td>Battery Name:</td>
            <td> <select id="batterysubtype"></select>

            <script>
            var batteriesAndSubtypes = {};
            batteriesAndSubtypes['Exide'] = ['MFS65R/L', 'MF105D31R/L', '38B20R/L'];
            batteriesAndSubtypes['Lucas'] = ['MF105D31R/L', '65D31R/L', 'MFS65R/L', 'NS 40ZR/L'];
            batteriesAndSubtypes['Deganite'] = ['NS 40ZR/L', 'N70R/L', '80D26R/L'];

            function ChangebatteryList() {
                var batteryList = document.getElementById("battery");
                var subtypeList = document.getElementById("batterysubtype");
                var selbattery = batteryList.options[batteryList.selectedIndex].value;
                while (subtypeList.options.length) {
                    subtypeList.remove(0);
                }
                var batteries = batteriesAndSubtypes[selbattery];
                if (batteries) {
                    var i;
                    for (i = 0; i < batteries.length; i++) {
                        var battery = new Option(batteries[i], i);
                        subtypeList.options.add(battery);
                    }
                }
            }
            </script>
            
            </td>
            </tr>
            <tr>
                <td>Amount:</td>
                <td><input type="text" name="battery number" style="width: 200px" required></td>
            </tr>

             <tr>
                <td>Area:</td>
                <td><input type="text" name="amount" style="width: 200px" required></td>
            </tr>
             <tr>
                <td>Salesperson Name:</td>
                <td><input type="text" name="amount" style="width: 200px" required></td>
            </tr>
             <tr>
                <td>Dealer Name:</td>
                <td><input type="text" name="amount" style="width: 200px" required></td>
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

