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
                <div class="link_title" id="md">

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
                <div class="link_title">

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
                <div class="link_title">

                    <a href= "enterDefectType.php" id="cr" style="top: 10px;
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
										<a href="../index.php"  style="display:block;float:right;margin-right:45px;margin-top:20px;color: black;font-size:18px;margin-bottom:10px;padding-bottom:10px;"> <img class="logout" src="../img/lgout.png" ></a>
                    </br>
                     
                     <h1><b> View All Replacements</b></h1>
                     </br>

                    <table width="70%">
                      <tr>
    
    
                        <th>From : </th>
                      	<th>To : </th>
                        <th></th>
                        <th></th>
                        </tr>
                        <tr></tr>
                      <tr>
                          <form>
                            <div class="form-group input-group">
                                      <th><input name="date_1" type="date"  size="9" value=""/></th>
                        			  <th> <input name="date_2" type="date"  size="9" value=""/></th>
                        						
				

                        
                            </div>
					            
					                  <th><button type="submit" name="submit" value="submit">Search</button> </th>
					       </form>
                      </tr>
  
  

 

				</table>
<?php

require "../core/database/connect.php";


if (isset($_POST['submit'])) {
     
		$from_date = strtotime($_POST['date_1']);
		$to_date = strtotime('-30 day',$from_date);

		

    $First_Date = date('Y-m-d',$from_date);
    $Next_Date =  date('Y-m-d',$to_date);

$sql="SELECT battery_status,replaced_date,batch_num,battery_num,defect_type,dealer_id
FROM released_batteries
WHERE battery_status = '3' OR  battery_status = '4' OR  battery_status = '5' OR  battery_status = '6'  AND replaced_date BETWEEN '" . $Next_Date . "' AND  '" . $First_Date . "'
ORDER BY battery_status ";


   
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
	  echo "
<div  class='tbl-header'>
<table cellpadding='0' cellspacing='0' border='0'>
  <thead>
    <tr>
      <th>Battery Number</th>
      <th>Validity Status</th>
      <th>Defect Type</th>
	  <th></th>
      
    </tr>
  </thead>
</table>
</div>
<div  class='tbl-content'>
<table cellpadding='0' cellspacing='0' border='0'>
  <tbody>
    <tr> " ;
	
	
		while($row = $result->fetch_assoc()) {
			//print_r ($row);
		$batch_num = $row["batch_num"] ;
		$battery_num = $row["battery_num"] ;
		$battery_status = $row["battery_status"] ;
		$defect_type = $row["defect_type"] ;
		
		if ($battery_status ==  '5' ){		
			$battery_status = "VALID";
		}
		elseif ($battery_status == '6' ){
			$battery_status = "INVALID";
		}	
			elseif ($battery_status == '3' ){
			$battery_status = "PENDING";
		}
			elseif ($battery_status == '4' ){
			$battery_status = "PENDING";
		}
		/* foreach (array($row['battery_status']) as $key){
		if ($key ==  '5' ){		
			$battery_status = "VALID";
				
				
		}elseif ($key == '6' ){
			$battery_status = "INVALID";
		}
		} */
		
		if ($defect_type == ''){		
			$defect_type= "PENDING";
		}
		else{
			$defect_type = $row["defect_type"];
		}	
		
		 echo "
	  
			<tbody>
			<tr>
				<td>".$row["batch_num"].$row["battery_num"]."</td>
				<td>$battery_status</td>
				<td>$defect_type</td>
				<td><a href ='viewMore.php'>View More</a></td>
			
			</tr>";
		
	  
	  
	  }
	  
	  
	  }
	  
}		  
	  





	 
  /* $sql="SELECT dealer_id FROM released_batteries WHERE dealer_id IS NOT NULL GROUP BY dealer_id ";
  
   $query=(mysqli_query($connection,$sql));
   
      while($res = mysqli_fetch_assoc($query)){ 
	  
            $sql5 = "SELECT dealer_name FROM dealer WHERE dealer_id = '$res[dealer_id]'";
            $query5=(mysqli_query($connection,$sql5));
		
			
            while($res5 = mysqli_fetch_assoc($query5)){
						$dealer_name = $res5['dealer_name'];
						$sql = "SELECT * FROM released_batteries WHERE battery_status = '5' OR battery_status = '6' AND replaced_date BETWEEN '" . $Next_Date . "' AND  '" . $First_Date . "' ";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) { */
							
							
?>

      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>

      </tr>
    <tr>
       <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    
   
    
  </tbody>
</table>
</div>

</div>



                   
</form>


 

</div>
</div>

 
       

                        
                        
                            

</div>
</div>

<div>





