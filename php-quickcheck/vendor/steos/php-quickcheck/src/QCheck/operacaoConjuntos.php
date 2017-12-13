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
       //if (!in_array($elm, $this->elementos)) {
            array_push($this->elementos, $elm);
       //}
      
       // incrementar o contador de elementos
       $this->totalElementos++;
    }
    
    function getTotalElementos() {
        return $this->totalElementos;
    }
}


$conjunto = new Conjunto();


$genInts = Generator::ints();

$brokenConjunto = Generator::forAll(
    [$genInts],
    function($a) {
        
        global $conjunto;
        $conjunto->adicionarElemento($a);
        $ret = $conjunto->getTotalElementos() == count($conjunto->elementos);
        
        echo "elemento gerado: " . $a . "<br>";
        echo "getTotalElementos() " . $conjunto->getTotalElementos() .  " count() " . count($conjunto->elementos). "<br><br>";
        
        return $ret;
    }
);

$teste = Quick::check(1000, $brokenConjunto, ['echo' => true]);

print("<pre>");
var_dump($teste);