<?php
include '../../dbConn.php';
$dbConn = getDbConn();

// add current score to table

$sql = "INSERT INTO q_pixabay
        (keyword)
        VALUES 
        (:keyword)";


$stmt = $dbConn->prepare($sql);
$stmt->execute(array(':keyword'=>$_GET['keyword']));

// get average score and number of quizzes submitted

$sql = "SELECT COUNT(keyword) AS count
        FROM q_pixabay 
        WHERE keyword = :keyword";

$stmt = $dbConn -> prepare($sql);
$stmt -> execute( array(":keyword"=>$_GET['keyword']) );

$record = $stmt -> fetch(); // only gets associative array! leave blank to get both assoc and index

echo json_encode($record);




?>