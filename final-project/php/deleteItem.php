<?php
session_start();

if(!isset($_SESSION['username'])) {
    //if not set, user must login
    header('Location: index.php');
    exit;
}

include '../../dbConn.php';
$dbConn = getDbConn('final');

$sql = "DELETE FROM m_items
        WHERE itemId = " . $_GET['itemId']; // don't have to worry about injection when number

// echo $sql; // use this to debug sql statement

$stmt = $dbConn->prepare($sql);
$stmt->execute();

header('Location: ../admin.php');

?>