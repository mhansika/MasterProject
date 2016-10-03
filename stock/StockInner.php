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
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="icon">
            <div class="back">

                <a style="none "href="http://localhost/ABM/inventory.php"><img src="../images/back.png"></a>
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
                    <span style="color: #9FBAC0">View Sold Batteries</span>
                </li>
            </div>
            <div class="list">
                <li class="enter_sold">
                    <span style="color: #9FBAC0">Enter Sold Batteries</span>
                </li>
            </div>
            <div class="list">
                <li class="stockIH">
                    <span style="color: #9FBAC0">Stock In Hand</span>
                </li>
            </div>
        </ul>

    </div>
    <div id="content">

    </div>
    <div id="footer">

    </div>
</body>
