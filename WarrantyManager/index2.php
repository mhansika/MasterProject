<?php
?>
<head>
	<style>
		body{
			padding-left:200px;
			margin:0;
			background: #820311;
			background: -webkit-linear-gradiant(left top, #c3654f,#820311); /*for safari 5.1 to 6.0*/
			background: -o-linear-gradiant(bottom right,#c3654f,#820311); /* For Firefox 3.6 to 15 */
			background: linear-gradient(to bottom right,#c3654f,#820311); /* Standard syntax (must be last) */
		}
		div#sidebar{
			position:fixed;
			height:100%;
			width:200px;
			top:0;
			left:0;
			background:#0f0f0f;
		}
		div#content{
			width:100%;
			height:100%;
		}
		li.view_Manu{
			margin-top: 30%;
			font-family: Calibri;
		}
		li.Enter_Manu{
			font-family: Calibri;
			text-align: left;
			margin-top: 20%;
		}
		li.view_sold{
			font-family: Calibri;
			text-align: left;
			margin-top: 20%;
		}
		li.enter_sold{
			font-family: Calibri;
			text-align: left;
			margin-top: 20%;
		}
		li.stockIH{
			font-family: Calibri;
			text-align: left;
			margin-top: 20%;
		}
		.icon{
			margin-top: 20%;
		}
		#footer{
			position:fixed;
			bottom:0px;
			width: 100%;
			margin: 0;
			background-color: #0f0f0f;
			height: 20px;
		}
		div.back{
			margin-left: 20%;
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
	</style>

</head>
<body>
<div id="sidebar">
	<div class="icon">
		<div class="back">

			<a style="none "href="http://localhost/MasterProject/index.php"><img src="../images/back.png"></a>
			<span style="color: #9FBAC0; font-family: Calibri; font-size: 35px; margin-left: 5%;text-align: center">Back</span>

		</div>
	</div>
	<ul>
		<div class="list">
			<li class="view_Manu">
				<img style="margin-left: 20%" src="../img/vm.png"><br>
				<span  style="color: #9FBAC0"><a href="viewmanufac.php"><span class="asd" >View Sold Batteries</span></a></span>
			</li>
		</div>
		<div class="list">
			<li class="Enter_Manu">
				<img style="margin-left: 20%" src="../img/vb.png"><br>
				<span style="color: #9FBAC0"><a href="entermanufac.php">View Replacement Batteries</a></span>
			</li>
		</div>
		<div class="list">
			<li class="view_sold">
				<img style="margin-left: 20%" src="../img/ri.png"><br>
				<span style="color: #9FBAC0">Return Inwards</span>
			</li>
		</div>
		<div class="list">
			<li class="enter_sold">
				<img style="margin-left: 20%" src="../img/mis.png"><br>
				<span style="color: #9FBAC0">Mis-used Dealers</span>
			</li>
		</div>
	</ul>

</div>
<div id="content">

</div>
<div id="footer">

</div>
</body>
