<?php
namespace QCheck;

require("Generator.php");
require("Quick.php");
/*
use QCheck\Generator as Gen;
use QCheck\Quick;
*/

$contTestes = 0;
$genStrings = Generator::asciiStrings();
$stringsAreNeverNumeric = Generator::forAll(
    [$genStrings],
    function($str) {
        $contTestes++;
        print("Teste num " . $contTestes . " <br>");
        print_r($str . "<br>");
        //print("<br");
        return !is_numeric($str);
    }
);
$result = Quick::check(10, $stringsAreNeverNumeric);
print("<pre>");
//var_dump($stringsAreNeverNumeric);
print_r($result);
//print_r($genStrings);
