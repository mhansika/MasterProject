<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<head>
  <meta charset="utf-8">
       
        <link rel="stylesheet" href="css/style1.css" media="screen" type="text/css" />
         <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
      
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        .widget {
        vertical-align: top ;
        margin-left: 1rem;
        font-size: 2rem;
        display: inline-block;
        position: relative;

    }

    .widget .len {
        width: 20rem;
        font-size: inherit;
        font-family: inherit;
        letter-spacing: 20px;
        background-color: transparent;
        color: white;
        border: solid white;

        -moz-appearance: textfield;
    }

    .widget .len::-webkit-inner-spin-button,
    .widget .len::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .widget .digit-background {
        position: absolute;
        top: 1px;
        left: 0;
        z-index: -1;
    }

    .widget .digit-background .digit {
        display: inline-block;
        float: left;
    }

    .widget .digit-background .digit::before {
        content: '0';
        color: gray;
        background-color: ;
        display: inline-block;
        padding: 3px;
        margin: -1px 5px 0 -1px;
    }
      </style>
  
</head>


<div id="body">
    <div id="navigation"></div>
    <nav>
        <ul id="mainsidebar">
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="pd">

                    <a href="../inventory.php" id="pd" style="top: 1px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/Back.png" align="middle"><span>Back</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "entermanufac.php" id="stock" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/manufac.png" align="middle"><span>Manufature Products</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="dealer_title" >

                    <a href="entersold.php" id="dealer" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/Sold.png" align="middle"><span>Sold Products</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href="#" id="salep" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                text-align:center;"><img class= "pic" src="../img/stockH.png" align="middle"><span>Stock In Hand</span></a>
                </div>
            </li>

    </nav>


    </nav>
</div>

    <div class="content">

        <div class="table">
      
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

            $query="UPDATE stock_in_hand SET current_stock=current_stock -'$_POST[amount]' WHERE battery_type='$_POST[batterytype]' ";
                 if (mysqli_query($connection, $query)) {
                        echo "";
                    }

                        else {
                        echo "Error: " . $query . "<br>" . mysqli_error($connection);
                        }
        }
    ?>
    <div id="content">
	<form action="entersold.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">


        <div class="ad">
       <h1>Sold Batteries</h1>
       <br>
     <table>
        <tr>
                                        <td>Batch No :
                                        <div class="widget">
                                           <input type="text" class="len" value="D2D6">
                                           <div class="digit-background">
                                                     <div class="digit"></div>
                                                     <div class="digit"></div>
                                                     <div class="digit"></div>
                                                     <div class="digit"></div>
                                           </div>
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>Battery Type:</td> 
                                    <td> <select id="battery" onchange="ChangebatteryList()" style="font-color:black;">
                                        <option value="">----Select----</option>
                                        <option value="Exide">Exide</option>
                                        <option value="Lucas">Lucas</option>
                                        <option value="Deganite">Deganite</option>
                                        </select>
                                    </tr>
                                    <tr>
                                    <td> Battery Name:</td>
                                    <td> <select id="batterysubtype" name="battery_name">
                                        <option value="">----Select----</option>
                                        <option value="MF105D31R/L">MF105D31R/L</option>
                                        <option value="65D31R/L">65D31R/L</option>
                                        <option value="MFS65R/L">MFS65R/L</option>

                                    </select>
                                    </tr>
                                     <tr>
                                        <td>Amount:</td>
                                        <td><input type="number" name="amount" style="width: 70px" required></td>
                                    </tr>
                                     <tr>
                <td>Area:</td>
                <td><input type="text" name="area" style="width: 200px" required></td>
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

