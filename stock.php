<div class="content">

    <div class="form">
        <div class="this">

        <div class="more"style="margin-left: 10%">
        <a href="./stock/entermanufac.php"><img src="./images/more.png" style="margin-left: 79%;margin-top: 5%">
        <span style="color: #000; font-family: Calibri; font-size: 20px; margin-left: 5%;text-align: center;margin-left: 80%;margin-top: -2%">Enter for more</span></a>
        </div>
        <section style="width:60% ;margin-right:15% "> <!--for demo wrap-->
            <h1 style="font-size: 30px;
                    color: #000;
                    text-transform: uppercase;
                    font-weight: 300;
                    text-align: center;">Stock in Hand</h1>
            <div  class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">  


 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "warranty_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT battery_type, current_stock FROM stock_in_hand";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "
            <style>
        table{
            width:80%;
            table-layout:fixed;
            
        
             
        }
        .tbl-header{
            background-color: rgba(255,255,255,0.3);
            border: 1px solid #c2c2a3;
        }
        th{
            font-size: 50px;
            font-weight: bold;
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 15px;
            color: #fff;
            text-transform: uppercase;
            background-color: #990000;
        }
        td{
            padding: 15px;
            text-align:left;
            vertical-align:middle;
            font-weight: 300;
            font-size: 13px;
            color: #000;
            border-bottom: 1px solid #c2c2a3;
        }


        /* demo styles */

        @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
        body{
            font-family: 'Roboto', sans-serif;
        }

    </style>


</head>
<body>

                        <thead>
                        <tr>
                            <th>Battery Type</th>
                            <th>Available Stock</th>
                        </tr>
                        </tr>
                        </thead>
                </div>";
                 // output data of each row
    while($row = $result->fetch_assoc()) {
             echo "    <tbody>
                <tr><td>".$row["battery_type"]."</td><td>".$row["current_stock"]."</td></tr>"; }
    echo "
                </tbody></table></table>
        </div>
</section>


</div>
</div>


</div>     
</body>
</html>";
} else {
    echo "0 results";
}
$conn->close();


?>
               

              
     

