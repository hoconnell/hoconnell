 <?php
include 'api.php';
            
$imageURLs = getImageURLs($_GET[keyword]); // add second parameter for orientation
$bgImg = $imageURLs[array_rand($imageURLs)];


echo json_encode($imageURLs[array_rand($imageURLs)]);
?>