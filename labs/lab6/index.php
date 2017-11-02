<?php 



// connect to database & show errors
include '../../../hoconnell/dbConn.php';
$dbConn = getDbConn();

function dispCountryOpt() {
    global $dbConn;
    
    // to select data: refer, execute, fetch
    $sql = "SELECT DISTINCT(country)
            FROM q_author
            ORDER BY country";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();
    // print_r($records);
    
    foreach($records as $record) {
        // echo "<option value='" . $record['country'] . "'>" . $record['country'] . "</option>";
        echo "<option ";
        
        if($_GET['aCountry'] == $record['country']) {
            echo 'selected ';
        }
        
        echo "value='" . $record['country'] . "'>" . $record['country'] . "</option>";
    }
}

function dispCatOpt() {
    global $dbConn;
    
    // to select data: refer, execute, fetch
    $sql = "SELECT category
            FROM q_category
            ORDER BY category";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();
    // print_r($records);
    
    foreach($records as $record) {
        echo "<option ";
        
        if($_GET['qCat'] == $record['category']) {
            echo 'selected ';
        }
        
        echo "value='" . $record['category'] . "'>" . $record['category'] . "</option>";
    }
}

function findQuote() {
    
    global $dbConn;
    $sql = "SELECT quote, firstName, lastName
            FROM q_author
            NATURAL JOIN q_quote
            ";
            
    $namedParameters = array();
    
    // need to add extra tables for categories
    if(!empty($_GET['qCat'])) {
        $sql = $sql . "NATURAL JOIN q_category
                        NATURAL JOIN q_cat_quote";
    }
    
    $sql = $sql . " WHERE 1 ";
    
    if(!empty($_GET['qCont'])) {
        // $sql = $sql . " AND quote LIKE '%" . $_GET['qCont'] . "%'"; // using single quotes allows for sql injection aka hacking
        $sql = $sql . " AND quote LIKE :qCont"; // using name parameters prevents sql injection
        $namedParameters[":qCont"] = "%" . $_GET['qCont'] . "%";
    }
    
    if(isset($_GET['aGen'])) {
        $sql = $sql . " AND gender = :aGen";
        $namedParameters[":aGen"] = $_GET['aGen'];
    }
    
    if(!empty($_GET['aCountry'])) {
        $sql = $sql . " AND country = :aCountry";
        $namedParameters[":aCountry"] = $_GET['aCountry'];
    }
    
    if(!empty($_GET['qCat'])) {
        $sql = $sql . " AND category = :qCat";
        $namedParameters[":qCat"] = $_GET['qCat'];
    }
    
    if(isset($_GET['orderBy'])) {
        // $sql = $sql . " ORDER BY :orderBy";
        // $namedParameters[":orderBy"] = $_GET['orderBy'];
        
        if ($_GET['orderBy'] == 'author') {
          $sql = $sql . " ORDER BY lastName";
        } else {
            $sql = $sql . " ORDER BY quote";
        }
    }
    
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute($namedParameters); // db doesn't kno about $nP must pass thru
    
    $records = $stmt -> fetchAll();
    // print_r($records);
        
    // display quote
    if(empty($records)) {
        echo "<h3 class='error'>Sorry, no match found.</h3>";
    } else {
        foreach($records as $r) {
            echo "<div class='quote'>" . $r['quote'] . "<br/>&mdash; <span class='author'>" . $r['firstName'] . " " . $r['lastName'] . "</span></div>";
        }
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Quote Finder </title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,400,800" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        <div id='content'>
            <h1>Quote Finder</h1>
            
            <form>
                <h3>Quote Content: </h3>
                <input type="text" name="qCont" value="<?= $_GET['qCont']; ?>"/>
                
                <br/>
                <h3>Author's Gender: </h3>
                <input type="radio" name="aGen" value="M" id="male" 
                    <?php 
                        if($_GET['aGen'] == 'M') {
                       echo 'checked'; 
                    }
                    ?>
                />
                <label for="male">Male</label>
                
                <input type="radio" name="aGen" value="F" id="female"  
                    <?php
                        if($_GET['aGen'] == 'F') {
                       echo 'checked'; 
                    }
                    ?>
                />
                <label for="female">Female</label>
                
                <br/>
                <h3>Author's Birthplace: </h3>
                <select name="aCountry">
                    <option value="">Select a Country</option>
                    <?= dispCountryOpt(); ?>
                </select>
                
                <br/>
                <h3>Quote Category: </h3>
                <select name="qCat">
                    <option value="">Select a Category</option>
                    <?= dispCatOpt(); ?>
                </select>
                
                <br/>
                <h3>Order By: </h3>
                <input type="radio" name="orderBy" value="author" id="obA" 
                    <?php 
                        if($_GET['orderBy'] == 'author') {
                       echo 'checked'; 
                    }
                    ?>
                />
                <label for="obA">Author</label>
                
                <input type="radio" name="orderBy" value="quote" id="obQ" 
                    <?php 
                        if($_GET['orderBy'] == 'quote') {
                       echo 'checked'; 
                    }
                    ?>
                />
                <label for="obQ">Quote</label>
                
                <br/>
                <input type="submit" value="Find" name="submit" />
            </form>
            
            <?= findQuote(); ?>
        </div>
    </body>
</html>