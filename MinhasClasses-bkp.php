<?php

class banco {
	public $nomeBanco;
}

class Conta {
	public $numeroConta;
	public $saldo;
	public $usuario;
	public $agencia; 
	
	public function __construct()
	{
		$this->numeroConta = 0;
		$this->saldo = 0;
		$this->usuario = new Usuario();
		$this->agencia = new Agencia();
	}
	
}

class Usuario {
	public $nomeUsuario;
	public $cpf;
	
	public function __construct()
	{
		$this->nomeUsuario = "Paulo";
		$this->cpf = 0;
	}

}

class Agencia {
	public $numeroAgencia;
	public $nomeAgencia;
	public $enderecoAgencia;

	public function __construct()
	{
		$this->numeroAgencia = 0;
		$this->nomeAgencia = "";
		$this->enderecoAgencia = new Endereco();

	}
	
}

class Endereco {
	public $rua;
	public $bairro;
	public $numeroImovel;

	public function __construct()
	{
		$this->rua = "";
		$this->bairro = "";
		$this->numeroImovel = 0;
	}

}


class Pessoa {
	public $nome;
	public $idade;
	public $naturalidade;
	
	public function __construct() {
		$this->nome = "";
		$this->idade = 0;
		$this->naturalidade = "";
	}
	
}

?>