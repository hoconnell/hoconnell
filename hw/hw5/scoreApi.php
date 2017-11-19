<?php
// Hw 5

include '../../dbConn.php';
$dbConn = getDbConn();

// add current score to table

$sql = "INSERT INTO q_quiz
        (userId, score)
        VALUES 
        (:userId, :score)";
        
$np = array(); // named parameters
$np[':userId'] = $_GET['userId'];
$np[':score'] = $_GET['score'];

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);

// get average score and number of quizzes submitted

$sql = "SELECT AVG(score) AS avgScore, 
        COUNT(score) AS quizzesTaken
        FROM q_quiz 
        WHERE userId = :userId";

$stmt = $dbConn -> prepare($sql);
$stmt -> execute( array(":userId"=>$_GET['userId']) );

$record = $stmt -> fetch(PDO::FETCH_ASSOC); // only gets associative array! leave blank to get both assoc and index

// print_r($record);
echo json_encode($record); // can be uderstood by AJAX

?>