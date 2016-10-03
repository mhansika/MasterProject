<html>
	<head>
		<style>
			.error {color: #FF0000;}
		</style>
		<link type="text/css" rel="stylesheet" href="css/m.css"/>

		<title>search battery</title>
	</head>
	<body>

	<?php
		require "database/connect.php";
		session_start();
		$error=FALSE;
		
		$typeerr = "";
		$v0=$v1=$zero="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['type'])){ 
                $typeerr = "";
                $error = TRUE;
			}else{
				$type = $_POST['type'];
				}
			if ($error==FALSE){
				$sql = "SELECT * FROM battery_description WHERE battery_type = '$_POST[type]'";
					
				$result= mysqli_query($connection, $sql);
					
					if(mysqli_num_rows($result) > 0){
						
						while($row = mysqli_fetch_assoc($result)){
						
							$v0=$row["battery_type"];
							$_SESSION['type']=$v0;
							$v1=$row["warranty_period"];
							
						}
					}else{
						 echo '<script>';
						 echo 'alert("Zero Result")';
						 echo '</script>';
						}
					
			}
		}
			
			
			
	?>

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
    padding-bottom: 10px;">Search Product</h1>
        <table class="tbl">
			<form action="" method="POST">
					
				<tr>
					<td><b>Product type<span class="error">* <?php echo $typeerr;?></span></b></td>
				</tr>
					
				<tr>
					<td colspan="2"><input type=text name=type size="30" maxlength="25" style="width: 300px" required><input type="submit" class="button" value="Search" ></td>
				</tr>
					
				<tr>
					<td><b>Product type : </b></td>
					<td><span> <?php echo $v0;?><br/></span></td>
				</tr>
				<tr>
					<td><b>Warranty period : </b></td>
					<td><span> <?php echo $v1;?><br/></span></td>
				</tr>
					
           
        </form>
        
        </table>
<a class="link" id="delbattery" href="delbattery.php?" onclick="return confirm('Are you sure you wish to delete this Record?');">DELETE</a>
		<a class="link" id="upbattery" href="#">UPDATE</a>
    </div>
    
    </body>
</html>




<script>
        
    $("div.content>ul#topnavi>li>a>a.link>a").click( function(e){

        e.preventDefault();

    });


    $("a.link>a").click( function(){
    var id = this.id;
    console.log(id);

    $('div.content > div.form').html("");

     if (id == "upbattery"){

        url = "upbattery.php";

    } else if (id == "delbattery"){

        url = "delbattery.php";

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


 