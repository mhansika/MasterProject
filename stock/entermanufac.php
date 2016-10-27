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
            margin-top: -2%;
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
            text-align: inherit;
            padding: 1em 0;
            font-family: 'Segoe UI Light', 'Segoe UI', 'Open sans', Arial, Sans;
            line-height: 30px;
            text-align: center;
            padding-bottom: 10px;
            margin-top: -3%;
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
            margin-top: 2%;
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

 require "../core/database/connect.php";


 /*function array_sanitize($item) {
   $conn= mysqli_connect('localhost','root','','warranty_management');
   $item=mysqli_real_escape_string($conn,$item);
 }

 
function manufac_data($manufac_data) {
 
  array_walk($manufac_data,"array_sanitize");
   
  $fields='`' .implode('`,`' ,array_keys($manufac_data)) . '`';
  $data='\'' . implode('\', \'' ,$manufac_data ) . '\' ';

   $conn= mysqli_connect('localhost','root','','warranty_management');
   mysqli_query($conn,"INSERT INTO  released_batteries($fields) VALUES ($data)");

}

*/





if (isset($_POST["submit"])) {
    $str =$_POST['battery_num'];

                $arr1 = substr($str, 0,4);
                $arr2 = substr($str, 4);
                $arr3 = str_split($arr1);

                $serial_no = '$arr1';
                $batch_num = '$arr2';
                $amount =$_POST['amount'];
                //$battery_type=($arr3[0]);


    


                //checking the battery types
                if ($arr3[0]=='D'){
                    $battery_type='Dagenite';

                }
                elseif ($arr3[0]=='E') {
                      $battery_type='Exide';
                }
                elseif ($arr3[0]=='L') {
                         $battery_type='Lucas';
                }

                //checking the production line
                if  ($arr3[1]=='1'){
                    $production_line='1';

                }   
                elseif ($arr3[1]=='2') {
                        $production_line='2';
                   
                }

                //checking the manufactured month
                if ($arr3[2]=='A') {
                    $manufacture_month='January';
                }
                elseif ($arr3[2]=='B') {
                    $manufacture_month='February';
                }
                elseif ($arr3[2]=='2') {
                  $manufacture_month='March';
                }
                elseif ($arr3[2]=='D') {
                    $manufacture_month='April';
                }
                elseif ($arr3[2]=='E') {
                    $manufacture_month='May';
                }
                elseif ($arr3[2]=='F') {
                    $manufacture_month='June';
                }
                elseif ($arr3[2]=='G') {
                    $manufacture_month='July';
                }
                elseif ($arr3[2]=='H') {
                    $manufacture_month='August';
                }
                elseif ($arr3[2]=='I') {
                    $manufacture_month='September';
                }
                elseif ($arr3[2]=='J') {
                    $manufacture_month='October';
                }
                elseif ($arr3[2]=='K') {
                    $manufacture_month='November';
                }
                elseif ($arr3[2]=='L') {
                    $manufacture_month='December';
                }


                //checking the manufactured year
                if ($arr3[3]=='1') {
                    $manufacture_year='1';
                }
                elseif ($arr3[3]=='2') {
                     $manufacture_year='2';
                }
                elseif ($arr3[3]=='3') {
                     $manufacture_year='3';
                }
                elseif ($arr3[3]=='4') {
                     $manufacture_year='4';
                }
                elseif ($arr3[3]=='5') {
                     $manufacture_year='5';
                }
                elseif ($arr3[3]=='6') {
                     $manufacture_year='6';
                }
                elseif ($arr3[3]=='7') {
                     $manufacture_year='7';
                }
                elseif ($arr3[3]=='8') {
                     $manufacture_year='8';
                }
                elseif ($arr3[3]=='9') {
                     $manufacture_year='9';
                }
                elseif ($arr3[3]=='0') {
                     $manufacture_year='0';
                }


            $query= "SELECT battery_type, amount FROM released_batteries";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $sql= "UPDATE released_batteries SET amount=amount +'$amount' WHERE battery_num='$str' ";
                 if (mysqli_query($conn, $sql)) {
                        echo "";
                    }

                        else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }


            }

            else{


                 $sql = "INSERT INTO released_batteries (battery_num,battery_type,production_line,manufacture_month,manufacture_year,amount) VALUES ('$str','$battery_type','$production_line','$manufacture_month','$manufacture_year','$amount')";

              if (mysqli_query($conn, $sql)) {
                        echo "";
                    }

                        else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }



                                /*     $manufac_data = array(

                                                '$battery_num'   =>  $_POST['battery_num'],
                                                '$battery_type' =>  $_POST['battery_type'],
                                                '$battery_name' =>  $_POST['battery_name'],
                                                '$production_line' =>  $_POST['production_line'],
                                                '$manufacture_month'   =>  $_POST['manufacture_month'],
                                                '$manufacture_year'   =>  $_POST['manufacture_year'],
                                                                   
                                              
                                              
                                           );


                                        manufac_data($manufac_data);
                                       
                                            exit();

             */                    
                                      
             }

                 

            }
               



               


                 
                        








?>




<div class="table">
    <div id="content">
	<form action="entermanufac.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">


 <div class="ad">
       <h1>Manufactured Batteries</h1>
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
                <td>Battery No:</td>
                <td><input type="text" name="battery number" style="width: 200px" required></td>
            </tr>

             <tr>
                <td>Amount:</td>
                <td><input type="text" name="amount" style="width: 200px" required></td>
            </tr>
         <tr>
             <td></td>
             <td><button class="submit" name="submit" value="send">Submit</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="reset" name="reset" value="reset">Reset</button></td>
         </tr>

        </form>

        </table>

    </div>
</div>
<div id="footer">

</div>
</body>
</html>

