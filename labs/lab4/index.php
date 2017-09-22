<?php 
    $bgImg = "img/sea.jpg";

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lab 4: Photo Slideshow </title>
        <meta charset="utf-8" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url('css/styles.css');
            body {
                background-image: url('<?= $bgImg ?>');
            }
        </style>
        <!-- EX: http://cst336.herokuapp.com/projects/slider/ -->
    </head>
    <body>
        
        <?php 
            if(isset($_GET["keyword"])) { // whether or not parameter "keyword" in url
                echo "You searched for: " . $_GET['keyword'] . "<br/>"; // associative array
                include 'api/pixabayAPI.php';
                $imageURLs = getImageURLs($_GET['keyword']);
                // print_r($imageURLs);
                $bgImg = $imageURLs[array_rand($imageURLs)];
                
                for($i = 0; $i < 5; $i++) {
                    // shuffle($imageURLs); // problem: can take long with many items; ideal if displaying all
                    // $lastImg = array_pop($imageURLs);
                    // echo "<img src='" . $lastImg . "' width='200' />";
                    
                    // echo "<img src='" . $imageURLs[rand(0, count($imageURLs))] . "' width='200' />";
                    
                    do {
                        $randIndex = rand(0, count($imageURLs));
                    } while(!isset($imageURLs[$randIndex]));
                        
                    echo "<img src='" . $imageURLs[$randIndex] . "' width='200' />";
                    unset($imageURLs[$randIndex]);
                }
                
            }
        
            if(!isset($imageURLs)) {
                echo "<h2>Type a keyword to display a slideshow with random images from Pixabay.com</h2>";
            } else {
                
            }
        ?>
        
        <form> <!-- method="post" then use $_POST[] array -->
            <input type="text" name="keyword" placeholder="Type keyword" />
            <input type="submit" value="Submit"/>
        </form>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- jQuery first, then Bootstrap because Bootstrap relies on jQuery -->
    </body>
</html>