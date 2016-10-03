<html>
<head>
    <style>
        .ca-menu li{
            width: 500px;
            height: 100px;
            overflow: hidden;
            display: block;
            background: #e0e0e0;
            box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
            margin-bottom: 4px;
            border-left: 10px solid #000;
            transition: all 300ms ease-in-out;
        }
        .ca-menu li:last-child{
            margin-bottom: 0px;
        }
        .ca-menu li a{
            text-align: left;
            display: block;
            width: 100%;
            height: 100%;
            color: #333;
            position:relative;
        }
        .ca-icon{
            font-family: Arial;
            font-size: 30px;
            text-shadow: 0px 0px 1px #333;
            line-height: 90px;
            position: absolute;
            width: 90px;
            left: 20px;
            text-align: center;
            transition: all 300ms linear;
            margin-top: 20px;
        }
        .ca-content{
            position: absolute;
            left: 120px;
            width: 370px;
            height: 60px;
            top: 20px;
        }
        .ca-main{
            font-size: 30px;
            transition: all 300ms linear;
        }
        .ca-sub{
            font-size: 20px;
            color: #000000;
            transition: all 300ms linear;
        }
        .ca-menu li:hover{
            border-color: #990000;
            background: #000;
        }
        .ca-menu li:hover .ca-icon{
            color: #990000;
            text-shadow: 0px 0px 1px #990000;
            font-size: 50px;
        }
        .ca-menu li:hover .ca-main{
            color: #990000;
            font-size: 14px;
        }
        .ca-menu li:hover .ca-sub{
            color: #fff;
            font-size: 30px;
        }

    </style>
</head>
<body>
<ul class="ca-menu" style="margin-top: 5%;margin-left: 30%">
    <li>
        <a href="report/salesp-report.php">
            <span class="ca-icon"><img src="img/sm.png"> </span>
            <div class="ca-content">
                <h3 class="ca-sub">Salesperson</h3>
            </div>
        </a>
    </li>
    <li>
        <a href="report/dealer-report.php">
            <span class="ca-icon"><img src="img/dd.png"> </span>
            <div class="ca-content">
                <h3 class="ca-sub">Dealer</h3>
            </div>
        </a>
    </li>
    <li>
        <a href="">
            <span class="ca-icon"><img src="img/w.png"></span>
            <div class="ca-content">
                <h3 class="ca-sub">Warranty</h3>
            </div>
        </a>
    </li>
    <li>
        <a href="#">
            <span class="ca-icon"><img src="img/st.png"></span>
            <div class="ca-content">
                <h3 class="ca-sub">Stock</h3>
            </div>
        </a>
    </li>

</ul>

</body>

</html>











