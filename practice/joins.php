<?php

    // connect to database & show errors
    $host = 'localhost'; // cuz in C9
    $dbname = 'quotes';
    $username = 'root';
    $password = '';
    $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    function getRefQuotes() {
        global $dbConn;
        
        $category = "philosophy";
        
        // to select data: refer, execute, fetch
        $sql = "
            SELECT quote, firstName, lastName 
            FROM q_quote
            NATURAL JOIN q_category
            NATURAL JOIN q_cat_quote
            NATURAL JOIN q_author
            WHERE category = '$category'
            ";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        
        $records = $stmt -> fetchAll();
        // print_r($records);
        
        foreach($records as $record) {
            echo $record['quote'] . "<br/>" . $record['firstName'] . " " . $record['lastName'] . "<br/><br/>";
        }
        
        // while($row = $stmt -> fetch()) {
        //     echo $row['firstName'] . ", " . $row['lastName'] . " " . $row['gender'] . "<br/>";
        // }
    }
    
    function getMaleQuotes() {
        global $dbConn;
        
        // to select data: refer, execute, fetch
        $sql = "
            SELECT quote, firstName, lastName, country
            FROM q_quote
            NATURAL JOIN q_author
            WHERE gender = 'M'
            ";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        
        $records = $stmt -> fetchAll();
        // print_r($records);
        
        foreach($records as $record) {
            echo $record['quote'] . "<br/>by " . $record['firstName'] . " " . $record['lastName'] . ", from " . $record['country'] . "<br/><br/>";
        }
        
    }
    
    function getThreeLongQuotes() {
        global $dbConn;
        
        // to select data: refer, execute, fetch
        $sql = "
            SELECT quote, firstName, lastName, category
            FROM q_quote
            NATURAL JOIN q_author
            NATURAL JOIN q_cat_quote
            NATURAL JOIN q_category
            ORDER BY length(quote) DESC
            LIMIT 3
            ";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        
        $records = $stmt -> fetchAll();
        // print_r($records);
        
        foreach($records as $record) {
            echo $record['quote'] . 
            "<br/>category: " . $record['category'] . "<br/>author: " . $record['firstName'] . " " . $record['lastName'] . 
            "<br/><br/>";
        }
        
    }
    
    function getThreeLongQuotes() {
        global $dbConn;
        
        // to select data: refer, execute, fetch
        $sql = "
            SELECT quote, firstName, lastName, category
            FROM q_quote
            NATURAL JOIN q_author
            NATURAL JOIN q_cat_quote
            NATURAL JOIN q_category
            ORDER BY length(quote) DESC
            LIMIT 3
            ";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        
        $records = $stmt -> fetchAll();
        // print_r($records);
        
        foreach($records as $record) {
            echo $record['quote'] . 
            "<br/>category: " . $record['category'] . "<br/>author: " . $record['firstName'] . " " . $record['lastName'] . 
            "<br/><br/>";
        }
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> SQL Joins </title>
    </head>
    <body>
            
            <?= getThreeLongQuotes(); ?>

    </body>
</html>