<?php 

    include '../../../dbConn.php';
    $dbConn = getDbConn();
    
    $sql = "SELECT * FROM q_author WHERE authorId = " . $_GET['authorId'];
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $record = $stmt -> fetch();
    print_r($record);

    $quote = $record['quote'];
    $author = $record['firstName'] . " " . $record['lastName'];
    $years = "<span class='date'>" . $record['dob'] . "</span> to <span class='date'>" . $record['dod'] . "</span>";
    $img = "<img src='" . $record['picture'] . "' />";
    $profession = $record['profession'];
    $country = $record['country'];
    $gender = $record['gender'];
    $bio = $record['biography'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5: Author Info </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>

    </body>
</html>