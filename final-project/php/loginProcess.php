<?php
session_start();

//validate username & pw

// print_r($_POST); // displays vals passed from login form

include '../../dbConn.php';
$dbConn = getDbConn('final');

$username = $_POST['username'];
$password = sha1($_POST['password']);
        
$sql = "SELECT *
        FROM m_admin
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
    echo "<h1>Wrong credentials!</h1>
        Your username and/or password did not match our records. Please return to the login page to try again.
        <br/><br/>
        <button onclick=\"location.href='index.php'\" type=\"button\">Return to Login</button>
    ";
    
    header("Location: ../login.php?cred=false");
} else {
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    echo $_SESSION['adminFullName'];
    
    $_SESSION['username'] = $record['username'];
    
    echo "Successful login!";
    header('Location: ../admin.php'); // redirects to admin page
}

?>