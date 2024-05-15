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
