<?php

function cardGame($rand1, $rand2) {
    
    switch($rand1) {
                case 0: $card = "ten";
                        break;
                case 1: $card = "jack";
                        break;
                case 2: $card = "queen";
                        break;
                case 3: $card = "king";
                        break;
                case 4: $card = "ace";
                        break;
            }
    echo "<div id='card1'>
            <h2>Human</h2>
            <img src='img/$card.png' alt='$card' />
            </div>";
    switch($rand2) {
                case 0: $card = "ten";
                        break;
                case 1: $card = "jack";
                        break;
                case 2: $card = "queen";
                        break;
                case 3: $card = "king";
                        break;
                case 4: $card = "ace";
                        break;
            }
    echo "<div id='card2'>
            <h2>Computer</h2>
            <img src='img/$card.png' alt='$card' />
            </div>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Challenge 2: Random Card Game </title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        
        <h1>Random Card Game</h1>
        
        <?php 
        
        $randNum1 = rand(0,4);
        $randNum2 = rand(0,4);
        
        cardGame($randNum1, $randNum2);
        
        if ($randNum1 < $randNum2) {
            echo "<p>Computer Wins</p>";
        } else if ($randNum1 == $randNum2) {
            echo "<p>Tie Game</p>";
        } else {
            echo "<p>Human Wins</p>";
        }
        
        ?>

    </body>
</html>