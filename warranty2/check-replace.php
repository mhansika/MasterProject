<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        
       
         </style>

  
</head>


<div id="body">
    <div id="navigation"></div>
    <nav>
        <ul id="mainsidebar">
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="dt">

                    <a href="defect-type.php" id="dt" style="top: 1px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 20px;
                                text-align:center;"><img class= "pic" src="img/b.png" align="middle" width="80px"><span>Defect Type</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "check-replace.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/c.png" align="middle" width="80px"><span>Check Replacements</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="md" >

                    <a href="mis-dealer.php" id="mis" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/d.png" align="middle" width="80px"><span>Misused </br> Dealers</span></a>
                </div>
            </li>
            

    </nav>


    </nav>
</div>

    <div class="content">

        <div class="table">
            <div id="content">
            <form action="#" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">


                    <div class="ad">
                    </br>
                     
                     <h1><b> Check Replacements</b></h1>
                     </br>

                    <table width="70%">
  <tr>
    <th>Area</th>
    <th>Dealer</th>
    <th>Date</th>
  </tr>
  <tr></tr>
  <tr>
    <th><select id="area" style="font-color:black;">
                                        <option value="">----Select----</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        </select></th>
    <th><select id="dealer" style="font-color:black;">
                                        <option value="">----Select----</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        </select></th>
    <th><div class="form-group input-group">
                        <input class="form-control" id="datepicker" name="from" type="date"  size="9" value=""/>

                        <script>
                        $(function()
                        {
                        $( "#datepicker" ).datepicker();
                        $("#").click(function() { $("#datepicker").datepicker( "show" );})
                        });
                        </script>
                        <div class="input-group-addon" ><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </div>
                    </div></th>
  </tr>
  

 

</table>




<div  class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th>All Replacements</th>
      <th>Within Warranty Period</th>
      <th>Defect Type Ok/Not</th>
      <th>Valid replacement</th>
      
    </tr>
  </thead>
</table>
</div>
<div  class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0"> 







<?php
 require "../core/database/connect.php";

$sql = "SELECT batch_num, battery_num FROM released_batteries WHERE battery_status = '3' ";
$result = $conn->query($sql);



if ($result->num_rows > 0) {



                 // output data of each row
    while($row = $result->fetch_assoc()) {
      $batch_num = $row["batch_num"] ;
      $battery_num = $row["battery_num"] ;
      $valid = warranty_calculation( $conn, $batch_num , $battery_num );
      //print_r($valid);
      $final_valid =  warranty_validation( $conn, $valid) ;
      //print_r($final_valid);
      $row["validity"] = $final_valid ;
      $defected = check_defect ($conn, $valid);
       $row["defected"] = $defected;

      $check_replace = check_replacement ($conn,$valid,$final_valid, $defected) ;
           $row["replacement"] = $check_replace;

      count_invalids($conn, $batch_num, $battery_num, $check_replace) ; 

             echo "
          
  <tbody>
    <tr>
                    <tr><th><td>".$row["batch_num"].$row["battery_num"]."</td></th><th><td>".$row["validity"]."</td></th><th><td>".$row["defected"]."</td></th><th><td>".$row["replacement"]."</td></th></tr>"; }
    echo "
                </tbody></table></table>



    
</body>
</html>";
} else {
    echo "0 results";
}
$conn->close();

 //$start = new DateTime();
       // $start = strtotime('$start');

        
        //$my_date = strtotime($date);
        //$warrantyPeriod = ceil(abs($my_date - $start) / 86400);
       

       



function warranty_calculation ($conn, $batchNum , $batteryNum) {
 
      $data= array();
      $conn= mysqli_connect('localhost','root','','warranty_management');
        $query=mysqli_query($conn,"SELECT * FROM released_batteries WHERE battery_status = '3' AND batch_num= '$batchNum' AND battery_num = '$batteryNum' ");
        $data=mysqli_fetch_assoc($query);
        return $data ; 


       die();

}

 function warranty_validation ($conn, $data)   {

    $get_date1= $data["replaced_date"];
    $start = strtotime("$get_date1");

    $get_date2 = $data["warranty_period"];
     $end = strtotime("$get_date2");
    //$datediff = $end - $start;
      //$warrantyPeriod =   floor($datediff / (60 * 60 * 24));
    //$warrantyPeriod = ceil(abs($end - $start) / 86400);

     if ($end > $start) {
        return "YES";
     
     }else{
      return "NO" ;
     }


      die();

}

function check_defect ($conn, $data) {

$defect =  $data["defect_description"];
if (isset($defect)) {
   return "Defected";
} else {
  return "Not Defected";
}



}


function check_replacement ($conn,$data, $final_valid, $defected) {

if ($final_valid == "YES" AND $defected == "Defected") {
return "VALID";

}
else {
  return "INVALID" ; 
}




}



function count_invalids($conn, $batchNum,$batteryNum, $check_replace){

if ($check_replace == "VALID") {
  mysqli_query($conn,"UPDATE released_batteries SET battery_status = '5' WHERE battery_status = '3' AND batch_num = '$batchNum' AND battery_num = '$batteryNum' ");
} else {
 mysqli_query($conn,"UPDATE released_batteries SET battery_status = '6' WHERE battery_status = '3' AND batch_num = '$batchNum' AND battery_num = '$batteryNum' ");

}

    $query=mysqli_query($conn,"SELECT * FROM released_batteries where battery_status='5' ");
    $result=mysqli_num_rows($query);
    return $result ; 

}









?>
               

 

</div>



                   
</form>


 

</div>
</div>

 
       

                        
                        
                            

</div>
</div>

<div>




