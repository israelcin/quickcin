<?php

class Banco {
	public $nomeBanco;
	public $contasList; 

	public function __construct()
	{
		$this->nomeBanco = "";
		$this->contasList = array();		
	}

	public function setNomeBanco($nomeBanco)
	{
		$this->nomeBanco = $nomeBanco;		
	}

	public function addConta(Conta $conta) {
		
			if (!$this->numeroAgenciaMaior5($conta->agencia->numeroAgencia)) {
				echo "Conta inserida<br>";
				array_push($this->contasList, $conta);
			} else {
				echo "Conta nao inserida. Num Agencia maior que 5;<br>";
			}
		
	}

	public function jaExisteCpf($cpf) {
		foreach ($this->contasList as $key => $value) {

			if ($value->usuario->cpf == $cpf) {
				return true;
			}
		}
		return false;
	}

	public function numeroAgenciaMaior5($numeroAgencia) {
		if ($numeroAgencia > 50) {
			return true;
		} else {
			return false;
		}
	}
	
	public function testeNumeroAgenciaMaior5($numeroAgencia) {
		if ($numeroAgencia > 5) {
			return true;
		} else {
			return false;
		}
	}
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
	
	public function Conta($numeroConta, $saldo, Usuario $usuario, Agencia $agencia)
	{
		$this->numeroConta = $numeroConta;
		$this->saldo = $saldo;
		$this->usuario = $usuario;
		$this->agencia = $agencia;
	}
}

class Usuario {
	public $nomeUsuario;
	public $cpf;
	
	public function __construct()
	{
		$this->nomeUsuario = "";
		$this->cpf = 0;
	}

	public function Usuario($nomeUsuario, $cpf)
	{
		$this->nomeUsuario = $nomeUsuario;
		$this->cpf = $cpf;
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

	public function Agencia($numeroAgencia, $nomeAgencia, Endereco $enderecoAgencia)
	{
		$this->numeroAgencia = $numeroAgencia;
		$this->nomeAgencia = $nomeAgencia;
		$this->enderecoAgencia = $enderecoAgencia;

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

	public function Endereco($rua, $bairro, $numeroImovel) {
		$this->rua = $rua;
		$this->bairro = $bairro;
		$this->numeroImovel = $numeroImovel;	
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