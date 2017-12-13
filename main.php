<?php

    namespace QCheck;
    
    require("php-quickcheck/vendor/steos/php-quickcheck/src/QCheck/Generator.php");
    require("php-quickcheck/vendor/steos/php-quickcheck/src/QCheck/Quick.php");
    
    require_once("Quickcin.php");
	require_once("MinhasClasses.php");

	print("<pre>");
	
	define("QTD_TESTES", 20);
    //$banco = new Banco();
    
    $nomeDaClasse = "Conta";
    $objeto = new $nomeDaClasse();
    
    $nomeDaClasse2 = "Banco";
    $banco = new $nomeDaClasse2();
    
    $arrayGeradores = Quickcin::selecionarGeradoresQCheck($objeto);
    
    $funcaoTestes = function() {
        
        $arrayParametros = array();
        
    	for($i=0; $i<func_num_args(); $i++) {
            array_push($arrayParametros, func_get_arg($i));
        }
        
    	//global $objeto;
    	global $banco;
    	global $nomeDaClasse;
    	$objeto = new $nomeDaClasse();
    	$objeto = Quickcin::pegarParametrosGerados($objeto, $arrayParametros);
    	
    	$numeroAgencia = $arrayParametros[4];
    	
    	$teste = ($banco->testeNumeroAgenciaMaior5($numeroAgencia) == $banco->numeroAgenciaMaior5($numeroAgencia));
    	
    	if ($teste) {
    	    $banco->addConta($objeto);
    	}
    	
    	echo "<br>";
    	print_r($objeto);
    	
        return $teste;
    };
   
    $propriedadeTestada = Generator::forAll($arrayGeradores, $funcaoTestes);
    $testes = Quick::check(QTD_TESTES, $propriedadeTestada, ['echo' => true]);
    
    
    echo "<br>";
    print_r($testes);
    
    echo "<br>";
    //print_r($banco);