<?php
$dbHost="localhost";
$dbName="id19970909_database";
$dbUser="id19970909_admin";
$dbPass="trainerportaL1..";
try {
    $pdo = new PDO(
      "mysql:host=$dbHost;dbname=$dbName;",
      $dbUser, $dbPass, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NAMED
    ]);
  } catch (Exception $ex) { exit($ex->getMessage()); }

// Filter the excel data 
function filterData(&$str){ 
  $str = preg_replace("/\t/", "\\t", $str); 
  $str = preg_replace("/\r?\n/", "\\n", $str); 
  if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 

// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xls"; 

// Column names 
$fields = array('id', 'encargado-1', 'encargado-2', 'veterano-1', 'veterano-2', 'novato-1', 'novato-2', 'participante'); 

// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 

// Fetch records from database 
$query = $db->query("SELECT * FROM reviewa ORDER BY id ASC"); 
if($query->num_rows > 0){ 
  // Output each row of the data 
  while($row = $query->fetch_assoc()){ 
      $lineData = array($row['id'], $row['manager_id'], $row['manager2_id'], $row['vete_id'], $row['vete2_id'], $row['nova_id'], $row['nova2_id'], $row['nombre']); 
      array_walk($lineData, 'filterData'); 
      $excelData .= implode("\t", array_values($lineData)) . "\n"; 
  } 
}else{ 
  $excelData .= 'No records found...'. "\n"; 
} 

// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-disposition: attachment; filename=\"resultados.xls\"");

// Render excel data 
echo $excelData; 

exit;
























  /*
header("content-Type: application/octet-stream");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"resultados.csv\"");
 $stmt = $pdo->prepare('SELECT * FROM reviewa');
 $stmt -> execute();
 echo implode(",",[
        'id','encargado-1','encargado-2','veterano-1','veterano-2','novato-1','novato-2','votante'
    ]);
    echo "\r\n";
 while($row = $stmt -> fetch(PDO::FETCH_NAMED)){
    echo implode(",",[
        $row['id'],$row['manager_id'],$row['manager2_id'],$row['vete_id'],$row['vete2_id'],$row['nova_id'],$row['nova2_id'],$row['nombre']
    ]);
    echo "\r\n";
 }
