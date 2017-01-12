<?php
include_once "../../database/connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<tr>
                                        <th>
                                        <form action="sales_report.php" method="post">
                                              Area:
                                              <?php 
                                                      
                                                        echo '<select name="area" id="cap" style="font-color:black;">';
                                                        echo '<option>     -------ALL--------   </option>';
                                                      
                                                        $sql1 = "Select DISTINCT area_no,area from area";
                                                        $query1= mysqli_query($connection, $sql1);
                                                          while($r=mysqli_fetch_row($query1)){ 
                                                                 echo '<option id=' .$r[0].'> ' . $r[1] . '</option>';

                                                          }
                                                      
                                                        echo "</select>";

                                                        echo '<select name="year">';
                                                        
                                                        $year = date("Y") - 3; 
                                                        for ($i = 0; $i <= 3; $i++) {
                                                          echo "<option>$year</option>"; 
                                                          $year++;
                                                        }
                                                        
                                                        echo '</select>';

                                                        echo '<select name="month">';

                                                        echo '<option value="1">January</option>';
                                                        echo '<option value="2">February</option>';
                                                        echo '<option value="3">March</option>';
                                                        echo '<option value="4">April</option>';
                                                        echo '<option value="5">May</option>';
                                                        echo '<option value="6">June</option>';
                                                        echo '<option value="7">July</option>';
                                                        echo '<option value="8">August</option>';
                                                        echo '<option value="9">September</option>';
                                                        echo '<option value="10">October</option>';
                                                        echo '<option value="11">November</option>';
                                                        echo '<option value="12">December</option>';

                                                        echo '</select>';

                                            ?>
                                                        
                                                     

                                        <th>
                                            
                                            <button type="submit" name="submit" value="submit">search</button>

                                        </th>
                                        </form>
                                        </th>
                              </tr>
</body>
</html>