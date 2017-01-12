<?php
include_once "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
<link href="rpt/css/graph.css" rel="stylesheet" />
</head>
<body>
    <form action="waranty_graph.php " method="post">
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
 <?php
$sum1=$sum2=$sum3=0;
$Year=$Month="";
  if (isset($_POST["submit"]))
{   
  $str1 = $_POST['year'];

  $str2 = $_POST['month'];
  
//get all details of anufacture battery table
$sql="SELECT * FROM released_batteries";
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
while($row1 = $result->fetch_assoc() ){
 $date=$row1['replaced_date'];
          $time=strtotime($date);
          $Month=date("F",$time);
          $Year=date("Y",$time);
          $batchNum=$row1['batch_num'];
          $type=$batchNum[0];
  if($Year==$str1 && $Month==$str2 && $row1['battery_status']==3){
      if($type=='E'){
        $sum1=$sum1+1;
        }
      elseif($type=='L'){
        $sum2=$sum2+1;
        }
      else{
        $sum3=$sum3+1;
      }

   }

 }
 ?>
<dl>
  <dt>
    Replacement Quantity of Batteries
  </dt>
  <?php
  $sum=$sum1+$sum2+$sum3;
  $psum1=(@($sum1/$sum))*100;
  //make integer
  $psum11 = round($psum1);
  //meke string
  $psum11 = (string)$psum11;
  $psum2=(@($sum2/$sum))*100;
  $psum12 = round($psum2);
  $psum12 = (string)$psum12;
  $psum3=(@($sum3/$sum))*100;
  $psum13 = round($psum3);
  $psum13 = (string)$psum13;
 ?>
  <dd class="<?php echo 'percentage percentage-'.$psum11; echo'"'; ?>" ><span class="text">Exide <?php echo $sum1 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum12; echo'"'; ?>" ><span class="text">Lucas <?php echo $sum2 ?></span></dd>
  <dd class="<?php echo 'percentage percentage-'.$psum13; echo'"'; ?>" ><span class="text">Gagenite <?php echo $sum3 ?></span></dd>
  
</dl>
<?php
} else {
    echo "0 results";
}
$conn->close();
}

?>                    
</body>
</html>