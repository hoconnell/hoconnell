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
    <title> Hw 4: JavaScript/jQuery Quiz </title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/earlyaccess/sawarabimincho.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" type="text/css" />
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- 
            different input types (fill in the blank, multiple choice, dropdown menu)
            3 javascript, 3 jquery
            right answer below question
            wrong: red batsu ;;;; right: green maru
            score at bottom; congratz if over 80%
        -->
</head>

<body>
    <div id='content'>

        <div id='header'>
            <h1>Japanese Colors Quiz</h1>
            <p>How well do you know your colors in Japanese?</p>
            <h3 class='score'></h3>
            
            <div class='divider'></div>
        </div>

        <div id='quiz'>
            <div class='question'>
                <h3>私は黒いTシャツを着ています。What color is my T-shirt?</h3>

                <select name='q1' id='q1'>
                    <option value=''>- Select -</option>
                    <?= displayColorOptions(); ?>
                </select>

                <div id='q1ans' class='answer'>
                    <img id="q1ansY" src='img/maru.png' alt='correct' />
                    <img id="q1ansN" src='img/batsu.png' alt='incorrect'/>
                    
                    Correct answer: Black（黒い）
                </div>
            </div>
            
            <div class='question'>
                <h3>What is the correct pronunciation of 灰色?</h3>

                <input type='radio' name='q2' value='hairo' id='q2hairo'>
                <label for='q2hairo'>はいろ</label>
                &nbsp;

                <input type='radio' name='q2' value='hairou' id='q2hairou'>
                <label for='q2hairou'>はいろう</label>
                &nbsp;

                <input type='radio' name='q2' value='haiiro' id='q2haiiro'>
                <label for='q2haiiro'>はいいろ</label>

                <div id='q2ans' class='answer'>
                    <img id="q2ansY" src='img/maru.png' alt='correct' />
                    <img id="q2ansN" src='img/batsu.png' alt='incorrect'/>
                    
                    Correct answer: はいいろ
                </div>
            </div>
            
            <div class='question'>
                <h3>What is the meaning of of 灰色?</h3>

                <select name='q3' id='q3'>
                    <option value=''>- Select -</option>
                    <?= displayColorOptions(); ?>
                </select>

                <div id='q3ans' class='answer'>
                    <img id="q3ansY" src='img/maru.png' alt='correct' />
                    <img id="q3ansN" src='img/batsu.png' alt='incorrect'/>
                    
                    Correct answer: Gray
                </div>
            </div>
            
            <div class='question'>
                <h3>Write オレンジ in romaji (roman characters):</h3>

                <input type='text' id='q4'>

                <div id='q4ans' class='answer'>
                    <img id="q4ansY" src='img/maru.png' alt='correct' />
                    <img id="q4ansN" src='img/batsu.png' alt='incorrect'/>
                    
                    Correct answer: orenji
                </div>
            </div>
            
            <div class='question'>
                <h3>Which of these does NOT mean "pink" in Japanese?</h3>

                <input type='radio' name='q5' value='pinku' id='q5pinku'>
                <label for='q5pinku'>ピンク</label>
                &nbsp;

                <input type='radio' name='q5' value='momoiro' id='q5momoiro'>
                <label for='q5momoiro'>桃色</label>
                &nbsp;

                <input type='radio' name='q5' value='roze' id='q5roze'>
                <label for='q5roze'>ロゼ</label>

                <div id='q5ans' class='answer'>
                    <img id="q5ansY" src='img/maru.png' alt='correct' />
                    <img id="q5ansN" src='img/batsu.png' alt='incorrect'/>
                    
                    Correct answer: ロゼ (means pink wine）
                </div>
            </div>
            
            <div class='question'>
                <h3>What is the correct way to say "black & white" in Japanese?</h3>

                <input type='radio' name='q6' value='shirokuro' id='q6shirokuro'>
                <label for='q6shirokuro'>白黒</label>
                &nbsp;

                <input type='radio' name='q6' value='kuroshiro' id='q6kuroshiro'>
                <label for='q6kuroshiro'>黒白</label>

                <div id='q6ans' class='answer'>
                    <img id="q6ansY" src='img/maru.png' alt='correct' />
                    <img id="q6ansN" src='img/batsu.png' alt='incorrect'/>
                    Correct answer: 白黒
                </div>
            </div>
            
        </div>

        <div id='results'>
            <div class='divider'></div>
            
            <p id='ready'>Ready to check your answers?</p>
            <button id='submit'>See Results</button>
            
            <h3 class='score'></h3>

        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('#submit').click(function() {
                // Update show/hide
                $('.answer').css('display', 'block');
                $('#ready').css('display', 'none');
                $(this).css('display', 'none');
                
                // Disable fields
                $('#q1').prop('disabled', true);
                $('input[name="q2"]').prop('disabled', true);
                $('#q3').prop('disabled', true);
                $('#q4').prop('disabled', true);
                $('input[name="q5"]').prop('disabled', true);
                $('input[name="q6"]').prop('disabled', true);
                
                // Set score
                var score = 0;
                
                // JavaScript for first 3 questions:
                if(document.getElementById('q1').value == 'black') {
                    score++;
                    // console.log('q1');
                    document.getElementById('q1ans').style.background = 'rgba(0, 128, 0, 0.3)';
                    document.getElementById('q1ansY').style.display = 'block';
                } else {
                    document.getElementById('q1ans').style.background = 'rgba(255, 0, 0, 0.3)';
                    document.getElementById('q1ansN').style.display = 'block';
                }
                
                if(document.getElementById('q2haiiro').checked == true) {
                    score++;
                    // console.log('q2');
                    document.getElementById('q2ans').style.background = 'rgba(0, 128, 0, 0.3)';
                    document.getElementById('q2ansY').style.display = 'block';
                } else {
                    document.getElementById('q2ans').style.background = 'rgba(255, 0, 0, 0.3)';
                    document.getElementById('q2ansN').style.display = 'block';
                } 
                
                if(document.getElementById('q3').value == 'gray') {
                    score++;
                    // console.log('q3');
                    document.getElementById('q3ans').style.background = 'rgba(0, 128, 0, 0.3)';
                    document.getElementById('q3ansY').style.display = 'block';
                } else {
                    document.getElementById('q3ans').style.background = 'rgba(255, 0, 0, 0.3)';
                    document.getElementById('q3ansN').style.display = 'block';
                } 
                
                // jQuery for last 3 questions:
                if($('#q4').val() == 'orenji') {
                    score++;
                    // console.log('q4');
                    $('#q4ans').css('background', 'rgba(0, 128, 0, 0.3)');
                    $('#q4ansY').css('display', 'block');
                } else {
                    $('#q4ans').css('background', 'rgba(255, 0, 0, 0.3)');
                    $('#q4ansN').css('display', 'block');
                }
                
                if(document.getElementById('q5roze').checked == true) {
                    score++;
                    // console.log('q5');
                    $('#q5ans').css('background', 'rgba(0, 128, 0, 0.3)');
                    $('#q5ansY').css('display', 'block');
                } else {
                    $('#q5ans').css('background', 'rgba(255, 0, 0, 0.3)');
                    $('#q5ansN').css('display', 'block');
                }
                
                if(document.getElementById('q6shirokuro').checked == true) {
                    score++;
                    // console.log('q6');
                    $('#q6ans').css('background', 'rgba(0, 128, 0, 0.3)');
                    $('#q6ansY').css('display', 'block');
                } else {
                    $('#q6ans').css('background', 'rgba(255, 0, 0, 0.3)');
                    $('#q6ansN').css('display', 'block');
                }
                
                console.log('score = ' + score);
                
                // Scoring info
                var scorePercent = Math.round((score / 6) * 100);
                $('.score').html('Your Score: ' + scorePercent + '% <br/> You got ' + score + ' out of 6 questions correct!');
                
                if(scorePercent >= 80) {
                    $('.score').prepend('<h4 style="color:green; text-transform:uppercase">Congradulations!</h4>');
                }
                
                // Refresh page
                $('#results').append('<button id="reset">Retake Quiz</button>');
                $('#reset').click(function() {
                    location.reload();
                });
            });
        });
    </script>
</body>

</html>
