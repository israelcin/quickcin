<?php
namespace QCheck;

require_once("php-quickcheck/vendor/steos/php-quickcheck/src/QCheck/Generator.php");
require_once("php-quickcheck/vendor/steos/php-quickcheck/src/QCheck/Quick.php");

class Quickcin {

	public static function pegarParametrosGerados($objeto, $arrayParam) {
		
		// contar parametros
		$countParametros = count($objeto);

		//Classe sem parametros
		if ($countParametros == 0) {
			return ""; 
			
		} else {
			
		// Laço para iterar entre parametros
			foreach ($objeto as $key => $value) {
				
				// Parametro que é objeto, chamar recursivamente a função gerarQuickcin
				if (is_object($value)) {
					//$objeto->$key = Quickcin::pegarParametrosGerados($value, $arrayParam);
					
					$numParam = count($value);
					Quickcin::pegarParametrosGerados($value, $arrayParam);
					
					// Eliminar do array a quantidade de parametros usados na chamada recursiva
					for ($i = 0; $i <= $numParam; $i++) {
						array_shift($arrayParam);
					}

				// Parametro é um tipo primitivo	
				} else {
					
					// Parametro é um inteiro
					if (is_int($value)) {
						$objeto->$key = array_shift($arrayParam);
					
					// Parametro é uma string
					} else if (is_string($value)) {
						$objeto->$key = array_shift($arrayParam);

					// Parametro é um boolean
					} else if (is_bool($value)) {
						$objeto->$key = array_shift($arrayParam);
					}
				}
			}

		}
		
		return $objeto;
	
	}
	
	function selecionarGeradoresQCheck($objeto) {
        $arrayGeradores = array();
        
		// contar parametros
		$countParametros = count($objeto);

		//Classe sem parametros
		if ($countParametros == 0) {
			return NULL; 
		} else {

			// Laço para iterar entre parametros
			foreach ($objeto as $key => $value) {				
				
				// Parametro que é objeto, chamar recursivamente a função selecionarGeradoresQCheck
				if (is_object($value)) {
					$arrayGeradores = array_merge($arrayGeradores, Quickcin::selecionarGeradoresQCheck($value));

				// Parametro é um tipo primitivo	
				} else {
					// Parametro é um inteiro
					if (is_int($value)) {
						array_push($arrayGeradores, Generator::posInts());
					// Parametro é uma string
					} else if (is_string($value)) {
						array_push($arrayGeradores, Generator::strings());
					// Parametro é um boolean	
					} else if (is_bool($value)) {
						array_push($arrayGeradores, Generator::booleans());
					}
				}
			}

		}
        
		return $arrayGeradores;
	}
	
}
?>