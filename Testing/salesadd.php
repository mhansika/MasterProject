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
        function validate(){
     //Dealer name
        var a= document.myForm.F_name.value;  
       
          
       //  var a = document.form.name.value;
        if(a=="")
        {
        alert("Please Enter Your Name");
        document.form.name.focus();
        return false;
        }
        if(!isNaN(a))
        {
        alert("Please Enter Only Characters for the Dealer Name");
        document.form.name.select();
        return false;
        }

         //Mobile no
          if( document.myForm.mobileNo.value == "" ||
         isNaN( document.myForm.mobileNo.value ) ||
         document.myForm.mobileNo.value.length != 10 )
         {
            alert( "Please provide a Mobile No No as the format 0#########." );
            document.myForm.telephoneNo.focus() ;
            return false;
         }

         //TP nomber
        if( document.myForm.telephoneNo.value == "" ||
         isNaN( document.myForm.telephoneNo.value ) ||
         document.myForm.telephoneNo.value.length != 10 )
         {
            alert( "Please provide a Telephone No as the format 0#########." );
            document.myForm.telephoneNo.focus() ;
            return false;
         }
         //Nic No
        
         var idToTest = document.myForm.NIC.value,
            myRegExp = new RegExp(/^[0-9]{9}[vVxX]$/);

            if(myRegExp.test(idToTest)) {
                
            }
            else {
               alert( "Please provide a NIC No as #########V" );
            }
         //Fax NO
         if( document.myForm.fax.value == "" ||
         isNaN( document.myForm.fax.value ) ||
         document.myForm.fax.value.length != 10 )
         {
            alert( "Please provide a Fax No as the format 0#########." );
            document.myForm.fax.focus() ;
            return false;
         }

        //Email Validation
         var emailID = document.myForm.email.value;
             atpos = emailID.indexOf("@");
             dotpos = emailID.lastIndexOf(".");
             
             if (atpos < 1 || ( dotpos - atpos < 2 )) 
             {
                alert("Please enter correct email ID")
                document.myForm.email.focus() ;
                return false;
             }
            


    
          return( true );
}


    </script>

</head>
	
    <body>
	<?php
    require "database/connect.php";

    $error=FALSE;
        $F_nameerr = $L_nameerr =  $NICerr = $addresserr = $area_noerr = $mobileNoerr = $telephoneNoerr = $emailerr = $DOBerr = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            
            if(empty($_POST['F_name'])){ 
                $F_nameerr = "";
                $error = TRUE;
            }else{
                $F_name = $_POST['F_name'];
            }
			
			if(empty($_POST['L_name'])){ 
                $L_nameerr = "";
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
				header("Location: salesAdd.php");
                //die();
            } else{echo "error";}
             
            }
        }
    ?>
	
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name= "myForm" onsubmit="return(validate());">

    <div class="ad">
    <h1>Add Salesperson</h1>
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