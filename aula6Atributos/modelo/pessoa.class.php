<?php
class Pessoa{

	private $nome;
	private $idade;

	public function __get($a){
		return $this->$a;
	}

	public function __set($a, $v){
		$this->$a = $v;
	}
}//fim classe Pessoa
?>