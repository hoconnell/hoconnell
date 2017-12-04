<?php
session_start();

if(!isset($_SESSION['username'])) {
    //if not set, user must login
    header('Location: index.php');
    exit;
}

// echo $_SESSION['adminFullName'];

include '../dbConn.php';
$dbConn = getDbConn('final');

function itemList() {
    global $dbConn;
    
    $sql = "SELECT itemId, item, categoryId, category
            FROM m_items
            NATURAL JOIN m_categories";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // print_r($records);
    
    return $records;
}

function reportNum() {
    global $dbConn;
    
    $sql = "SELECT COUNT(itemId) AS count
            FROM m_items";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // print_r($records);
    return($record);
}

function reportAvg() {
    global $dbConn;
    
    $sql = "SELECT AVG(price) AS average
            FROM m_items";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // print_r($records);
    return($record);
}

function reportMin() {
    global $dbConn;
    
    $sql = "SELECT MIN(price) AS cheapest
            FROM m_items";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // print_r($records);
    return($record);
}

function reportMax() {
    global $dbConn;
    
    $sql = "SELECT MAX(price) AS expensive
            FROM m_items";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // print_r($records);
    return($record);
}

$rNum = reportNum();
$rAvg = reportAvg();
$rMin = reportMin();
$rMax = reportMax();

$rAvg = $rAvg[average];

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Final Project: Homepage </title>
        <meta charset='utf-8'>
        <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:300,800|Open+Sans:400,700|Sofia" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script src="https://code.jquery.com/jquery.min.js"></script>
    </head>
    <body>
        <div id='content'>
            <header>
                <h1>Koshka Café</h1>
                <div id="loginButton">Logout</div>
            </header>
            
            <main>
                <h3 class="welcome">Welcome <?= $_SESSION['adminFullName']; ?></h3>
                
                <div id="reports">
                    <h2 class="category">Reports</h2>
                    <div id="answer">
                        <h3></h3>
                    </div>
                    <div id="options">
                        <h4 id="oNum">Number of menu items</h4>
                        <h4 id="oAvg">Average price of menu item</h4>
                        <h4 id="oMin">Cheapest menu item</h4>
                        <h4 id="oMax">Most expensive menu item</h4>
                    </div>
                    
                </div>
                
                <div id="delUpdate">
                    
                    <h2 class="category">Menu Items</h2>
                    <button id="addItem">Add Item</button>
                    <?php 
                    
                    $items = itemList();
                    
                    foreach($items as $item) {
                        echo "<div class='upDelList'>";
                        echo "<form class='updateDelete' action='updateItem.php'>
                            <input type='hidden' name='itemId' value='" . $item['itemId'] . "' />
                            <input type='submit' value='Update' />
                        </form>";
                        
                        echo "<form class='updateDelete' action='deleteItem.php' onsubmit='return confirmDelete();'>
                            <input type='hidden' name='itemId' value='" . $item['itemId'] . "' />
                            <input type='submit' value='Delete'>
                        </form>";
                        
                        echo "<span class='upDelItem'>" . $item['item'] . "</span> (" . lcfirst($item['category']) . ")<br>";
                        echo "</div>";
                    }
                    
                    
                    ?>
                </div>
                
            </main>
            
            <footer>
                <p>2017 &copy; Heather O'Connell</p>
            </footer>
        </div>
        
        <script>
            $('#loginButton').click(function() {
                window.location.href = 'php/logoutProcess.php';
            });
            
            $('#options h4').hover(function() {
                $(this).css('color', '#e501b8').css('cursor', 'pointer');
            }, function() {
                $(this).css('color', 'black');
            });
            
            $('.upDelList').hover(function() {
                $(this).css('background-color', 'rgba(2, 121, 127, 0.2)');
            }, function() {
                $(this).css('background-color', 'white');
            });
            
            $('#oNum').click(function() {
                $('#answer').show();
                $('#answer h3').html( '<?= $rNum[count]; ?>' );
            });
            
            $('#oAvg').click(function() {
                $('#answer').show();
                var a = <?= $rAvg ?>;
                $('#answer h3').html( '$' + a.toFixed(2) );
            });
            
            $('#oMin').click(function() {
                $('#answer').show();
                $('#answer h3').html('$' + <?= $rMin[cheapest] ?>.toFixed(2));
            });
            
            $('#oMax').click(function() {
                $('#answer').show();
                $('#answer h3').html('$' + <?= $rMax[expensive] ?>.toFixed(2));
            });
        </script>

    </body>
</html>