<?php

include '../../dbConn.php';
$dbConn = getDbConn('final');

$sql = "SELECT itemId, item, price, item_description, categoryId
        FROM m_items";
        
$stmt = $dbConn->prepare($sql);
$stmt->execute();

$records = $stmt -> fetchAll(PDO::FETCH_ASSOC); // only gets associative array! leave blank to get both assoc and index

// print_r($records);
// echo "<br/><br/><br/>";
echo json_encode($records); // can be uderstood by AJAX
// echo json_last_error();

?>