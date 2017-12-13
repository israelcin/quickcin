<?php

    namespace QCheck;
    
    require("Generator.php");
    require("Quick.php");

    $ints =  Generator::ints()->takeSamples(75);
    
    print("<pre>");
    print_r($ints);