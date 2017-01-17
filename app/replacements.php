
<head>
    <title>Enter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function validation()
    {
        var regEx = /^[ELD]{1}[12]{1}[A-L]{1}[0-9]{1}[0-9]{6}$/;
        var barCode = document.loginForm.oldcode.value;
        if(barCode=="")
        {
            document.getElementById('bcd1').innerHTML="Please Enter Barcode";
            document.getElementById('barcode1').style.border ="solid 2.5px red";
            document.loginForm.oldcode.focus()
             return false;   
        }
        var flag = regEx.test(barCode);
        if(barCode.length == 10){
            if(!flag)
            {
                document.getElementById('bcd1').innerHTML="Invalid Barcode";
                document.getElementById('barcode1').style.border ="solid 2.5px red";             
                document.loginForm.oldcode.select()
                return false;
            }
            else{
                document.getElementById('bcd1').innerHTML="";
                document.getElementById('barcode1').style.border ="solid 2.5px white"; 
            }
                   
            }                
    
        else{
                document.getElementById('bcd1').innerHTML="Please Enter only 10 characters!";
                document.getElementById('barcode1').style.border ="solid 2.5px red";

                return false;
                        
            }
        
       
        var barCode1 = document.loginForm.newcode.value;
        if(barCode1=="")
        {
            document.getElementById('bcd2').innerHTML="Please Enter Barcode";
            document.getElementById('barcode2').style.border ="solid 2.5px red";
            document.loginForm.newcode.focus()
            return false;
           
        }
        var flag = regEx.test(barCode1);
        if(barCode1.length == 10){
            if(!flag)
            {
                document.getElementById('bcd2').innerHTML="Invalid Barcode";
                document.getElementById('barcode2').style.border ="solid 2.5px red";
                document.loginForm.newcode.select()
                return false;
                
            }
          }  
        
        else{
                document.getElementById('bcd2').innerHTML="Please Enter only 10 characters";
                document.getElementById('barcode2').style.border ="solid 2.5px red";
                return false;
            }            
    }

</script>
</head>
<body style="background-color: #363636">
<nav class="navbar navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="app.php"><img style="height:40px; width:40px; margin-top:8px;" src="left-arrow.png"></a>
        </div>
        <p class="navbar-text" >Enter Replacements</p>
</nav>
    <div class="container">
    <div class="row">
        <div class="Absolute-Center is-Responsive">
            <div class=" col-lg-3 col-lg-offset-4 col-md-4 col-sm-6 col-xs-12">
                <form action="" id="loginForm" name="loginForm" method="POST" onsubmit="return validation()">
                    <label class="control-label" for="date">Select Date</label>
                    <div class="form-group input-group">
                        <input class="form-control" id="datepicker" name="date" type="date" size="9" value=""/>
                        <script>
                        $(function()
                        {
                        $( "#datepicker" ).datepicker();
                        $("#").click(function() { $("#datepicker").datepicker( "show" );})
                        });
                        </script>
                        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </div>
                    </div>

                    <label 
                    class="control-label" for="barcode">Enter Replaced Battery Barcode</label>
                    <div class="form-group input-group">
                        <input class="form-control" id="barcode1" name="oldname" type="text" onblur="validation()"/>
                        <span style="color:red" id="bcd1"></span>
                        <div class="input-group-addon"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> </div>
                    </div>
                    <label class="control-label" for="barcode">Enter Issued Battery Barcode</label>
                    <div class="form-group input-group">
                        <input class="form-control" id="barcode2" name="newname" type="text" onblur="validation()"/>
                        <span style="color:red" id="bcd2"></span>
                        <div class="input-group-addon"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg outline" style="width: 100%">Done</button>
                    </div>
                    <div class="form-group">
                        <button type="clear" class="btn btn-primary btn-lg outline" style="width: 100%">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

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
$data="";
$oldname="";
$newname="";
$date="";

//get the posted values of text boxes
    if(isset($_POST["oldname"])){
        $oldname = $_POST['oldname'];
    }

        $oldBatchNum = substr($oldname, 0,4);
        $oldBatteryNum = substr($oldname, 4);
    if(isset($_POST["newname"])){
        $newname = $_POST['newname'];
            }
    //get first 4 letters
    $newbatchNum = substr($newname, 0,4);
    //get last 4 letters
    $newBatteryNum = substr($newname, 4);
    //get the date
    if(isset($_POST["date"])){
        $date=$_POST['date'];
        
}



//sql query to get warranty_period
$sql3="SELECT warranty_period FROM released_batteries WHERE batch_num='$oldBatchNum'  AND battery_num='$oldBatteryNum'";
$result = $conn->query($sql3);
$row = $result->fetch_assoc();
//get the expiry date of replaced battery
$expiary_date=$row['warranty_period'];
//update newly issued battery dettails
$sql = "UPDATE released_batteries SET battery_status=3,replaced_date='$date' WHERE  batch_num='$oldBatchNum'  AND battery_num='$oldBatteryNum'";

 
if ($conn->query($sql) === TRUE && $oldBatchNum != null) {
    echo "<script>alert('Successfully Inserted');</script>";
} else {
}
//update newly issued battery dettails
$sql2 = "UPDATE released_batteries SET battery_status=4,cus_sold_date='$date',warranty_period='$expiary_date' WHERE  batch_num='$newbatchNum'  AND battery_num='$newBatteryNum'";

if ($conn->query($sql2) === TRUE) {
    echo "";
} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();

?> 
</body>
</html>
