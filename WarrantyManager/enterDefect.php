<!DOCTYPE html>


 <?php include '../core/init.php';
      protect_page(); 
	
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
		<link rel="stylesheet" href="http://apps.bdimg.com/libs/fontawesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/editable-select.css">
       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/jquery-editable-select.js"></script>

        <style>

          .ui-select-wrap > .selected span {
          display: table-cell;
          vertical-align: middle;
          padding: 0 13px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          font-size: 14px;
          color: black;
			}
      	
		.ui-select-wrap ul li.over {
         background-color: #E5E5E5;
         color: #333;
		}
       
		</style>


<script>
	
	$(function(){
 
		$('select').editableSelect();
 
});

function submitIfFormComplete()
{
  // Check the select has something selected
  if (document.getElementById('selectOne').selectedIndex > 0)
  {
      document.getElementById('formID').submit();
  }
}

	



		
	//multiple dropdown selection	
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

                    <a href="#" id="dt" style="top: 1px;
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
                    
                     <h1><b> Defect Types Of Batteries</b></h1>
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

$sql="SELECT battery_status,replaced_date,batch_num,battery_num,defect_type FROM released_batteries WHERE battery_status = '3' AND replaced_date BETWEEN '" . $Next_Date . "' AND  '" . $First_Date . "' ";

/* $defect="";
$batch_num=""; */
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
echo "
<div  class='tbl-header'>
<table cellpadding='0' cellspacing='0' border='0'>
  <thead>
    <tr>
      <th>Replaced Batch Number</th>
	     <th>Battery Number</th>
      <th>Defect Type</th>

	     
      
    </tr>
  </thead>
</table>
</div>
<div  class='tbl-content'>
<table cellpadding='0' cellspacing='0' border='0'>
  <tbody>
    <tr></tr>";
	
while($row1 = $result->fetch_assoc() ){
	echo"
		<tr>
		<td>".$row1["batch_num"]."</td>  
		<td>".$row1["battery_num"]."</td> ";




/* if(isset($_POST['Enter']))
{   

    $defect_type=mysqli_real_escape_string($conn,$_POST['defect_type']);

 

    mysqli_query($conn,"UPDATE released_batteries SET defect_type='$defect_type' WHERE batch_num='$batch_num' AND battery_num='$battery_num' ");
	
	} */


  
	

	
//getting data to a drop down
    

    echo"
	<td>
	
	<form id='ajax-form' class='autosubmit' method='POST' action='ajax-update1.php'>
	<select name='defect_type' id= 'selectOne' onchange='submitIfFormComplete()'>
     <option value = ".$row1["defect_type"]."></option>
	<option value = ''>--SELECT--</option>
	";
    
    $query= "SELECT defect FROM defect_types ";
    $db = mysqli_query($conn, $query);
    while ( $d=mysqli_fetch_assoc($db)) {
		
	
	/* $query= "SELECT defect_type FROM released_batteries WHERE batch_num = ".$row1["batch_num"]." AND battery_num = ".$row1["battery_num"]." ";
    $sql = mysqli_query($conn, $query);
    while ( $options=mysqli_fetch_assoc($sql)) {
	foreach ($options as $option):
       echo " <option value="$option" , $option === $selectOne , ' selected="selected"' : '' ><$option</option>";
    endforeach
	 */
	
  echo "
  
  <option value='{".$d['defect']."}'>".$d['defect']."</option>";
}
    
    ?>
	
    </select>

    <?php
 



/* if(isset($_POST['defect_type'])){
    $defect=mysqli_real_escape_string($conn,$_POST['defect_type']);
	}




    "</td>";

         */


    





 


}
  echo "</table>";
} else {
    echo "0 results";
}echo"</form>";



}




mysqli_close($conn);

?>








      <th></th>
      <th></th>
      
    </tr>
    <tr>
      <th></th>
      <th></th>
      
    </tr>
    <tr>
      <th></th>
      <th></th>    </tr>
    <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
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





