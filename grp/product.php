<ul id="topnavi">
            <li><a href="" id="viewbattery">view</a></li>
            <li><a href="" id="addbattery">Add</a></li>
            <li><a href="" id="searchbattery">Search</a></li>
        </ul>
<div class="content">


        <div class="form">
            <div class="seperate">
                DEFAULT VIEW CONTENT
            </div>
        </div>  

    </div>
	<script>
        
    $("div.content>ul#topnavi>li>a").click( function(e){

        e.preventDefault();

    });


    $("ul#topnavi>li>a").click( function(){
    var id = this.id;
    console.log(id);

    $('div.content > div.form').html("");

     if (id == "addbattery"){

        url = "addbattery.php";

    } else if (id == "searchbattery"){

        url = "searchbattery.php";

    } 


     $.ajax({


            
        type:"post",
        url:url,
        success:function(data){

            $("div.content> div.form").html(data);

        }



    });

    



});







</script>


