<?php

// connect to database & show errors
include '../../../dbConn.php';
$dbConn = getDbConn();

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

function generateRandQuote() {
    global $dbConn;
    
    // to select data: refer, execute, fetch
    $sql = "SELECT quoteId FROM q_quote";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();
    // print_r($records);
    
    $randQuoteId = $records[array_rand($records)]['quoteId'];
    // echo $randQuoteId;
    
    
    $sql = "SELECT quote, authorId, firstName, lastName
            FROM q_quote
            NATURAL JOIN q_author
            WHERE quoteId = $randQuoteId";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $record = $stmt -> fetch(); // use when expecting to get ONLY ONE
    // print_r($records);
    
    echo "
        <p id='quote'>" . $record['quote'] . "</p>
        <p id='author'>&mdash;
            <a target='authorInfo' href='getAuthorInfo.php?authorId=" . $record['authorId'] . "'>
                " . $record['firstName'] . " " . $record['lastName'] . "
            </a>
        </p>
    ";
    
    // echo "
    //     <p id='quote'>$quote</p>
    //     <p id='author'>$author</p>
    //     <div id='addInfo'>
    //         $img
    //         <p id='years'>Lifespan: $years</p>
    //         <p id='gender'>Gender: $gender</p>
    //         <p id='country'>Country of Origin: $country</p>
    //         <p id='profession'>Profession/Occupation: $profession</p>
    //         <p id='biography'>$bio</p>
    //     </div>
    // ";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5 </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        
        <?= generateRandQuote(); ?>
        
        <iframe name="authorInfo" width="500" height="300"></iframe>
        
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            // $(document).ready(function(){
            //     $("#author").click(function(){
            //         $("#addInfo").show();
            //     });
            // });
        </script>-->
    </body>
</html>
