<?php
?>
<head>
	<style>
		body{
			margin:0;
			background: #820311;
			background: -webkit-linear-gradiant(left top, #c3654f,#820311); /*for safari 5.1 to 6.0*/
			background: -o-linear-gradiant(bottom right,#c3654f,#820311); /* For Firefox 3.6 to 15 */
			background: linear-gradient(to bottom right,#c3654f,#820311); /* Standard syntax (must be last) */
		}
		.semi-transparent-button {
			display: block;
			box-sizing: border-box;
			margin: 0 auto;
			padding: 8px;
			width: 100%;
			max-width: 300px;
			background: #fff; /* fallback color for old browsers */
			background: rgba(255, 255, 255, 0.5);
			border: 1px solid #fff;
			color: #fff;
			text-align: center;
			text-decoration: none;
			letter-spacing: 1px;
			transition: all 0.3s ease-out;
			font-family: Calibri;
			font-size: large;
		}
		.semi-transparent-button:hover,
		.semi-transparent-button:focus,
		.semi-transparent-button:active {
			background: #fff;
			color: #000;
			transition: all 0.5s ease-in;
		}

		#footer{
			position:fixed;
			bottom:0px;
			width: 100%;
			margin: 0;
			background-color: #0f0f0f;
			height: 20px;
		}


	</style>
</head>
<body>
<div id="sidebar" style="margin-top: 8%">
	<div class="icon">
		<div class="back" style="margin-top: -2%">
			<img src="../images/back.png"style="margin-left: 5%;">
			<span style="color: #fff; font-family: Calibri; font-size: 30px; ">Back</span>
		</div>
		<h2 style="font-size: 30px;font-family: Arial;color: #fff;margin-left: 33%;margin-top: -3%">Warranty Management System</h2>
		<div class="back" style="margin-top: -7%;margin-left: 90%;max-width: 100px">
			<a class="semi-transparent-button" href="http://localhost/ABM/index.php">LogOut</a><br/><br>
		</div>
	</div>

</div>
<div class="button" style="margin-top: 5%;margin-right: 5%">
<a class="semi-transparent-button" href="#">View Sold Batteries</a><br/><br>
<a class="semi-transparent-button" href="#">View Replacement Batteries</a><br/><br>
<a class="semi-transparent-button" href="#">Return Inwards</a><br/><br>
<a class="semi-transparent-button" href="#">Mis-used Dealers</a><br/><br>
</div>
<div id="footer">

</div>
</body>
