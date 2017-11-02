<?php

function getDbConn($dbname = 'quotes') {
    $host = 'localhost'; // cuz in C9
    // $dbname = 'quotes';
    $username = 'root';
    $password = '';
    
    // condition for connecting in Heroku
    
    if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["us-cdbr-iron-east-05.cleardb.net"];
        $dbname = substr($url["heroku_62e1947c07c45ab"], 1);
        $username = $url["bbfe78ef67222c"];
        $password = $url["ab87b8d3"];
    }
    
    $dbConn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
}

?>