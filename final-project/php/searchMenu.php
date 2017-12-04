<?php

include '../../dbConn.php';
$dbConn = getDbConn('final');

$sql = "SELECT itemId, item, price, item_description, categoryId
        FROM m_items
        WHERE 1 
        ";
        
$nP = array();
        
if(isset($_GET['item'])) {
    $sql = $sql . " AND item LIKE :item";
    $np[':item'] = "%" . $_GET['item'] . "%";
}

if(isset($_GET['cat1']) && isset($_GET['cat2']) || isset($_GET['cat1']) && isset($_GET['cat3']) || isset($_GET['cat2']) && isset($_GET['cat3'])) {
    $sql = $sql . " AND (";
    
    if(isset($_GET['cat1'])) {
        $sql = $sql . " categoryId = :cat1 OR ";
        $np[':cat1'] = 1;
    }
    
    if(isset($_GET['cat3'])) {
        
        if(isset($_GET['cat2'])) {
            $sql = $sql . " categoryId = :cat2 OR ";
            $np[':cat2'] = 2;
        }
        
        $sql = $sql . " categoryId = :cat3 ";
        $np[':cat3'] = 3;
    } else {
        if(isset($_GET['cat2'])) {
            $sql = $sql . " categoryId = :cat2 ";
            $np[':cat2'] = 2;
        }
    }
    
    $sql = $sql . ") ";
} else {
    if(isset($_GET['cat1'])) {
        $sql = $sql . " AND categoryId = :cat1 ";
        $np[':cat1'] = 1;
    } else if(isset($_GET['cat2'])) {
        $sql = $sql . " AND categoryId = :cat2 ";
        $np[':cat2'] = 2;
    } else if(isset($_GET['cat3'])) {
        $sql = $sql . " AND categoryId = :cat3 ";
        $np[':cat3'] = 3;
    }
}

if(isset($_GET['minP'])) {
    $sql = $sql . " AND price >= :minP ";
    $np[':minP'] = $_GET['minP'];
}

if(isset($_GET['maxP'])) {
    $sql = $sql . " AND price <= :maxP ";
    $np[':maxP'] = $_GET['maxP'];
}

// echo $sql . "<br/><br/>";
        
$stmt = $dbConn->prepare($sql);
$stmt->execute($np);

$records = $stmt -> fetchAll(PDO::FETCH_ASSOC); // only gets associative array! leave blank to get both assoc and index

// print_r($records);
// echo "<br/><br/><br/>";
echo json_encode($records); // can be uderstood by AJAX
// echo json_last_error();

?>