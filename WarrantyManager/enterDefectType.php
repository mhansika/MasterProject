<!DOCTYPE html>
 <?php include '../core/init.php';
      protect_page(); 
	
      ?>

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
					<a href="../index.php"  style="display:block;float:right;margin-right:45px;margin-top:20px;color: black;font-size:18px;margin-bottom:10px;padding-bottom:10px;"> <img class="logout" src="../img/lgout.png" ></a> 
                    </br>
                    
                     <h1><b>Enter New Defect Type</b></h1>
                     </br>

                    <table width="70%">
  <tr>
    
    
  </tr>
      </br>    </br>    </br>    </br>    </br>    </br>    </br>    </br>    </br>    </br>
  <tr>
	<form action = "POST">
	<style>
	label {
float: left;
width: 100px;
margin-right: 1em;
margin-left :20em;
 display: inline-block;
   text-align: right;
}
left-aligned-labels.css (excerpt)
fieldset li {
float: left;
clear: left;
width: 100%;
padding-bottom: 1em;
}

</style>
	  <label for="defect"> Add to the list :</label> <br>
		 <input style="font-family: 'Segoe UI Light', 'Segoe UI', 'Open sans', Arial, Sans;
            font-size: 14px;
            border: 0;
            background:  #fff ;
            margin: 0 0 20px;
            padding: 8px 10px;
            display: block;
            width: 25% ;
            color:black;
            text-align: center;
            margin-left: 60px;" type="text"  name="defect" required>
  
  </tr>
  <tr>
  
      <td><button type="submit" name="submit" value="submit">Submit</button>  </td>
  </tr>
 
</table>


<?php
require "../core/database/connect.php";

if(isset($_POST['submit']))
{   

    $defect_type=mysqli_real_escape_string($conn,$_POST['defect']);

 

    mysqli_query($conn,"INSERT INTO defect_types (defect) VALUES ('$defect_type')");
	
	}


?>




