<?php

function displaySymbol($randomNum, $reel) {
            
            switch($randomNum) {
                case 0: $symbol = "seven";
                        break;
                case 1: $symbol = "cherry";
                        break;
                case 2: $symbol = "lemon";
                        break;
                case 3: $symbol = "grapes";
                        break;
            }
        
            echo "<img id='reel$reel' src='img/$symbol.png' alt='$symbol' title='" . ucfirst($symbol) . "' width='70' />";
}
        
function displayPoints($num1, $num2, $num3) {
            
            echo "<div id='output'>";
            
            if ($num1 == $num2 && $num2 == $num3) {
                switch($num1) {
                    case 0: $totalPts = 1000;
                            echo "<h1>Jackpot!</h1> 
                                    <audio controls autoplay>
                                        <source src='aud/jackpot.mp3' type='audio/mpeg' >
                                    </audio>";
                            break;
                    case 1: $totalPts = 500;
                            break;
                    case 2: $totalPts = 250;
                            break;
                    case 3: $totalPts = 900;
                            break;
                }
                
                echo "<h2>You won $totalPts points!</h2>";
                
            } else {
                echo "<h3>Try Again!</h3>";
            }
            
            echo "</div>";
}

function play() {
            
        
        for ($i=1; $i<4; $i++) {
            ${"randomNum" . $i} = rand(0,3);
            displaySymbol(${"randomNum" . $i}, $i);
        }
        
        displayPoints($randomNum1, $randomNum2, $randomNum3, $randomNum4);
        
        }

?>