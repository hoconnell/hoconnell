<?php

function getDbConn($dbname = 'quotes') {
    $host = 'localhost'; // cuz in C9
    // $dbname = 'quotes';
    $username = 'root';
    $password = '';
    
    // condition for connecting in Heroku
    
    if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    }
    
    $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
}

?>