<?php
?>
<head>
    <title>Enter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom%20-%20RI.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #e2e2d8">
<nav class="navbar navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="app.php"><img style="height:40px; width:40px; margin-top:8px;" src="left-arrow.png"></a>
        </div>
        <p class="navbar-text" >Enter Return Inwards</p>
</nav>
    <div class="container">
    <div class="row">
        <div class="Absolute-Center is-Responsive">
            <div class=" col-lg-3 col-lg-offset-4 col-md-4 col-sm-6 col-xs-12">
                <form action="" id="loginForm">
                    <label class="control-label" for="date">Select Date</label>
                    <div class="form-group input-group">
                        <input class="form-control" id="datepicker" name="from" type="date" size="9" value=""/>
                        <script>
                        $(function()
                        {
                        $( "#datepicker" ).datepicker();
                        $("#").click(function() { $("#datepicker").datepicker( "show" );})
                        });
                        </script>
                        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </div>
                    </div>

                    <label class="control-label" for="barcode">Enter Barcode</label>
                    <div class="form-group input-group">
                        
<input class="form-control" id="barcode" name="email" type="text"/>
                        <div class="input-group-addon"><span class="glyphicon glyphicon-barcode" aria-hidden="true"></span> </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-lg outline" style="width: 100%">Done</button>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-lg outline" style="width: 100%">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
