<?php
namespace QCheck;

require("Generator.php");
require("Quick.php");

print("<pre>");

// predicate function that checks if the given
// array elements are in ascending order
function isAscending(array $xs) {
    $last = count($xs) - 1;
    for ($i = 0; $i < $last; ++$i) {
        if ($xs[$i] > $xs[$i + 1]) {
            return false;
        }
    }
    return true;
}

// sort function that is obviously broken
function myBrokenSort(array $xs) {
    return $xs;
}


$genInts = Generator::ints()->intoArrays();



print("genInts");
var_dump($genInts);
print("xxxxxxxx \n\n\n");

// so let's test our sort function, it should work on all possible int arrays
$brokenSort = Generator::forAll(
    [$genInts],
    function(array $xs) {
        return isAscending(myBrokenSort($xs));
    }
);


$teste = (Quick::check(5, $brokenSort, ['echo' => true]));

print_r($teste);
var_dump($teste);