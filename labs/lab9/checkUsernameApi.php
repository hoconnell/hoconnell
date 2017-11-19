<?php
// Lab 9

include '../../dbConn.php';
$dbConn = getDbConn();

$sql = "SELECT username 
        FROM q_login 
        WHERE username = :username";

$stmt = $dbConn -> prepare($sql);
$stmt -> execute( array(":username"=>$_GET['username']) );

$record = $stmt -> fetch(PDO::FETCH_ASSOC); // only gets associative array! leave blank to get both assoc and index

echo json_encode($record); // can be uderstood by AJAX

?>