<?php
  require "connection.php";
  


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
?>

<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
        

       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
       
        .ad{
            font-family: 'Segoe UI Light', 'Segoe UI', 'Open sans', Arial, Sans;
            background:white;
            margin: 0 auto;
            padding: 0px;
            width: 132.5%;
            color:black;
            font-size: 18px;
            line-height: 1em;
            margin-top:10px;
            margin-left: -8.5%;
            height: 800px;
        }


       




span
{
    color:white;
    margin-top:5px;
    display:block;

}
td {
    padding: 7px 7px;
  text-align:center;
  font-weight: 1000;
  font-size: 18px;
  color: black;
  text-align: center;

}


.ad input,.ad select,.ad option{
            font-family: 'Segoe UI Light', 'Segoe UI', 'Open sans', Arial, Sans;
            font-size: 16px;
            border: 0;
            background:black;
            margin: 0 0 10px;
            padding: 10px 10px;
            display: block;
            width: 55% ;
            color:white;
            text-align: center;
            margin-left: 60px;

            
        }

        body{
    
    margin: 0;
    padding: 0;
    font-family: 'Open Sans';
    margin-bottom: 0;
    background-color:#B40404;

}


nav{
    background-color:black;
    margin-top:1px;
    width: 125px;
    
}


ul
{
    width: 170px;
    margin-top:0px;
    padding:0px;
    list-style-type:none;
    -webkit-backface-visibility: hidden; backface-visibility: hidden;
    
}
.var_nav
{
    position:relative;
    background:#B40404;
    width:120px;
    height:150px;
    margin-top:0px;
    margin-right: 0px;
    margin-bottom:1px;

}

.var_nav:hover {
    width: 120px;
    background: black;
    
}
.content{

    padding: 0;
    margin-left:15%;
    width:70%;
    height:700px;
    margin-top:-780px;
    margin-right: 10%;




}

div.form{
    position: absolute;
}
table{
  width:100%;
  table-layout: fixed;


}
.tbl-header{
  background-color: blue;
  border: 1px solid #c2c2a3;
  font-color: black;
  margin-left: 90px;
  margin-right: 90px;
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid #c2c2a3;
  margin-left: 90px;
  margin-right: 90px;


}
th{
  padding: 15px 15px;
  text-align:center;
  font-weight: 1000;
  font-size: 20px;
  color: black;

}

h1  {
    font-family:arial;
    font-size: 35px;
    
    text-align: center;
}


.bottom{

  margin-left: 60%;
  width: 500px;
  text-align: center;
  font-family: arial;

}





 button {
    
    border: none;

    
    text-align: center;
    text-decoration: none;
    
    font-size: 20px;
  
    margin-top: 20px;
    border-radius: 0px;
    font-family: Calibri;
    font-weight: bold;
    margin-left: 15px;
    background-color: #808080;
}
     button:hover {
            background-color: #0f0f0f ;
            color: white;
        }    


tbody {
    height: 100px;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
}



tr:nth-child(even){background-color: #f2f2f2}



@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,300,600);




       
         </style>

  
</head>


<div id="body">
    <div id="navigation"></div>
    <nav>
        <ul id="mainsidebar">
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="dt">

                    <a href="dealer-report.php" id="dt" style="top: 1px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 20px;
                                text-align:center;"><img class= "pic" src="img/b.png" align="middle" width="80px"><span>Dealer</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "salsep-report.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/c.png" align="middle" width="80px"><span>Salesperson</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="md" >

                    <a href="Warranty-report.php" id="mis" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/d.png" align="middle" width="80px"><span>Warranty</span></a>
                </div>
            </li>

            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "stoke-report.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/f.png" align="middle" width="80px"><span>Stoke</span></a>
                </div>
            </li>
             <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "defect.php" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/g.png" align="middle" width="80px"><span>Defect</span></a>
                </div>
            </li>

            

    </nav>


    </nav>
</div>

    <div class="content">


        <div class="table">
            <div id="content">
            <form action="#" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return(validate());">


                    <div class="ad">
                    </br>
                     
                     
                     </br>

                    <table width="100%">
                    <ul id="top">
            <li class="topn"><a href="#home">View</a></li>
            <li class="topn"><a href="#news">Add</a></li>
            <li class="topn"><a href="#contact">Search</a></li>
        </ul>
  <tr>
    <th>Year</th><th>
    
    
  

                        
                       <select id="selectElementId" name='year'></select>
   
      <script>
          var min = (new Date().getFullYear())-2,
          max = min + 9,
          select = document.getElementById('selectElementId');

          for (var i = min; i<=max; i++){
             var opt = document.createElement('option');
             opt.value = i;
             opt.innerHTML = i;
             select.appendChild(opt);
          }
      </script>
 
    
                    </th><th>Month</th>

    <th><select name="month">
      <option value='January'>January</option>
      <option value='February'>February</option>
      <option value='March'>March</option>
      <option value='April'>April</option>
      <option value='May'>May</option>
      <option value='June'>June</option>
      <option value='July'>July</option>
      <option value='August'>August</option>
      <option value='September'>September</option>
      <option value='October'>October</option>
      <option value='November'>November</option>
      <option value='December'>December</option>
    </select> </th>
    <th>Production Line</th>
    <th> <select name='line'>
      <option value = '1'>1</option>
      <option value = '2'>2</option>
    </select>
</th>
<th> <input type="submit" value="Submit" name="submit">
    </th>
    </tr>
  
<?php
$year="";
if (isset($_POST["submit"]))
{   
  $str1 = $_POST['year'];
  //give last number of year
  $year = substr($str1, 3,4);

  $str2 = $_POST['month'];
  //select month
   if($str2 == 'January'){
    $month = 'A';
   }
   elseif($str2 == 'February'){
    $month = 'B';
   }
   elseif($str2 == 'March'){
    $month = 'C';
   }
   elseif($str2 == 'April'){
    $month = 'D';
   }
   elseif($str2 == 'May'){
    $month = 'E';
   }
   elseif($str2 == 'June'){
    $month = 'F';
   }
   elseif($str2 == 'July'){
    $month = 'G';
   }
   elseif($str2 == 'August'){
    $month = 'H';
   }
   elseif($str2 == 'September'){
    $month = 'I';
   }
   elseif($str2 == 'October'){
    $month = 'J';
   }
   elseif($str2 == 'November'){
    $month = 'K';
   }
   else{
    $month = 'L';
   }
  
   $line = $_POST['line'];

}

$sql="SELECT * FROM manufac_batteries";
$result = $conn->query($sql);
$sum1=$sum2=$sum3=0;
echo"<table><tr><th>Battery Type</th><th>Amount</th></tr>";   

if ($result->num_rows > 0) {
while($row1 = $result->fetch_assoc() ){
  if($row1['manufacture_year']==$year && $row1['manufacture_month']==$month && $row1['production_line']==$line){
      if($row1["battery_type"]=='Exide'){
        $sum1=$sum1+$row1["amount"];
        }
      elseif($row1["battery_type"]=='Lucas'){
        $sum2=$sum2+$row1["amount"];
        }
      else{
        $sum3=$sum3+$row1["amount"];
      }

   }

 }
echo "<tr><td>Exide</td><td>".$sum1." </td>";
echo "<tr><td>Lucas</td><td>".$sum2." </td>";
echo "<tr><td>Deganite</td><td>".$sum3." </td>";


/* // Some data
$data = array(20,39,38);

// Create the Pie Graph. 
$graph = new PieGraph(350,250);

$theme_class="DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->title->Set("A Simple Pie Plot");
$graph->SetBox(true);

// Create
$p1 = new PiePlot($data);
$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F'));
$graph->Stroke();*/
} else {
    echo "0 results";
}
$conn->close();


?>
 
</div>

</div>



                   
</form>


 

</div>
</div>

 
       

                        
                        
                            

</div>
</div>

<div>





