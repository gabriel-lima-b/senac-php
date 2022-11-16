<?php
class Contato{
	//Atributos
	private $nome;
	private $email;
	private $fone;

	//Método construtor
	public function __construct($nome, $email, $fone){
		$this->nome = $nome;
		$this->email = $email;
		$this->fone = $fone;
	}//fim do método construtor

	//Métodos acessores
	public function __get($atributo){
		return $this->$atributo;
	}//fecha o método

	public function __set($atributo, $valor){
		$this->$atributo=$valor;
	}//fecha o método
}//fecha a classe Contato
?>