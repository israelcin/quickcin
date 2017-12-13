<?php

    namespace QCheck;
    
    require("Generator.php");
    require("Quick.php");
    
    /*
    $objetos =  Generator::geradorObjetos()->takeSamples(75);
    
    print("<pre>");
    print_r($objetos);
    
    echo "</div>";
    */
    

    echo "<div class='divClass'>";
    echo "<h2>Generator::ints()->takeSamples(75)</h2>";
    $ints =  Generator::ints()->takeSamples(75);
    
    print("<pre>");
    print_r($ints);
    
    echo "</div>";
    
    echo "<div class='divClass'>";
    echo "<h2>Generator::asciiStrings()->takeSamples(75)</h2>";
    $strings =  Generator::asciiStrings()->takeSamples(75);
    
    print("<pre>");
    print_r($strings);
    
    echo "</div>";
    
    echo "<div class='divClass'>";
    echo "<h2>Generator::ints()->intoArrays()->takeSamples(20)</h2>";
    $intsArray =  Generator::alphaStrings()->intoArrays()->takeSamples(20);
    
    print("<pre>");
    print_r($intsArray);
    
    echo "</div>";
  
?>

<style type="text/css">
    .divClass { border: 1px dashed; float:left; width: 30%; padding:4px; overflow:hidden;}
</style>