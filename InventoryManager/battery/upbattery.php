<script>
        
    $("div.content>ul#topnavi>li>a").click( function(e){

        e.preventDefault();

    });


    $("ul#topnavi>li>a").click( function(){
    var id = this.id;
    console.log(id);

    $('div.content > div.form').html("");

     if (id == "viewbattery"){

        url = "pd.php";

    } else if (id == "addbattery"){

        url = "addbattery.php";

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
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="css/m.css" media="screen" type="text/css" />
</head>
    <body>
	<?php
		require "database/connect.php";
		session_start();
		$v = $_SESSION['type'];
	
		
		$sql = "SELECT * FROM battery_description WHERE battery_type = '$v'";
					
					$result= mysqli_query($connection, $sql);
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
					
						$h0=$row["battery_type"];
						$h1=$row["warranty_period"];
						
						}
					}else{
						echo "Zero results";
					}
					
					 $error=FALSE;
        $typeerr = $warranty_perioderr  = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            
            if(empty($_POST['type'])){ 
                $typeerr = "";
                $error = TRUE;
            }else{
                $type = $_POST['type'];
            }
            
          
            
            if(empty($_POST['warranty_period'])){ 
                $warranty_perioderr = "";
                $error = TRUE;
            }else{
                $warranty_period = $_POST['warranty_period'];
            }
            
           if ($error==FALSE){
           
			$sql = "UPDATE `battery_description` SET `battery_type`='$_POST[type]',`warranty_period`='$_POST[warranty_period]' WHERE `battery_type`='$v'";
			if(mysqli_query($connection,$sql)){
                //die();
				header("Location: searchbattery.php");
            } else{echo "error";}
			
			
             
            }
        }

	?>
	</head>
    <body>
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
    padding-bottom: 10px;">Update Product</h1>
        <table>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <tr>
                <td><b>Product type: <?php echo $_SESSION['type'] ?></b></td>
            </tr>
            
<tr>
				<td><b>Warranty period:</b></td>
                <td width="400px"><input type="text" name="warranty_period" style="width: 300px" value="<?php echo $h1; ?>"></td>
            </tr>
			            <tr>
                <td></td>
           <td> <button type="submit">SAVE</button></td>
            </tr>

        </form>
        
        </table>

    </div>
    
    </body>
</html>
