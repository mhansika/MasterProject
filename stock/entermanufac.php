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
		.ss{
			style="float: right;
    border: solid white 2px;
    padding: 20px 20px 20px 20px;
    width: 700px;
   
    margin-right: 200px;
    margin-top: 100px;
    margin-left: 50px;
    margin-bottom: 30px;"
		}
		button {
    
    border: none;

    padding: 4px 19px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    float: right;
    margin-top: 20px;
    border-radius: 2px;
    font-family: Calibri;
    font-weight: bold;
    margin-left: 20px;
}
        td{
            font-family: Calibri;
            font-size: 20px;
        }
        button:hover {
            background-color: #0f0f0f ;
            color: white;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="icon">
            <div class="back">
                <a href="http://localhost/ABM/inventory.php"><img src="../images/back.png"></a>
                <span style="color: #9FBAC0; font-family: Calibri; font-size: 35px; margin-left: 5%;text-align: center">Stock</span>
            </div>
        </div>
        <ul>
            <div class="list">
                <li class="view_Manu">
                    <span style="color: #9FBAC0"><a href="viewmanufac.php">View Manufactured Batteries</a></span>
                </li>
            </div>
            <div class="list">
                <li class="Enter_Manu">
                    <span style="color: #9FBAC0"><a href="entermanufac.php">Enter Manufactured Batteries</a></span>
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
            <div class="list">
                <li class="stockIH">
                    <span style="color: #9FBAC0"><a href="#">Stock In Hand</a></span>
                </li>
            </div>
        </ul>

    </div>
    <div id="content">
 <div class="ss" style="margin-left: 20%">
    <h2  style= "font-size: 30px;
    color: black;
    margin-bottom: 20px;
    padding-bottom: 10px;
    font-family: Calibri;
    text-transform: uppercase;
    background-color: rgba(255,255,255,0.3);
    text-align: center;
    margin-top: -2%">ADD BATTERY</h2><br>
        <table>
        
            <tr>
            <td><font color="white">Battery type</font></td>
               
           
            <td> <select name="battery_type">
            <option value="Exide">Exide</option>
            <option value="Lucas">Lucas</option>
            <option value="Dagenite">Dagenite</option>
            </td>
            
            </tr>
			<tr>
            <td><font color="white">Battery Number</td>
            <td><input type="text" name="battery_number_from" style="width: 100px" required></td>
			<td>&nbsp&nbsp <font color="white">To</td>
			<td><input type="text" name="battery_number_to" style="width: 100px" required></td>
            </tr>
			 <tr>
            <td><font color="white">Production Line</td>
               
           
            <td> <select name="production_line">
			
            <option value="one">1</option>
            <option value="two">2</option>
            </td>
            
            </tr>
			
            <tr>
            <td><font color="white">Manufacture Year</td>
            <td><input type="text" name="manufacture_year" style="width: 100px" required></td>
            </tr>
            <tr>
            <td><font color="white">Manufacture Month</td>
            <td><input type="text" name="manufacture_month" style="width: 100px" required></td>
            </tr>
             
			<tr>
                <td></td>
				<td></td>
				<td></td><td></td><td></td>

           <td><button type="submit">Submit</button></td>
		  <td></td>
           <td> <button type="reset">Reset</button></td>
            </tr>

        </form>
        

    </div>
    
    </div>
    <div id="footer">

    </div>
</body>
