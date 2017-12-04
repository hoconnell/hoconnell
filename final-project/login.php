
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
                <div id="loginButton">Back</div>
            </header>
            
            <main>
                
                <div id='login'>
                    <h3>Login</h3>
                    <?php 
                                            
                        if($_GET['cred'] == "false") {
                            echo "<p class='error'>Your username and/or password did not match our records. Please try again.<p>";
                        }
                            
                    ?>
                    <form method="POST" action="php/loginProcess.php">
                        Username: <input type="text" name="username"/>
                        <br/>
                        Password: <input type="password" name="password"/>
                        <input type="submit" value="Login!" name="submitLogin"/>
                    </form>
                </div>
                
            </main>
            
            <footer>
                <p>2017 &copy; Heather O'Connell</p>
            </footer>
        </div>
        
        <script>
            $(document).ready(function() {
                
                $('input[type=text]').focus();
                
                
                $('#loginButton').click(function() {
                    window.location.href = 'index.php';
                });
                
            });
        </script>

    </body>
</html>