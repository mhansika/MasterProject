<?php
?>
<head>
<link rel="stylesheet" href="css/table.css">
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
            margin-top: 50%;
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
            margin-top: 42%;
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
        h1{
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 35px;
        }

        h1{
            font-size: 30px;
            color: #000;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }
        table{
            width:100%;
            table-layout: fixed;
        }
        .tbl-header{
            background-color: rgba(255,255,255,0.3);
        }
        .tbl-content{
            height:300px;
            overflow-x:auto;
            margin-top: 0px;
            border: 1px solid rgba(255,255,255,0.3);
        }
        th{
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #111;
            text-transform: uppercase;
        }
        td{
            padding: 15px;
            text-align: match-parent;
            vertical-align:middle;
            font-weight: 300;
            font-size: 12px;
            color: #111;
            border-bottom: solid 1px rgba(255,255,255,0.1);
        }

        /* demo styles */

        @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
        body{
            background: -webkit-linear-gradient(left, #c3654f,#820311);
            background: linear-gradient(to right, #c3654f,#820311);
            font-family: 'Roboto', sans-serif;
        }
        section{
            margin: 50px;
        }


        }


        /* for custom scrollbar for webkit browser*/

        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }
        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }

    </style>
</head>
<body>
    <div id="sidebar">
        <div class="icon">
            <div class="back">
                <a href="inventory.php"><img src="./images/back.png"></a>
                <span style="color: #9FBAC0; font-family: Calibri; font-size: 35px; margin-left: 5%;text-align: center">Stock</span>
            </div>
        </div>
        <ul>
            <div class="list">
                <li class="view_Manu">
                    <span style="color: #fff"><a href="#">View Manufactured Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="Enter_Manu">
                    <span style="color: white"><a href="entermanufac.php">Enter Manufactured Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="view_sold">
                    <span style="color: #9FBAC0"><a href="#">View Sold Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="enter_sold">
                    <span style="color: #9FBAC0"><a href="#">Enter Sold Batteries</a></span>
                </li>
            </div>
        </ul>

    </div>
    <div id="content">
	 <section> <!--for demo wrap-->
<h1>Battery Details</h1> 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "warranty_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT battery_type, production_line, manufac_year,manufac_month,battery_num FROM battery";
$result = $conn->query($sql);

?>

<div  class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th>Battery Type</th>
      <th>Production Line</th>
	  <th>Manufacture Year</th>
      <th>Manufacture Month</th>
      <th>Battery Number</th>
    </tr>
  </thead>
</table>
</div>
         <div  class="tbl-content">
             <?php
             if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                     echo "<tr><td>".$row["battery_type"]."</td><td>".$row["production_line"]." </td><td>".$row["manufac_year"]."</td><td>".$row["manufac_month"]."</td><td>".$row["battery_num"]."</td></tr>";
                 }

             }


             ?>
             <table cellpadding="0" cellspacing="0" border="0">
                 <tbody>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>
                 <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                 </tr>

                 </tbody>
             </table>
</div>
</section>

    <div id="footer">

    </div>
</body>
