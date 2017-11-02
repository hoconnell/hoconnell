<?php
session_start();

if(!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

include '../../../hoconnell/dbConn.php';
$dbConn = getDbConn();

function getAuthorInfo() {
    global $dbConn;
    
    $sql = "SELECT *
            FROM q_author
            WHERE authorId = " . $_GET['authorId'];
    
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    
    $record = $stmt -> fetch();
    // print_r($record);
    
    return $record;
    
}

if(isset($_GET['updateForm'])) {
    $sql = "UPDATE q_author 
            SET firstName = :fName,
                lastName = :lName,
                gender = :gen,
                dob = :dob,
                dod = :dod,
                profession = :profession,
                country = :country,
                picture = :pic,
                biography = :bio 
            WHERE authorId = :authorId";
            // no comma on last in SET!!! make sure :parameterNames match in SET and in array()
    
    $np = array(); // named parameters
    $np[':fName'] = $_GET['firstName'];
    $np[':lName'] = $_GET['lastName'];
    $np[':gen'] = $_GET['gender'];
    $np[':dob'] = $_GET['dob'];
    $np[':dod'] = $_GET['dod'];
    $np[':profession'] = $_GET['profession'];
    $np[':country'] = $_GET['country'];
    $np[':pic'] = $_GET['picture'];
    $np[':bio'] = $_GET['bio'];
    $np[':authorId'] = $_GET['authorId'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    echo "Update form was submitted!";
}

if(isset($_GET['authorId'])) {
    $authorInfo = getAuthorInfo();
}

// if(isset($_POST['updateForm'])) { // checks if fom submitted or not
//     // echo "Form was submitted!";
    
//     $sql = "INSERT INTO q_author
//             (firstName, lastName, gender, dob, dod, profession, country, picture, biography)
//             VALUES 
//             (:fName, :lName, :gen, :dob, :dod, :profession, :country, :pic, :bio)";
            
//     $np = array(); // named parameters
//     $np[':fName'] = $_POST['firstName'];
//     $np[':lName'] = $_POST['lastName'];
//     $np[':gen'] = $_POST['gender'];
//     $np[':dob'] = $_POST['dob'];
//     $np[':dod'] = $_POST['dod'];
//     $np[':profession'] = $_POST['profession'];
//     $np[':country'] = $_POST['country'];
//     $np[':pic'] = $_POST['picture'];
//     $np[':bio'] = $_POST['bio'];
    
//     $stmt = $dbConn->prepare($sql);
//     $stmt->execute($np);
    
//     echo "Author added!";
// }

function dispCountryOpt() {
    global $dbConn, $authorInfo;
    
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
        
        if($authorInfo['country'] == $record['country']) {
            echo 'selected ';
        }
        
        echo "value='" . $record['country'] . "'>" . $record['country'] . "</option>";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 7: Update Author </title>
        
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        
        <h1>Update Author Info</h1>
        
        <fieldset>
            <legend>Adding a New Author</legend>
            
            <form method="GET">
                <input type="hidden" name="authorId" value="<?=$authorInfo['authorId']?>">
                First Name: <input type="text" name="firstName" value="<?= $authorInfo['firstName'] ?>"/><br/>
                Last Name: <input type="text" name="lastName" value="<?= $authorInfo['lastName'] ?>"/><br/>
                Gender: <input type="radio" name="gender" id="genM" value="M"
                        <?php 
                            if($authorInfo['gender'] == 'M') {
                                echo " checked ";
                            }
                        ?>
                        />
                    <label for="genM"> Male</label>
                    <input type="radio" name="gender" id="genF" value="F"
                        <?php 
                            if($authorInfo['gender'] == 'F') {
                                echo " checked ";
                            }
                        ?>
                        />
                    <label for="genM"> Female</label><br/>
                Date of Birth: <input type="date" name="dob" value="<?= $authorInfo['dob'] ?>" /><br/>
                Date of Death: <input type="date" name="dod" value="<?= $authorInfo['dod'] ?>"/><br/>
                Profession: <input type="text" name="profession" value="<?= $authorInfo['profession'] ?>"/><br/>
                
                Country: <select name="country">
                            <option value="">Select a Country</option>
                            <?= dispCountryOpt(); ?>
                        </select><br/>
                Picture URL:  <input type="text" name="picture" value="<?= $authorInfo['picture'] ?>"/><br/>
                Biography:  <textarea rows="4" cols="50" name="bio"> <?= $authorInfo['biography'] ?> </textarea><br/>
                <br/>
                <input type="submit" value="Update Author" name="updateForm"/>
                
            </form>
            
        </fieldset>
        
        <h3><a href="admin.php">Back to Admin Page</a></h3>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </body>
</html>