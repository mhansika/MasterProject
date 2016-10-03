<!DOCTYPE html>
<html lang="en">
<head>
<style>
.error {color: #FF0000;}
</style>
    <meta charset="UTF-8">
    <title>Add Dealer</title>
    <link rel="stylesheet" href="css/m.css" media="screen" type="text/css" />

<script>
        
    $("div.content>ul#topnavi>li>a").click( function(e){

        e.preventDefault();

    });


    $("ul#topnavi>li>a").click( function(){
    var id = this.id;
    console.log(id);

    $('div.content > div.form').html("");

     if (id == "viewdealer"){

        url = "dd.php";

    } else if (id == "searchdealer"){

        url = "searchdealer.php";

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
        $dealer_nameerr = $area_noerr =  $NICerr = $addresserr = $salesPerson_iderr = $mobileNoerr = $telephoneNoerr = $emailerr = $faxerr = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            
            if(empty($_POST['dealer_name'])){ 
                $dealer_nameerr = "";
                $error = TRUE;
            }else{
                $dealer_name = $_POST['dealer_name'];
            }
            
          
            
            if(empty($_POST['area_no'])){ 
                $area_noerr = "";
                $error = TRUE;
            }else{
                $area_no = $_POST['area_no'];
            }
            
            if(empty($_POST['NIC'])){ 
                $NICerr = "";
                $error = TRUE;
            }else{
                $NIC = $_POST['NIC'];
                
            }
            
            
			
			if(empty($_POST['address'])){
				$addresserr = "";
				$error = TRUE;
			}else{
				$address = $_POST['address'];
			}
			
			if(empty($_POST['salesPerson_id'])){ 
                $salesPerson_iderr = "";
                $error = TRUE;
            }else{
                $salesPerson_id = $_POST['salesPerson_id'];
            }
            
           
            if(empty($_POST['mobileNo'])){ 
                $mobileNoerr = "";
                $error = TRUE;
            }else{
                $mobileNo = $_POST['mobileNo'];
            }
            
            if(empty($_POST['telephoneNo'])){ 
                $telephoneNoerr = "";
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
			
			if(empty($_POST['fax'])){ 
                $faxerr = "";
                $error = TRUE;
            }else{
                $fax = $_POST['fax'];
            }
            
             if ($error==FALSE){
           

            
			$sql="INSERT INTO `dealer` (`dealer_name`, `area_no`, `NIC`, `address`, `salesPerson_id`, `mobileNo`, `telephoneNo`, `email`, `fax`) VALUES ('$_POST[dealer_name]', '$_POST[area_no]', '$_POST[NIC]', '$_POST[address]', '$_POST[salesPerson_id]', '$_POST[mobileNo]', '$_POST[telephoneNo]', '$_POST[email]', '$_POST[fax]')";
			
			if(mysqli_query($connection,$sql)){
                //die();
				header("Location: dealerAdd.php");
            } else{echo "error";}
			
			
             
            }
        }
    ?>
	
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
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
    padding-bottom: 10px;">Add Dealer</h1>
	
        <table>
        <form>
            <tr>
				<td><b>Dealer Name: <span class="error">* <?php echo $dealer_nameerr;?></span></b></td>
                <td><b>Mobile No: <span class="error">* <?php echo $mobileNoerr;?></span></b></td>
            </tr>
            <tr>
				<td width="400px"><input type="text" name="dealer_name" style="width: 300px" required ></td>
                <td><input type="text" name="mobileNo" style="width: 200px"  required ></td>
            </tr>
            <tr>
                <td><b>Dealer Address: <span class="error">* <?php echo $addresserr;?></span></b></td>
				<td><b>Telephone No: <span class="error">* <?php echo $telephoneNoerr;?></span></b></td>

            </tr>
            <tr>
                <td><input type="text" name="address" style="width: 300px" required></td>
				<td><input type="text" name="telephoneNo" style="width: 200px" required></td>

            </tr>
            <tr>

                <td><b>NIC: <span class="error">* <?php echo $NICerr;?></span></b></td>
                <td><b>Fax No: <span class="error">* <?php echo $faxerr;?></span></b></td>
            </tr>
            <tr>
                <td><input type="text" name="NIC" style="width: 200px" required></td>
                <td><input type="text" name="fax" style="width: 200px" required></td>
            </tr>
            <tr>

                <td><b>Area: <span class="error">* <?php echo $area_noerr;?></span></b></td>
                <td><b>E mail: <span class="error">* <?php echo $emailerr;?></span></b></td>
            </tr>
            <tr>
                <td><select class="dropdown"  name="area_no">
                <option value="Colombo">Col01</option>
                <option value="Dehiwala">De01</option>
                <option value="Maharahama">Mahara01</option>
                <option value="Nugegoda">Nuge01</option>
				</select></td>
                <td><input type="text" name="email" style="width: 200px" required ></td>
            </tr>
            
			<tr>
				<td><b>Relevant Salesperson ID: <span class="error">* <?php echo $salesPerson_iderr;?></span></b></td>
            </tr>
            
			<tr>
                <td><input type="text" name="salesPerson_id" style="width: 200px" required></td>
            </tr>
            
			<tr>
                <td></td>
				<td> <button type="submit">SAVE</button></td>
				<td> <button type="reset">RESET</button></td>
            </tr>

        </form>
		<div id="required">
            <p><span class="error">* Required Fields.</span><br/>
            </p>
        </div>
        
        </table>

    </div>
    
    </body>
</html>