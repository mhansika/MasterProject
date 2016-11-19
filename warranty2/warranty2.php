<!DOCTYPE html>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
       
        <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        .ad{
            font-family: 'Segoe UI Light', 'Segoe UI', 'Open sans', Arial, Sans;
            background:#e0e0d1;
            margin: 0 auto;
            padding: 0px;
            width: 114.5%;
            color:black;
            font-size: 18px;
            line-height: 1em;
            margin-top:5px;
            margin-left: -4%;
            height: 700px;
        }
.ad td{
            display: block;
            margin: 0 0 8px;
            cursor: pointer;

        }

       




span
{
    color:white;
    margin-top:5px;
    display:block;

}
th, td {
    padding: 7px;
    text-align: left;

}


.ad input,.ad select,.ad option{
            font-family: 'Segoe UI Light', 'Segoe UI', 'Open sans', Arial, Sans;
            font-size: 14px;
            border: 0;
            background:  #fff ;
            margin: 0 0 20px;
            padding: 8px 10px;
            display: block;
            width: 50% ;
            color:black;
            text-align: center;
            margin-left: 100px;

            
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
    margin-top:80px;
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
    margin-top:-550px;
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
  background-color:#808080;
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
  font-weight: 500;
  font-size: 20px;
  color: black;






  
  font-family: arial;

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

                    <a href="#" id="dt" style="top: 1px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 20px;
                                text-align:center;"><img class= "pic" src="img/b.png" align="middle" width="80px"><span>Defect Type</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" >

                    <a href= "#" id="cr" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/c.png" align="middle" width="80px"><span>Check Replacements</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title" id="md" >

                    <a href="#" id="mis" style="top: 10px;
                                display:block;
                                position:absolute;
                                float:left;
                                font-family:arial;
                                color:#1C1C1C;
                                text-decoration:none;
                                width:100%;
                                height:70px;
                                margin-top: 10px;
                                text-align:center;"><img class= "pic" src="img/d.png" align="middle" width="80px"><span>Misused </br> Dealers</span></a>
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
                     <div class="ad">
                    <table width="70%">
  <tr>
    <th>Area</th>
    <th>Dealer</th>
    <th>Date</th>
  </tr>
  <tr></tr>
  <tr>
    <th><select id="battery" style="font-color:black;">
                                        <option value="">----Select----</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        </select></th>
    <th><select id="battery" style="font-color:black;">
                                        <option value="">----Select----</option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                        </select></th>
    <th><div class="form-group input-group">
                        <input class="form-control" id="datepicker" name="from" type="date"  size="9" value=""/>

                        <script>
                        $(function()
                        {
                        $( "#datepicker" ).datepicker();
                        $("#").click(function() { $("#datepicker").datepicker( "show" );})
                        });
                        </script>
                        <div class="input-group-addon" ><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </div>
                    </div></th>
  </tr>
  

 

</table>
<div  class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
      <th>Replace Battery Number</th>
      <th>Defect Type</th>
      
    </tr>
  </thead>
</table>
</div>
<div  class="tbl-content">
<table cellpadding="0" cellspacing="0" border="0">
  <tbody>
    <tr>
      <th></th>
      <th></th>
      
    </tr>
    <tr>
      <th></th>
      <th></th>
      
    </tr>
    <tr>
      <th></th>
      <th></th>    </tr>
    <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
     <tr>
       <th></th>
      <th></th>
    </tr>
    
   
    
  </tbody>
</table>
</div>

</div>



                   
</form>


 

</div>
</div>

 
       

                        
                        
                            

</div>
</div>

<div>





