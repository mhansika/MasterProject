<?php
  require "../database/connect.php";
  $sql="SELECT dealer_id,coalesce(count(case when battery_status =1  then 1 end), 0) as count FROM released_batteries WHERE dealer_id IS NOT NULL GROUP BY dealer_id ";
?>
<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="css/style1.css" media="screen" type="text/css" />

       
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
                     
                     <h1><b> Misused Dealers</b></h1>
                     </br>

                    <table width="70%">
  <tr>
    <th>Area</th>
    <th></th>
    <th></th>
    
    
    
  
  </tr>
  <tr></tr>
  <tr>
    <th><select id="area" style="font-color:black;">
                                        <option value="">----Select----</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        </select></th>
     </tr>
  

 

</table>
<div  class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th>Dealer Name</th>
      <th>No of Invalid Replacements</th>
      <th>Status</th>
      
      
    </tr>
  </thead>
</table>
</div>
<div  class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
  <tbody>
    <?php 
      $query=(mysqli_query($connection,$sql));
      while($res = mysqli_fetch_assoc($query)){ 
            $sql5 = "SELECT dealer_name FROM dealer WHERE dealer_id = '$res[dealer_id]'";
            $query5=(mysqli_query($connection,$sql5));
            while($res5 = mysqli_fetch_assoc($query5)){ 
        echo "<tr>";
      echo "<th>".$res5['dealer_name']."</th>";
            }
      echo "<th>".$res['count']."</th>";

      if ($res['count']<10 ){
                echo "<th>"."good"."</th>";
            }else{
                echo "<th>"."bad"."</th>";
            }           
        echo "</tr>";

      }
  ?>
    
   
    
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





