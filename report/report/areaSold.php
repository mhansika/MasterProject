<?php

include_once "connection.php";
?>
<html>
<head>
    <title></title>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<head>
<body>
  <form action="areaSold.php" method="post">
    Year:
    <select id="selectElementId" name='year'></select>
   
      <script>
          var min = (new Date().getFullYear())-2,
          max = min + 9,
          select = document.getElementById('selectElementId');

          for (var i = min; i<=max; i++){
             var opt = document.createElement('option');
             opt.value = i;
             opt.innerHTML = i;
             select.appendChild(opt);
          }
      </script>
    Month:
    <select name="month">
      <option value='January'>January</option>
      <option value='February'>February</option>
      <option value='March'>March</option>
      <option value='April'>April</option>
      <option value='May'>May</option>
      <option value='June'>June</option>
      <option value='July'>July</option>
      <option value='August'>August</option>
      <option value='September'>September</option>
      <option value='October'>October</option>
      <option value='November'>November</option>
      <option value='December'>December</option>
    </select> 


  <input type="submit" value="Submit" name="submit">
    
 </form>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="rpt/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="rpt/css/font-awesome.css" rel="stylesheet" />
     <!--PAGE LEVELC STYLES-->
    <link href="rpt/css/invoice.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="rpt/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="rpt/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Manufacture Report</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                       <div >
     
      <div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="assets/img/logo.png" width="25%" height="15%" style="padding-bottom:20px;" /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            
               <strong>   Associated Battery Manufactures</strong>
              <br />
                  <i>Address :</i> No. 31, 
                      Katukurunduwatte Road,

              <br />
                  off Attidiya Road, 
              <br />
                  Ratmalana.
              
         </div>
     </div>
     <div  class="row text-center contact-info">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             <span>
                 <strong>Email : </strong>  info@abmlanka.com
             </span>
             <span>
                 <strong>Call : </strong>  0094 11 2713111 – 3
             </span>
              <span>
                 <strong>Fax : </strong>  0094 11 2734139
             </span>
             <hr />
         </div>
     </div>
    


     <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
           <div class="table-responsive">
<?php
$str1=$str2="";
 if (isset($_POST["submit"]))

{
 $sum1=$sum2=$sum3=0;
echo '<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Area</th>
                                    <th>Amount</th>
                                    
                                </tr>
                            </thead>';  
  $str1 = $_POST['year'];
  $str2 = $_POST['month'];

$sql="SELECT * FROM sold S join dealer D on (S.dealer_id = D.dealer_id) join area A on (A.area_no = D.area_no)";
$result = $conn->query($sql);
 

if ($result->num_rows >0) {
  while($row1 = $result->fetch_assoc() ){
        $date = $row1['sold_Date'];
        $area = $row1['area'];
        $time=strtotime($date);
        $month=date("F",$time);
        $year=date("Y",$time);

        if($str1==$year && $str2==$month && $area=='Colombo'){
          $sum1=$sum1+$row1['amount'];
    
        }
        if($str1==$year && $str2==$month && $area=='Gampaha'){
          $sum2=$sum2+$row1['amount'];
    
        }
        }
       
    }
  
echo "<tbody><tr><td>Colombo</td><td>".$sum1." </td></tr>";
echo "<tr><td>Gampaha</td><td>".$sum2." </td></tr></tbody></table>";

} else {
    echo "0 results";
}
$conn->close();


?>
</div>
             <hr/>
             <div class="ttl-amts">
                  <h5>  Year : <?php echo $str1;?> Month : <?php echo $str2;?> </h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h5>  Date : <?php echo date("Y/m/d"); ?></h5>
             </div>
             <hr />
              <div class="ttl-amts">
                  <h4> <strong>Signature</strong> </h4>
             </div>
         </div>
     </div>
      
      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             
              <a href="#" class="btn btn-success btn-lg" >Download In Pdf</a>

             </div>
         </div>
 </div>
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2016 ABM 
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="rpt/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="rpt/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="rpt/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="rpt/js/custom.js"></script>


</body>
</html>


