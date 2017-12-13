<?php

    namespace QCheck;
    
    require("Generator.php");
    require("Quick.php");

    $strings =  Generator::asciiStrings()->takeSamples(75);
    
    print("<pre>");
    print_r($strings);