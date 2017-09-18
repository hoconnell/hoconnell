<?php 

$symbols = array("lemon", "cherry", "orange");

// ----adding and removing items

$symbols[] = "grapes";
array_push($symbols, "seven");
array_pop($symbols); // will retrieve and remove last item in array

// ----rearranging items

// sort($symbols); // will sort a–z
// rsort($symbols); //will sort z–a
shuffle($symbols); 

// ----printing whole array/single item

// print_r($symbols); // output: Array ( [0] => lemon [1] => cherry [2] => orange [3] => grapes [4] => seven )
// var_dump($symbols); // output: /home/ubuntu/workspace/hoconnell/practice/arrays.php:21: array(4) { [0] => string(6) "cherry" [1] => string(6) "grapes" [2] => string(5) "lemon" [3] => string(6) "orange" }
// echo $symbols[0]; // output: lemon

// ----print to page

function displaySymbol($symbol) {
    echo "<img src='../labs/lab2/img/$symbol.png' width='50px'/>";
}

// ----print to page single symbol, random symbol, all symbols

// displaySymbol($symbols[4]);
// displaySymbol($symbols[array_rand($symbols)]);

// for ($i = 0; $i < 5; $i++) {
//     displaySymbol($symbols[$i]);
//     // echo "<br />"; 
// }

foreach ($symbols as $sym) {
    displaySymbol($sym);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP Arrays Practice</title>
    </head>
    <body>
        
        <?php  ?>

    </body>
</html>