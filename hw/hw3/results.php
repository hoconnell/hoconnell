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
            
            switch($month) {
                    case "January":
                        $stone = "Garnet";
                        $flower = "Carnation & Snowdrop";
                        $flowerWords = "fascination, distinction, & love";
                        if($day <= 20) { // 1-20
                            $sign = "capricorn";
                        } else { // 21-
                            $sign = "aquarius";
                        }
                        break;
                    case "February":
                        $stone = "Amethyst";
                        $flower = "Primrose";
                        $flowerWords = "modesty, distinction, & virtue";
                        if($day < 20) { // 1-19
                            $sign = "aquarius";
                        } else { // 20-
                            $sign = "pisces";
                        }
                        break;
                    case "March":
                        $stone = "Aquamarine";
                        $flower = "Daffodil";
                        $flowerWords = "spring, rebirth, domestic happiness, & vanity";
                        if($day <= 20) { // 1-20
                            $sign = "pisces";
                        } else { // 21-
                            $sign = "aries";
                        }
                        break;
                    case "April":
                        $stone = "Diamond";
                        $flower = "Sweat Pea";
                        $flowerWords = "good-bye & blissful pleasure";
                        if($day <= 20) { // 1-20
                            $sign = "aries";
                        } else { // 21-
                            $sign = "taurus";
                        }
                        break;
                    case "May":
                        $stone = "Emerald";
                        $flower = "Hawthorne & Lily of the Valley";
                        $flowerWords = "happiness, humility, & sweetness";
                        if($day <= 21) { // 1-21
                            $sign = "taurus";
                        } else { // 22-
                            $sign = "gemini";
                        }
                        break;
                    case "June":
                        $stone = "Pearl & Alexandrite";
                        $flower = "Rose & Honeysuckle";
                        $flowerWords = "love, gratitude, & appreciation";
                        if($day <= 21) { // 1-21
                            $sign = "gemini";
                        } else { // 22-
                            $sign = "cancer";
                        }
                        break;
                    case "July":
                        $stone = "Ruby";
                        $flower = "Water Lily & Delphinium";
                        $flowerWords = "joyful, fickleness, & sweetness";
                        if($day <= 22) { // 1-22
                            $sign = "cancer";
                        } else { // 23-
                            $sign = "leo";
                        }
                        break;
                    case "August":
                        $stone = "Peridot & Spinel";
                        $flower = "Poppy & Gladiolus";
                        $flowerWords = "moral integrity";
                        if($day <= 23) { // 1-23
                            $sign = "leo";
                        } else { // 24-
                            $sign = "virgo";
                        }
                        break;
                    case "September":
                        $stone = "Sapphire";
                        $flower = "Morning Glory & Aster";
                        $flowerWords = "daintiness, love, & magic";
                        if($day <= 23) { // 1-23
                            $sign = "virgo";
                        } else { // 24-
                            $sign = "libra";
                        }
                        break;
                    case "October":
                        $stone = "Tourmaline & Opal";
                        $flower = "Calendula & Marigold";
                        $flowerWords = "winning grace, protection, comfort, healing, & lovable";
                        if($day <= 23) { // 1-23
                            $sign = "libra";
                        } else { // 24-
                            $sign = "scorpio";
                        }
                        break;
                    case "November":
                        $stone = "Citrine & Topaz";
                        $flower = "Chrysanthemum";
                        $flowerWords = "cheerfulness, friendship, & abundance";
                        if($day <= 22) { // 1-22
                            $sign = "scorpio";
                        } else { // 23-
                            $sign = "sagittarius";
                        }
                        break;
                    case "December":
                        $stone = "Zircon, Tanzanite, & Turquoise";
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
                    $signPos = "progressivecourageous, determined, confident, enthusiastic, optimistic, honest, & passionate";
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
                global $month, $showStone, $showFlower, $showSign, $stone, $flower, $flowerWords, $sign, $signPos, $signNeg;
                
                if(isset($showStone)) {
                    echo "
                        <img src='img/birthstone/" . strtolower($month) . ".jpg' alt='$stone' />
                        <h3>Your birthstone is <strong>$stone</strong></h3>
                        <p></p>
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
                        <p>You strengths are $signPos. Your weaknesses are $signNeg.</p>
                        <hr>"; 
                }
                
            }
            
            
        ?>
        
        <h1>Hello <strong><?= ucfirst($name); ?></strong>, here's some info about your birthdate!</h1>
        
        <div id="results">
            
            <?= displayAnswers(); ?>
            
        </div>
        <h4><a href="index.php">Return to Form</a></h4>
        
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>