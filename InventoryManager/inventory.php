<html>
<?php include '../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/IM.css" type="text/css"/>
</head>
<body>
<div class="row">
<?php
include 'include/header.php'
?>
<?php
include 'include/sidenav.php'
?>
    <div id="content">

    </div>
<?php
include 'include/footer.php';
?>
</div>
</body>
</html>
