<?php
    function chooseTileColor() {
        $randNum = rand(0,2);
        
        switch($randNum) {
            case 0: $color = '225, 220, 0';
                break;
            case 1: $color = '0, 150, 225';
                break;
            case 2: $color = '150, 100, 200';
                break; 
        }
        
        echo "
            td {
                background: rgba($color, .7);
            }
            td:hover {
                background: rgb($color);
            }
        ";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HW 2: Japanese Wordsearch</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet" />
        <!--<link rel="stylesheet" href="css/styles.css" type="text/css" />-->
        
        <style>
            
            <?php
                chooseTileColor();
            ?>
        </style>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
        
        <?php

            // IMPORTANT!! kana x3 length of romaji string

            $words = array("たんご", "けんさく", "パソコン", "クラス", "どういれつ", "がくせい", "おもしろい", "ストリング", "アレイ", "もじれつ");
            shuffle($words);
            
            $kanaStr = 'あいうえおかきくけこさしすせそたちつてとなにぬねのはひふへほまみむめもやゆよわをんがぎぐげござじずぜぞだぢづでどばびぶべぼぱぴぷぺぽアイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨワヲンガギグゲゴダヂヅデドバビブベボパピプペポザジズゼゾ';
            $kanaArray = str_split($kanaStr, 3);
            shuffle($kanaArray);
            
            function chooseSearchWords() {
                global $words;
                $searchWords = array();
                $wordAmount = rand(1,3);
                
                for($i = 0; $i < $wordAmount; $i++) {
                    $lastWord = array_pop($words);
                    array_push($searchWords, $lastWord);
                }
                
                return $searchWords;
            }
            
            $searchWords = chooseSearchWords();
            
            function displaySearchWords() {
                global $searchWords;
                
                foreach($searchWords as $word) {
                    echo "<p>$word</p>";
                }
            }
            
            function makeTable() {
                global $kanaArray;
                global $searchWords;
                
                $wordStr = join($searchWords);
                $realStrLen = strlen($wordStr)/3;
                // echo $wordStr . "  " . $realStrLen;
                
                $charArray = str_split($wordStr, 3);
                
                if($realStrLen <= 10) {
                    // echo "<br/> <=10 <br/>";
                    
                    $numNeed = 100 - $realStrLen;
                    $realNumNeed = $numNeed * 3;
                    
                    // echo $realStrLen . "  " . $numNeed . "<br/>";
                    
                    for($i = 0; $i < $numNeed; $i++) {
                        array_push($charArray, $kanaArray[$i]);
                    }
                    
                    // shuffle($charArray);
                    // print_r($charArray);
                    
                } else {
                    // more than 10 characters = need to re-choose words
                    header("Refresh:0");
                }
                
                for($i = 0; $i < 10; $i++) {
                    echo "<tr></tr>";
                    for($j = 0; $j < 10; $j++) {
                        
                        $char = array_pop($charArray);
                        echo "<td><div class='content'>$char</div></td>";
                    }
                    
                }
            }
    
        ?>
        
        <h1>Japanese Word Search</h1>
        <div id="table">
            <table>
                <?= makeTable(); ?>
            </table>
        </div>
        
        <div id="words">
            <h3>Search for these words:</h3>
            <?= displaySearchWords(); ?>
        </div>
        
        <footer>
            <hr>
            <p>2017 &copy; Heather O'Connell CST 352</p>
            <p>Image courtesy of <a href="http://pixabay.com" target="_blank">Pixabay</a></p>
        </footer>

    </body>
</html>