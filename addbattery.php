<script><!-- test-->
        
    $("div.content>ul#topnavi>li>a").click( function(e){

        e.preventDefault();

    });


    $("ul#topnavi>li>a").click( function(){
    var id = this.id;
    console.log(id);

    $('div.content > div.form').html("");

     if (id == "viewbattery"){

        url = "pd.php";

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
 table {
            border-collapse: collapse;
            }
            
            td {
             padding-top: .5em;
            padding-bottom: .5em;
            }
</style>
    <meta charset="UTF-8">
    <title>Add Product</title>
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

          } if (document.Form.warranty_period.value == ""){
            alert("Please fill out this field!");
            document.Form.warranty_period.focus() ;
                    return false;
          }


         if (document.Form.amperehour_Value.value == ""){
            alert("Please fill out this field!");
            document.Form.amperehour_Value.focus() ;
                    return false;
          }

          if (document.Form.voltage_Value.value == "") {
            alert("Please fill out this field!")
            document.Form.voltage_Value.focus();
                      return false;
          }

           if (document.Form.item_Type.value == "") {
            alert("Please fill out this field!")
            document.Form.item_Type.focus();
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
            $warranty_period=$_POST['warranty_period'];
            $amperehour_Value=$_POST['amperehour_Value'];
            $VoltageValue=$_POST['voltage_Value'];
            $item_Type=$_POST['item_Type'];



            //Process the image that is uploaded by the user

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }

            $image=basename( $_FILES["imageUpload"]["name"],".png"); // used to store the filename in a variable

  
            $sql = "INSERT INTO battery_description (battery_type,battery_name,warranty_period,amperehour_Value,voltage_Value,item_Type,imageUpload) VALUES ('$battery_type','$battery_name','$warranty_period','$amperehour_Value','$VoltageValue',' $item_Type','$image')";

        if (mysqli_query($conn, $sql)) {
            echo "";
        }

            else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            
            header("Location:inventory.php");



   }
    ?>



    
<form action="addbattery.php" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">
    
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
        
            <tr>
            <td>Product type:</td>
               
           
            <td> <select name="battery_type">
            <option value="Exide">Exide</option>
            <option value="Lucas">Lucas</option>
            <option value="Dagenite">Dagenite</option>
            </td>
            
            </tr>
            <tr>
            <td>Product Name:</td>
            <td><input type="text" name="battery_name" style="width: 200px" required></td>
            </tr>
            <tr>
                <td>Warranty period:</td>
                <td><select name="warranty_period">
                    <option value="1year">1 year</option>
                    <option value="2year">2 year</option>
                </td>
            </tr>
            <tr>
                <td>Ampere-hour Value:</td>
                <td><input type="text" name="amperehour_Value" style="width: 200px" required></td>
            </tr>

             <tr>
                <td>Voltage Value:</td>
                <td><input type="text" name="voltage_Value" style="width: 200px" required></td>
            </tr>
             <tr>
                <td>Item Type:</td>
                <td><input type="text" name="item_Type" style="width: 200px" required></td>
            </tr>
            <tr>
                <td>Insert a image here: </td>
                <td><input type="file" name="imageUpload" id="imageUpload">
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

