<?php
session_start();

if(!isset($_SESSION['randNum'])) {
    $_SESSION['randNum'] = rand(1,100); // assigns val first time
}

echo "Number to guess: " . $_SESSION['randNum'];


?>
<!DOCTYPE html>
<html>
    <head>
        <title> Sessions: Guess a Number </title>
    </head>
    <body>
        
        <h1>Guess a number form 1 to 100</h1>
        
        <form>
            
            My guess: <input type="text" name="guess"/>
            <br/><br/>
            <input type="submit" value="Submit"/>
            
        </form>

    </body>
</html>