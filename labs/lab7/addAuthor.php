<?php
session_start();

if(!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

include '../../dbConn.php';
$dbConn = getDbConn();

if(isset($_POST['addForm'])) { // checks if fom submitted or not
    // echo "Form was submitted!";
    
    $sql = "INSERT INTO q_author
            (firstName, lastName, gender, dob, dod, profession, country, picture, biography)
            VALUES 
            (:fName, :lName, :gen, :dob, :dod, :profession, :country, :pic, :bio)";
            
    $np = array(); // named parameters
    $np[':fName'] = $_POST['firstName'];
    $np[':lName'] = $_POST['lastName'];
    $np[':gen'] = $_POST['gender'];
    $np[':dob'] = $_POST['dob'];
    $np[':dod'] = $_POST['dod'];
    $np[':profession'] = $_POST['profession'];
    $np[':country'] = $_POST['country'];
    $np[':pic'] = $_POST['picture'];
    $np[':bio'] = $_POST['bio'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    echo "Author added!";
}

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
        
        if($_POST['aCountry'] == $record['country']) {
            echo 'selected ';
        }
        
        echo "value='" . $record['country'] . "'>" . $record['country'] . "</option>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 7: Add New Author</title>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        
        <h1>Add New Author</h1>
        
        <fieldset>
            <legend>Adding a New Author</legend>
            
            <form method="POST">
                First Name: <input type="text" name="firstName" required/><br/>
                Last Name: <input type="text" name="lastName" required/><br/>
                Gender: <input type="radio" name="gender" id="genM" value="M" required/>
                    <label for="genM"> Male</label>
                    <input type="radio" name="gender" id="genF" value="F"/>
                    <label for="genM"> Female</label><br/>
                Date of Birth: <input type="date" name="dob" required/><br/>
                Date of Death: <input type="date" name="dod" required/><br/>
                Profession: <input type="text" name="profession" required/><br/>
                Country: <select name="country" required>
                            <option value="">Select a Country</option>
                            <?= dispCountryOpt(); ?>
                        </select><br/>
                Picture URL:  <input type="text" name="picture" required/><br/>
                Biography:  <textarea name="bio"></textarea><br/>
                <br/>
                <input type="submit" value="Add New Author" name="addForm"/>
                
            </form>
            
        </fieldset>
        
        <h3><a href="admin.php">Back to Admin Page</a></h3>
        

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </body>
</html>