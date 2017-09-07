<?php
    function displayRandColor() {
        return "rgba(" . rand(0,255) . "," . rand(0,255) . "," . rand(0,255) . "," . rand(0,100)/100 . ");";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Practice Exercise 1: Random Background Color</title>
        <meta charset="utf-8" />
        <style>
            body {
                /* C9 doesn't recognize php in css */
                
                <?php 
                    echo "background-color:" . displayRandColor() . ";";
                    
                    // $r = rand(0,255);
                    // $g = rand(0,255);
                    // $b = rand(0,255);;
                    // $a = rand(0,100)/100;
                    // echo "background-color: rgba($r,$g,$b,$a);";
                    
                    // echo "background-color: rgba(" . rand(0,255) . "," . rand(0,255) . "," . rand(0,255) . "," . rand(0,100)/100 . ");";
                ?>
            }
            
            h1 {
                
                <?php 
                    echo "color:" . displayRandColor() . ";
                    background-color:" . displayRandColor() . ";";
                ?>
            }
            
            h2 {
                background-color: <?= displayRandColor() ?>;
            }
        </style>
    </head>
    <body>
        
        <h1>Random Text Color!</h1>
        
        <h2>Random Text Background Color!</h2>

    </body>
</html>