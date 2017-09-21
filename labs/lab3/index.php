<?php 

// ACES             = 1, 14, 27, 40
// clubs    1–13    = card
// diamonds 14–26   = card + 13
// hearts   27–39   = card + 26
// spades   40–52   = card + 39

$deck = range(1,41);
shuffle($deck);
// print_r($deck);

$totalPts = 0;

// will display 5 random numbers from deck
function displayHand() {
    global $deck, $totalPts;
    $handPts = 0;
    $handAces = 0;
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
        
        switch($cardVal) {
            case 1:
                echo "<img class='ace' src='img/$cardSuit/$cardVal.png' alt='ace of $cardSuit' />";
                $handAces = $handAces + 1; // $handAces++
                break;
            default:
                echo "<img src='img/$cardSuit/$cardVal.png' alt='$cardSuit card #$cardVal' />";
        }
        
    }
    
    $handPts = $handPts + $cardVal;
    $totalPts = $totalPts + $handPts;
    
    echo "<span> Points: $handPts Aces: ";
    return $handAces;
}

function idWinner() {
    global $player1Aces, $player2Aces;
    
    if($player1Aces > $player2Aces) {
        echo "Player 1 ";
    } else if($player1Aces < $player2Aces) {
        echo "Player 2 ";
    } else {
        echo "Nobody ";
    }
}

// will display 5 imgs of random cards
// function displayRandCards() {
//     $cardSuits = array('clubs', 'diamonds', 'hearts', 'spades');
    
//     for($i = 0; $i < 5; $i++) {
//         $randSuit = $cardSuits[rand(0,3)];
//         $randCard = rand(1,13);
//         echo "<img src='img/$randSuit/$randCard.png' alt='$randSuit, card $randCard' />";
//     }
// }

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
            <span>You: </span>
            <div class="cards">
                <?= 
                
                $player1Aces = displayHand(); 
                
                ?>
            </div>
        </div>
        
        <div class="player">
            <span>PC: </span>
            <div class="cards">
                <?= 
                
                $player2Aces = displayHand();
                
                ?>
            </div>
        </div>
        
        <h3><?= idWinner(); ?> wins <?= $totalPts ?> points!</h3>
        
        <footer>
            <br /><hr>
            <p>2017 &copy; Heather O'Connell CST 352</p>
        </footer>

    </body>
</html>