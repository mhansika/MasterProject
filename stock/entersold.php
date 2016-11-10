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


      
      <script type="text/javascript">
          $( document ).ready(function() {
     $("select#cap").click( function(){

            //var id = this.id;
            var id = $(this).children(":selected").attr("id");
            console.log(id);

            $.ajax({

                url:'getdrop.php?data='+id,
                type:"get",
                success:function(data){

                $("tr#trow>td#second").html("");
                $("tr#trow>td#second").html(data);

                        //load third
                     $("select#carmodel").click( function(){
                        //var id = this.id;
                        //alert("fdsf");
                        var id1 = $(this).children(":selected").attr("value");
                       // alert(id1);
                        console.log(id1);
                        $.ajax({

                            url:'getdrop2.php?data1='+id1,
                            type:"get",
                            success:function(data1){
                                //alert(data1);

                            $("tr#trow>td#second1").html("");
                            $("tr#trow>td#second1").html(data1);
                            },

                            error:function (jqXHR, textstatus, errorThrown)
                                      {
                                          alert(errorThrown);

                                      }


                        });
                             });

                     //end of third load

                }


            });
    });

    
    
});
      </script>


  
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
    //$salesname = $x = $y = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {



        //$salesname  = $_POST['salespersonname'];
        //$sales = explode(" ", $salesname);
        //$x = $sales[0]; 
        //$y = $sales[1];
        //    $sql = "INSERT INTO `sold` (`battery_type`, `battery_name`, `amount`, `salesPerson_id`, `dealer_id`, `sold_Date`) VALUES ('$_POST[batterytype]','$_POST[batteryname]',$_POST[amount],'$_POST[salespersonname]','$_POST[dealername]')";

            $sql = "INSERT INTO `sold` (`battery_type`, `battery_name`, `amount`, `salesPerson_id`, `dealer_id`, `sold_Date`) VALUES ('$_POST[battery_type]', '$_POST[battery_name]', '$_POST[amount]', '$_POST[salesPerson_id]','$_POST[dealer_id]', now())";
            if(mysqli_query($connection,$sql)){
                //die();
            } else{echo "error";}

            $query="UPDATE stock_in_hand SET current_stock=current_stock -'$_POST[amount]' WHERE battery_type='$_POST[battery_type]' AND battery_name= '$_POST[battery_name]'";
                 if (mysqli_query($connection, $query)) {
                        echo "";
                    }

                        else {
                        echo "Error: " . $query . "<br>" . mysqli_error($connection);
                        }
            $query1= "call updateRelease('$_POST[batch_num]','$_POST[amount]','$_POST[salesPerson_id]','$_POST[dealer_id]')";
                if (mysqli_query($connection, $query1)) {
                        echo "";
                    }

                        else {
                        echo "Error: " . $query1 . "<br>" . mysqli_error($connection);
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
                                        <td>Batch No :</td>
                                        <td>
                                        <div class="widget">
                                           <input type="text" class="len" value="D2D6" name="batch_num" maxlength="4">
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
                                    <td> <select id="battery" name="battery_type" onchange="ChangebatteryList()" style="font-color:black;">
                                        <option value="">------SELECT------</option>
                                        <option value="Exide">Exide</option>
                                        <option value="Lucas">Lucas</option>
                                        <option value="Deganite">Deganite</option>
                                        </select>
                                    </tr>
                                    <tr>
                                    
                                    <td>Battery Name:</td>
                                    <td> <select id="batterysubtype" name="battery_name">
                                        <option value="">------SELECT------</option>
                                        <option value="MF105D31R/L">MF105D31R/L</option>
                                        <option value="65D31R/L">65D31R/L</option>
                                        <option value="MFS65R/L">MFS65R/L</option>

                                    </select>
                                    </tr>
                                     <tr>
                                        <td>Amount:</td>
                                        <td><input type="number" name="amount" style="width: 70px" required></td>
                                    </tr>
                                     
            </tr>
            <tr><td>Area:</td></tr>
            <tr id= "trow">
                <td>
                    <?php 
                        
                        echo '<select name="area" id="cap">';
                        echo '<option>    ------SELECT------   </option>';
                        
                        $sql1 = "Select DISTINCT area_no,area from area";
                        $result1= mysqli_query($connection, $sql1);
                             while($r=mysqli_fetch_row($result1))
                             { 
                                   echo '<option id=' .$r[0].'> ' . $r[1] . '</option>';

                             }
                        echo "</select>";

                    ?>
                </td>
                <tr id="trow">
                    <td>Salesperson Name:</td>
                <td id="second">

              
                       <select name="salesPerson_id">
                        
                        <option> ------SELECT------</option>

                        </select>
                       

                </td>
                </tr>
                <tr id="trow">
                <td> Dealer Name:</td>
                <td id="second1">

              
                       <select name="dealer_id" >
                        
                        <option> ------SELECT------</option>

                        </select>
                       

                </td>
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

