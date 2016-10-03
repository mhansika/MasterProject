 <?php

 function protect_page() {
  if (logged_in() === false) {
    header('Location:protected.php');
    exit();
  }

 }




 function array_sanitize($item) {
   $conn= mysqli_connect('localhost','root','','warranty_management');
   $item=mysqli_real_escape_string($conn,$item);
 }

function sanitize ($data){
    $conn= mysqli_connect('localhost','root','','warranty_management');
    return mysqli_real_escape_string($conn,$data);
}


?>
