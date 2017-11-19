<?php
session_start();

//validate username & pw

// print_r($_POST); // displays vals passed from login form

include '../../dbConn.php';
$dbConn = getDbConn();

$username = $_POST['username'];
$password = sha1($_POST['password']);

// echo $password;

// $sql = "SELECT *
//         FROM q_admin
//         WHERE username = '$username'
//         AND password = '$password'";
        
$sql = "SELECT *
        FROM q_login
        WHERE username = :username
        AND password = :password";
        
$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

// print_r($record);

if(empty($record)) {
    
    header("Location: index.php?cred=false");
} else {
    
    // $_SESSION['username'] = $record['username'];
    $_SESSION['userId'] = $record['userId'];
    
    header('Location: quiz.php'); // redirects to admin page
}

?>