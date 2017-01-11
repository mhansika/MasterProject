<?php
include_once "connection.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<form action="defect_report.php" method="post">
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
    Defect Type:
    
    <?php
    //get all defect types from data base
    echo"<select name='defect_type'>
    <option value = ''>---Select---</option>";
    
    $query= "SELECT defect FROM defect_types ";
    $db = mysqli_query($conn, $query);
    while ( $d=mysqli_fetch_assoc($db)) {
  echo "<option value='{".$d['defect']."}'>".$d['defect']."</option>";
}
    
    ?>
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
<!--pdf-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.1.135/jspdf.min.js"></script>
<script type="text/javascript" src="http://cdn.uriit.ru/jsPDF/libs/adler32cs.js/adler32cs.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2014-11-29/FileSaver.min.js
"></script>
<script type="text/javascript" src="libs/Blob.js/BlobBuilder.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.addimage.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.standard_fonts_metrics.js"></script>
<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.split_text_to_size.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.2.3/jspdf.plugin.autotable.js"></script>

<script type="text/javascript" src="http://cdn.immex1.com/js/jspdf/plugins/jspdf.plugin.from_html.js"></script>
<script type="text/javascript" src="http://dataurl.net/#dataurlmaker"></script>
<script type="text/javascript" src="js/basic.js"></script>

<script lang="javascript" type="text/javascript">


function run()
 {
    
    var pdf = new jsPDF('p', 'pt', 'letter'),
    source = $('#content')[0],
    specialElementHandlers = {
        'bypassme':function(element,renderer){
            return true;
        }
    };
    
    margins = {
        top: 40,
        //yata idan tynna ona ida tika
        bottom: 20,
        left: 40,
        right: 40,
        width: 522
    };
    
    


pdf.fromHTML(
        source,
        margins.left,
        margins.top,
        {
        'width': margins.width 
        },
        function (dispose) {
            pdf.save('Test.pdf');
        },
        margins
   );
   
};


</script>



</head>
<body id="content">
    
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Defect Report</h1>

                    </div>
                </div>
                <!-- /. ROW  -->
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
             <p>
             <span>
                 <strong>Call : </strong>  0094 11 2713111
             </span>
           </p>
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
$str3="";$str1="";$str2="";
 if (isset($_POST["submit"]))
{
  $str1 = $_POST['year'];
  $str2 = $_POST['month'];
  $str3 = $_POST['defect_type'];
//get all details from releasd battries table
$sql="SELECT * FROM released_batteries";
$result = $conn->query($sql);
//set table headers
echo '<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Batch Number</th>
                                    <th>Battery Number</th>
                                    <th>Production Line</th>
                                </tr>
                            </thead>';   
if ($result->num_rows > 0) {
while($row1 = $result->fetch_assoc() ){
        $date=$row1['replaced_date'];
          $time=strtotime($date);
          $Month=date("F",$time);
          $Year=date("Y",$time);
        $batchNum=$row1['batch_num'];//$year = substr($str1, 3,4);
        //get the second number of batch number
        $line=$batchNum{1};
        $batteryNum=$row1['battery_num'];
        
        if($Month==$str2 && $Year==$str1 && $row1['defect_type']==$str3){
          echo "<tbody><tr><td>".$batchNum."</td>"; 
          echo "<td>".$batteryNum."</td>";
          echo "<td>".$line."</td></tr></tbody></table>";
    }
  }
}
}
else {
    echo "";
}
$conn->close();

?>
                                
                             
                           
               </div>
               <br>
             <hr >
             <div  style="float:left">
               <h5>  Year :<?php 
                echo $str1; ?> Month :<?php echo $str2; ?></h5>
             </div>
             <br>
             <hr >
             <div  style="float:left">
               <h5>  Defect Type :<?php 
                echo $str3; ?></h5>
             </div>
             <br>
             <hr >
              <div  style="float:left">
                  <h5>  Date : <?php echo date("Y/m/d"); ?></h5>
             </div>
             <br>
             <hr >
              <div class="ttl-amts">
                  <h4> <strong>Signature</strong></h4>
             </div>
         </div>
     </div>
      
      <div class="row pad-top-botm">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <hr />
             
               <button onclick="run()" class="btn btn-success btn-lg">Download In Pdf</button>

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
        &copy; 2016ABM
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
