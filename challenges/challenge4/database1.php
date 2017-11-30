<?php
include '../../dbConn.php';
$dbConn = getDbConn();

$sql = "SELECT timestamp
        FROM q_pixabay 
        WHERE keyword = :keyword";

$stmt = $dbConn -> prepare($sql);
$stmt -> execute( array(":keyword"=>$_GET['keyword']) );

$records = $stmt -> fetchAll(); // only gets associative array! leave blank to get both assoc and index

echo json_encode($records);
        





?>