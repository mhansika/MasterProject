<?php
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
    body {
        margin:0;
        background-image: url("2.png");
    }

    .icon-bar {
        width: 10%;
        text-align: center;
        background-color: #820311;
        position: fixed;
    }

    .icon-bar a {
        padding: 16px;
        display: block;
        transition: all 0.3s ease;
        color: white;
        font-size: 36px;
    }

    .icon-bar a:hover {
        background-color: #000;
    }

    .active {
        background-color: #555 !important;
    }
    #footer {
        position:fixed;
        left:0px;
        bottom:0px;
        height:30px;
        width:100%;
        background:#555;
    }
    #content{
        margin-left: 20%;
    }
</style>
<body>
<div id="sidebar">
<div class="icon-bar">
    <a class="active" href="http://localhost/MasterProject/inventory.php"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i></a>
    <a href="viewmanufacExide.php"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
    <a href="entermanufac.php"><i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
    <a href="#"><i class="fa fa-archive fa-2x" aria-hidden="true"></i></a>
</div>
</div>
<div id="content">
    
    

</div>
<div id="footer">

</div>
</body>
</html>


