<?php
session_start();

if(!isset($_SESSION['username'])) {
    //if not set, user must login
    header('Location: index.php');
    exit;
}

include '../dbConn.php';
$dbConn = getDbConn('final');

function displayCatOpt() {
    global $dbConn;
    
    $sql = "SELECT categoryId, category
            FROM m_categories";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();
    
    foreach($records as $record) {
        echo "<option value='" . $record['categoryId'] . "'>" . $record['category'] . "</option>";
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
                
                <form method="POST" id="addForm">
                    <!-- 
                        item name
                        price
                        description
                        category >>>> dropdown
                        upload image
                    -->
                    
                    <h3 id="addTitle">Add Item to Menu</h3>
                    
                    <?php
                    if(isset($_POST['addSubmit'])) {
                        // echo "Form was submitted!";
                        
                        // print_r($_POST);
                        
                        $sql = "INSERT INTO m_items
                                (item, price, item_description, categoryId)
                                VALUES 
                                (:item, :price, :description, :cat)";
                                
                        $np = array(); // named parameters
                        $np[':item'] = $_POST['iName'];
                        $np[':price'] = $_POST['iPrice'];
                        $np[':description'] = $_POST['iDescription'];
                        $np[':cat'] = $_POST['iCat'];
                        
                        $stmt = $dbConn->prepare($sql);
                        $stmt->execute($np);
                        
                        echo " <h4 class='error' style='display:block'>Item added to menu!</h4>";
                    }
                    ?>
                    
                    <h4>Item Name: </h4>
                    <input type="text" name="iName" id="iName" required/>
                    
                    <br/>
                    
                    <h4>Price: </h4>
                    <input type="number" name="iPrice" min="0" max="25" step=".01" placeholder="0.00" required/>
                    
                    <br/>
                    
                    <div class="addSec">
                        <h4>Description: </h4>
                        <textarea name="iDescription" rows="4"></textarea>
                    </div>
                    
                    <h4>Category: </h4>
                    <select name="iCat" required>
                        <option value="">Select a Category</option>
                        <?= displayCatOpt(); ?>
                    </select>
                    
                    <br/>
                    
                    <!--<h4>Image: </h4>-->
                    
                    <input type="submit" value="Add New Item" name="addSubmit" />
                    
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
                    
                    $('#iName').focus();
                    
                    
                });
                
            </script>
        </div>
    </body>
</html>