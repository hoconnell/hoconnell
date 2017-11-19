
<!DOCTYPE html>
<html>
    <head>
        <title> Final Project: Homepage </title>
        <meta charset='utf-8'>
        <link href="https://fonts.googleapis.com/css?family=Arima+Madurai|Open+Sans|Sofia" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script src="https://code.jquery.com/jquery.min.js"></script>
    </head>
    <body>
        <div id='content'>
            <header>
                <h1>Koshka Café</h1>
                <h4>Menu</h4>
            </header>
            
            <main>
                
                
            </main>
            
            <footer>
                <p>2017 &copy; Koshka Café<br/>Site by Heather O'Connell</p>
                <h5>Login</h5>
                <?php 
                                    
                if($_GET['cred'] == "false") {
                    echo "<script>#login { display: block; }</script>";
                    echo "<p class='error'>Your username and/or password did not match our records. Please try again.<p>";
                }
                    
                ?>
                <div id='login'>
                    <form method="POST" action="php/loginProcess.php">
                        Username: <input type="text" name="username"/><br/>
                        Password: <input type="password" name="password"/><br/>
                        <input type="submit" value="Login!" name="submitLogin"/>
                    </form>
                </div>
            </footer>
        </div>
        
        <script>
            $('footer h5').click(function() {
                $('#login').toggle();
                $('.error').hide();
            });
        </script>

    </body>
</html>