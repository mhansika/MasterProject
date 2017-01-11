<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php include 'core/init.php';
protect_page();
?>
<?php
$role = $user_data['role'];
if ($role=="admin") {
?>
	

</script>
<?php
	}elseif ($role=="deo"){
		
		
		
	}?>
	
	





<html>
<head>
    <title>WELCOME</title>
    <link type="text/css" media="screen" href="css/select.css" rel="stylesheet"></link>
    <style>
        .button{
            background-color: #6f6f6e;
            color: white;
            border: 10px; solid;
            border-color: #CCD1D1;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin-right: 4px 2px;
            cursor: hand;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            float: right;
        }
        .button:hover {
            background-color: #555555;
            color: white;
        }
    </style>

</head>
<body>
<div class="wrapper">
    <a class="button" href="mainLogout.php" style="float: right">LogOut</a>
<div class="main-content">
    <div class="container">
        <a href="WarrantyManager/enterDefect.php">
                    <span style="margin-top: -15%; margin-right: 50%">Warranty Management</span>
        </a>
        <div class="ObjectContainer" style="margin-top: 20%">
            <div id="red" class="Object" href="#" a="">
                <img class="pic" src="img/g.png"></img>
            </div>
        </div>
    </div>
    <div class="aside">
        <a href="InventoryManager/inventory.php">
                    <span style="margin-top: -40%; margin-right: 45%">Inventory Management</span>
        </a>
        <div class="ObjectContainer">
            <div id="Grey" class="Object" href="" a="">
                <img class="pic"  src="img/f.png"></img>
            </div>
        </div>
    </div>
</div>
</body>
</html>
