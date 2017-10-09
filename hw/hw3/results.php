<!DOCTYPE html>
<html>
    <head>
        <title> Hw 4: HTML Forms </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style> @import url('css/styles.css'); </style>
        <!-- 
            assignment: https://docs.google.com/document/d/1bUmh-Cbeu2VJ3rKDpAkG9N0WPiDreS2FYRZxfpx6_dA/edit
            sign dates: https://en.wikipedia.org/wiki/Zodiac#Table_of_dates
        -->
    </head>
    <body>
        
        <?php 
            $name = $_GET["name"];
            $month = $_GET["month"];
            $day = $_GET["day"];
            $showStone = $_GET["showStone"];
            $showFlower = $_GET["showFlower"];
            $showSign = $_GET["showSign"];
            $showColor = $_GET["showColor"];
            $showName = $_GET["showName"];
            
            switch($month) {
                    case "January":
                        $color = "caramel";
                        $colorVal = "C37C54";
                        $stone = "Garnet";
                        $stoneWords = "friendship & trust";
                        $flower = "Carnation & Snowdrop";
                        $flowerWords = "fascination, distinction, & love";
                        if($day <= 20) { // 1-20
                            $sign = "capricorn";
                        } else { // 21-
                            $sign = "aquarius";
                        }
                        break;
                    case "February":
                        $color = "sheer lilac";
                        $colorVal = "B793C0";
                        $stone = "Amethyst";
                        $stoneWords = "a balanced mindset";
                        $flower = "Primrose";
                        $flowerWords = "modesty, distinction, & virtue";
                        if($day < 20) { // 1-19
                            $sign = "aquarius";
                        } else { // 20-
                            $sign = "pisces";
                        }
                        break;
                    case "March":
                        $color = "fair aqua";
                        $colorVal = "B8E2DC";
                        $stone = "Aquamarine";
                        $stoneWords = "youth, health, & hope";
                        $flower = "Daffodil";
                        $flowerWords = "spring, rebirth, domestic happiness, & vanity";
                        if($day <= 20) { // 1-20
                            $sign = "pisces";
                        } else { // 21-
                            $sign = "aries";
                        }
                        break;
                    case "April":
                        $color = "cayenne";
                        $colorVal = "DA4A52";
                        $stone = "Diamond";
                        $stoneWords = "love";
                        $flower = "Sweat Pea";
                        $flowerWords = "good-bye & blissful pleasure";
                        if($day <= 20) { // 1-20
                            $sign = "aries";
                        } else { // 21-
                            $sign = "taurus";
                        }
                        break;
                    case "May":
                        $color = "bud green";
                        $colorVal = "79B465";
                        $stone = "Emerald";
                        $stoneWords = "rebirth & love";
                        $flower = "Hawthorne & Lily of the Valley";
                        $flowerWords = "happiness, humility, & sweetness";
                        if($day <= 21) { // 1-21
                            $sign = "taurus";
                        } else { // 22-
                            $sign = "gemini";
                        }
                        break;
                    case "June":
                        $color = "aspen gold";
                        $colorVal = "FFD858";
                        $stone = "Pearl & Alexandrite";
                        $stoneWords = "intuition, creativity, & imagination";
                        $flower = "Rose & Honeysuckle";
                        $flowerWords = "love, gratitude, & appreciation";
                        if($day <= 21) { // 1-21
                            $sign = "gemini";
                        } else { // 22-
                            $sign = "cancer";
                        }
                        break;
                    case "July":
                        $color = "soft pink";
                        $colorVal = "F2D8CD";
                        $stone = "Ruby";
                        $stoneWords = "love, health, & wisdom";
                        $flower = "Water Lily & Delphinium";
                        $flowerWords = "joyful, fickleness, & sweetness";
                        if($day <= 22) { // 1-22
                            $sign = "cancer";
                        } else { // 23-
                            $sign = "leo";
                        }
                        break;
                    case "August":
                        $color = "sun orange";
                        $colorVal = "F48037";
                        $stone = "Peridot & Spinel";
                        $stoneWords = "power, influence, & protection from harm";
                        $flower = "Poppy & Gladiolus";
                        $flowerWords = "moral integrity";
                        if($day <= 23) { // 1-23
                            $sign = "leo";
                        } else { // 24-
                            $sign = "virgo";
                        }
                        break;
                    case "September":
                        $color = "baja blue";
                        $colorVal = "5F6DB0";
                        $stone = "Sapphire";
                        $stoneWords = "loyalty, trust, & protection from harm";
                        $flower = "Morning Glory & Aster";
                        $flowerWords = "daintiness, love, & magic";
                        if($day <= 23) { // 1-23
                            $sign = "virgo";
                        } else { // 24-
                            $sign = "libra";
                        }
                        break;
                    case "October":
                        $color = "cerulean";
                        $colorVal = "9BB7D4";
                        $stone = "Tourmaline & Opal";
                        $stoneWords = "purity, innocence, hope, & faith";
                        $flower = "Calendula & Marigold";
                        $flowerWords = "winning grace, protection, comfort, healing, & lovable";
                        if($day <= 23) { // 1-23
                            $sign = "libra";
                        } else { // 24-
                            $sign = "scorpio";
                        }
                        break;
                    case "November":
                        $color = "claret red";
                        $colorVal = "C14A64";
                        $stone = "Citrine & Topaz";
                        $stoneWords = "success, prosperity, protection, & healing";
                        $flower = "Chrysanthemum";
                        $flowerWords = "cheerfulness, friendship, & abundance";
                        if($day <= 22) { // 1-22
                            $sign = "scorpio";
                        } else { // 23-
                            $sign = "sagittarius";
                        }
                        break;
                    case "December":
                        $color = "pagoda blue";
                        $colorVal = "128191";
                        $stone = "Zircon, Tanzanite, & Turquoise";
                        $stoneWords = "prosperity, honor, wisdom, healing, wealth, luck, & protection from evil";
                        $flower = "Holly & Narcissus";
                        $flowerWords = "sweetness, self-esteem, & vanity";
                        if($day <= 21) { // 1-21
                            $sign = "sagittarius";
                        } else { // 22-
                            $sign = "capricorn";
                        }
                        break;
                        
            }
            
            switch($sign) {
                case "aries":
                    $signPos = "progressive, courageous, determined, confident, enthusiastic, optimistic, honest, & passionate";
                    $signNeg = "impatient, moody, short-tempered, impulsive, & aggressive";
                    break;
                case "taurus":
                    $signPos = "reliable, patient, practical, devoted, responsible, & stable";
                    $signNeg = "stubborn, possessive, & uncompromising";
                    break;
                case "gemini":
                    $signPos = "gentle, affectionate, curious, adaptable, & ability to learn quickly and exchange ideas";
                    $signNeg = "nervous, inconsistent, & indecisive";
                    break;
                case "cancer":
                    $signPos = "tenacious, highly imaginative, loyal, emotional, sympathetic, & persuasive";
                    $signNeg = "moody, pessimistic, suspicious, manipulative, & insecure";
                    break;
                case "leo":
                    $signPos = "creative, passionate, generous, warm-hearted, cheerful, & humorous";
                    $signNeg = "arrogant, stubborn, self-centered, lazy, & inflexible";
                    break;
                case "virgo":
                    $signPos = "loyal, analytical, kind, hardworking, & practical";
                    $signNeg = "shyness, worry, overly critical of self and others, & all work and no play";
                    break;
                case "libra":
                    $signPos = "cooperative,diplomatic, gracious, fair-minded, & social";
                    $signNeg = "indecisive, avoids confrontations, will carry a grudge, & self-pity";
                    break;
                case "scorpio":
                    $signPos = "resourceful, brave, passionate, stubborn, & a true friend";
                    $signNeg = "distrusting, jealous, secretive, & violent";
                    break;
                case "sagittarius":
                    $signPos = "generous, idealistic, & great sense of humor";
                    $signNeg = "promises more than can deliver, very impatient, & will say anything no matter how undiplomatic";
                    break;
                case "capricorn":
                    $signPos = "responsible, disciplined, self-control, & good managers";
                    $signNeg = "know-it-all, unforgiving, condescending, & expecting the worst";
                    break;
                case "aquarius":
                    $signPos = "progressive, original, independent, & humanitarian";
                    $signNeg = "runs from emotional expression, temperamental, uncompromising, & aloof";
                    break;
                case "pisces":
                    $signPos = "compassionate, artistic, intuitive, gentle, wise, & musical";
                    $signNeg = "fearful, overly trusting, sad, desire to escape reality, & can be a victim or a martyr";
                    break;
            }
            
            function displayAnswers() {
                global $name, $month, $showStone, $showFlower, $showSign, $showColor, $showName, $stone, $stoneWords, $flower, $flowerWords, $sign, $signPos, $signNeg, $color, $colorVal;
                
                if(isset($showName)) {
                    // process in api-test.php
                    
                    $nameOrigins = array();
                    
                    $url = "https://www.behindthename.com/api/lookup.php?name=$name&key=he971690";
                    $xml = simplexml_load_file($url);
                    
                    $nameDetail = $xml->name_detail;
                    $error = $xml->error;
                    
                    if($error == "name could not be found") {
                        echo "<h3><em>Sorry, your $error.</em></h3>";
                    } else {
                        
                        foreach($nameDetail as $n) {
                            $usages = $n->usages;
                            
                            foreach($usages as $u) {
                                $usage = $u->usage;
                                
                                foreach($usage as $uu) {
                                    $usageFull = $uu->usage_full;
                                    
                                    foreach($usageFull as $f) {
                                        $origin = $usageFull[0] . " ";
                                        
                                        if(in_array($origin, $nameOrigins, true)) {
                                            
                                        } else {
                                            array_push($nameOrigins, $origin);
                                        }
                                    }
                                }
                            }
                        }
                        
                        echo "<h3>Your name is used in...</h3><ul>";
                       
                        foreach($nameOrigins as $n) {
                            echo "<li>$n</li>";
                        }
                       
                        echo "</ul>";
                    }
                    
                    echo "<hr>"; 
                }
                
                if(isset($showColor)) {
                    echo "<h3>Your birth color is <strong style='color:#$colorVal'>" . ucfirst($color) . "</strong>.</h3>
                        <hr>"; 
                }
                
                if(isset($showStone)) {
                    echo "
                        <img src='img/birthstone/" . strtolower($month) . ".jpg' alt='$stone' />
                        <h3>Your birthstone is <strong>$stone</strong></h3>
                        <p>You birthstone symbolizes $stoneWords.</p>
                        <hr>";
                }
                
                if(isset($showFlower)) {
                    echo "
                        <img src='img/birthflower/" . strtolower($month) . ".jpg' alt='$flower' />
                        <h3>Your birth flower is <strong>$flower</strong></h3>
                        <p>Your birth flower symbolizes $flowerWords.</p>
                        <hr>"; 
                }
                
                if(isset($showSign)) {
                    echo "
                        <img src='img/astrosign/$sign.jpg' alt='$sign' />
                        <h3>Your astrological sign is <strong>" . ucfirst($sign) . "</strong></h3>
                        <p>Your strengths are $signPos. Your weaknesses are $signNeg.</p>
                        <hr>"; 
                }
                
            }
            
            
        ?>
        
        <h1>Hello <strong><?= ucfirst($name); ?></strong>, here's some info about your name & birthdate!</h1>
        
        <div id="results">
            
            <?= displayAnswers(); ?>
            
        </div>
        <button class="return" onclick="location.href='index.php'">Return to Form</button>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <script>
        // help from: https://stackoverflow.com/questions/3035634/jquery-validate-check-at-least-one-checkbox
            $('button').button();
        </script>
    </body>
</html>