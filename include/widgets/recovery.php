<!DOCTYPE html>
<html>

  <head>

    <meta charset="UTF-8">
    <title>Login Screen</title>
    <link rel="stylesheet" type="text/css" href="../../css/login.css">
    <style>
            input[type=submit] {
    border-radius: 5px;
    font-family: Tahoma;
    background: ;
    /* Old browsers */
    background: -moz-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
    /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(1%, #f4f4f4), color-stop(100%, #ededed));
    /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
    /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
    /* Opera 11.10+ */
    background: -ms-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
    /* IE10+ */
    background: linear-gradient(to bottom, #f4f4f4 1%, #ededed 100%);
    /

}
   </style>
       
 
    <script>
        window.console = window.console || function(t) {};
        window.open = function(){ console.log('window.open is disabled.'); };
        window.print = function(){ console.log('window.print is disabled.'); };
        if (false) {
            window.ontouchstart = function(){};
        }
    </script>
    
    <script src='js/jquery.js'></script>
    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage('resize', "*");
        }
    </script>

    <script src="js/timeout.js"></script>
    <script>
        $('#login-button').click(function (event) {
            event.preventDefault();
            $('form').fadeOut(800);
            $('.wrapper').addClass('form-success');
        });

    </script>

</head>


<?php

include '../../core/init.php';


if (isset($_POST['send'])) {
$username = $_POST['username'];

$sql = "SELECT password FROM users WHERE username = $username ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc() ){
$current_password = $row['password'];
 

  if (md5($_POST['current_password']) === $current_password) {

     if (trim($_POST['password']) != trim($_POST['password_again']) ) {
       $errors[]='Your new passwords do not match';
     }
	else {
		change_password($user_id,$_POST['password']);
		echo "password updated successfully";
		
	}

  } else {
    $errors[]='Your current password is incorrect';
  }
	
	
}	
}
}




 /*    if (isset($_GET['success']) && empty($_GET['success'])) {
      echo "Your password has been changed";
    } else {


      if (empty($_POST) === false && empty($errors) === true) {
        change_password($session_user_id,$_POST['password']);
        header('Location:');

      } else if(empty($errors) === false) {
        echo output_errors($errors);
      }

	}
 */

?>
<body>

    <div class="wrapper">
        <div class="container">
     
            <h2 style="font-size: xx-large">Change Password</h2>

            <form class="form" action="" method="post">
				     <input type="text" name="username" placeholder="Username" />
					          <input type="password" name="current_password" placeholder="Current Password" />
                <input type="password" name="password" placeholder="New Password" />
				<input type="password" name="password_again" placeholder="Confirm Password" />
                <button class="submit" name="send" value="Login">Update</button><br/><br>
			
        </div>


        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>

    </div>


</body>

</html>
