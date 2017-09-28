<?php

// ---- GENERAL

// to use external file, at top of php/html doc:  <?php include 'folder/filename.php' ??>

// ---- VARIABLES

global $variableName // access anywhere in document, even inside functions
                    // use {} for computed names -- e.g. ${string . $i}

// to assign return of function:
function funcName() {
    
}

// ---- STRINGS

ucfirst($stringName); // make first letter capital
strtoupper($stringName); // make all capital
strtolower($stringName); // make all lower

strlen($stringName); // length of array

// ---- ARRAYS

$arrayName = array();
$arrayName = array("item1", "item2");

$arrayName[X] = "new value;" // Renew value of specific item

$arrayName[] = "new item";
array_push($arrayName, "new item");

print_r($arrayName); // print all array items

count($arrayName); // will count number of items in array -- e.g. index 0-4 = 5 items
array_rand($arrayName); // rand() within index

sort($arrayName); // sort alphabetically/numerically
rsort($arrayName); // sort reverse
shuffle($arrayName); 

array_pop($arrayName); // id & delete last item
unset($arrayName[X]); // delete 1 item
unset($arrayName); // delete whole array

join(", ", $arrayName); // make array into long string separated by ", "
str_split($stringName, 1); // make string into array; 1 is length for each array item from original string -- e.g. ("Hello", 2) = He, ll, o

// ---- CONDITIONALS - IF, SWITCH

if($condition) {
    // do if condition met
} else if($condition1 ||
          $condition2 ||
          $condition3) {
    // do if any condition 1-3 met
} else {
    // do if no conditions match
}

switch($keyword) { // keyword = a, b, c
    case "a": echo "A";
        break;
    case "b":
    case "c": echo "B or C";
        break;
    default: echo "Not A, B, or C";
}

switch($keyword): // keyword = 1, 2, 3
    case 1: echo "1";
        break;
    case 2:
    case 3: echo "2 or 3";
        break;
    default: echo "Not 1, 2, or 3";
endswitch;

// LOOPS - FOR, FOREACH, WHILE, DOWHILE

for($i = 0; $i < X; $i++) {
    // do for X iterations
}

foreach($arrayName as $item) {
    // do for each $item in $arrayName
}

while($condition) {
    // do if condition is met
}

while($condition):
    // do if condition is met
endwhile;

do {
    // do something at least once before checking if condition is met
} while($condition);

?>