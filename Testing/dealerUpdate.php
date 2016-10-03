<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Dealer</title>
    <link rel="stylesheet" href="css/m.css" media="screen" type="text/css" />
    <script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>


<script>

function validate(){
     //Dealer name
        var a= document.myForm.dealer_name.value;  
       
          
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

$( document ).ready(function() {
     $("select#cap").click( function(){
            //var id = this.id;
            var id = $(this).children(":selected").attr("id");
            console.log(id);

            $.ajax({

                url:'getdrop.php?data='+id,
                type:"get",
                success:function(data){

                   $("tr#trow>td#second").html("");
                $("tr#trow>td#second").html(data);
                }


            });
    });
    
});



</script>


    

</head>
    <body>
    <?php
        require "database/connect.php";
        session_start();
        $v = $_SESSION['dealer_name'];
        //echo $v;

        
        $sql = "SELECT * FROM dealer WHERE dealer_name = '$v'";
                    
                    $result= mysqli_query($connection, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                        /*  echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
                        $h0=$row["dealer_id"];
                        $h1=$row["dealer_name"];
                        $h2=$row["NIC"];
                        $h3=$row["area_no"];
                        $h4=$row["address"];
                        $h5=$row["salesPerson_id"];
                        $h6=$row["mobileNo"];
                        $h7=$row["telephoneNo"];
                        $h8=$row["email"];
                        $h9=$row["fax"];
                        }
                    }else{
                        echo "Zero results";
                    }

        $sql1 = "SELECT * FROM area WHERE area_no = $h3";
                    
                $result1= mysqli_query($connection, $sql1);
                    
                    if(mysqli_num_rows($result1) > 0){
                        
                        while($row = mysqli_fetch_assoc($result1)){
                        /*  echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
                            $h10=$row["area"];
                            
                        }
                    }else{
                         echo '<script>';
                         echo 'alert("area_result")';
                         echo '</script>';
                        }

                $sql2 = "SELECT * FROM sales_person WHERE salesPerson_id = $h5";
                    
                $result2= mysqli_query($connection, $sql2);
                    
                    if(mysqli_num_rows($result2) > 0){
                        
                        while($row = mysqli_fetch_assoc($result2)){
                        /*  echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
                            $h11=$row["F_name"];
                            $h12=$row["L_name"];
                            
                        }
                    }else{
                         echo '<script>';
                         echo 'alert("Sales Person result")';
                         echo '</script>';
                        }
                    
                     $error=FALSE;
        $dealer_nameerr = $area_noerr =  $NICerr = $addresserr = $salesPerson_iderr = $mobileNoerr = $telephoneNoerr = $emailerr = $faxerr = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            
            if(empty($_POST['dealer_name'])){ 
                $dealer_nameerr = "";
                $error = TRUE;
            }else{
                $dealer_name = $_POST['dealer_name'];
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
           
            //$sql="UPDATE 'dealer' SET dealer_name='$_POST[dealer_name]', NIC='$_POST[NIC]', address='$_POST[address]', salesPerson_id='$_POST[salesPerson_id]', mobileNo='$_POST[mobileNo]', telephoneNo='$_POST[telephoneNo]', email='$_POST[email]', fax='$_POST[fax]' WHERE dealer_id='$v'";
            $sql = "UPDATE `dealer` SET `dealer_name`='$_POST[dealer_name]',`area_no`=$h3,`salesPerson_id`=$h5,`NIC`='$_POST[NIC]',`address`='$_POST[address]',`mobileNo`='$_POST[mobileNo]',`telephoneNo`='$_POST[telephoneNo]',`email`='$_POST[email]',`fax`='$_POST[fax]' WHERE `dealer_name`='$v'";
            if(mysqli_query($connection,$sql)){
                //die();
                header("Location: view.php");
            } else{echo "error";}
            }
        }

    ?>
    <div class="ad">
    <h1>Update Dealer</h1>
        <table>
       <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" id="hello" name= "myForm" onsubmit="return(validate());">

            <tr>
                <td><b>Dealer ID: <?php echo $h0; ?></b></td>
            </tr>
            
            <tr>
                <td><b>Dealer Name:</b></td>
                <td><b>Mobile No:</b></td>
            </tr>
            
            <tr>
                <td width="400px"><input type="text" name="dealer_name" style="width: 300px" value="<?php echo $h1; ?>"></td>
                <td><input type="text" name="mobileNo" style="width: 200px" value="<?php echo $h6; ?>"></td>
            </tr>
            
            <tr>
                <td><b>Dealer Address:</b></td>
                <td><b>Telephone No:</b></td>
            </tr>
            
            <tr>
                <td><input type="text" name="address" style="width: 300px" value="<?php echo $h4; ?>"></td>
                <td><input type="text" name="telephoneNo" style="width: 200px" value="<?php echo $h7; ?>"></td>
            </tr>
            
            <tr>
                <td><b>NIC:</b></td>
                <td><b>Fax No:</b></td>
            </tr>
            
            <tr>
                <td><input type="text" name="NIC" style="width: 200px" value="<?php echo $h2; ?>"></td>
                <td><input type="text" name="fax" style="width: 200px" value="<?php echo $h9; ?>"></td>
            </tr>
            
            <tr>
                <td><b>Area:</b></td>
                <td><b>E mail:</b></td>
            </tr>
            
            <tr>
                <td>
                <?php echo $h10; ?>
                </td>
                <td><input type="text" name="email" style="width: 200px" value="<?php echo $h8; ?>"></td>
            </tr>
            
            <tr>

                <td><b>Relevant Salesperson Name:</b></td>
            </tr>
            
            <tr>
                <td ><?php echo $h11 ." ". $h12; ?></td>
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