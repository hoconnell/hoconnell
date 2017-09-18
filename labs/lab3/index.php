<?php 

// ACES             = 1, 14, 27, 40
// clubs    1–13    = card
// diamonds 14–26   = card + 13
// hearts   27–39   = card + 26
// spades   40–52   = card + 39

$deck = range(1,52);
shuffle($deck);
// print_r($deck);

// will display 5 random numbers from deck
function displayHand() {
    global $deck;
    for($i = 0; $i < 5; $i++) {
        $lastCard = array_pop($deck);
        
        if($lastCard <= 13) {
            $cardSuit = 'clubs';
        } else if($lastCard > 13 && $lastCard <= 26) {
            $cardSuit = 'diamonds';
        } else if($lastCard > 26 && $lastCard <= 39) {
            $cardSuit = 'hearts';
        } else if($lastCard > 39 && $lastCard <= 52) {
            $cardSuit = 'spades';
        }
        
        $cardVal = $lastCard % 13;
        
        if($cardVal == 0) {
            $cardVal = 13;
        }
        
        echo "<img src='img/$cardSuit/$cardVal.png' alt='$cardSuit card #$cardVal' />";
    }
}

// will display 5 imgs of random cards
function displayRandCards() {
    $cardSuits = array('clubs', 'diamonds', 'hearts', 'spades');
    
    for($i = 0; $i < 5; $i++) {
        $randSuit = $cardSuits[rand(0,3)];
        $randCard = rand(1,13);
        echo "<img src='img/$randSuit/$randCard.png' alt='$randSuit, card $randCard' />";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3: Ace Poker</title>
        <meta charset="utf=8">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <!-- link to example: http://itcdland.csumb.edu/~milara/cst352/lab3/poker.php -->
        <!-- link to assignment: https://ilearn.csumb.edu/mod/assign/view.php?id=463999 -->
    </head>
    <body>
        
        <h1>Ace Poker</h1>
        <h3>Player with more aces wins all points!</h3>
        
        <div class="player">
            <p>You: </p>
            <div class="cards">
                <?= 
                
                displayHand();
                // displayRandCards(); 
                
                ?>
            </div>
        </div>
        
        <div class="player">
            <p>PC: </p>
            <div class="cards">
                <?= 
                
                displayHand();
                // displayRandCards(); 
                
                ?>
            </div>
        </div>
        
        <br /><hr>
        <footer>
            <p>2017 &copy; Heather O'Connell</p>
        </footer>

    </body>
</html>