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
        
        
        <br/>
        <form id="imgForm"> <!-- method="post" then use $_POST[] array -->
            <input type="text" name="keyword" placeholder=" Type keyword" />
            <div id="layoutDiv">
                <input type="radio" name="layout" value="horizontal" id="l-horiz" />
                    <label for="l-horiz">Horizontal</label>
                <br/>
                <input type="radio" name="layout" value="vertical" id="l-vert" /> 
                    <label for="l-vert">Vertical</label>
            </div>
            <br/>
            <select name="category">
                <option value="">- Frequently Searched -</option>
                <option value="ocean">Sea</option>
                <option value="forest">Forest</option>
                <option value="mountain">Mountains</option>
                <option value="sky">Sky</option>
                <option value="desert">Desert</option>
            </select>
            <!--<input type="submit" value="Submit"/>-->
            <button class="submit">Submit</button>
        </form>
        
        <?php
            
            if(!isset($_GET["keyword"])) { // whether or not parameter "keyword" in url
                echo "<h2>Type a keyword or select from the drop-down to display a slideshow with random images from Pixabay.com</h2>";
            } else {
                
                if($_GET["category"] !== "") {
                    $_GET["keyword"] = $_GET["category"];
                }
                
                // echo "You searched for: " . $_GET['keyword'] . "<br/>"; // associative array
                include 'api/pixabayAPI.php';
            
                $imageURLs = getImageURLs($_GET['keyword'], $_GET["layout"]); // add second parameter for orientation
                $bgImg = $imageURLs[array_rand($imageURLs)];
                // echo $bgImg;
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
              <?php 
                for($i = 0; $i < 5; $i++) {
                    echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                    if($i == 0) {
                        echo " class='active'";
                    }
                    echo "></li>";
                }
              ?>
          </ol>
        
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
              <?php 
                for($i = 0; $i < 5; $i++) {
                    // shuffle($imageURLs); // problem: can take long with many items; ideal if displaying all
                    // $lastImg = array_pop($imageURLs);
                    // echo "<img src='" . $lastImg . "' width='200' />";
                    // echo "<img src='" . $imageURLs[rand(0, count($imageURLs))] . "' width='200' />";
                    
                    do {
                        $randIndex = rand(0, count($imageURLs));
                    } while(!isset($imageURLs[$randIndex]));
                        
                    // echo "<img src='" . $imageURLs[$randIndex] . "' width='200' />";
                    echo '<div class="item';
                    
                    if($i == 0) {
                        echo ' active';
                    } 
                    
                    echo '">';
                    echo '<img src="' . $imageURLs[$randIndex] . '">';
                    echo '</div>';
                    unset($imageURLs[$randIndex]);
                }
              ?>
            
          </div>
        
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        <?php } // end of else ?>
        
        <style>
            body {
                background-image: url('<?= $bgImg ?>');
            }
        </style>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- jQuery first, then Bootstrap because Bootstrap relies on jQuery -->
        
        <script>
            $('#imgForm button').button().click(function(e) {
                var keyword = $('#imgForm input[name="keyword"]').val();
                var category = $('#imgForm select[name="category"]').val();
                
                if(keyword && keyword.length || 
                    category && category.length ||
                    keyword && keyword.length && category && category.length) {
                    
                    $('#imgForm').submit(e);
                    
                } else {
                    e.preventDefault();
                    alert("Please type or select keyword.");
                }
                
            });
        </script>
        
    </body>
</html>