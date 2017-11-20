<?php 
$colors = array('red', 'orange', 'yellow', 'green', 'blue', 'purple', 'black', 'gray', 'white', 'brown', 'pink');
sort($colors);

function displayColorOptions() {
    global $colors;
    
    foreach($colors as $color) {
        echo "<option value='" . $color . "'>" . ucfirst($color) . "</option>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title> Hw 5: AJAX Quiz </title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <script src="https://code.jquery.com/jquery.min.js"></script>
</head>

<body>
    <div id='content'>

        <div id='header'>
            <h1>Japanese Colors Quiz</h1>
            <p>How well do you know your colors in Japanese?</p>
            
            <form method="POST" action="loginProcess.php" id="login">
                <fieldset>
                <legend> Sign in to take the quiz! </legend>
                <div id="usernamePw">
                    Username: <input type="text" name="username"/><br/>
                    Password: <input type="password" name="password"/><br/>
                    <span id="userHint"></span>
                    <br/>
                </div>
                <button type="submit" form="login" name="submitLogin" class="loginOut" id="loginButton">Login</button>
                <?php 
        
                if($_GET['cred'] == "false") {
                    echo "<p class='error'>Your username and/or password did not match our records. Please try again.</p>";
                }
                    
                ?>
                </fieldset>
                
            </form> 
            
            <div class='divider'></div>
        </div>

        <div id='quiz'>
            <div class='question'>
                <h3>私は黒いTシャツを着ています。What color is my T-shirt?</h3>

                <select name='q1' id='q1' disabled>
                    <option value=''>- Select -</option>
                    <?= displayColorOptions(); ?>
                </select>
            </div>
            
            <div class='question'>
                <h3>What is the correct pronunciation of 灰色?</h3>

                <input type='radio' name='q2' value='hairo' id='q2hairo' disabled>
                <label for='q2hairo'>はいろ</label>
                &nbsp;

                <input type='radio' name='q2' value='hairou' id='q2hairou' disabled>
                <label for='q2hairou'>はいろう</label>
                &nbsp;

                <input type='radio' name='q2' value='haiiro' id='q2haiiro' disabled>
                <label for='q2haiiro'>はいいろ</label>
            </div>
            
            <div class='question'>
                <h3>What is the meaning of of 灰色?</h3>

                <select name='q3' id='q3' disabled>
                    <option value=''>- Select -</option>
                    <?= displayColorOptions(); ?>
                </select>

            </div>
            
            <div class='question'>
                <h3>Write オレンジ in romaji (roman characters):</h3>

                <input type='text' id='q4' disabled>
            </div>
            
            <div class='question'>
                <h3>Which of these does NOT mean "pink" in Japanese?</h3>

                <input type='radio' name='q5' value='pinku' id='q5pinku' disabled>
                <label for='q5pinku'>ピンク</label>
                &nbsp;

                <input type='radio' name='q5' value='momoiro' id='q5momoiro' disabled>
                <label for='q5momoiro'>桃色</label>
                &nbsp;

                <input type='radio' name='q5' value='roze' id='q5roze' disabled>
                <label for='q5roze'>ロゼ</label>
            </div>
            
            <div class='question'>
                <h3>What is the correct way to say "black & white" in Japanese?</h3>

                <input type='radio' name='q6' value='shirokuro' id='q6shirokuro' disabled>
                <label for='q6shirokuro'>白黒</label>
                &nbsp;

                <input type='radio' name='q6' value='kuroshiro' id='q6kuroshiro' disabled>
                <label for='q6kuroshiro'>黒白</label>
            </div>
            
        </div>

        <div id='results'>
            <div class='divider'></div>

        </div>
        
        <script>
            $('input[name=username]').hover(function() {
                if($('input[name=username]').val() == '') {
                    $(this).focus();
                    $('#userHint').html('Login using username admin, user1, or user2.');    
                }
            }, function() {
                $('#userHint').html('');
            });
            
            $('input[name=password]').hover(function() {
                // console.log($(this).val());
                $(this).focus();
                
                switch($('input[name=username]').val()) {
                    case '': 
                        $('#userHint').html('Please input a username.');
                        break;
                    case 'admin':
                        $('#userHint').html('Password for admin is secrets.');
                        break;
                    case 'user1':
                        $('#userHint').html('Password for user1 is user1.');
                        break;
                    case 'user2':
                        $('#userHint').html('Password for user2 is user2.');
                        break;
                    default:
                        $('#userHint').html($(this).val() + ' is not an existing username.');
                }
            }, function() {
                $('#userHint').html('');
            });
            
            
        </script>

    </div>
</body>

</html>
