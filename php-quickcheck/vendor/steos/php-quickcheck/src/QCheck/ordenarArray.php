<?php
namespace QCheck;

ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);

require("Generator.php");
require("Quick.php");

$GLOBALS['contador'] =  0;

echo "<h2>Gerar suite de testes para testar orderarArray()</h2>";

// sort function that is obviously broken
function ordenarArray(array $xs) {
    return $xs;
}

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


$genInts = Generator::ints()->intoArrays();

// so let's test our sort function, it should work on all possible int arrays
$brokenSort = Generator::forAll(
    [$genInts],
    function(array $xs) {
        
        $GLOBALS['contador']++;
    
        print("array ".$GLOBALS['contador'].": <br>");
        print("<pre>");
        print_r($xs);
        print("<br>");
        
        
        $isAscending = isAscending(ordenarArray($xs));
        
        var_dump($isAscending);
        print("</pre>");
         print("<hr>");
        
        return $isAscending;
    }
);

$teste = (Quick::check(100, $brokenSort, ['echo' => true]));

print("Array que causou a falha: <br>");
print("<pre>");
print_r($teste['fail']);
print("</pre>");

print("Versao 'compactada' desse array que causou a falha: <br>");
print("<pre>");
print_r($teste['shrunk']['smallest']);
print("</pre>");

print("<pre>");
var_dump($teste);
print("</pre>");