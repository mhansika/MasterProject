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

</head>
<body>
<div class="row">
	
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
		
	

		<div class="AddPro">
		<div class="ad">



              </br></br>

			<h1 class="add">Backups</h1>
			<table id="ad">
				<form action="" method="POST">
					<tr>
						<td colspan="2">
							
							<input type="submit" name="submit" value="Get">
					</tr>
				</form>
				</form>
		</div>
		</div>
		<?php
		include '../include/footer.php';
		?>
	</div>
<?php

if (isset($_POST['submit'])) {
require '../../core/database/connect.php';
$host= 'localhost';
$user = 'root';
$pass = '';
$name = 'warranty_management';


function EXPORT_TABLES($host,$user,$pass,$name,$tables=false, $backup_name=false){ 
    set_time_limit(3000); 
	$mysqli = new mysqli($host,$user,$pass,$name); 
	$mysqli->select_db($name); $mysqli->query("SET NAMES 'utf8'");
    $queryTables = $mysqli->query('SHOW TABLES'); 
	
	while($row = $queryTables->fetch_row()) {
		$target_tables[] = $row[0]; 
		}
		
	if($tables !== false) {
		$target_tables = array_intersect( $target_tables, $tables); 
		} 
    $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `".$name."`\r\n--\r\n\r\n\r\n";
    
	foreach($target_tables as $table){
        if (empty($table)){
			continue; 
			} 
        $result = $mysqli->query('SELECT * FROM `'.$table.'`');     
		$fields_amount=$result->field_count;  $rows_num=$mysqli->affected_rows;     
		$res = $mysqli->query('SHOW CREATE TABLE '.$table); $TableMLine=$res->fetch_row(); 
        $content .= "\n\n".$TableMLine[1].";\n\n";
		
        for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
            while($row = $result->fetch_row())  {
				//when started (and every after 100 command cycle):
                if ($st_counter%100 == 0 || $st_counter == 0 )  {
					$content .= "\nINSERT INTO ".$table." VALUES";
					}
                    $content .= "\n(";
					for($j=0; $j<$fields_amount; $j++){
						$row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
						if (isset($row[$j])){
							$content .= '"'.$row[$j].'"' ;
							}  else{$content .= '""';}     
							if ($j<($fields_amount-1)){
								$content.= ',';
								}   
								}        
								$content .=")";
                //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {
					$content .= ";";
					} 
					else {
						$content .= ",";
						} 
						$st_counter=$st_counter+1;
            }
        } $content .="\n\n\n";
    }
    $content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
    $backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
    ob_get_clean(); header('Content-Type: application/octet-stream');   header("Content-Transfer-Encoding: Binary"); header("Content-disposition: attachment; filename=\"".$backup_name."\"");
    echo $content; exit;
}

EXPORT_TABLES("localhost","root","","warranty_management");

}
?>

	
</body>
</html>
