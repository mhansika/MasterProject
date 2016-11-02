<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" media="screen" type="text/css" href="css/style.css">

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
    $str =$_POST['batch_num'];

                $arr1 = substr($str, 0,4);
                $arr2 = substr($str, 4);
                $arr3 = str_split($arr1);

                $serial_no = '$arr1';
                $battery_num = '$arr2';
                $amount =$_POST['amount'];
                $battery_name=$_POST['battery_name'];
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


            $query =mysqli_query($conn,"SELECT batch_num FROM manufac_batteries WHERE batch_num='$str' ");
            $rows=mysqli_num_rows($query);

            if ($rows == 1) {
                $sql = "UPDATE manufac_batteries SET amount=amount +'$amount' WHERE batch_num='$str' ";
               //$sql .="UPDATE stock_in_hand SET current_stock=current_stock +'$amount' WHERE battery_type='$battery_type' ";
                 if (mysqli_query($conn, $sql)) {
                        echo "";
                    }

                        else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }


                $query="UPDATE stock_in_hand SET current_stock=current_stock +'$amount' WHERE battery_type='$battery_type' ";
                 if (mysqli_query($conn, $query)) {
                        echo "";
                    }

                        else {
                        echo "Error: " . $query . "<br>" . mysqli_error($conn);
                        }

            }

            else{


                 $sql = "INSERT INTO manufac_batteries (batch_num,battery_type,battery_name,production_line,manufacture_month,manufacture_year,amount) VALUES ('$str','$battery_type','$battery_name','$production_line','$manufacture_month','$manufacture_year','$amount')";

              if (mysqli_query($conn, $sql)) {
                        echo "";
                    }

                        else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }


                $query = "INSERT INTO stock_in_hand (battery_type,current_stock) VALUES ('$battery_type','$amount')";

                if (mysqli_query($conn, $query)) {
                        echo "";
                    }

                        else {
                        echo "Error: " . $query . "<br>" . mysqli_error($conn);
                        }

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
                                    <td> <select id="batterysubtype" name="battery_name">
                                        <option value="">----Select----</option>
                                        <option value="MF105D31R/L">MF105D31R/L</option>
                                        <option value="65D31R/L">65D31R/L</option>
                                        <option value="MFS65R/L">MFS65R/L</option>

                                    </select>

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
                                        <td><input type="text" name="batch_num" style="width: 200px" required></td>
                                    </tr>

                                     <tr>
                                        <td>Amount:</td>
                                        <td><input type="text" name="amount" style="width: 200px" required></td>
                                    </tr>
                                 <tr>
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


