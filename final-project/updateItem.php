<?php
session_start();

if(!isset($_SESSION['username'])) {
    //if not set, user must login
    header('Location: index.php');
    exit;
}

include '../dbConn.php';
$dbConn = getDbConn('final');

function getItemInfo() {
    global $dbConn;
    
    $sql = "SELECT *
            FROM m_items
            WHERE itemId = :itemId";
    
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute( array(':itemId'=>$_GET['itemId']) );
    
    $record = $stmt -> fetch();
    // print_r($record);
    
    return $record;
}

if(isset($_GET['updateSubmit'])) {
$sql = "UPDATE m_items
        SET item = :item,
            price = :price,
            item_description = :description,
            categoryId = :cat
        WHERE itemId = :itemId";

$np = array();
$np[':item'] = $_GET['iName'];
$np[':price'] = $_GET['iPrice'];
$np[':description'] = $_GET['iDescription'];
$np[':cat'] = $_GET['iCat'];
$np[':itemId'] = $_GET['itemId'];

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);

$submitted = " <h4 class='error' style='display:block'>Item successfully updated!</h4>";
}

if(isset($_GET['itemId'])) {
    $itemInfo = getItemInfo();
}

function displayCatOpt() {
    global $dbConn, $itemInfo;
    
    $sql = "SELECT categoryId, category
            FROM m_categories";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();
    
    foreach($records as $record) {
        echo "<option ";
        
        if($itemInfo['categoryId'] == $record['categoryId']) {
            echo 'selected ';
        }
        
        echo "value='" . $record['categoryId'] . "'>" . $record['category'] . "</option>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Final Project: Admin </title>
        <meta charset='utf-8'>
        <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:300,800|Open+Sans:400,700|Sofia" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script src="https://code.jquery.com/jquery.min.js"></script>
    </head>
    <body>
        <div id="content">
            <header>
                <h1>Koshka Café</h1>
                <div id="loginButton">Back</div>
            </header>
            
            <main>
                
                <form method="GET" id="updateForm">
                    <input type="hidden" name="itemId" value="<?=$itemInfo['itemId']?>">
                    
                    <h3 id="updateTitle">Update Menu Item</h3>
                    
                    <?= $submitted ?>
                    
                    <h4>Item Name: </h4>
                    &ensp;<input type="text" name="iName" id="iName" value="<?= $itemInfo['item'] ?>" />
                    
                    <br/>
                    
                    <h4>Price: </h4>
                    &ensp;$ <input type="number" name="iPrice" min="0" max="25" step=".01" placeholder="0.00" value="<?= $itemInfo['price'] ?>" />
                    
                    <br/>
                    
                    <div class="addSec">
                        <h4>Description: </h4>
                        &ensp;<textarea name="iDescription" rows="4">  <?= $itemInfo['item_description'] ?> </textarea>
                    </div>
                    
                    <h4>Category: </h4>
                    &ensp;<select name="iCat" required>
                        <option value="">Select a Category</option>
                        <?= displayCatOpt(); ?>
                    </select>
                    
                    <br/>
                    
                    <!--<h4>Image: </h4>-->
                    
                    <input type="submit" value="Update Item" name="updateSubmit" />
                    
                </form>
            </main>
            
            <footer>
                <p>2017 &copy; Heather O'Connell</p>
            </footer>
            
            <script>
            
                $(document).ready(function() {
                    $('#loginButton').click(function() {
                        window.location.href = 'admin.php';
                    });
                    
                });
                
            </script>
        </div>
    </body>
</html>