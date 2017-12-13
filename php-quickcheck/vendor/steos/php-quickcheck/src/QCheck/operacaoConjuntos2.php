<?php
namespace QCheck;

require("Generator.php");
require("Quick.php");


class Conjunto {
    
    public $elementos = array();
    public $totalElementos = 0;
    
    public function Conjunto() {
       
    }
        
    function adicionarElemento($elm)
    {
       // adiciona o elemento se ele já não estiver no conjunto
       if (!in_array($elm, $this->elementos)) {
            array_push($this->elementos, $elm);
       }
      
       // incrementar o contador de elementos
       $this->totalElementos++;
    }
    
    function getTotalElementos() {
        return $this->totalElementos;
    }
}


$conjunto = new Conjunto();


$genInts = Generator::ints();
$genStrings = Generator::strings();
$genBooleans = Generator::booleans();

print("<pre>");
//print_r($genInts); 

$brokenConjunto = Generator::forAll(
    [$genInts, $genStrings],
    function($intGerado, $stringGerada) {
        echo "<br>";
        echo "int gerado: " . $intGerado . "<br>";
        echo "string gerada: " . $stringGerada . "<br>";
       
        //global $conjunto;
        //$conjunto->adicionarElemento($intGerado);
        //$ret = $conjunto->getTotalElementos() == count($conjunto->elementos);
        
        //echo "getTotalElementos() " . $conjunto->getTotalElementos() .  " count() " . count($conjunto->elementos). "<br><br>";
        $ret = true;
        return $ret;
    }
);

//print_r($brokenConjunto);

$teste = Quick::check(50, $brokenConjunto, ['echo' => true]);

print("<pre>");
//print_r($teste);