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

</head>
<body>
<div class="row">
    <?php
    include '../include/header.php'
    ?>
    <?php
    include '../include/sidenav.php'
    ?>
    <div id="content">
        <ul class="re-menu">
            <li>
                <a href="../report/salesp-report.php">
                    <span class="re-icon"><img src="../img/sm.png"> </span>
                    <div class="re-content">
                        <h3 class="re-sub">Salesperson</h3>
                    </div>
                </a>
            </li>
            <li>
                <a href="../report/dealer-report.php">
                    <span class="re-icon"><img src="../img/dd.png"> </span>
                    <div class="re-content">
                        <h3 class="re-sub">Dealer</h3>
                    </div>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="re-icon"><img src="../img/w.png"></span>
                    <div class="re-content">
                        <h3 class="re-sub">Warranty</h3>
                    </div>
                </a>
            </li>
            <li>
                <a href="../report/production_line1.php">
                    <span class="re-icon"><img src="../img/st.png"></span>
                    <div class="re-content">
                        <h3 class="re-sub">Stock</h3>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <?php
    include '../include/footer.php';
    ?>
</div>
</body>
</html>
