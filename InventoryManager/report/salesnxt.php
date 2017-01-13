<?php
?>
<html>
<?php include '../../core/init.php';
protect_page();
?>
<?php
$role= $user_data['role'];
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/IM.css" type="text/css"/>
    <!-- bxSlider Javascript file -->
    <script src="../js/jquery.bxslider.js"></script>
    <!-- bxSlider CSS file -->
    <link href="css/jquery.bxslider.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style> 
select {
    width: 25%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
input[type=submit] {
    background-color: #5E5E5E;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>
<div class="row">
    <?php
    include '../include/header.php'
    ?>
    <div id="nav">
        <ul id="mainsidebar">
            <li class="sidenav">
                <div id="side">
                    <a href="../battery/product.php"><img src="../img/a.png" class="pic"></a>
                    <span>Product Details</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../stock/stock.php"><img src="../img/b.png" class="pic"></a>
                    <span>Stock</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../dealer/dealer.php"><img src="../img/c.png" class="pic"></a>
                    <span>Dealer</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../salesperson/salep.php"><img src="../img/d.png" class="pic"></a>
                    <span>Salesperson</span>
                </div>
            </li>
            <li class="sidenav">
                <div id="side">
                    <a href="../report/report.php"><img src="../img/e.png" class="pic"></a>
                    <span>Reports</span>
                </div>
            </li>
        </ul>
    </div>
    <div id="content">
   <form action="areaSold.php" method="post">
    Year:
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
    Month:
    <select name="month">
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
    </select> 


  <input type="submit" value="Submit" name="submit">
    
 </form>
    </div>
    <?php
    include '../include/footer.php';
    ?>
</div>
</body>
</html>
