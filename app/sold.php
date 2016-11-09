 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "warranty_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name="";
$date="";


?>


<html>
<head>
    <title>Enter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="app.php"><img style="height:40px; width:40px; margin-top:8px;" src="left-arrow.png"></a>
        </div>
        <p class="navbar-text" >Enter Sold Batteries</p>
</nav>
    <div class="container">
    <div class="row">
        <div class="Absolute-Center is-Responsive">
            <div class=" col-lg-3 col-lg-offset-4 col-md-4 col-sm-6 col-xs-12">
                <form action="" id="loginForm" method="POST">
                    <label class="control-label" for="date">Select Date</label>
                    <div class="form-group input-group">
                        <input class="form-control" id="datepicker" name="date" type="date" size="9" value="date"/>
                        <script>
                        $(function()
                        {
                        $( "#datepicker" ).datepicker();
                        $("#").click(function() { 
                            $("#datepicker").datepicker( "show" );
                        })
                        });
                        </script>
                        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </div>
                    </div>

                    <label class="control-label" for="barcode">Enter Barcode</label>
                    <div class="form-group input-group">
                        
                        <input class="form-control" id="barcode" name="barcode" type="text"/>
                        <div class="input-group-addon"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg outline" style="width: 100%">Done</button>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-lg outline" style="width: 100%">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
   
<?php
    if (isset($_POST["barcode"])){
        $name = $_POST["barcode"];
    }
$arr1 = substr($name, 0,4);
$arr2 = substr($name, 4);
    if (isset($_POST["date"])){
        $date =  $_POST["date"];
    }

$sql = "UPDATE released_batteries SET battery_status=2,cus_sold_date='$date' WHERE  batch_num='$arr1'  AND battery_num='$arr2'";
 
if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();

?> 
</body>
</html>
