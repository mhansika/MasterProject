<?php
include_once "connection.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="rpt/css/graph.css" rel="stylesheet" />
 <style> 
select {
    width: 15%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
input[type=submit] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>
<a href="reportnxt.php">image</a> 
<div class="graphContainer2">

<form action="manufacture_graph.php " method="post">
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
</div>

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

 }?>
<dl>
  <dt>
    Manufacture Quantity of Batteries
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
  <dd class="<?php echo 'percentage percentage-'.$psum13; echo'"'; ?>" ><span class="text">Dagenite <?php echo $sum3 ?></span></dd>
  
</dl>
<?php
} else {
    echo "0 results";
}
$conn->close();


?>


</body>
</html>