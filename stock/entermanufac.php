<?php
?>
<head>
    <link rel="stylesheet" type="text/css" href="css/stock.css">
    <style>
       
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="icon">
            <div class="back">
                <a href="http://localhost/ABM/inventory.php"><img src="../images/back.png"></a>
                <span style="color: #9FBAC0; font-family: Calibri; font-size: 35px; margin-left: 5%;text-align: center">Stock</span>
            </div>
        </div>
        <ul>
            <div class="list">
                <li class="view_Manu">
                    <span style="color: #9FBAC0"><a href="viewmanufac.php">View Manufactured Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="Enter_Manu">
                    <span style="color: #9FBAC0"><a href="entermanufac.php">Enter Manufactured Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="view_sold">
                    <span style="color: #9FBAC0"><a href="#">View Sold Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="enter_sold">
                    <span style="color: #9FBAC0"><a href="entersold.php">Enter Sold Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="stockIH">
                    <span style="color: #9FBAC0"><a href="#">Stock In Hand</a></span>
                </li>
            </div>
        </ul>

    </div>
    <div id="content">
	<form action="entermanufac.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">

	
 <div class="ad" style="margin-left: 20%">
       <h1  style= "font-size: 20px;
    background-color: #990000;
    color: white;
    width:100%;
    padding: 10px;
    font-family: Calibri;
    line-height: 30px;
    margin:0 0 0;
    margin-bottom: 20px;
    padding-bottom: 10px;">Manufactured Batteries</h1>
     <table>
        
            <tr>
            <td>Battery type:</td>
               
           
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
                <td>Battery No:</td>
                <td><input type="text" name="battery number" style="width: 200px" required></td>
            </tr>

             <tr>
                <td>Amount:</td>
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
    
    </body>
</html>

