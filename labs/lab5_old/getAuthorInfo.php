<?php 

function displayAuthorInfo() {

    include '../../dbConn.php';
    $dbConn = getDbConn();
    
    $sql = "SELECT dob, dod, profession, country, gender, biography, picture FROM q_author WHERE authorId = " . $_GET['authorId'];
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $record = $stmt -> fetch();
    // print_r($record);
    
    $img = $record['picture'];
    
    // help from: https://stackoverflow.com/questions/19572432/change-date-format-in-php-mysql
    $dob = date("F j, Y ", strtotime($record['dob']));
    $dod = date("F j, Y ", strtotime($record['dod']));
    
    $profession = $record['profession'];
    $country = $record['country'];
    $mF = $record['gender'];
    $bio = $record['biography'];
    
   
    if($mF == "M") {
        $gender = 'Male';
    } else if ($mF == "F") {
        $gender = 'Female';
    } else {
        $gender = 'Undefined';
    }
    
    echo "<img src='$img' />
        <p><span class='label'>Birth:</span> $dob</p>
        <p><span class='label'>Death:</span> $dod</p>
        <p><span class='label'>Country:</span> $country</p>
        <p><span class='label'>Profession:</span> $profession</p>
        <p><span class='label'>Gender:</span> $gender</p>
        <p class='bio'>$bio</p>
    ";
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 5: Author Info </title>
        <link href="https://fonts.googleapis.com/css?family=Petit+Formal+Script" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Muli:400,700" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <style>
            body {
                background-color:white;
            }
        </style>
    </head>
    <body>
        <div id="authorInfo">
            <?= displayAuthorInfo(); ?>
        </div>

    </body>
</html>