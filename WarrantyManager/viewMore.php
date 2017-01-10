<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        body { font-family:Arial, Helvetica, Sans-Serif; font-size:0.8em;}
				.container {
			 max-width: 600px;
			padding: 20px 12px 10px 20px;
			background-color : gray;
	
		}
        #report { border-collapse:collapse;}
        #report h4 { margin:0px; padding:0px;}
        #report img { float:right;}
        #report ul { margin:10px 0 10px 40px; padding:0px;}
        #report th { background:#7CB8E2 url(img/header_bkg.png) repeat-x scroll center left; color:#fff; padding:7px 15px; text-align:left;}
        #report td { background:#C7DDEE none repeat-x scroll center left; color:#000; padding:7px 15px; }
        #report tr.odd td { background:#fff url(img/row_bkg.png) repeat-x scroll center left; cursor:pointer; }
        #report div.arrow { background:transparent url(img/arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
        #report div.up { background-position:0px 0px;}
       
         </style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">  
        $(document).ready(function(){
            $("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();
            
            $("#report tr.odd").click(function(){
                $(this).next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            //$("#report").jExpand();
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
					 
					 
<?php

require "../core/database/connect.php";

$sql="SELECT battery_status,replaced_date,batch_num,battery_num,defect_type,dealer_id
FROM released_batteries
WHERE battery_status = '3' OR  battery_status = '4' OR  battery_status = '5' OR  battery_status = '6' 
ORDER BY dealer_id ";


 $result = $conn->query($sql);
if ($result->num_rows > 0) {
	?>
	<table id="report">
        <tr>
			<th>Battery Number</th>
			<th>Validity Status</th>
			<th>Defect Type</th>
			<th></th>
        </tr>
	
	<?php
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
		
		$sql5 = "SELECT dealer_name FROM dealer WHERE dealer_id = '$row[dealer_id]'";
            $query5=(mysqli_query($conn,$sql5));
            while($res5 = mysqli_fetch_assoc($query5)){ 
		
		
	  ?>

        <tr>
            <td><?php echo $row["batch_num"].$row["battery_num"]?></td>
            <td><?php echo $battery_status ?></td>
            <td><?php echo $defect_type?></td>
            <td><div class="arrow"></div></td>
        </tr>
        <tr>
            <td colspan="3">
                <img src="125px-Flag_of_the_United_States.svg.png" alt="Flag of USA" />
                <h4>Additional information</h4>
                <ul>
                    <li>Dealer Name : <?php echo $res5['dealer_name'] ?></li>
                    <li></li>
                    <li></li>
                 </ul>   
            </td>
        </tr>
	 

<?php
			}
	}
}
?>





<script
$(#report").jExpand(); 
</script>











