<html xmlns="http://www.w3.org/1999/html">
<?php include '../core/init.php';
protect_page();
?>
<?Php
$uid= $user_data['user_id'];
$role= $user_data['role'];
/*echo '$role';*/
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../InventoryManager/css/IM.css" type="text/css"/>

    <script>
        $(function(){
            $(".AutoSubmitCombo").change(function(){
                var input = $(this);

                if ( input.selectedIndex <= 0 )
                    return;

                var value = input.val();
                var id = input.attr('id');

                if ( value == "" )
                    return;

                var form = input.parents('form');

                id = id.split('_')[1];

                if ( id == "" )
                    return;

                var vals = id.split("|");
                var batch = vals[0];
                var num = vals[1];

                $.ajax({
                    url: "ajax-update1.php",
                    type: "POST",
                    data: {
                        batch_num: batch,
                        battery_num: num,
                        val: value
                    },
                    cache: false,
                    timeout: 10000,
                    success: function(data) {
                        // Alert if update failed
                        if (data) {
                            alert(data);
                        }
                        // Load output into a P
                        else {
                            $('#notice').text('Field updated');
                            $('#notice').fadeOut().fadeIn();
                        }
                    }
                });
            });
        });
        //multiple dropdown selection
        $( document ).ready(function() {
            $("select#cap").click( function(){
                //var id = this.id;
                var id = $(this).children(":selected").attr("id");
                console.log(id);
                $.ajax({
                    url:'getdrop2.php?data='+id,
                    type:"get",
                    success:function(data){

                        $("tr#trow>th#second").html("");
                        $("tr#trow>th#second").html(data);
                    }
                });
            });
        });
    </script>

</head>
<body>
<?php
include '../InventoryManager/include/header.php';
?>
<div id="nav">
    <ul id="mainsidebar">
        <li class="sidenav">
            <div id="side">
                <a href="enterDefect.php"><img src="../img/a.png" class="pro"></a>
                <span>Enter Defects</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="checkReplace.php"><img src="../img/b.png" class="pro"></a>
                <span>Check Replacements</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="misDealer.php"><img src="../img/c.png" class="pro"  onclick="myAjax()"></a>
                <span>Misused Dealers</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="viewAllReplace.php"><img src="../img/d.png" class="pro"></a>
                <span>All Replacements</span>
            </div>
        </li>
        <li class="sidenav">
            <div id="side">
                <a href="searchProduct.php"><img src="../img/e.png" class="pic"></a>
                <span>Search Battery</span>
            </div>
        </li>
    </ul>
</div>
<div id="content">
    <div class="listUP">
        <h1 class="add">Update Defect Types</h1>
                <form class="AddPro" method = "GET" id = "form1">
                    <label>
                        <span style="color: #0A0A0A;float: left;padding-right: 2%">Add to the list :</span>
                        <input type="text" class="input-field" name="defect" value=""/>
                    </label>
                    <label>
                        <span>&nbsp;</span>
                        <button class="update" type="submit" name="submit" value="submit" style="margin-left: 10%">Add</button><label>
                            <?php
                            require "../core/database/connect.php";

                            if(isset($_GET['submit']))
                            {

                                $defect_type=mysqli_real_escape_string($conn,$_GET['defect']);

                                $sql =mysqli_query($conn,"INSERT INTO defect_types (defect) VALUES ('$defect_type')");
                                if ($conn->query($sql) === TRUE) {
                                    echo "Added successfully";
                                } else {
                                    echo "Error Inserting record " ;
                                }

                            }
                            //header("Location:enterDefect.php");
                            ?>
                </form>
    </div>
</div>
<?php
include '../InventoryManager/include/footer.php';
?>
</body>
</html>
