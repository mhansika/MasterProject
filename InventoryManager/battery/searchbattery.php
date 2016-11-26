<html>
	<head>
		<style>
			.error {color: #FF0000;}
            table {
            border-collapse: collapse;
            }
            
            td {
             padding-top: .3em;
            padding-bottom: .3em;
            }
		</style>



		<link type="text/css" rel="stylesheet" href="css/m.css"/>
		<title>search battery</title>
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
    padding-bottom: 10px;">Search Product</h1>
        <table class="tbl">
            <form action="searchbattery.php" method="POST">
                    
                <tr>
                    <td><b>Product Name:</b></td>
                </tr>
                    <td></td>  
                <tr>
                    <td colspan="2"><input name="name" size="30" maxlength="25" style="width: 300px" required><input type="submit" class="button" value="Search" name="submit" ></td>
                </tr>



    </form>



  <tr><td><b>Battery Type:</td><td></td></tr>
    <tr><td><b>Warranty Period:</td></tr>

	<?php
		require "core/database/connect.php";

        if(isset($_POST['submit'])){

             $name = $_POST['battery_name'];

		
       
            $sql = "SELECT * FROM battery_description WHERE battery_name='$name' LIMIT 1" ;
     
            $result= mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
						   echo "<tr><td>".$row['battery_type']."</td><td></td><td>".$row['warranty_period']."</td></tr>";
  }
                            
                

// in the first time inputs are empty
			}
	
		}



               
    mysqli_close($conn);
    




     	
			
	?>

             
        
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


 