<?php
include_once "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <form action="waranty_report.php " method="post">
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
    
</body>
</html>