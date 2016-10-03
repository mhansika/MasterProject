<!DOCTYPE html>
<html lang="en">
<head>
<style>
.error {color: #FF0000;}
</style>
    <meta charset="UTF-8">
    <title>Add Salesperson</title>
    <link rel="stylesheet" href="css/m.css" media="screen" type="text/css" />

<script>
        
    $("div.content>ul#topnavi>li>a").click( function(e){

        e.preventDefault();

    });


    $("ul#topnavi>li>a").click( function(){
    var id = this.id;
    console.log(id);

    $('div.content > div.form').html("");

     if (id == "viewsalep"){

        url = "sp.php";

    } else if (id == "searchsalep"){

        url = "searchsalep.php";

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












</head>
	
    <body>
	<?php
    require "database/connect.php";

    $error=FALSE;
        $F_nameerr = $L_nameerr =  $NICerr = $addresserr = $area_noerr = $mobileNoerr = $telephoneNoerr = $emailerr = $DOBerr = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            
            if(empty($_POST['F_name'])){ 
                $F_nameerr = "rq";
                $error = TRUE;
            }else{
                $F_name = $_POST['F_name'];
            }
			
			if(empty($_POST['L_name'])){ 
                $L_nameerr = "</br>required";
                $error = TRUE;
            }else{
                $L_name = $_POST['L_name'];
            }
            
          
            
            if(empty($_POST['area_no'])){ 
                $area_noerr = "rq";
                $error = TRUE;
            }else{
                $area_no = $_POST['area_no'];
            }
            
            if(empty($_POST['NIC'])){ 
                $NICerr = "qr";
                $error = TRUE;
            }else{
                $NIC = $_POST['NIC'];
                
            }
            
            
			
			if(empty($_POST['address'])){
				$addresserr = "rq";
				$error = TRUE;
			}else{
				$address = $_POST['address'];
			}
			
			
            
           
            if(empty($_POST['mobileNo'])){ 
                $mobileNoerr = "rq";
                $error = TRUE;
            }else{
                $mobileNo = $_POST['mobileNo'];
            }
            
            if(empty($_POST['telephoneNo'])){ 
                $telephoneNoerr = "rq";
                $error = TRUE;
            }else{
                $telephoneNo = $_POST['telephoneNo'];
                
            }
        
            if(empty($_POST['email'])){ 
                $emailerr = "";
                $error = TRUE;
            }else{
                $email = $_POST['email'];
                if (strpos($email, '@') == FALSE) {
                    $emailerr =  "Invalid email address";
                    $error = TRUE;
                }
            }
			
			if(empty($_POST['DOB'])){ 
                $DOBerr = "rq";
                $error = TRUE;
            }else{
                $DOB = $_POST['DOB'];
            }
            
             if ($error==FALSE){
           

            
			$sql="INSERT INTO `sales_person` (`F_name`, `area_no`, `NIC`, `address`, `L_name`, `mobileNo`, `telephoneNo`, `email`, `DOB`) VALUES ('$_POST[F_name]','$_POST[area_no]','$_POST[NIC]','$_POST[address]','$_POST[L_name]','$_POST[mobileNo]','$_POST[telephoneNo]','$_POST[email]','$_POST[DOB]')";
			//$sql="INSERT INTO `sales_person` (`F_name`, `area_no`, `NIC`, `address`, `L_name`, `mobileNo`, `telephoneNo`, `email`, `DOB`) VALUES ('hapila','col1','38849204','Matale','Bogahapitiya','62780945','62233368','kapila@gmail.com','1985-02-19')";
			if(mysqli_query($connection,$sql)){
				header("Location: addsales.php");
                //die();
            } else{echo "error";}
             
            }
        }
    ?>
	
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <div class="ad">
    <h1 style= "font-size: 20px;
    background-color: #990000;
    color: white;
    width:100%;
    padding: 10px;
    font-family: Calibri;
    line-height: 30px;
    margin:0 0 0;
    margin-bottom: 20px;
    padding-bottom: 10px;">Add Salesperson</h1>
        <table>
        <form>
            <tr>
				<td><b>First Name: <span class="error">* <?php echo $F_nameerr;?></span></b></td>
				<td><b>Area: <span class="error">* <?php echo $area_noerr;?></span></b></td>
            </tr>
            
			<tr>
				<td width="400px"><input type="text" name="F_name" style="width: 200px" required></td>
				<td><select class="dropdown"  name="area_no">
                <option value="Colombo">Col01</option>
                <option value="Dehiwala">De01</option>
                <option value="Maharahama">Mahara01</option>
                <option value="Nugegoda">Nuge01</option>
				</select></td>
            </tr>
            
			<tr>
                <td><b>Last Name: <span class="error">* <?php echo $L_nameerr;?></span></b></td>
				<td><b>Mobile No: <span class="error">* <?php echo $mobileNoerr;?></b></span></td>

            </tr>
            <tr>
                <td><input type="text" name="L_name" style="width: 200px" required></td>
				<td><input type="text" name="mobileNo" style="width: 200px" required></td>

            </tr>
            <tr>

                <td><b>Address: <span class="error">* <?php echo $addresserr;?></span></b></td>
                <td><b>Telephone No: <span class="error">* <?php echo $telephoneNoerr;?></span></b></td>
                
            </tr>
            <tr>
                <td><input type="text" name="address" style="width: 300px" required></td>
				<td><input type="text" name="telephoneNo" style="width: 200px" required></td>
                
                
            </tr>
            <tr>

                <td><b>NIC: <span class="error">* <?php echo $NICerr;?></span></b></td>
				<td><b>Email: <span class="error">* <?php echo $emailerr;?></span></b></td>
                
            </tr>
            <tr>
                <td><input type="text" name="NIC" style="width: 200px" required></td>
				<td><input type="text" name="email" style="width: 200px" required></td>
                
            </tr>
            <tr>

                <td><b>Date of Birth: <span class="error">* <?php echo $DOBerr;?></span><b></td>
                
            </tr>
            <tr>
				<td><input type="date" name="DOB" style="width: 200px" required></td>
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