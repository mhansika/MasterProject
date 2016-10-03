 <meta charset="UTF-8">
    <title>Manufactured Batteries</title>
    <link rel="stylesheet" href="../css/m.css" media="screen" type="text/css" />

<!--javascript form validation -->
<script type="text/javascript">


        function validate(){
         
         if (document.Form.battery_type.value == ""){
            alert("Please fill out this field");
            document.Form.battery_type.focus() ;
                    return false;

          } if (document.Form.battery_name.value == ""){
            alert("Please fill out this field!");
            document.Form.battery_name.focus() ;
                    return false;

          } if (document.Form.battery_no.value == ""){
            alert("Please fill out this field!");
            document.Form.battery_no.focus() ;
                    return false;
          }


         if (document.Form.amount.value == ""){
            alert("Please fill out this field!");
            document.Form.amount.focus() ;
                    return false;
          }

         



}





</script>


</head>
    
    <body>
    <?php
            require "../core/database/connect.php";

        if (isset($_POST["submit"])) {

            $battery_type = $_POST['battery_type'];
            $battery_name =$_POST['battery_name'];
            $battery_no=$_POST['battery_no'];
            $amount=$_POST['amount'];
            
            $sql = "INSERT INTO manufactured_batteries (battery_type,battery_name,battery_no,amount) VALUES ('$battery_type','$battery_name','$battery_no')";

        if (mysqli_query($conn, $sql)) {
            echo "";
        }

            else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            
            header("Location:inventory.php");



   }
    ?>



    
<form action="entermanufac.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
    
<div class="ad">
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

