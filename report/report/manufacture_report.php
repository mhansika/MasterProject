<?php
include_once "connection.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
 
<form action="manufacture_report.php " method="post">
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

    Production Line:
    <select name='line'>
      <option value = '1'>1</option>
      <option value = '2'>2</option>
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
                      <!-- header-->
                        <h1 class="page-head-line">Manufacture Report</h1>

                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                       <div >
     
      <div class="row pad-top-botm ">
         <div class="col-lg-6 col-md-6 col-sm-6 ">
            <img src="rpt/img/logo.png" width="25%" height="15%" style="padding-bottom:20px;" /> 
         </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <!-- Address-->
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
$year="";$str1="";$str2="";$line="";
if (isset($_POST["submit"]))
{   
  $str1 = $_POST['year'];
  //give last number of year
  $year = substr($str1, 3,4);

  $str2 = $_POST['month'];
  //select month
   if($str2 == 'January'){
    $month = 'A';
   }
   elseif($str2 == 'February'){
    $month = 'B';
   }
   elseif($str2 == 'March'){
    $month = 'C';
   }
   elseif($str2 == 'April'){
    $month = 'D';
   }
   elseif($str2 == 'May'){
    $month = 'E';
   }
   elseif($str2 == 'June'){
    $month = 'F';
   }
   elseif($str2 == 'July'){
    $month = 'G';
   }
   elseif($str2 == 'August'){
    $month = 'H';
   }
   elseif($str2 == 'September'){
    $month = 'I';
   }
   elseif($str2 == 'October'){
    $month = 'J';
   }
   elseif($str2 == 'November'){
    $month = 'K';
   }
   else{
    $month = 'L';
   }
  
   $line = $_POST['line'];

}
//get all details of anufacture battery table
$sql="SELECT * FROM manufac_batteries";
$result = $conn->query($sql);
$sum1=$sum2=$sum3=0;
//create table header
echo'<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Battery Type</th>
                                    <th>Amount</th>
                                    
                                </tr>
                            </thead>';   

if ($result->num_rows > 0) {
while($row1 = $result->fetch_assoc() ){
  //check and increment ecah sum of battry types
  if($row1['manufacture_year']==$year && $row1['manufacture_month']==$month && $row1['production_line']==$line){
      if($row1["battery_type"]=='Exide'){
        $sum1=$sum1+$row1["amount"];
        }
      elseif($row1["battery_type"]=='Lucas'){
        $sum2=$sum2+$row1["amount"];
        }
      else{
        $sum3=$sum3+$row1["amount"];
      }

   }

 }
echo "<tbody><tr><td>Exide</td><td>".$sum1." </td>";
echo "<tr><td>Lucas</td><td>".$sum2." </td>";
echo "<tr><td>Deganite</td><td>".$sum3." </td></tbody></table>";

} else {
    echo "0 results";
}
$conn->close();


?>
                                
             </div>
             <hr />
             <div class="ttl-amts">
            <!--give total amount of batteries-->
               <h5>  Year :<?php 
               echo $str1;?> Month :<?php echo $str2;?> Production Line :<?php echo $line;
                ?></h5>
             </div>
             <hr />
             <div class="ttl-amts">
            <!--give total amount of batteries-->
               <h5>  Total Amount :<?php 
               echo $sum1+$sum2+$sum3;
                ?></h5>
             </div>
             <hr />
              <div class="ttl-amts">
                <!--give current date-->
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
