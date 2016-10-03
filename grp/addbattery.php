
     


<script>
        
    $("div.content>ul#topnavi>li>a").click( function(e){

        e.preventDefault();

    });


    $("ul#topnavi>li>a").click( function(){
    var id = this.id;
    console.log(id);

    $('div.content > div.form').html("");

     if (id == "viewbattery"){

        url = "ab.php";

    } else if (id == "searchbattery"){

        url = "searchbattery.php";

    }


     $.ajax({


            
        type:"post",
        url:url,
        success:function(data){
            $('div.content > div.form').html("");            
            $("div.content> div.form").html(data);

        }



    });

    



});







</script>


    






<!DOCTYPE html>
<html lang="en">
<head>
<style>
.error {color: #FF0000;}
</style>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/m.css" media="screen" type="text/css" />
</head>
	
    <body>
	<?php
    require "database/connect.php";

    $error=FALSE;
        $typeerr = $warranty_perioderr = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            
            if(empty($_POST['type'])){ 
                $typeerr = "rq";
                $error = TRUE;
            }else{
                $type = $_POST['type'];
            }
			
			if(empty($_POST['warranty_period'])){ 
                $warranty_perioderr = "rq";
                $error = TRUE;
            }else{
                $warranty_period = $_POST['warranty_period'];
            }
            
          
      if ($error==FALSE){
           

            
			$sql="INSERT INTO `battery_description` (`battery_type`, `warranty_period`) VALUES ('$_POST[type]','$_POST[warranty_period]')";
			
			if(mysqli_query($connection,$sql)){
				header("Location: addbattery.php");
                //die();
            } else{echo "error";}
             
            }
        }
    ?>
	
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
	
    <div class="ad">
    <h1  style= "font-size: 20px;
    background-color: #990000;
    color: white;
    width:100%;
    padding: 10px;
    font-family: Calibri;
    line-height: 30px;
    margin:0 0 0;
    margin-bottom: 20px;
    padding-bottom: 10px;">Add Product</h1>
        <table>
        <form>
		<form action="demo_form.asp" method="post">
		
            <tr>
            <td>Product type</td>
               
            </tr>
            <tr>
            <td width="400px"><input type="text" name="type" style="width: 300px" required></td>
            
            </tr>
            <tr>
                <td>Warranty period</td>
            

            </tr>
            <tr>
                <td><input type="text" name="warranty_period" style="width: 300px" required></td>
          

            </tr>
            
            
            
            
            
            <tr>
                <td></td>
           <td> <button type="submit">SAVE</button></td>
		   <td> <button type="reset">RESET</button></td>
            </tr>
	
        </form>
        
        </table>

    </div>
    
    </body>
</html>





 