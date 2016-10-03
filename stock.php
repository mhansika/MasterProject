
            <style>
        table{
            width:80%;
            table-layout:fixed;
            
        
             
        }
        .tbl-header{
            background-color: rgba(255,255,255,0.3);
            border: 1px solid #c2c2a3;
        }
        th{
            font-size: 50px;
            font-weight: bold;
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 15px;
            color: #fff;
            text-transform: uppercase;
            background-color: #990000;
        }
        td{
            padding: 15px;
            text-align:left;
            vertical-align:middle;
            font-weight: 300;
            font-size: 13px;
            color: #000;
            border-bottom: 1px solid #c2c2a3;
        }


        /* demo styles */

        @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
        body{
            font-family: 'Roboto', sans-serif;
        }

    </style>


</head>
<div class="content">

    <div class="form">
        <div class="this">

        <div class="more"style="margin-left: 10%">
        <a href="stock/StockInner.php"><img src="./images/more.png" style="margin-left: 79%;margin-top: 2%">
        <span style="color: #000; font-family: Calibri; font-size: 20px; margin-left: 5%;text-align: center;margin-left: 80%;margin-top: -3%">Enter for more</span></a>
        </div>
        <section style="width:60% ;margin-right:15% "> <!--for demo wrap-->
            <h1 style="font-size: 30px;
                    color: #000;
                    text-transform: uppercase;
                    font-weight: 300;
                    text-align: center;">Stock in Hand</h1>
            <div  class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">  
                        <thead>
                        <tr>
                            <th>Battery Type</th>
                            <th>Battery Name</th>
                            <th>Available Stock</th>
                        </tr>
                        </tr>
                        </thead>
                </div>
                <tbody>
                <tr>
                    <td>Exide</td>
                    <td>MFS65R/L</td>
                    <td>12500</td>
                </tr>
                <tr>
                    <td>Lucas</td>
                    <td>MF105D31R/L</td>
                    <td>20000</td>

                </tr>
                <tr>
                    <td>Dagenite</td>
                    <td>65D31R/L</td>
                    <td>6000</td>

                </tr>
     
                </tbody>
                </table>
        </div>
</section>


</div>
</div>


</div>     

<script>
        
    $("div.content>ul#topnavi>li>a").click( function(e){

        e.preventDefault();

    });


     

     $.ajax({


            
        type:"post",
        url:url,
        success:function(data){

            $("div.content> div.form").html(data);

        }



    });

    



});







</script>

