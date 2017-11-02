<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 7: Admin Login </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <style>
            .error {
                color:red;
            }
        </style>
    </head>
    <body>
        
        <h1>Admin Login</h1>
        
        <form method="POST" action="loginProcess.php">
            Username: <input type="text" name="username"/><br/>
            Password: <input type="password" name="password"/><br/>
            
            <input type="submit" value="Login!" name="submitLogin"/>
            
            
            
        </form>
        
        <?php 
        
        if($_GET['cred'] == "false") {
            echo "<h3 class='error'>Your username and/or password did not match our records. Please try again.</h3>";
        }
            
        ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </body>
</html>