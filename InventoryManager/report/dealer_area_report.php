<html>
<head>
    <title></title>
   
    <style type="text/css">
       
        table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;

    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #990000;
    color: white;
}
tbody {
    height: 100px;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
}
ul {list-style: none;padding: 0px;margin: 0px;position:absolute;}
  ul li {display:none;position: relative;float: left;background: #990000;color:white;padding:10px 10px 10px 10px;}
  li ul {display: none;}
  ul li a {display: block;background: #000;padding: 5px 10px 5px 10px;text-decoration: none;
           white-space: nowrap;color: #fff;}
  ul li a:hover {background: #f00;}
  ul:hover li{display:block;position:absolute;}
  li:hover ul {display: block; position: absolute;}
  li:hover li {float: none;}
  li:hover a {background: #f00;}
  li:hover li a:hover {background: #000;}
  #drop-nav li ul li {border-top: 0px;}

    </style>
</head>
<body>
    <form action="dealer_area_report.php" method="post">
    
        Select Area:<input type="text" name="area" >
        <input type="submit" value="Submit" name="submit">
    
    </form>


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


//$sql="SELECT B.battery_type,B.battery_name,B.salesPerson_id,B.sold_Date,D.dealer_name from sold B,dealer D where D.dealer_id=B.dealer_id";
$sql="SELECT D.dealer_name,D.NIC,D.address,D.telephoneNo,D.email,S.F_name,S.L_name,A.area from dealer D join Sales_person S on (D.dealer_id=S.salesPerson_id) join area A on (A.area_no=D.area_no)";


$result = $conn->query($sql);
$area="";
if (isset($_POST['area'])) {
    $area = $_POST['area'];
  }


if ($result->num_rows > 0) {
    echo "


<table><tr><th>Dealer Name</th><th>NIC</th><th>Address</th><th>Tel-No</th><th>E-mail</th></tr>";


while($row1 = $result->fetch_assoc() ){
	if($row1['area']==$area){
	 echo "<tr><td >
            <ul id=\"drop-nav\">".$row1["dealer_name"]."<ul>
                     
                   
                        <li>"
                     .$row1["F_name"]." ".$row1["L_name"]."</li>
                    
                      </ul>
                      </ul>
      </td><td>".$row1["NIC"]." </td><td>".$row1["address"]." </td><td>".$row1["telephoneNo"]." </td><td>".$row1["email"]." </td><tr>";

	
}
 
} 
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();


?>
</body>
</html>