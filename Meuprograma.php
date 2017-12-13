<?php
	namespace QCheck;
	require_once("Quickcin.php");
	require_once("MinhasClasses.php");

	print("<pre>");
	
	$arrayContas = Quickcin::gerarArrayObjetos("Conta", 5);

	print_r($arrayContas);
?>