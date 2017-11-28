<?php

function displayImg() {

    if(isset($_POST['submitFile'])) {
        // print_r($_FILES);
    
        // echo $_FILES['myFile']['name'];
        // echo $_FILES['myFile']['size'];
        
        if($_FILES['myFile']['size'] > 1000000) {
            echo '<h3 class="error">File must be under 1MB.</h3>';
        } else {
            move_uploaded_file($_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
            
            // echo "<img src='gallery/" . $_FILES['myFile']['name'] . "' />";
            
        }
    
    }
    
    $files = scandir("gallery/", 1);
    // print_r($files);
    
    for($i = 0; $i < count($files)-2; $i++) {
        echo "<img src='gallery/" . $files[$i] . "' width='25px' />";
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Upload File </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <script src="https://code.jquery.com/jquery.min.js"></script>
    </head>
    <body>
        
        <h1>Photo Gallery</h1>
        
        <form method="POST" enctype="multipart/form-data">
            
            Upload file:
            <input type="file" name="myFile" />
            <br/>
            <br/>
            <input type="submit" name="submitFile" value="Upload" />
            
        </form>
        
        <div class="divide"></div>
        
        <div id="big">
            <img />
        </div>
        
        <div id="imgs">
            <?= displayImg(); ?>
        </div>
        
        
        <footer>
            <div class="divide"></div>
            CST 352 F2017
        </footer>
        
        <script>
            $(document).ready(function() {
                // $('img').click(function() {
                //   if($(this).css('width') == '250px') {
                //       $(this).css('width', '25px').css('clear', 'none');
                //   } else {
                //       $(this).css('width', '250px')
                //         .css('clear', 'both');
                //   }
                   
                // });
                $('#imgs img').click(function() {
                    var source = $(this).attr('src');
                    $('#big img').attr('src', source);
                });
            });
        </script>

    </body>
</html>