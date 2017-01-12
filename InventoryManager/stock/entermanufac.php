<?php
?>
<html>
<?php include '../../core/init.php';
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
<?php
include '../include/header.php'
?>
<div id="nav">
	<ul id="mainsidebar">
		<li class="sidenav">
			<div id="side">
				<a href="../inventory.php"><img src="../img/Back.png" class="pic"></a>
				<span>Back</span>
			</div>
		</li>
		<li class="sidenav">
			<div id="side">
				<a href="entermanufac.php"><img src="../img/manufac.png" class="pic"></a>
				<span>Manufactured Products</span>
			</div>
		</li>
		<li class="sidenav">
			<div id="side">
				<a href="entersold.php"><img src="../img/Sold.png" class="pic"></a>
				<span>Sold Products</span>
			</div>
		</li>
		<li class="sidenav">
			<div id="side">
				<a href="stockInHand.php"><img src="../img/stockH.png" class="pic"></a>
				<span>Stock In Hand</span>
			</div>
		</li>
	</ul>
</div>
<div id="content">

		</div>
<?php
include '../include/footer.php';
?>
</body>
</html>
