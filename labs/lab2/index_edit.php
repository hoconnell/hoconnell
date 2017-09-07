<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        
        <?php 
        // $randomNum = rand(0,2); // this will generate a random number 0, 1, 2
        
        // OLD VARIABLES ---- INEFFICIENT
        // $symbol7 = "seven";
        // $symbolCher = "cherry";
        // $symbolLem = "lemon";
        
        // ONE WAY TO DO IT ---- NOT GOOD FOR VISUAL IMPAIRMENT
        // $symbol = $randomValue;
        // echo "<img src='img/$symbol.png' alt='$symbol' title='$symbol' width='70' />";
        
        // IF STATEMENT USING OLD VARIABLES ---- INEFFICIENT
        
        // if ($randomNum == 0 ) {
        //     echo "<img src='img/$symbol7.png' alt='$symbol7' title='$symbol7' width='70' />";
        // } else if ($randomValue == 1 ) {
        //     echo "<img src='img/$symbolCher.png' alt='$symbolCher' title='$symbolCher' width='70' />";
        // } else {
        //     echo "<img src='img/$symbolLem.png' alt='$symbolLem' title='$symbolLem' width='70' />";
        // }
        
        // SHORT WAY, BUT CAN'T KEEP TRACK OF WHICH IS WHICH
        
        // function displaySymbol() { // this will repeat the if statement when called
        //     $randomNum = rand(0,2); 
            
        //     if ($randomNum == 0) {
        //         $symbol = "seven";
        //     } else if ($randomNum == 1) {
        //         $symbol = "cherry";
        //     } else {
        //         $symbol = "lemon";
        //     }
        
        //     echo "<img src='img/$symbol.png' alt='$symbol' title='$symbol' width='70' />";
        // }
        
        // // Call function 3 times to display 3 symbols!
        // displaySymbol();
        // displaySymbol();
        // displaySymbol();
        
        // ----NEW (BEST) WAY:
        
        function displaySymbol($randomNum) {
            
            if ($randomNum == 0) {
                $symbol = "seven";
            } else if ($randomNum == 1) {
                $symbol = "cherry";
            } else {
                $symbol = "lemon";
            }
        
            echo "<img src='img/$symbol.png' alt='$symbol' title='$symbol' width='70' />";
        }
        
        // LONG WAY ---- INDIVIDUALLY WRITE OUT EACH ONE (WHAT IF 100???)
        
        // $randomNum1 = rand(0,2); 
        // displaySymbol($randomNum1);
        
        // $randomNum2 = rand(0,2); 
        // displaySymbol($randomNum2);
        
        // $randomNum3 = rand(0,2); 
        // displaySymbol($randomNum3);
        
        for ($i=1; $i<4; $i++) {
            ${"randomNum" . $i} = rand(0,2);
            displaySymbol(${"randomNum" . $i});
        }
        
        // WHERE WE LEFT OFF IN CLASS
        // function displayPoints($num1,$num2,$num3) {
        //     echo "Values are: " . $num1 . $num2 . $num3;
            
            // if ($num1 != $num2 && $num1 != $num3 && $num2 != $num3) {
            //     echo "No match, try again.";
            // } else {
            //     echo "Match!";
            // }
        // }
        
        displayPoints($randomNum1, $randomNum2, $randomNum3);
        
        ?>

    </body>
</html>