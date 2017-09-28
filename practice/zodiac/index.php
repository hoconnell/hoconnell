<?php 
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    
    function yearList($startYear, $endYear) {
        global $zodiac;
        $yearSum = 0;
        
        for($i=$startYear; $i<=$endYear; $i++) {
            $yearSum += $i; // $yearSum = $yearSum + $i;
            echo "<li>Year ";
            
            if($i == 1776) {
                echo "$i <strong>USA INDEPENDENCE!</strong>";
            } else if($i % 100 == 0) {
                echo "$i <strong>Happy New Century!</strong>";
            } else {
                echo $i;
            }
            
            // echo "<br/><img src='img/" . $zodiac[$sign] . ".png' height='70px' /><hr></li>";
            echo "<br/><hr></li>";
            
        }
        
        return $yearSum;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Zodiac Practice </title>
    </head>
    <body>
        <h1>Chinese Zodiac List</h1>
        
        <ul> 
            <?php 
                $sum = yearList(1800, 1810); // new variable will == return of function
            ?>
        </ul>
        <h3>Year Sum: <?= $sum ?></h3>
    </body>
</html>