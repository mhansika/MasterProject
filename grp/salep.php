 <ul id="topnavi">
            <li><a href="" id="viewsalep">View</a></li>
            <li><a href="" id="addsalep">Add New</a></li>
            <li><a href="" id="searchsalep">Search</a></li>
          
        </ul>

<div class="content">


        <div class="form">
			<div class="seperate">
                <table>
<tr><td>District</td>
<td><select class="dropdown">
                <option value="Colombo">Col01</option>
                <option value="Dehiwala">De01</option>
                <option value="Maharahama">Mahara01</option>
                <option value="Nugegoda">Nuge01</option>
            </select></td>
<td> &nbsp</td>	
<td> &nbsp</td>	
<td>Area</td>
<td><select class="dropdown">
                <option value="Colombo">Col01</option>
                <option value="Dehiwala">De01</option>
                <option value="Maharahama">Mahara01</option>
                <option value="Nugegoda">Nuge01</option>
            </select></td>
			
</tr>
</table>
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

     if (id == "addsalep"){

        url = "addsalep.php";

    } else if (id == "searchsalep"){

        url = "searchsalep.php";

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

