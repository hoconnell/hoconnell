<?php
session_start();

if(!isset($_SESSION['username'])) {
    //if not set, user must login
    header('Location: index.php');
    exit;
}

include '../../../hoconnell/dbConn.php';
$dbConn = getDbConn();

function authorList() {
    global $dbConn;
    
    $sql = "SELECT firstName, lastName, authorId
            FROM q_author
            ORDER BY lastName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // print_r($records);
    
    // foreach($records as $r) {
    //     echo $r['firstName'] . " " . $r['lastName'] . "<br/>";
    // }
    
    return $records;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 7: Admin Page </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        
        <style>
            .updateDelete {
                display:inline;
            }
        </style>
        
        <script>
            function confirmDelete() {
                // return false;
                return confirm("Are you sure you want to delete this author?");
            }
        </script>
    </head>
    <body>
        
        <h1>Admin Section</h1>
        <h2>Welcome <?= $_SESSION['adminFullName']; ?>!</h2>
        <br/>
        
        <form action="addAuthor.php">
            <input type="submit" value="Add new Author"/>
        </form>
        
        <form action="logout.php">
            <input type="submit" value="Logout"/>
        </form>
        
        
        <br/>
        <h4>Author list:</h4>
        <?php 
        
        $authors = authorList();
        
        foreach($authors as $author) {
            // echo "[<a href='updateAuthor.php?authorId=" . $author['authorId'] . "'>Update</a>] ";
            // echo "[<a href='deleteAuthor.php?authorId=" . $author['authorId'] . "'>Remove</a>] ";
            
            echo "<form class='updateDelete' action='updateAuthor.php'>
                    <input type='hidden' name='authorId' value='" . $author['authorId'] . "' />
                    <input type='submit' value='Update' />
                </form>";
            
            echo "<form class='updateDelete' action='deleteAuthor.php' onsubmit='return confirmDelete();'>
                    <input type='hidden' name='authorId' value='" . $author['authorId'] . "' />
                    <input type='submit' value='Delete'>
                </form>";
            
            echo $author['firstName'] . "  " . $author['lastName'] . " " . $author['country'] . "<br>";
        }
        
        
        ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </body>
</html>