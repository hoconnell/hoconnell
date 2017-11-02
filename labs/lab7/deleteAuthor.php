<?php
session_start();

if(!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

include '../../../hoconnell/dbConn.php';
$dbConn = getDbConn();

$sql = "DELETE FROM q_author 
        WHERE authorId = " . $_GET['authorId']; // don't have to worry about injection when number

// echo $sql; // use this to debug sql statement

$stmt = $dbConn->prepare($sql);
$stmt->execute();

header('Location: admin.php');

?>