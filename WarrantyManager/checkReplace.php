<!DOCTYPE html>


<?php
     require "../database/connect.php"; 
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        

  

       
         </style>

         <script>

$( document ).ready(function() {
     $("select#cap").click( function(){
            //var id = this.id;
            var id = $(this).children(":selected").attr("id");
            console.log(id);

            $.ajax({

                url:'getdrop2.php?data='+id,
                type:"get",
                success:function(data){

                   $("tr#trow>th#second").html("");
                $("tr#trow>th#second").html(data);
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
					<div class="link_title" id="dt">

						<a href="enterDefect.php" id="dt" style="top: 1px;
									display:block;
									position:absolute;
									float:left;
									font-family:arial;
									color:#1C1C1C;
									text-decoration:none;
									width:100%;
									height:70px;
									margin-top: 20px;
									text-align:center;"><img class= "pic" src="img/b.png" align="middle" width="80px"><span>Enter Defects</span></a>
					</div>
				</li>
				<li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" >

						<a href= "checkReplace.php" id="cr" style="top: 10px;
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

						<a href="misDealer.php" id="mis" style="top: 10px;
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
				   <li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" >

						<a href= "viewAllReplace.php" id="cr" style="top: 10px;
									display:block;
									position:absolute;
									float:left;
									font-family:arial;
									color:#1C1C1C;
									text-decoration:none;
									width:100%;
									height:70px;
									margin-top: 10px;
									text-align:center;"><img class= "pic" src="img/f.png" align="middle" width="80px"><span>View All Replacements</span></a>
					</div>
				</li>
				 <li class="var_nav">
					<div class="link_bg"></div>
					<div class="link_title" >

						<a href= "" id="cr" style="top: 10px;
									display:block;
									position:absolute;
									float:left;
									font-family:arial;
									color:#1C1C1C;
									text-decoration:none;
									width:100%;
									height:70px;
									margin-top: 10px;
									text-align:center;"><img class= "pic" src="img/g.png" align="middle" width="80px"><span>Enter New Defect</span></a>
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
							 
							 <h1><b>Replacement Inspection</b></h1>
							 </br>
<form action= "" method="post">
							<table width="70%">
		  <tr>
			<th>Area :</th>
			<th>Dealer :</th>
			<th>Date :</th>
		  </tr>
		  <tr></tr>

		  <tr id= "trow">
						<th>
                    <?php 
                        
                        echo '<select name="area" id="cap">';
                        echo '<option>     -------ALL--------   </option>';
                        
                        $sql1 = "Select DISTINCT area_no,area from area";
                        $result1= mysqli_query($connection, $sql1);
                             while($r=mysqli_fetch_row($result1))
                             { 
                                   echo '<option id=' .$r[0].'> ' . $r[1] . '</option>';

                             }
                        
                        echo "</select>";

                    ?>
                </th>
                <th id="second">
             
              
                       <select name= "dealer_id"  >
                        
                        <option> -------ALL--------</option>

                        </select>
                        
               


                </th>
            
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
  <tr>
  <th></th>
  <th></th>
  <th>
<button type="submit" name="submit" value="submit">search</button>
</th>
 </tr>

</table>
</form>    
<?php
 require "../core/database/connect.php";
 $dealer_name ="";
if (isset($_POST['dealer_id'])){
$dealer_name = $_POST['dealer_id'];
$sql = "SELECT * FROM released_batteries WHERE battery_status = '3' AND dealer_id = '$_POST[dealer_id]'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {


echo "
<div  class='tbl-header'>
<table cellpadding='0' cellspacing='0' border='0'>
  <thead>
    <tr>
      <th>Replacement</th>
      <th></th>
	   <th>Replacement Date<th></th>
     
     
	    
      <th>Warranty Expiry - Date</th>
	 
      <th>Within Warranty Period</th>
      <th>Defect Type Ok/Not</th>
      <th>Valid replacement</th>
      
    </tr>
  </thead>
</table>
</div>
<div  class='tbl-content'>
<table cellpadding='0' cellspacing='0'border='0'> ";

}





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

if (isset($final_valid)) {
      //for ( $i = 0 ; $i <=$r ; $i++ )  {

      $check_replace = check_replacement ($conn,$valid,$final_valid, $defected) ;
           $row["replacement"] = $check_replace;
//}
}
           if (isset($check_replace)) {

      //set_status($conn, $batch_num, $battery_num, $check_replace) ; 
}
             echo "
          
  <tbody>
    <tr>
                     <tr><td>".$row["batch_num"].$row["battery_num"]."</td><td><form action='' method='post'>
<input type='date' name='replaced_date' size='20' value= " .$row['replaced_date']. "</td><td><input type='submit' name='submit' value='Update'></td><td></td><td>".$row['warranty_period']."</td><td>".$row["validity"]."</td><td>".$row["defected"]."</td><td>".$row["replacement"]."</td></tr>"; }
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
       

       


// this fetch data from released batteries and store in an array
function warranty_calculation ($conn, $batchNum , $batteryNum) {
 
      $data= array();
      $conn= mysqli_connect('localhost','root','','warranty_management');
        $query=mysqli_query($conn,"SELECT * FROM released_batteries WHERE battery_status = '3' AND batch_num= '$batchNum' AND battery_num = '$batteryNum' ");
        $data=mysqli_fetch_assoc($query);
        return $data ; 


       die();

}

// check whether the battery is within the warranty period
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

// this check the defect type
function check_defect ($conn, $data) {

$defect =  $data["defect_description"];
if (isset($defect)) {
   return "Defected";
} else {
  return "Not Defected";
}



}

// check the validity of the replacement using returned value from above two functions
function check_replacement ($conn,$data, $final_valid, $defected) {

if ($final_valid == "YES" AND $defected == "Defected") {
return "VALID";

}
else {
  return "INVALID" ; 
}




}

//change the status of the battery acoording to the validity and count the number of valid and invalid batteries
function set_status($conn, $batchNum,$batteryNum, $check_replace){

if ($check_replace == "VALID") {
  mysqli_query($conn,"UPDATE released_batteries SET battery_status = '5' WHERE battery_status = '3' AND batch_num = '$batchNum' AND battery_num = '$batteryNum' ");
} else {
 mysqli_query($conn,"UPDATE released_batteries SET battery_status = '6' WHERE battery_status = '3' AND batch_num = '$batchNum' AND battery_num = '$batteryNum' ");

}
}










?>

</table>
<div class="bottom" align="center">
</br>



                   

<form >
    <table>
            <tr>
                      
                        <?php
						
						
function count_invalids () {
$mysqli = new mysqli("localhost", "root", "", "warranty_management");

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

 $result = $mysqli->query("SELECT * FROM released_batteries where battery_status='5' ");
            /* determine number of rows result set */
        $row_cnt = $result->num_rows;
		
		  for ( $i = 1 ; $i <= $row_cnt; $i++ )  {

    $sql = "UPDATE released_batteries set battery_status = '4' WHERE battery_status = '0'" ;
if (mysqli_query($conn, $sql)) {
		echo "";
	}
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	
	
		
$res = $mysqli->query("SELECT * FROM released_batteries where battery_status='6' ");
            /* determine number of rows result set */
        $row_count = $result->num_rows;

//watever u do for misused dealers


		
}





		

		
		
       


    

    }




$mysqli = new mysqli("localhost", "root", "", "warranty_management");

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

 $result = $mysqli->query("SELECT * FROM released_batteries where battery_status='5' ");
            /* determine number of rows result set */
        $row_cnt = $result->num_rows;
		
		
$res = $mysqli->query("SELECT * FROM released_batteries where battery_status='6' ");
            /* determine number of rows result set */
        $row_count = $result->num_rows;
				

 echo " <tr><td>Valid replacements:</td><td>$row_cnt</td></tr>
        <tr><td>Invalid Replacements : </td><td>$row_count</td></tr>";


                    
        ?> 
                      
    </table>

               

 

</br>

 <button class='submit' name='submit' value='confirm' onclick()>Confirm</button>
 <button class='submit' name='submit' value='submit' onclick()>Submit</button>


</div>

</div>

</form> 
                        
                        
                            

</div>
</div>

<div>




