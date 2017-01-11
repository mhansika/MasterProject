<?php

include_once "connection.php";
?>
<html>
<head>
    <title></title>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<head>
<body>
  <form action="areaSold_graph.php" method="post">
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
   <link href="rpt/css/graph.css" rel="stylesheet" />
</head>
<body>
    
           
<?php
$str1=$str2="";
 if (isset($_POST["submit"]))

{
  $sum1=$sum2=$sum3=0;
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
       
    }?>
<dl>
  <dt>
    Sold Quantity of Areas
  </dt>
  <?php
  $sum=$sum1+$sum2;
  $psum1=(@($sum1/$sum))*100;
  //make integer
  $psum11 = round($psum1);
  //meke string
  $psum11 = (string)$psum11;
  $psum2=(@($sum2/$sum))*100;
  $psum12 = round($psum2);
  $psum12 = (string)$psum12;
  
 ?>
  <dd class="<?php echo 'percentage percentage-'.$psum11; echo'"'; ?>" ><span class="text">Colombo <?php echo $sum1 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum12; echo'"'; ?>" ><span class="text">Gampaha <?php echo $sum2 ?></span></dd>
  
  
</dl>
<?php
} else {
    echo "0 results";
}
$conn->close();


?>


</body>
</html>


