<script>
        
    $("div.content>ul#topnavi>li>a").click( function(e){

        e.preventDefault();

    });


    $("ul#topnavi>li>a").click( function(){
    var id = this.id;
    console.log(id);

    $('div.content > div.form').html("");

     if (id == "Released Batteries"){

        url = "released.php";

    

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
 table {
            border-collapse: collapse;
            }
            
            td {
             padding-top: .5em;
            padding-bottom: .5em;
            }
</style>
    <meta charset="UTF-8">
    <title>Manufactured Batteries</title>
    <link rel="stylesheet" href="css/m.css" media="screen" type="text/css" />

<!--javascript form validation -->
<script type="text/javascript">


        function validate(){
         
         if (document.Form.battery_type.value == ""){
            alert("Please fill out this field");
            document.Form.battery_type.focus() ;
                    return false;

          } if (document.Form.battery_name.value == ""){
            alert("Please fill out this field!");
            document.Form.battery_name.focus() ;
                    return false;

          } if (document.Form.battery_no.value == ""){
            alert("Please fill out this field!");
            document.Form.battery_no.focus() ;
                    return false;
          }


         if (document.Form.amount.value == ""){
            alert("Please fill out this field!");
            document.Form.amount.focus() ;
                    return false;
          }

         



}





</script>


</head>
    
    <body>
    <?php
            require "core/database/connect.php";

        if (isset($_POST["submit"])) {

            $battery_type = $_POST['battery_type'];
            $battery_name =$_POST['battery_name'];
            $battery_no=$_POST['battery_no'];
            $amount=$_POST['amount'];
            
            $sql = "INSERT INTO manufactured_batteries (battery_type,battery_name,battery_no,amount) VALUES ('$battery_type','$battery_name','$battery_no')";

        if (mysqli_query($conn, $sql)) {
            echo "";
        }

            else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            
            header("Location:inventory.php");



   }
    ?>



    
<form action="manu-battery.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
    
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
    padding-bottom: 10px;">Manufactured Batteries</h1>
        <table>
        
            <tr>
            <td>Battery type:</td>
               
           
            <td> <select name="battery_type">
            <option value="Exide">Exide</option>
            <option value="Lucas">Lucas</option>
            <option value="Dagenite">Dagenite</option>
            </td>
            
            </tr>
            <tr>
            <td>Battery Name:</td>
            <td> <select name="battery_name">
            <option value="MF">MF</option>
            <option value="MFS">MFS</option>
            
            </td>
            </tr>
            <tr>
                <td>Battery No:</td>
                <td><input type="text" name="battery number" style="width: 200px" required></td>
            </tr>

             <tr>
                <td>Amount:</td>
                <td><input type="text" name="amount" style="width: 200px" required></td>
            </tr>
              <tr>
                <td></td>
           <td><button class="submit" name="submit" value="send">Submit</button></td>
           <td> <button type="reset">RESET</button></td>
            </tr>
    
        </form>
        
        </table>

    </div>
    
    </body>
</html>

