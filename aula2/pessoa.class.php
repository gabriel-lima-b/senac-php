<?php
class Pessoa
{
	//Atributos
	private $nome;
	private $idade;

	//Métodoas Acessores
	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getIdade()
	{
		return $this->idade;
	}

	public function setIdade($idade)
	{
		$this->idade = $idade;
	}

	//Método de Cálculo
	public function calcularMeses()
	{
		return $this->idade * 12;
	} //fecha calcularMeses

} //fim da classe Pessoa
