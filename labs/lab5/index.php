<?php

// connect to database & show errors
$host = 'localhost'; // cuz in C9
$dbname = 'quotes';
$username = 'root';
$password = '';
$dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getMaleAuthors() {
    global $dbConn;
    
    // to select data: refer, execute, fetch
    $sql = "SELECT * FROM q_author WHERE gender = 'M'";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();
    // print_r($records);
    
    foreach($records as $record) {
        echo $record['firstName'] . " " . $record['lastName'] . "<br/>";
    }
    
    // while($row = $stmt -> fetch()) {
    //     echo $row['firstName'] . ", " . $row['lastName'] . " " . $row['gender'] . "<br/>";
    // }
}

function getAllQuotes() {
    global $dbConn;
    
    // to select data: refer, execute, fetch
    $sql = "SELECT * FROM q_quote WHERE 1";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();
    // print_r($records);
    
    foreach($records as $record) {
        echo "<p>" . $record['quote'] . "</p>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5 </title>
    </head>
    <body>
        
        <h1>Male Authors</h1>
        <?= getMaleAuthors(); ?>
        
        <h1>All Quotes</h1>
        <?= getAllQuotes(); ?>

    </body>
</html>
