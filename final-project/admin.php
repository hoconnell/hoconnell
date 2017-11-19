<?php
session_start();

if(!isset($_SESSION['username'])) {
    //if not set, user must login
    header('Location: index.php');
    exit;
}

include '../dbConn.php';
$dbConn = getDbConn('final');

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Final Project: Homepage </title>
        <meta charset='utf-8'>
        <link href="https://fonts.googleapis.com/css?family=Arima+Madurai|Open+Sans|Sofia" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script src="https://code.jquery.com/jquery.min.js"></script>
    </head>
    <body>
        <div id='content'>
            <header>
                <h1>Koshka Café</h1>
                <h4>Menu</h4>
            </header>
            
            <main>
                
                
            </main>
            
            <footer>
                <p>2017 &copy; Koshka Café<br/>Site by Heather O'Connell</p>
                <h5>Logout</h5>
            </footer>
        </div>
        
        <script>
            $('footer h5').click(function() {
                window.location.href = 'php/logoutProcess.php';
            });
        </script>

    </body>
</html>